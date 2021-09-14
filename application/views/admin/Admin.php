<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administrador_model');
		$this->load->model('adicionales_model');
	}

	public function index()
	{
		redirect(base_url.'/admin/dashboard');
	}
	public function dashboard()
	{
		if (empty($this->session->userdata('email')) || $this->session->userdata('rol')!='1') {
			logout();
			redirect(base_url().'web/login');
		}

		$data['total_clientes'] = $this->adicionales_model->get_total_clientes();
		$data['total_tecnicos'] = $this->adicionales_model->get_total_tenicos();
		$total_servicios = $this->adicionales_model->get_total_servicios_by_mes();
		$total_servicios = objectToArray($total_servicios);
		$data['total_servicios'] = array_column($total_servicios, 'total');
		$data['total_solicitudes'] = $this->adicionales_model->get_total_solicitudes();
		$data['total_ganancias'] = $this->adicionales_model->get_total_ganancias();
		$data['visitas']= $this->adicionales_model->visits();
		$data['sidebar']='dashboard';
		$data['titulo'] = 'Dashboard';
		$this->load->view('admin/dashboard', $data);
	}
	public function tecnicos($offset=0)
	{
		if (empty($this->session->userdata('email')) || $this->session->userdata('rol')!='1') {
			logout();
			redirect(base_url().'web/login');
		}

		$search_tecnicos=false;
		if(isset($_POST["search"])) {
			$search_tecnicos=$this->input->post('search', TRUE);
			$search_tecnicos=($search_tecnicos=='')?false:$search_tecnicos;
			$this->session->set_userdata('search_tecnicos', $search_tecnicos);
		}else{
			if (($this->session->userdata('search_tecnicos')!='')) {
				$search_tecnicos = $this->session->userdata('search_tecnicos');
			}
		}

		$total = $this->administrador_model->get_all_tecnicos($search_tecnicos);
		$config['total_rows'] = $total;
		$config["base_url"] = base_url()."admin/tecnicos/";
		$config['per_page'] = 10;
		$config['uri_segment'] = '3';
		$config['first_link'] = '<< Ir al primero';
		$config['last_link'] = 'Ir al ultimo >';
		$config['next_link'] = ' Siguiente ' . '&gt;';
		$config['prev_link'] = ' &lt;' . ' Atras';
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li class="page_item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li class='page_item'>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li class='page_item'>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class='page_item'>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li class='page_item'>";
		$config['last_tagl_close'] = "</li>";
		$config['attributes'] = array('class'=>'page-link');
	    $this->pagination->initialize($config);
	    $data['offset'] = $offset;
		$this->db->limit($config['per_page'], $offset);
		$data['tecnicos'] = $this->administrador_model->get_tecnicos($search_tecnicos, $config['per_page'], $offset);

		$data['sidebar']='tecnicos';
		$data['titulo'] = 'Ténicos';
		$this->load->view('admin/tecnicos/all', $data);
	}

	public function viewTecnico($id)
	{
		if (empty($this->session->userdata('email')) || $id=='' || $this->session->userdata('rol')!='1') {
			logout();
			redirect(base_url().'web/login');
		}
		$data['tecnico']=$this->administrador_model->get_tecnico($id);
		$data['total_servicios_valor']=$this->administrador_model->get_sum_valor_servicios($id);
		$data['total_servicios']=$this->administrador_model->get_all_servicios_by_tecnicos($id);
		$data['total_clientes']=$this->administrador_model->get_all_servicios_by_cliente($id);
		$data['municipios']=$this->adicionales_model->get_municipios();
		$data['id']=$id;

		$data['sidebar']='tecnicos';
		$data['titulo'] = 'Técnico';
		$this->load->view('admin/tecnicos/view', $data);
	}

	public function paginationServiciosByTecnico($_id, $offset=0){	
		$total = $this->administrador_model->get_all_servicios_by_tecnicos($_id);
		$config['total_rows'] = $total;
		$config["base_url"] = base_url()."admin/paginationServiciosByTecnico/$_id/";
		$config['per_page'] = 10;
		$config['uri_segment'] = '4';
		$config['first_link'] = '<< Ir al primero';
		$config['last_link'] = 'Ir al ultimo >';
		$config['next_link'] = ' Siguiente ' . '&gt;';
		$config['prev_link'] = ' &lt;' . ' Atras';
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li class="page_item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li class='page_item'>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li class='page_item'>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class='page_item'>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li class='page_item'>";
		$config['last_tagl_close'] = "</li>";
		$config['attributes'] = array('class'=>'page-link');
	    $this->pagination->initialize($config);
	    $data['offset'] = $offset;
		$data['servicios'] = $this->administrador_model->get_servicios_by_tecnico($_id, $config['per_page'], $offset);		

		$this->load->view('admin/tecnicos/paginacion_servicios_by_tecnico',$data);		  
	}

	public function newTecnico()
	{
		if (empty($this->session->userdata('email')) || $this->session->userdata('rol')!='1') {
			logout();
			redirect(base_url().'web/login');
		}
		$data['municipios']=$this->adicionales_model->get_municipios();

		$data['sidebar']='tecnicos';
		$data['titulo'] = 'Nuevo Técnico';
		$this->load->view('admin/tecnicos/new', $data);
	}

	//CLIENTES
	public function clientes($offset=0)
	{
		if (empty($this->session->userdata('email')) || $this->session->userdata('rol')!='1') {
			logout();
			redirect(base_url().'web/login');
		}

		$search_cliente=false;
		if(isset($_POST["search"])) {
			$search_cliente=$this->input->post('search', TRUE);
			$search_cliente=($search_cliente=='')?false:$search_cliente;
			$this->session->set_userdata('search_cliente', $search_cliente);
		}else{
			if (($this->session->userdata('search_cliente')!='')) {
				$search_cliente = $this->session->userdata('search_cliente');
			}
		}
		$total = $this->administrador_model->get_all_clientes($search_cliente);
		$config['total_rows'] = $total;
		$config["base_url"] = base_url()."admin/clientes/";
		$config['per_page'] = 10;
		$config['uri_segment'] = '3';
		$config['first_link'] = '<< Ir al primero';
		$config['last_link'] = 'Ir al ultimo >';
		$config['next_link'] = ' Siguiente ' . '&gt;';
		$config['prev_link'] = ' &lt;' . ' Atras';
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li class="page_item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li class='page_item'>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li class='page_item'>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class='page_item'>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li class='page_item'>";
		$config['last_tagl_close'] = "</li>";
		$config['attributes'] = array('class'=>'page-link');
	    $this->pagination->initialize($config);
	    $data['offset'] = $offset;
		$this->db->limit($config['per_page'], $offset);
		$data['clientes'] = $this->administrador_model->get_clientes($search_cliente, $config['per_page'], $offset);
		$data['sidebar']='clientes';
		$data['titulo'] = 'Clientes';
		$this->load->view('admin/clientes/all', $data);
	}

	public function viewCliente($id, $offset=false)
	{
		if (empty($this->session->userdata('email')) || $id=='' || $this->session->userdata('rol')!='1') {
			logout();
			redirect(base_url().'web/login');
		}

		$id_servicio = $this->input->post('id_servicio');
		$id_tipo_aparato = $this->input->post('id_tipo_aparato');
		
		$data['cliente']=$this->administrador_model->get_cliente($id);
		$data['total_servicios']=$this->administrador_model->get_count_servicios_by_cliente($id);
		$data['total_aparatos']=$this->administrador_model->get_total_aparatos_by_cliente($id);
		$data['id']=$id;
		$data['tipo_aparato']=$this->adicionales_model->get_aparatos();
		$data['listado_aparatos']=$this->administrador_model->get_serial_aparatos_by_cliente($id);
		$data['listado_tecnicos']=$this->administrador_model->get_tecnicos();
		$data['municipios'] = $this->adicionales_model->get_municipios();
		$data['id_servicio'] = $id_servicio;
		$data['id_tipo_aparato'] = $id_tipo_aparato;

		$data['sidebar']='clientes';
		$data['titulo'] = 'Técnico';
		$this->load->view('admin/clientes/view', $data);
	}

	public function paginationServiciosByAparato($_id, $offset=0)
	{
		$total = $this->administrador_model->get_count_servicios_by_aparato($_id);
		$config['total_rows'] = $total;
		$config["base_url"] = base_url()."admin/paginationServiciosByAparato/$_id/";
		$config['per_page'] = 10;
		$config['uri_segment'] = '4';
		$config['first_link'] = '<< Ir al primero';
		$config['last_link'] = 'Ir al ultimo >';
		$config['next_link'] = ' Siguiente ' . '&gt;';
		$config['prev_link'] = ' &lt;' . ' Atras';
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li class="page_item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li class='page_item'>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li class='page_item'>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class='page_item'>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li class='page_item'>";
		$config['last_tagl_close'] = "</li>";
		$config['attributes'] = array('class'=>'page-link');
	    $this->pagination->initialize($config);
	    $data['offset'] = $offset;
		$this->db->limit($config['per_page'], $offset);
		$data['servicios'] = $this->administrador_model->get_servicios_by_aparato($_id, $config['per_page'], $offset);

		$this->load->view('admin/clientes/paginacion_servicios_by_aparato', $data);
	}

	public function paginationAparatosByCliente($_id, $offset=0)
	{
		$id_servicio = $this->input->post('id_servicio');
		$id_tipo_aparato = $this->input->post('id_tipo_aparato');

		$total = $this->administrador_model->get_total_aparatos_by_cliente($_id);
		$config['total_rows'] = $total;
		$config["base_url"] = base_url()."admin/paginationAparatosByCliente/$_id/";
		$config['per_page'] = 10;
		$config['uri_segment'] = '4';
		$config['first_link'] = '<< Ir al primero';
		$config['last_link'] = 'Ir al ultimo >';
		$config['next_link'] = ' Siguiente ' . '&gt;';
		$config['prev_link'] = ' &lt;' . ' Atras';
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li class="page_item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li class='page_item'>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li class='page_item'>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class='page_item'>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li class='page_item'>";
		$config['last_tagl_close'] = "</li>";
		$config['attributes'] = array('class'=>'page-link');
	    $this->pagination->initialize($config);
	    $data['offset'] = $offset;
		$this->db->limit($config['per_page'], $offset);
		$data['aparatos'] = $this->administrador_model->get_aparatos_by_cliente($_id, $config['per_page'], $offset);
		$data['id_servicio'] = $id_servicio;
		$data['id_tipo_aparato'] = $id_tipo_aparato;

		$this->load->view('admin/clientes/paginacion_aparatos_by_cliente', $data);
	}

	public function newCliente($value='')
	{
		if (empty($this->session->userdata('email')) || $this->session->userdata('rol')!='1') {
			logout();
			redirect(base_url().'web/login');
		}
		$data['municipios']=$this->adicionales_model->get_municipios();
		$data['aparatos']=$this->adicionales_model->get_aparatos();

		$data['sidebar']='clientes';
		$data['titulo'] = 'Técnico';
		$this->load->view('admin/clientes/new', $data);
	}

	public function solicitudes($offset=0)
	{
		if (empty($this->session->userdata('email')) || $this->session->userdata('rol')!='1') {
			logout();
			redirect(base_url().'web/login');
		}
		$total = $this->administrador_model->get_total_solicitudes();
		$config['total_rows'] = $total;
		$config["base_url"] = base_url()."admin/solicitudes/";
		$config['per_page'] = 10;
		$config['uri_segment'] = '3';
		$config['first_link'] = '<< Ir al primero';
		$config['last_link'] = 'Ir al ultimo >';
		$config['next_link'] = ' Siguiente ' . '&gt;';
		$config['prev_link'] = ' &lt;' . ' Atras';
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li class="page_item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li class='page_item'>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li class='page_item'>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class='page_item'>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li class='page_item'>";
		$config['last_tagl_close'] = "</li>";
		$config['attributes'] = array('class'=>'page-link');
	    $this->pagination->initialize($config);
	    $data['offset'] = $offset;
		$this->db->limit($config['per_page'], $offset);
		$data['solicitudes'] = $this->administrador_model->get_solicitudes($config['per_page'], $offset);
		$data['sidebar']='solicitudes';
		$data['titulo'] = 'Solicitudes';

		$this->load->view('admin/solicitudes', $data);
	}

	public function datosPersonales($offset=false)
	{
		if (empty($this->session->userdata('email')) || $this->session->userdata('rol')!='2') {
			logout();
			redirect(base_url().'web/login');
		}
		$id = $this->session->userdata('id');
		
		$data['cliente']=$this->administrador_model->get_cliente($id);
		$data['total_servicios']=$this->administrador_model->get_count_servicios_by_cliente($id);
		$data['total_aparatos']=$this->administrador_model->get_total_aparatos_by_cliente($id);
		$data['id']=$id;
		$data['tipo_aparato']=$this->adicionales_model->get_aparatos();
		$data['listado_aparatos']=$this->administrador_model->get_serial_aparatos_by_cliente($id);
		$data['listado_tecnicos']=$this->administrador_model->get_tecnicos();
		$data['municipios'] = $this->adicionales_model->get_municipios();
		$data['id_servicio'] = '';
		$data['id_tipo_aparato'] = '';

		$data['sidebar']='datos_personales';
		$data['titulo'] = 'Datos personales';
		$this->load->view('admin/clientes/view', $data);
	}

	public function paginationTecnicosServicios($offset=0){

		$fecha_in = str_replace('/', '-', $this->input->post('fecha_in'));
		$fecha_fin = str_replace('/', '-', $this->input->post('fecha_fin'));

		$fecha_in = ($fecha_in=='') ? false : date('Y-m-d', strtotime($fecha_in));
		$fecha_fin = ($fecha_fin=='') ? false : date('Y-m-d', strtotime($fecha_fin));

	    $config['total_rows'] = $this->administrador_model->get_total_tecnicos_fechas($fecha_in, $fecha_fin);
		$config["base_url"] = base_url()."admin/paginationTecnicosServicios/";
		$config['per_page'] = 5;
		$config['uri_segment'] = '3';
		$config['first_link'] = '<< Ir al primero';
		$config['last_link'] = 'Ir al ultimo >';
		$config['next_link'] = ' Siguiente ' . '&gt;';
		$config['prev_link'] = ' &lt;' . ' Atras';
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li class="page_item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li class='page_item'>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li class='page_item'>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class='page_item'>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li class='page_item'>";
		$config['last_tagl_close'] = "</li>";
		$config['attributes'] = array('class'=>'page-link');
	    $this->pagination->initialize($config);
	    $data['offset'] = $offset;
		$query=$this->administrador_model->get_tecnicos_fechas($fecha_in, $fecha_fin, $config['per_page'],$offset);
		if (count($query)>0) {
			foreach ($query as $k => $v) {
				$info = $this->administrador_model->get_aparatos_by_tecnico($v->id_tecnico);
				$v->aparatos = $info;
			}
		}
		$data["tecnicos"] = $query;		

		$this->load->view('admin/pagination_tecnicos',$data);		  
	}

	public function paginationClientesServicios($offset=0){
		
		$fecha_in = str_replace('/', '-', $this->input->post('fecha_in'));
		$fecha_fin = str_replace('/', '-', $this->input->post('fecha_fin'));

		$fecha_in = ($fecha_in=='') ? false : date('Y-m-d', strtotime($fecha_in));
		$fecha_fin = ($fecha_fin=='') ? false : date('Y-m-d', strtotime($fecha_fin));
		
	    $config['total_rows'] = $this->administrador_model->get_total_clientes_fechas($fecha_in, $fecha_fin);
		$config["base_url"] = base_url()."admin/paginationClientesServicios/";
		$config['per_page'] = 5;
		$config['uri_segment'] = '3';
		$config['first_link'] = '<< Ir al primero';
		$config['last_link'] = 'Ir al ultimo >';
		$config['next_link'] = ' Siguiente ' . '&gt;';
		$config['prev_link'] = ' &lt;' . ' Atras';
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li class="page_item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li class='page_item'>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li class='page_item'>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class='page_item'>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li class='page_item'>";
		$config['last_tagl_close'] = "</li>";
		$config['attributes'] = array('class'=>'page-link');
	    $this->pagination->initialize($config);
	    $data['offset'] = $offset;
		$query=$this->administrador_model->get_clientes_fechas($fecha_in, $fecha_fin, $config['per_page'],$offset);
		if (count($query)>0) {
			foreach ($query as $k => $v) {
				$info = $this->administrador_model->get_aparatos_by_cliente_fecha($v->id_usuario);
				$v->aparatos = $info;
			}
		}
		$data["clientes"] = $query;		

		$this->load->view('admin/pagination_clientes',$data);		  
	}
	public function promociones($offset=0)
	{
		if (empty($this->session->userdata('email')) || $this->session->userdata('rol')!='1') {
			logout();
			redirect(base_url().'web/login');
		}

		$search=false;
		if(isset($_POST["search"])) {
			$search=$this->input->post('search', TRUE);
			$search=($search=='')?false:$search;
			$this->session->set_userdata('search', $search);
		}else{
			if (($this->session->userdata('search')!='')) {
				$search = $this->session->userdata('search');
			}
		}

		$total = $this->administrador_model->get_all_promociones($search);
		$config['total_rows'] = $total;
		$config["base_url"] = base_url()."admin/promociones/";
		$config['per_page'] = 10;
		$config['uri_segment'] = '3';
		$config['first_link'] = '<< Ir al primero';
		$config['last_link'] = 'Ir al ultimo >';
		$config['next_link'] = ' Siguiente ' . '&gt;';
		$config['prev_link'] = ' &lt;' . ' Atras';
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li class="page_item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li class='page_item'>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li class='page_item'>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class='page_item'>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li class='page_item'>";
		$config['last_tagl_close'] = "</li>";
		$config['attributes'] = array('class'=>'page-link');
	    $this->pagination->initialize($config);
	    $data['offset'] = $offset;
		$this->db->limit($config['per_page'], $offset);
		$data['promociones'] = $this->administrador_model->get_promociones($search, $config['per_page'], $offset);

		$data['sidebar']='promociones';
		$data['titulo'] = 'promociones';
		$this->load->view('admin/promociones/list_promociones', $data);
	}
	public function newPromocion()
	{
		if (empty($this->session->userdata('email')) || $this->session->userdata('rol')!='1') {
			logout();
			redirect(base_url().'web/login');
		}
		
		$data['sidebar']='promociones';
		$data['titulo'] = 'promociones';
		$this->load->view('admin/promociones/new', $data);
	}
	public function update_promocion($id_promocion)
	{
		if (empty($this->session->userdata('email')) || $this->session->userdata('rol')!='1') {
			logout();
			redirect(base_url().'web/login');
		}
		$data['promocion']=$this->administrador_model->get_promocion($id_promocion);
		$data['sidebar']='promociones';
		$data['titulo'] = 'promociones';
		$this->load->view('admin/promociones/update', $data);
	}
	public function solicitud_promociones($offset=0)
	{
		if (empty($this->session->userdata('email')) || $this->session->userdata('rol')!='1') {
			logout();
			redirect(base_url().'web/login');
		}

		$search=false;
		if(isset($_POST["search"])) {
			$search=$this->input->post('search', TRUE);
			$search=($search=='')?false:$search;
			$this->session->set_userdata('search', $search);
		}else{
			if (($this->session->userdata('search')!='')) {
				$search = $this->session->userdata('search');
			}
		}

		$id_promocion=false;
		if(isset($_POST["n_promocion"])) {
			$id_promocion=$this->input->post('n_promocion', TRUE);
			$id_promocion=($id_promocion=='')?false:$id_promocion;
			$this->session->set_userdata('id_promocion', $id_promocion);
		}else{
			if (($this->session->userdata('id_promocion')!='')) {
				$id_promocion = $this->session->userdata('id_promocion');
			}
		}
		$total = $this->administrador_model->get_all_s_promociones($search,$id_promocion);
		$config['total_rows'] = $total;
		$config["base_url"] = base_url()."admin/solicitud_promociones/";
		$config['per_page'] = 10;
		$config['uri_segment'] = '3';
		$config['first_link'] = '<< Ir al primero';
		$config['last_link'] = 'Ir al ultimo >';
		$config['next_link'] = ' Siguiente ' . '&gt;';
		$config['prev_link'] = ' &lt;' . ' Atras';
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li class="page_item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li class='page_item'>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li class='page_item'>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class='page_item'>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li class='page_item'>";
		$config['last_tagl_close'] = "</li>";
		$config['attributes'] = array('class'=>'page-link');
	    $this->pagination->initialize($config);
	    $data['offset'] = $offset;
		$this->db->limit($config['per_page'], $offset);
		$data['s_promociones'] = $this->administrador_model->get_s_promociones($search,$id_promocion,$config['per_page'], $offset);
		$data['promociones'] = $this->administrador_model->get_promociones(false,false,false);
		$data['sidebar']='promociones';
		$data['titulo'] = 'promociones';
		$this->load->view('admin/promociones/list_s_promociones', $data);
	}




	public function paginationServicios($offset=0){

		$fecha_in = str_replace('/', '-', $this->input->post('fecha_in'));
		$fecha_fin = str_replace('/', '-', $this->input->post('fecha_fin'));

		$fecha_in = ($fecha_in=='') ? false : date('Y-m-d', strtotime($fecha_in));
		$fecha_fin = ($fecha_fin=='') ? false : date('Y-m-d', strtotime($fecha_fin));

		$nombre_cliente = $this->input->post('nombre_cliente');
		$nombre_tecnico = $this->input->post('nombre_tecnico');
		$orden_servicio = $this->input->post('orden_servicio');

	    $config['total_rows'] = $this->administrador_model->get_total_servicios($fecha_in, $fecha_fin, $nombre_cliente, $nombre_tecnico, $orden_servicio);
		$config["base_url"] = base_url()."admin/paginationServicios/";
		$config['per_page'] = 5;
		$config['uri_segment'] = '3';
		$config['first_link'] = '<< Ir al primero';
		$config['last_link'] = 'Ir al ultimo >';
		$config['next_link'] = ' Siguiente ' . '&gt;';
		$config['prev_link'] = ' &lt;' . ' Atras';
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li class="page_item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li class='page_item'>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li class='page_item'>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class='page_item'>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li class='page_item'>";
		$config['last_tagl_close'] = "</li>";
		$config['attributes'] = array('class'=>'page-link');
	    $this->pagination->initialize($config);
	    $data['offset'] = $offset;
		$query=$this->administrador_model->get_list_servicios($fecha_in, $fecha_fin, $nombre_cliente, $nombre_tecnico, $orden_servicio, $config['per_page'],$offset);
		$data["servicios"] = $query;		

		$this->load->view('admin/pagination_servicios',$data);		  
	}

	//START BLOG

	public function posts($offset=0)
	{
		if (empty($this->session->userdata('email')) || $this->session->userdata('rol')!='1') {
			logout();
			redirect(base_url().'web/login');
		}

		$search=false;
		if(isset($_POST["search"])) {
			$search=$this->input->post('search', TRUE);
			$search=($search=='')?false:$search;
			$this->session->set_userdata('search_post', $search);
		}else{
			if (($this->session->userdata('search_post')!='')) {
				$search = $this->session->userdata('search_post');
			}
		}

		$total = $this->administrador_model->get_all_posts($search);
		$config['total_rows'] = $total;
		$config["base_url"] = base_url()."admin/posts/";
		$config['per_page'] = 10;
		$config['uri_segment'] = '3';
		$config['first_link'] = '<< Ir al primero';
		$config['last_link'] = 'Ir al ultimo >';
		$config['next_link'] = ' Siguiente ' . '&gt;';
		$config['prev_link'] = ' &lt;' . ' Atras';
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li class="page_item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li class='page_item'>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li class='page_item'>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class='page_item'>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li class='page_item'>";
		$config['last_tagl_close'] = "</li>";
		$config['attributes'] = array('class'=>'page-link');
	    $this->pagination->initialize($config);
	    $data['offset'] = $offset;
		$this->db->limit($config['per_page'], $offset);
		$data['posts'] = $this->administrador_model->get_posts($search, $config['per_page'], $offset);

		$data['sidebar']='Blog';
		$data['titulo'] = 'Listado Posts';
		$this->load->view('admin/blog/list_posts', $data);
	}
	public function newPost()
	{
		if (empty($this->session->userdata('email')) || $this->session->userdata('rol')!='1') {
			logout();
			redirect(base_url().'web/login');
		}
		
		$data['sidebar']='Blog';
		$data['titulo'] = 'Nuevo Post';
		$this->load->view('admin/blog/new_post', $data);
	}
	public function update_post($id_promocion)
	{
		if (empty($this->session->userdata('email')) || $this->session->userdata('rol')!='1') {
			logout();
			redirect(base_url().'web/login');
		}
		$data['post']=$this->administrador_model->get_post($id_promocion);
		$data['sidebar']='Blog';
		$data['titulo'] = 'Editar Post';
		$this->load->view('admin/blog/update_post', $data);
	}
	public function usuario()
	{
		if (empty($this->session->userdata('email')) || $this->session->userdata('rol')!='1') {
			logout();
			redirect(base_url().'web/login');
		}
		
		$data['sidebar']='usuario';
		$data['titulo'] = 'Usuario';
		$this->load->view('admin/usuario/usuario', $data);
	}




	// END BLOG
}



function logout()
{
	$ci =& get_instance();
	$ci->session->sess_destroy();
}

function objectToArray ( $object ) {
  	if(!is_object($object) && !is_array($object)) {
    	return $object;
  	}  
  	return array_map( 'objectToArray', (array) $object );
}