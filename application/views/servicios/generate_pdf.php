<?php

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
	.over_text_1 {
		position: absolute;
		left: 28;
		top:258;
		bottom: 0;
		width: 100%;
		text-align: left;
	}
	.over_text_2 {
		position: absolute;
		left: 28;
		top:309;
		bottom: 0;
		width: 100%;
		text-align: left;
	}
	.over_text_3 {
		position: absolute;
		left: 28;
		top:342;
		bottom: 0;
		width: 100%;
		text-align: left;
	}
	.over_text_4 {
		position: absolute;
		left: 28;
		top:375;
		bottom: 0;
		width: 100%;
		text-align: left;
	}
	.over_text_5 {
		position: absolute;
		left: 28;
		top:448;
		bottom: 0;
		width: 100%;
		text-align: left;
	}
	.over_text_6 {
		position: absolute;
		left: 28;
		top:481;
		bottom: 0;
		width: 100%;
		text-align: left;
	}
	.over_text_7 {
		position: absolute;
		left: 28;
		top:514;
		bottom: 0;
		width: 100%;
		text-align: left;
	}
	.bck{
		position:relative;
	}
	.size{
		height:20%;
	}
	</style>';

	
	$output .= '<div class="row" ><div class="col-12 bck "><img style ="background-image: url()" src="'.base_url().'assets/img/'.$solicitud[0]->imagen.'"  class="img-fluid" alt="Responsive image"/></div>
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
		<h2>'.$solicitud[0]->marca_aparato.'</h2>
		</div>
		<div class="col-6 over_text_5"> 
		<h2>Servicio Tec '.$solicitud[0]->tipo.'</h2>
		</div>
		<div class="col-6 over_text_6"> 
		<h2>Marca '.$solicitud[0]->marca_aparato.'</h2>
		</div>
		<div class="col-6 over_text_7"> 
		<h2>'.$solicitud[0]->codigo.'</h2>
		</div>
		</div>';
		$this->pdf->loadHtml($output);
		$this->pdf->render();
		$this->pdf->stream("bono.pdf", array("Attachment"=>0));