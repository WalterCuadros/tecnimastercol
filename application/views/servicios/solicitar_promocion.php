<?php
$nombres = $this->input->post('nombre_cliente_promo',true);
$apellidos = $this->input->post('apellidos_cliente_promo',true);
$celular = $this->input->post('celular_promo',true);
$email = $this->input->post('email_promo',true);
/*$id_aparato = $this->input->post('tipo_aparatos_promo',true);
$marca_aparato = $this->input->post('marca_promocion',true);
$direccion = $this->input->post('direccion_promo',true);*/

$estado='0';



if(count($prom)>0)
{
	$date = new DateTime();
	$date_register = $date->format('Y-m-d');   
//	$data=['nombre'=>$nombres,'apellidos'=>$apellidos, 'celular'=>$celular,'email'=>$email,'id_aparato'=>$id_aparato, 'marca_aparato'=>$marca_aparato,'direccion'=>$direccion,'fecha_registro'=>$date_register,'state'=>$estado];
    $data=['nombre'=>$nombres,'apellidos'=>$apellidos, 'celular'=>$celular,'email'=>$email,'fecha_registro'=>$date_register,'state'=>$estado];

	$query=$this->db->insert('solicitud_promociones', $data);
	$id_sol_prom = $this->db->insert_id();
	$date=$date->getTimestamp();
	$codigo = $prom[0]->raiz."-".rand(100,999).$id_sol_prom;
	$data=["codigo"=>$codigo,"id_promocion"=>$prom[0]->id];
	$this->db->where('id',$id_sol_prom);
	$query=$this->db->update('solicitud_promociones', $data);
	if ($query) {
		
		$this->db->select('promociones.vigencia,solicitud_promociones.nombre,solicitud_promociones.apellidos,solicitud_promociones.celular,solicitud_promociones.email,solicitud_promociones.marca_aparato,solicitud_promociones.codigo,promociones.cabecera,promociones.footer,promociones.descuento,promociones.imagen,tipo_aparato.tipo');
        $this->db->join('tipo_aparato', 'tipo_aparato.id_tipo_aparato = solicitud_promociones.id_aparato', 'left');
        $this->db->join('promociones', 'promociones.id=solicitud_promociones.id_promocion', 'left');
        $this->db->where('solicitud_promociones.id', $id_sol_prom);
        $solicitud = $this->db->get('solicitud_promociones');
        
		$solicitud = $solicitud->result();
		

		//SE CREA EL PDF
	$output =' <style>
	.row {
	  margin-right: -15px;
	  margin-left: -15px;
	}
	.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
	  position: relative;
	  min-height: 1px;
	  padding-right: 15px;
	  padding-left: 15px;
	}
	.col-lg-12 {
		width: 100%;
	}
	.text-center {
	  text-align: center;
	}
	body {
	  font-family: Helvetica, Arial, sans-serif;
	  font-size: 12px;
	  line-height: 1.42857143;
	  color: #333;
	  background-color: #fff;
	}
	.over_text_desc {
		font-size:64px;
		color:#5863f8;
		position: absolute;
		left: 26;
		top:96;
		bottom: 0;
		width: 100%;
		text-align: left;
	}
	.over_text_vigencia {
		position: absolute;
		font-size :17px;
		left: 69;
		top:238;
		bottom: 0;
		width: 100%;
		text-align: left;
	}
	.over_text_1 {
		position: absolute;
		left: 28;
		top:260;
		bottom: 0;
		width: 100%;
		text-align: left;
	}
	.over_text_2 {
		position: absolute;
		left: 28;
		top:319;
		bottom: 0;
		width: 100%;
		text-align: left;
	}
	.over_text_3 {
		position: absolute;
		left: 28;
		top:354;
		bottom: 0;
		width: 100%;
		text-align: left;
	}
	.over_text_4 {
		position: absolute;
		left: 28;
		top:387;
		bottom: 0;
		width: 100%;
		text-align: left;
	}
	.over_text_5 {
		position: absolute;
		left: 28;
		top:462;
		bottom: 0;
		width: 100%;
		text-align: left;
	}
	.over_text_6 {
		position: absolute;
		left: 28;
		top:493;
		bottom: 0;
		width: 100%;
		text-align: left;
	}
	.over_text_7 {
		position: absolute;
		left: 28;
		top:525;
		bottom: 0;
		width: 100%;
		text-align: left;
	}
	.over_text_llamar {
		font-size :15px;
		color:#5863f8;
		position: absolute;
		left: 20;
		top:547;
		bottom: 0;
		width: 100%;
		text-align: left;
		width:55%;
		font-weight:bold;
		
	}
	.over_text_footer {
		font-size :12px;
		color: #585252;
		position: absolute;
		left: 20;
		top:580;
		bottom: 0;
		width: 100%;
		text-align: left;
		width:55%;
		font-weight:bold;
		
	}
	.bck{
		position:relative;
	}
	.size{
		height:20%;
	}
	</style>';

	
	
	$output .= '<div class="row" ><div class="col-12 bck "><img style ="background-image: url()" src="'.base_url().'assets/img/promocion/'.$solicitud[0]->imagen.'"  class="img-fluid" alt="Responsive image"/></div>
		<div class="col-6 over_text_desc"> 
		<p><strong>'.$solicitud[0]->descuento.'%</strong></p>
		</div>
		<div class="col-6 over_text_vigencia"> 
		<p><strong>'.$solicitud[0]->vigencia.'</strong></p>
		</div>
		<div class="col-6 over_text_1"> 
		<h2>Código de promoción:'.$solicitud[0]->codigo.'</h2>
		</div>
		<div class="col-6 over_text_2"> 
		<h2>'.$solicitud[0]->nombre.' '.$solicitud[0]->apellidos.'</h2>
		</div>
		<div class="col-6 over_text_3"> 
		<h2>'.$solicitud[0]->email.'</h2>
		</div>
		<div class="col-6 over_text_4"> 
		<h2>'.$solicitud[0]->celular.'</h2>
		</div>
		<div class="col-6 over_text_5"> 
		<h2>Promoción valida para:</h2>
		</div>
		<div class="col-6 over_text_6"> 
		<h2>Mantenimientos y reparaciones</h2>
		</div>
		<div class="col-6 over_text_7"> 
		<h2>'.$solicitud[0]->codigo.'</h2>
		</div>
		<div class="col-2 col-md-1 over_text_llamar"> 
		<p><strong>¡</strong>Llámanos, solicita tu servicio y activa el código de promoción<strong>!</strong></p>
		</div>
		<div class="col-2 col-md-1 over_text_footer"> 
		<p>'.$solicitud[0]->footer.'</p>
		</div>
		</div>';

		
		
		$this->pdf->loadHtml($output);
		$this->pdf->render();
		$this->pdf->stream("bono.pdf", array("Attachment"=>0)); 
		
		
	}
		
		
}
	        	