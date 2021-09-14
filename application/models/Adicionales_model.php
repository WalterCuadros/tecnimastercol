<?php
class Adicionales_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();	            
    }

    public function visit_counters()
    {
    	$this->db->select('cont');
        $cont_visitas=$this->db->get('visitas')->result();
	    $cont=intval($cont_visitas[0]->cont) + 1;
	    $data = array('cont'=>$cont);
        $this->db->where('id','1');
		$this->db->update('visitas',$data);
    }

    public function get_municipios()
    {
        $this->db->select('codigo, municipio');
        $query = $this->db->get('municipios');
        if(!$query) return array();
        return $query->result();
    }

    public function get_aparatos()
    {
        $query = $this->db->get('tipo_aparato');
        if(!$query) return array();
        return $query->result();
    }

    public function get_total_clientes()
    {
        $this->db->where('rol', '2');
        return $this->db->count_all_results('users');
    }

    public function get_total_tenicos()
    {
        return $this->db->count_all_results('tecnicoss');
    }

    public function get_total_servicios()
    {
        return $this->db->count_all_results('servicios');
    }

    public function get_total_solicitudes()
    {
        return $this->db->count_all_results('solicitud_servicio');
    }

    public function get_total_servicios_by_mes()
    {
        $this->db->select('count(id) as total');
        $this->db->group_by('Month(fecha)');
        $this->db->order_by('Year(fecha), Month(fecha)', 'asc');
        $this->db->limit('11');
        $query=$this->db->get('servicios');
        if(!$query) return array();
        return $query->result();
    }

    public function get_total_ganancias()
    {
        $this->db->select('sum(valor) as valor');
        $this->db->group_by('Month(fecha)');
        $this->db->order_by('Year(fecha), Month(fecha)', 'asc');
        $this->db->limit('1');
        $query=$this->db->get('servicios');
        if(!$query) return array();
        return $query->result();
    }

    public function get_prom_active()
    {
        $this->db->select('id,raiz');
        $this->db->where('estado','1');
        $query=$this->db->get('promociones');
        if(!$query) return array();
        return $query->result();
    }
    public function get_solicitud_prom($id_solicitud)
    {
        $this->db->select('solicitud_promociones.nombre,solicitud_promociones.apellidos,solicitud_promociones.celular,solicitud_promociones.email,solicitud_promociones.marca_aparato,solicitud_promociones.codigo,promociones.cabecera,promociones.footer,promociones.descuento,promociones.imagen,tipo_aparato.tipo');
        $this->db->join('tipo_aparato', 'tipo_aparato.id_tipo_aparato = solicitud_promociones.id_aparato', 'left');
        $this->db->join('promociones', 'promociones.id=solicitud_promociones.id_promocion', 'left');
        $this->db->where('solicitud_promociones.id', $id_solicitud);
        $query=$this->db->get('solicitud_promociones');
        if(!$query) return array();
        return $query->result();
    }

    public function get_promocion_active()
    {
        $hoy = date('Y-m-d');
        $this->db->where('estado','1');
        $query = $this->db->get('promociones');
        if ($query->num_rows()>0) {
            $query = $query->result();
            if ($hoy==$query[0]->fecha_inicio || $hoy==$query[0]->fecha_fin || ($hoy>$query[0]->fecha_inicio && $hoy<$query[0]->fecha_fin)) {
                return $query;
            }else{
                $data = ['estado'=>0];
                $this->db->where('id', $query[0]->id);
                $this->db->update('promociones', $data);
            }
        }
        return array();
    }
    public function get_posts()
    {
        $this->db->select('id,titulo,fecha,imagen');
        $this->db->where('estado','1');
        $this->db->order_by('id', 'desc');
        $query=$this->db->get('blog');

        if(!$query) return array();
        return $query->result();
    }
    public function visits()
    {
        $this->db->select('cont');
        $this->db->where('id','1');
        $query=$this->db->get('visitas');
        
        if(!$query) return array();
        return $query->result();
    }
}