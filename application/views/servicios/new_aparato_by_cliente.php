<?php

$tipo_aparato = $this->input->post('tipo_aparato');
$name_aparato = $this->input->post('name_aparato');
$marca = $this->input->post('marca');
$serial = $this->input->post('serial');
$modelo = $this->input->post('modelo');
$id_cliente = $this->input->post('id_cliente');

$data = array( 'tipo_aparato'=>$name_aparato, 'id_tipo_aparato'=>$tipo_aparato, 'marca'=>$marca, 'serial'=>$serial, 'modelo'=>$modelo, 'id_usuario'=>$id_cliente);
$query=$this->db->insert('aparatos', $data);
print ($query) ? json_encode(array('res'=>'ok')) : json_encode(array('res'=>'bad', 'msj'=>'Problemas para crea el aparato.'));