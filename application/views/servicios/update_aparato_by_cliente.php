<?php
$id = $this->input->post('id');
$marca = $this->input->post('marca');
$serial = $this->input->post('serial');
$modelo = $this->input->post('modelo');

$data = array( 'marca'=>$marca, 'serial'=>$serial, 'modelo'=>$modelo);
$this->db->where('id_aparato', $id);
$query=$this->db->update('aparatos', $data);
print ($query) ? json_encode(array('res'=>'ok')) : json_encode(array('res'=>'bad', 'msj'=>'Problemas para actualizar el aparato.'));