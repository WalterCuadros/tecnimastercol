<?php
$id=$this->input->post('id');

$this->db->select('aparatos.marca, aparatos.modelo, aparatos.serial, concat(tecnicoss.nombres," ", tecnicoss.apellidos) as name_cliente, tecnicoss.email, tecnicoss.direccion, tecnicoss.contacto, servicios.desc_servicio as descripcion, servicios.observaciones');
$this->db->join('aparatos', 'aparatos.id_aparato=servicios.id_aparato', 'left');
$this->db->join('tecnicoss', 'tecnicoss.id=servicios.id_tecnico', 'left');
$this->db->where('servicios.id',$id);
$query=$this->db->get('servicios');
if ($query->num_rows()>0) {
	$info = $query->result();
	print json_encode(array('res'=>'ok', 'data'=>$info));
}else{
	print json_encode(array('res'=>'bad', 'msj'=>'No hay registros'));
}