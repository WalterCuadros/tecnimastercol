<?php
$id=$this->input->post('id');
$nombre = $this->input->post('nombres');
$apellido = $this->input->post('apellidos');
$municipio = $this->input->post('municipio');
$direccion = $this->input->post('direccion');
$contacto = $this->input->post('contacto');
$password = $this->input->post('password');
$r='';
$destination=NULL;
$ok_image=true;
$new_name='';

$data=['name'=>$nombre, 'apellidos'=>$apellido, 'municipio'=>$municipio, 'contacto'=>$contacto, 'direccion'=>$direccion];

if ($password!='') {
  $new_password = password_hash($password,PASSWORD_DEFAULT);
  $data=array_merge($data, ['password'=>$new_password]);  
}




  $this->db->where('id', $id);
    $query=$this->db->update('users', $data);
	if ($query) {
		$r = @json_encode(array('res'=>'ok'));
	}else{
		$r = @json_encode(array('res'=>'bad','msj'=>'No se pudo actualizar los datos del técnico.'));
	}
	        	

print "<script>parent.postMessage( '".$r."' , '".base_url()."')</script>"; 