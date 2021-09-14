<?php

$nombres = $this->input->post("nombres");
$apellidos = $this->input->post("apellidos");
$email = $this->input->post("email");
$contrasena = $this->input->post("contrasena");

if ($nombres=='') {	
	print json_encode(array("res"=>"bad","msj"=>"Debe ingresar los nombres"));
	exit();
}
if ($apellidos=='') {   
    print json_encode(array("res"=>"bad","msj"=>"Debe ingresar los apellidos"));
    exit();
}
if ($email=='') {   
    print json_encode(array("res"=>"bad","msj"=>"Debe ingresar el email"));
    exit();
}
if ($contrasena=='') {   
    print json_encode(array("res"=>"bad","msj"=>"Debe ingresar la contraseña"));
    exit();
}

//Validacion de correo
$this->db->select('email');
$this->db->where('email',$email);
$query=$this->db->get('users');
if($query->num_rows()>0){
	print json_encode(array('res'=>'bad', 'msj'=> 'El email ya existe'));
    exit();
}

$data = array(
        'name'=>$nombres,
        'apellidos'=>$apellidos,
        'email'=>$email,
        'password'=>$contrasena,
        'created_at'=> date('Y-m-d H:m:s', time())
    );
$query=$this->db->insert('users',$data);

if($query){
    print json_encode(array("res"=>"ok"));
}else{
    print json_encode(array("res"=>"bad","msj"=>'Los datos ingresados no son validos.'));
}