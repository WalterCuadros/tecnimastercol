<?php

$email=$this->input->post('email', TRUE);
$password=$this->input->post('password', TRUE);

if ($email=='') {	
	print json_encode(array("res"=>"bad","msj"=>"Debe ingresar el correo."));
	exit();
}

if ($password=="") {
	print json_encode(array("res"=>"bad","msj"=>"Debe ingresar la contrase«Ða."));
	exit();
}

$this->db->select('email,id,rol,name,apellidos, password, url_imagen');
$this->db->where('email',$email);
$query=$this->db->get('users');
if ($query->num_rows()>0) {
	$query=$query->result();
	if (password_verify($password, $query[0]->password)) {
		$this->session->set_userdata('logged_in', TRUE);
		$this->session->set_userdata('nombre', $query[0]->name);
		$this->session->set_userdata('apellidos', $query[0]->apellidos);
		$this->session->set_userdata('email', $query[0]->email);
		$this->session->set_userdata('id', $query[0]->id);
		$this->session->set_userdata('rol', $query[0]->rol);
		$this->session->set_userdata('url', $query[0]->url_imagen);
		print json_encode(array("res"=>"ok", 'rol'=>$query[0]->rol));
	}else{
		print json_encode(array("res"=>"bad", "msj"=>"Usuario y/o contraseña incorrecto."));
	}		
}else{
	print json_encode(array("res"=>"bad","msj"=>'Usuario no existe, debe registrarse para poder acceder.'));
}

?>