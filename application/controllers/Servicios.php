<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {

	####################
	##### PUBLIC #######
	####################
	public function registrate(){		
		$this->load->view('servicios/registrate');
	}

	public function solicitarServicio(){
		$this->load->view('servicios/solicitar_servicio');
	}

	####################
	##### ADMIN ########
	####################
	public function login()
	{
		$this->load->view('servicios/login');
	}
	public function logout()
	{
		$this->session->sess_destroy();
 		print json_encode(array("res"=>"ok", "msj" => "La sesion ha terminado."));
	}

	//TECNICOS
	public function getServicioByID()
	{
		$this->load->view('servicios/get_servicio_by_id');
	}
	public function updateTecnico()
	{
		$this->load->view('servicios/update_tecnico');
	}
	public function newTecnico()
	{
		$this->load->view('servicios/new_tecnico');
	}

	//CLIENTES
	public function getServicioByIDTecnico()
	{
		$this->load->view('servicios/get_servicio_by_id_tecnico');
	}
	public function updateCliente()
	{
		$this->load->view('servicios/update_cliente');
	}
	public function newCliente()
	{
		$this->load->view('servicios/new_cliente');
	}
	public function updateAparatoByCliente()
	{
		$this->load->view('servicios/update_aparato_by_cliente');
	}
	public function newAparatoByCliente()
	{
		$this->load->view('servicios/new_aparato_by_cliente');
	}
	public function guardarServicioByAparato()
	{
		$this->load->view('servicios/guardar_servicio_by_aparato');
	}
	public function get_orden_servicio()
	{
		$this->load->view('servicios/get_orden_servicio');
	}


	public function deleteSolicitud(){
		$this->load->view('servicios/delete_solicitud');
	}

	//PROMOCIONES
	public function newPromocion()
	{
		$this->load->view('servicios/new_promocion');
	}
	public function updatePromocion()
	{
		$this->load->view('servicios/update_promocion');
	}
	public function registrarPromocion()
	{
		$this->load->model('adicionales_model');
		$this->load->library('pdf');
		$data['prom'] = $this->adicionales_model->get_prom_active();

		$this->load->view('servicios/solicitar_promocion',$data);
	}
	public function activate_sol()
	{
		$this->load->view('servicios/activate_sol');
	}
	public function generate_pdf($id_solicitud)
	{
		$this->load->model('adicionales_model');
		$this->load->library('pdf');
		$data['solicitud'] = $this->adicionales_model->get_solicitud_prom($id_solicitud);
		
		$this->load->view('servicios/generate_pdf',$data);
		
	}
	public function new_post()
	{
		$this->load->view('servicios/new_post');
	}
	public function update_post()
	{
		$this->load->view('servicios/update_post');
	}
	public function delete_post()
	{
		$this->load->view('servicios/delete_post');
	}
	public function update_admin()
	{
		$this->load->view('servicios/update_admin');
	}
}
