<?php
$raiz = $this->input->post('raiz',true);
$nombre = $this->input->post('nombres',true);
$f_inicio = $this->input->post('f_inicio',true);
$f_fin = $this->input->post('f_fin',true);
$descuento = $this->input->post('descuento',true);
$cabecera = $this->input->post('cabecera',true);
$footer = $this->input->post('footer',true);
$estado = $this->input->post('estado',true);
$vigencia = $this->input->post('vigencia',true);
$image = $_FILES["file_img"];

$destination=NULL;
$ok_image=true;
$new_name='';

if($estado == 1)
{
	
	$this->db->set("estado = IF(estado = 1,1,0)");
	$this->db->where('estado','1');
	$this->db->update('promociones');
	
}
$data=['raiz'=>$raiz,'descuento'=>$descuento,'nombre_promocion'=>$nombre, 'cabecera'=>$cabecera,'footer'=>$footer,'vigencia'=>$vigencia,'fecha_inicio'=>$f_inicio, 'fecha_fin'=>$f_fin,'estado'=>$estado];

if (!isset($image["file_img"]['tmp_name'])) {
	
	//valida q la imagen no tenga error
    if ($image['error']==0) {
		$orig_date = new DateTime();
	
		$data=array_merge($data, ['fecha_registro'=>$orig_date->format('Y-m-d')]);     
		$orig_date=$orig_date->getTimestamp();
		
       	$new_name = explode('.', $image['name']);
		$new_name = $new_name[0].'_'.$orig_date.'.'.$new_name[1];
			$destination ="/home/zdngvzt6kd4f/public_html/assets/img/promocion/".$new_name;
		
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
    $query=$this->db->insert('promociones', $data);
	if ($query) {
		$r = @json_encode(array('res'=>'ok'));
	}else{
		$r = @json_encode(array('res'=>'bad','msj'=>'No se pudo actualizar los datos del técnico.'));
	}
}	        	

print "<script>parent.postMessage( '".$r."' , '".base_url()."')</script>"; 