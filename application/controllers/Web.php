<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {
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
		visitCounters();
		$this->load->view('web/home', $data);
	}

	public function home()
	{	
		$data['aparatos'] = $this->adicionales_model->get_aparatos();
		//$data['promocion'] = $this->adicionales_model->get_promocion_active();
		$data['titulo']='Index';
		$this->load->view('web/home', $data);
	}
	public function blog_or(){
		$data['titulo']='Blog';
		$data['promocion'] = $this->adicionales_model->get_promocion_active();
		$this->load->view('web/blog', $data);
	}
	public function blog(){
		$data['posts'] = $this->adicionales_model->get_posts();
		$data['titulo']='Blog';
		$data['promocion'] = $this->adicionales_model->get_promocion_active();
		$this->load->view('web/blog', $data);
	}
	public function blog_individual($id){
		$data['titulo']='Blog';
		$data['promocion'] = $this->adicionales_model->get_promocion_active();
		$data['post_individual'] = $this->administrador_model->get_post($id);
		$this->load->view('web/blog_individual', $data);
	}
	public function login()
	{		
		$data['titulo']='Login';
		$this->load->view('web/login', $data);
	}

	public function updatePassword()
	{
		$this->load->view('servicios/update_password');
	}
}

function visitCounters()
{
	$ci =& get_instance();
	$ci->adicionales_model->visit_counters();
}