<?php


$password = $this->input->post('pass',true);
$id ="1";
$data=[];

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