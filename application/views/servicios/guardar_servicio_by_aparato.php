<?php
$id_aparato=$this->input->post("id_aparato",true);
$id_usuario=$this->input->post("id_usuario",true);
//$clave_servicio=$this->input->post("clave_servicio");
$tecnico=$this->input->post("tecnico",true);
$fecha=$this->input->post("fecha",true);
$descripcion=$this->input->post("descripcion",true);
$observaciones=$this->input->post("observaciones",true);
$valor_tecnico=$this->input->post("valor_tecnico",true);
$valor_total=$this->input->post("valor",true);
$valor_tecnimaster=$this->input->post("valor_tecnimaster",true);
$orden_servicio =  $this->input->post("orden_servicio",true);

/*if ($clave_servicio=='') {   
  print json_encode(array("res"=>"bad","msj"=>"Debe ingresar clave_servicio"));
  exit();
} */

/*do {
    $fecha_s=str_replace('.','',date("Y.m.d"));
    $longitud=10;   
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    //$clave_servicio=$fecha_s.$key;  
    //Validacion de correo
    $this->db->select('clave_servicio');
    $this->db->where('clave_servicio',$orden_servicio);
    $query=$this->db->get('servicios');
    if($query->num_rows()>0){
        $bandera=1;    
    }else{
        $bandera=0;
    }
} while ($bandera==1);*/

$data = array( 'id_aparato'=>$id_aparato, 'id_tecnico'=>$tecnico, 'fecha'=>$fecha, 'desc_servicio'=>$descripcion, 'valor'=>$valor_total, 'observaciones'=>$observaciones, 'id_usuario'=>$id_usuario, 'valor_tecnico'=>$valor_tecnico, 'valor_tecnimaster'=>$valor_tecnimaster, 'clave_servicio'=>$orden_servicio );
$query=$this->db->insert('servicios',$data);
if($query){
  print json_encode(array("res"=>"ok"));
}else{
  print json_encode(array("res"=>"bad","msj"=>'Los datos ingresados no son validos.'));
}