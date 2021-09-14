<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 require 'email/Exception.php';
 require 'email/PHPMailer.php';
 require 'email/SMTP.php';

 $marca_aparato=$this->input->post("marca_aparato");
 $nombre_cliente=$this->input->post("nombre_cliente");
 $numero_contacto=$this->input->post("numero_contacto");
 $email=$this->input->post("email");   
 $servicio=$this->input->post("servicio");
 $aparato=$this->input->post("aparato");
 $s_servicio=$this->input->post("s_servicio");
 
 if($s_servicio=="1"){
    if ($servicio=='') {	
    	print json_encode(array("res"=>"bad","msj"=>"Debe escoger el tipo de servicio"));
    	exit();
    }
    if ($aparato=='') {   
        print json_encode(array("res"=>"bad","msj"=>"Debe ingresar tipo de  aparato"));
        exit();
    }

    $this->db->select('precios_servicios.servicio,precios_servicios.precio,precios_servicios.aparato,tipo_aparato.tipo,precios_servicios.mensaje');
    $this->db->from('precios_servicios');
    $this->db->join('tipo_aparato', 'tipo_aparato.id_tipo_aparato = precios_servicios.aparato');
    $this->db->where('precios_servicios.servicio',$servicio);
    $this->db->where('tipo_aparato.id_tipo_aparato',$aparato);
    $cons_servicios=$this->db->get()->result();

    foreach($cons_servicios as $servicio) {
        $n_servicio=$servicio->servicio;
        $precio=$servicio->precio;
        $aparato=$servicio->tipo;
        $mensaje=$servicio->mensaje;
    }
    echo json_encode(array("res"=>"ok","servicio"=>$n_servicio,"precio"=>$precio,"aparato"=>$aparato,"msj"=>$mensaje));

}else{
    if ($aparato=='') {    
        print json_encode(array("res"=>"bad","msj"=>"Debe escoger el tipo de aparato"));
        exit();
    }
    if ($marca_aparato=='') {   
        print json_encode(array("res"=>"bad","msj"=>"Debe ingresar la marca del aparato"));
        exit();
    }
    if ($servicio=='') {   
        print json_encode(array("res"=>"bad","msj"=>"Debe escoger el tipo de servicio"));
        exit();
    }
    if ($numero_contacto=='') {   
        print json_encode(array("res"=>"bad","msj"=>"Debe ingresar el número de contacto"));
        exit();
    }
    if ($email=='') {   
        print json_encode(array("res"=>"bad","msj"=>"Debe ingresar el email"));
        exit();
    }

    do {
        $fecha=str_replace('.','',date("Y.m.d"));
        $longitud=10;   
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
        $clave_servicio=$fecha.$key;  
        //Validacion de correo
        $this->db->select('clave_servicio');
        $this->db->where('clave_servicio',$clave_servicio);
        $query=$this->db->get('solicitud_servicio');
        if($query->num_rows()>0){
            $bandera=1;    
        }else{
            $bandera=0;
        }
    } while ($bandera==1);

    $data = array(
        'tipo_aparato'=>$aparato,
        'marca_aparato'=>$marca_aparato,
        'tipo_servicio'=>$servicio,
        'numero_contacto'=>$numero_contacto,
        'email'=>$email,
        'clave_servicio'=>$clave_servicio,
        'created_at'=> date('Y-m-d H:m:s', time())
    );
    $query=$this->db->insert('solicitud_servicio',$data);

    if($query){
        switch ($aparato) {
            case '1':
               $tipo="Aire acondcionado";
               break;
            case '2':
              $tipo="Lavadora";
               break;
            case '3':
              $tipo="Nevera";
               break;
        }

        $mensaje1="Nombre: ".$nombre_cliente."<br> email: ".$email."<br> Número de contacto: ".$numero_contacto."<br>Tipo aparato: ".$tipo."<br>Marca aparato: ".$marca_aparato."<br>Tipo sevicio: ".$servicio."<br>clave servicio: ".$clave_servicio;

        /*$this->load->library('email');
        $this->email->initialize();
        $this->email->from('wagio100@gmail.com','Walter');
        $this->email->to('wagio100@gmail.com');
        $this->email->subject('Solicitud servicio');
        $this->email->message($mensaje1);
        if ($this->email->send()) {
                print json_encode(array("res"=>"ok"));
            }
        }*/
        $mail = new PHPMailer(true);

        //Server settings
        $mail->isSMTP(); 
        $mail->SMTPDebug = 0;
        $mail->Host = 'localhost'; //'relay-hosting.secureserver.net' didn't work
        $mail->Port = 25;
        $mail->SMTPAuth = false;
        $mail->SMTPSecure = false;
        $mail->SMTPAutoTLS = false;
        //Recipients
        $mail->setFrom('servicios@tecnimastercol.com', 'tecnimaster');
        $mail->addAddress('wagio100@gmail.com','Receiver');     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Solicitud de servicio';
        $mail->Body    = $mensaje1;

        if( $mail->send()){
             echo json_encode(array("res"=>"ok"));
        }   
    }else{
        print json_encode(array("res"=>"bad","msj"=>'Los datos ingresados no son validos.'));
    }
}