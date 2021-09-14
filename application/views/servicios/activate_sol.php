<?php
$id = $this->input->post('id_solicitud');
$state=1;
$data=['state'=>$state];

	$this->db->where('id',$id);
    $query=$this->db->update('solicitud_promociones', $data);
	if ($query) {
		print json_encode( [ 'res' => 'ok'] );
	
	}else{
		print json_encode( [ 'res' => 'bad', 'msj'=>"Datos vacios" ] );
	}
	        	
