<?php
$nombre = $this->input->post('nombres');
$apellido = $this->input->post('apellidos');
$municipio = $this->input->post('municipio');
$direccion = $this->input->post('direccion');
$contacto = $this->input->post('contacto');
$email = $this->input->post('email');
$password = $this->input->post('password');

$r='';
$destination=NULL;
$ok_image=true;
$new_name='';

$new_password = password_hash($password,PASSWORD_DEFAULT);
$data=['name'=>$nombre, 'apellidos'=>$apellido, 'municipio'=>$municipio, 'contacto'=>$contacto, 'email'=>$email, 'direccion'=>$direccion, 'rol'=>2, 'created_at'=>date('Y-m-d h:m:s'), 'password'=>$new_password];


	//valida q la imagen no tenga error

    $query=$this->db->insert('users', $data);
	if ($query) {
		$r = @json_encode(array('res'=>'ok'));
	}else{
		$r = @json_encode(array('res'=>'bad','msj'=>'No se pudo actualizar los datos del técnico.'));
	}
	        	

print "<script>parent.postMessage( '".$r."' , '".base_url()."')</script>"; 