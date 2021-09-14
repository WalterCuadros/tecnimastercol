<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reparacion_neveras extends CI_Controller {
	/* Administrador: email->admin@gmail.com password->123456
	*/
	function __construct() {
		parent::__construct();
		$this->load->model('adicionales_model');
		$this->load->model('administrador_model');
	}

	public function index()
	{
		$data['aparatos'] = $this->adicionales_model->get_aparatos();
		//$data['promocion'] = $this->adicionales_model->get_promocion_active();
		$data['titulo']='Index';
		$this->load->view('web/neveras', $data);
	}
	public function sitemap()
    {
        $this->load->database();
        $this->db->where('controller','2');
        $query = $this->db->get("items");
        $data['items'] = $query->result();
        $this->load->view('sitemap_neveras', $data);
    }
}

function visitCounters()
{
	$ci =& get_instance();
	$ci->adicionales_model->visit_counters();
}