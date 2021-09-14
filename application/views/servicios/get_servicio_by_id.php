<?php
$id=$this->input->post('id');

$this->db->select('aparatos.marca, aparatos.modelo, aparatos.serial, concat(users.name," ", users.apellidos) as name_cliente, users.email, users.direccion, users.contacto, servicios.desc_servicio as descripcion, servicios.observaciones');
$this->db->join('aparatos', 'aparatos.id_aparato=servicios.id_aparato', 'left');
$this->db->join('users', 'users.id=servicios.id_usuario', 'left');
$this->db->where('servicios.id',$id);
$query=$this->db->get('servicios');
if ($query->num_rows()>0) {
	$info = $query->result();
	print json_encode(array('res'=>'ok', 'data'=>$info));
}else{
	print json_encode(array('res'=>'bad', 'msj'=>'No hay registros'));
}