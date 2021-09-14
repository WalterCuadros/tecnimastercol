<?php
$id = $this->input->post('id');
$nombre = $this->input->post('nombres');
$apellido = $this->input->post('apellidos');
$municipio = $this->input->post('municipio');
$direccion = $this->input->post('direccion');
$contacto = $this->input->post('contacto');
$cedula = $this->input->post('cedula');
$image = $_FILES["File"];
$r='';
$destination=NULL;
$ok_image=true;
$new_name='';

$data=['nombres'=>$nombre, 'apellidos'=>$apellido, 'municipio'=>$municipio, 'contacto'=>$contacto, 'cedula'=>$cedula, 'direccion'=>$direccion];

if (!isset($image["file_img"]['tmp_name'])) {
	//valida q la imagen no tenga error
    if ($image['error']==0) {
        $orig_date = new DateTime();
       	$orig_date=$orig_date->getTimestamp();
       	$new_name = explode('.', $image['name']);
       	$new_name = $new_name[0].'_'.$orig_date.'.'.$new_name[0];
       	
       	 
       	$destination ="/home/zdngvzt6kd4f/public_html/assets/img/tecnicos/".$new_name;
       	//$destination = "/var/www/html/didactic/assets/img/platform/users/".$new_name;
       	//sube la imagen al local
       	if (move_uploaded_file($image['tmp_name'], $destination)) {		
       		$data=array_merge($data, ['foto_perfil'=>$new_name]);           		
       	}else{
       		$ok_image=false;
       		$r = @json_encode(array('res'=>'bad','msj'=>'Problemas subiendo la imagen.'));
       	}
    }else{
    	$ok_image=false;
    	$r = @json_encode(array('res'=>'bad','msj'=>'Problemas subiendo la imagen.'));
    }
}

if ($ok_image) {
	$this->db->where('id', $id);
    $query=$this->db->update('tecnicoss', $data);
	if ($query) {
		$r = @json_encode(array('res'=>'ok'));
	}else{
		$r = @json_encode(array('res'=>'bad','msj'=>'No se pudo actualizar los datos del técnico.'));
	}
}	        	

print "<script>parent.postMessage( '".$r."' , '".base_url()."')</script>"; 