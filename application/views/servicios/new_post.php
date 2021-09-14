<?php

$titulo = $this->input->post('titulo',true);
$contenido = $this->input->post('contenido',true);
$estado = $this->input->post('estado',true);
$video = $this->input->post('video',true);
$seo = $this->input->post('seo',true);
$description = $this->input->post('desc',true);
$image = $_FILES["file_img"];

$destination=NULL;
$ok_image=true;
$new_name='';


$data=['titulo'=>$titulo,'content'=>$contenido,'estado'=>$estado, 'video'=>$video,'seo'=>$seo,'description'=>$description];

if (!isset($image["file_img"]['tmp_name'])) {
	
	//valida q la imagen no tenga error
    if ($image['error']==0) {
		$orig_date = new DateTime();
	
		$data=array_merge($data, ['fecha'=>$orig_date->format('Y-m-d')]);     
		$orig_date=$orig_date->getTimestamp();
		
       	$new_name = explode('.', $image['name']);
		$new_name = $new_name[0].'_'.$orig_date.'.'.$new_name[1];
		$destination ="/home/zdngvzt6kd4f/public_html/assets/img/blog/".$new_name;
			//$destination = "C:\\xampp\\htdocs\\tecnimastercol\\assets\\img\\blog\\".$new_name;
       	//$destination = "/var/www/html/didactic/assets/img/platform/users/".$new_name;
       	//sube la imagen al local
       	if (move_uploaded_file($image['tmp_name'], $destination)) {		
       		$data=array_merge($data, ['imagen'=>$new_name]);           		
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
    $query=$this->db->insert('blog', $data);
	if ($query) {
		$r = @json_encode(array('res'=>'ok'));
	}else{
		$r = @json_encode(array('res'=>'bad','msj'=>'No se pudo actualizar los datos del técnico.'));
	}
}	        	

print "<script>parent.postMessage( '".$r."' , '".base_url()."')</script>"; 