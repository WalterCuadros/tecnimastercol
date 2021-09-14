<?php

do {
    $fecha=str_replace('.','',date("Y.m.d"));
    $longitud=10;   
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    $clave_servicio=$fecha.$key;  
    //Validacion de correo
    $this->db->select('clave_servicio');
    $this->db->where('clave_servicio',$clave_servicio);
    $query=$this->db->get('servicios');
    if($query->num_rows()>0){
        $bandera=1;    
    }else{
        $bandera=0;
    }
} while ($bandera==1);

print json_encode(['orden_servicio'=>$clave_servicio]);