<?php
class Administrador_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();	            
    }

    public function get_all_tecnicos($search=false)
    {
        if ($search) {
            $this->db->or_like('nombres', $search);
            $this->db->or_like('apellidos', $search);
            $this->db->or_like('id', $search);
            $this->db->or_like('email', $search);
        }
    	return $this->db->count_all_results('tecnicoss');
    }

    public function get_tecnicos($search=false, $limit=false, $offset=false)
    {
        $this->db->select('tecnicoss.*, count(servicios.id) as total');
        if ($search) {
            $this->db->or_like('tecnicoss.nombres', $search);
            $this->db->or_like('tecnicoss.apellidos', $search);
            $this->db->or_like('tecnicoss.id', $search);
            $this->db->or_like('tecnicoss.email', $search);
        }
        $this->db->join('servicios', 'servicios.id_tecnico=tecnicoss.id', 'left');
        if ($limit!=false) {
            $this->db->limit($limit, $offset);
        }
        $this->db->group_by('tecnicoss.id');
        $this->db->order_by('total','desc');
        $query = $this->db->get('tecnicoss');
        if(!$query) return array();
        return $query->result();
    }
    public function get_tecnico($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tecnicoss');
        if(!$query) return array();
        return $query->result();
    }
    public function get_all_servicios_by_tecnicos($id)
    {
        $this->db->where('servicios.id_tecnico', $id);
        return $this->db->count_all_results('servicios');
    }
    public function get_servicios_by_tecnico($id, $limit=false, $offset=false)
    {
        $this->db->select('servicios.id, servicios.fecha, servicios.desc_servicio, servicios.valor, concat(users.name," ", users.apellidos) as name_cliente, aparatos.tipo_aparato');
        $this->db->join('aparatos', 'aparatos.id_aparato=servicios.id_aparato', 'left');
        $this->db->join('users', 'users.id=servicios.id_usuario', 'left');
        $this->db->where('servicios.id_tecnico', $id);
        $this->db->limit($limit, $offset);
        $query = $this->db->get('servicios');
        if(!$query) return array();
        return $query->result();
    }
    public function get_all_servicios_by_cliente($id)
    {
        $this->db->select('distinct(id_usuario) as id_usuario');
        $this->db->where('servicios.id_tecnico', $id);
        return $this->db->count_all_results('servicios');
    }
    public function get_sum_valor_servicios($id)
    {
        $this->db->select('sum(valor) as total');
        $this->db->where('id_tecnico', $id);
        $query = $this->db->get('servicios');
        if(!$query) return 0;
        return $query->result()[0]->total;
    }
    public function get_all_clientes($search=false)
    {
        if ($search) {
            $this->db->or_like('name', $search);
            $this->db->or_like('apellidos', $search);
            $this->db->or_like('id', $search);
            $this->db->or_like('email', $search);
        }
        $this->db->where('rol','2');
        return $this->db->count_all_results('users');
    }
     public function get_clientes($search=false, $limit=false, $offset=false)
    {
        $this->db->select('users.id, concat(users.name, " ", users.apellidos) as nombre, users.email, users.municipio, direccion, users.contacto, count(servicios.id) as total ');
        $this->db->join('servicios', 'servicios.id_usuario=users.id', 'left');
        if ($search) {
            $this->db->or_like('users.name', $search);
            $this->db->or_like('users.apellidos', $search);
            $this->db->or_like('users.id', $search);
            $this->db->or_like('users.email', $search);
        }
        if ($limit!=false) {
            $this->db->limit($limit, $offset);
        }
        $this->db->where('users.rol','2');
        $this->db->group_by('users.id');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get('users');
        if(!$query) return array();
        return $query->result();
    }

    public function get_count_servicios_by_cliente($id)
    {
        $this->db->where('id_usuario', $id);
        return $this->db->count_all_results('servicios');
    }

    public function get_servicios_by_cliente($id, $limit=false, $offset=false)
    {
        $this->db->select('servicios.id, servicios.fecha, servicios.desc_servicio, servicios.valor, concat(tecnicoss.nombres," ", tecnicoss.apellidos) as name_cliente, aparatos.tipo_aparato');
        $this->db->join('aparatos', 'aparatos.id_aparato=servicios.id_aparato', 'left');
        $this->db->join('tecnicoss', 'tecnicoss.id=servicios.id_tecnico', 'left');
        $this->db->where('servicios.id_usuario', $id);
        $this->db->limit($limit, $offset);
        $query = $this->db->get('servicios');
        if(!$query) return array();
        return $query->result();
    }
    public function get_cliente($id)
    {
        $this->db->select('name, apellidos, email, contacto, direccion, municipio');
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        if(!$query) return array();
        return $query->result();
    }
    public function get_total_aparatos_by_cliente($id)
    {
        $this->db->where('id_usuario', $id);
        return $this->db->count_all_results('aparatos');
    }

    public function get_aparatos_by_cliente($id, $limit=false, $offset=false)
    {
        $this->db->select('aparatos.id_aparato as id, aparatos.tipo_aparato, aparatos.marca, aparatos.modelo, aparatos.serial, count(servicios.id) as total');
        $this->db->join('servicios', 'servicios.id_aparato=aparatos.id_aparato', 'left');
        $this->db->where('aparatos.id_usuario', $id);
        $this->db->group_by('aparatos.id_aparato');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('aparatos');
        if(!$query) return array();
        return $query->result();
    }

    public function get_count_servicios_by_aparato($id)
    {
        $this->db->where('id_aparato', $id);
        return $this->db->count_all_results('servicios');
    }

    public function get_servicios_by_aparato($id, $limit=false, $offset=false)
    {
        $this->db->select('servicios.id, servicios.fecha, servicios.desc_servicio, servicios.valor, concat(tecnicoss.nombres," ", tecnicoss.apellidos) as name_cliente, aparatos.tipo_aparato');
        $this->db->join('aparatos', 'aparatos.id_aparato=servicios.id_aparato', 'left');
        $this->db->join('tecnicoss', 'tecnicoss.id=servicios.id_tecnico', 'left');
        $this->db->where('servicios.id_aparato', $id);
        $this->db->limit($limit, $offset);
        $query = $this->db->get('servicios');
        if(!$query) return array();
        return $query->result();
    }

    public function get_serial_aparatos_by_cliente($id)
    {
        $this->db->select('id_aparato, serial, tipo_aparato, marca');
        $this->db->where('id_usuario', $id);
        $query=$this->db->get('aparatos');
        if(!$query) return array();
        return $query->result();
    }

    public function get_total_solicitudes($value='')
    {
        return $this->db->count_all_results('solicitud_servicio');
    }

    public function get_solicitudes($limit=false, $offset=false)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('solicitud_servicio');
        if(!$query) return array();
        return $query->result();
    }

    public function get_total_tecnicos_fechas($fecha_in=false, $fecha_fin=false)
    {
        if ($fecha_in!==false && $fecha_fin!==false) {
            $this->db->where(' fecha between "'.$fecha_in.'" and "'.$fecha_fin.'" ');
        }
        $this->db->group_by('id_tecnico');
       return $this->db->count_all_results('servicios');
    }

    public function get_tecnicos_fechas($fecha_in=false, $fecha_fin=false, $limit=false, $offset=false)
    {
        $this->db->select('count(servicios.id) as total_servicios, sum(servicios.valor) as valor, servicios.id_tecnico, tecnicoss.nombres, tecnicoss.apellidos');
        $this->db->join('tecnicoss', 'tecnicoss.id=servicios.id_tecnico', 'left');
        if ($fecha_in!==false && $fecha_fin!==false) {
            $this->db->where(' servicios.fecha between "'.$fecha_in.'" and "'.$fecha_fin.'" ');
        }
        $this->db->group_by('servicios.id_tecnico');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('servicios');
        if(!$query) return array();
        return $query->result();
    }

    public function get_aparatos_by_tecnico($id)
    {
        $this->db->select('count(servicios.id_aparato) as total, sum(servicios.valor) as valor, tipo_aparato.tipo');
        $this->db->join('aparatos', 'aparatos.id_aparato=servicios.id_aparato', 'left');
        $this->db->join('tipo_aparato', 'tipo_aparato.id_tipo_aparato=aparatos.id_tipo_aparato', 'left');
        $this->db->where('servicios.id_tecnico', $id);
        $this->db->group_by('tipo_aparato.id_tipo_aparato');
        $query = $this->db->get('servicios');
        if(!$query) return array();
        return $query->result();
    }

    public function get_total_clientes_fechas($fecha_in=false, $fecha_fin=false)
    {
        if ($fecha_in!==false && $fecha_fin!==false) {
            $this->db->where(' fecha between "'.$fecha_in.'" and "'.$fecha_fin.'" ');
        }
        $this->db->group_by('id_usuario');
       return $this->db->count_all_results('servicios');
    }

    public function get_clientes_fechas($fecha_in=false, $fecha_fin=false, $limit=false, $offset=false)
    {
        $this->db->select('count(servicios.id) as total_servicios, sum(servicios.valor) as valor, servicios.id_usuario, users.name as nombres, users.apellidos');
        $this->db->join('users', 'users.id=servicios.id_usuario', 'left');
        if ($fecha_in!==false && $fecha_fin!==false) {
            $this->db->where(' servicios.fecha between "'.$fecha_in.'" and "'.$fecha_fin.'" ');
        }
        $this->db->group_by('servicios.id_usuario');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('servicios');
        if(!$query) return array();
        return $query->result();
    }

    public function get_aparatos_by_cliente_fecha($id)
    {
        $this->db->select('count(servicios.id_aparato) as total, sum(servicios.valor) as valor, tipo_aparato.tipo');
        $this->db->join('aparatos', 'aparatos.id_aparato=servicios.id_aparato', 'left');
        $this->db->join('tipo_aparato', 'tipo_aparato.id_tipo_aparato=aparatos.id_tipo_aparato', 'left');
        $this->db->where('servicios.id_usuario', $id);
        $this->db->group_by('tipo_aparato.id_tipo_aparato');
        $query = $this->db->get('servicios');
        if(!$query) return array();
        return $query->result();
    }

    public function get_all_promociones($search=false)
    {
        if ($search) {
            $this->db->or_like('nombre_promocion', $search);
            $this->db->or_like('raiz', $search);
        }
    	return $this->db->count_all_results('promociones');
    }
    public function get_promociones($search=false, $limit=false, $offset=false)
    {
        if ($search) {
            $this->db->or_like('nombre_promocion', $search);   
            $this->db->or_like('raiz', $search);
        }
        if ($limit!=false) {
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by('fecha_registro','desc');
        $query = $this->db->get('promociones');
        if(!$query) return array();
        return $query->result();
    }
    public function get_promocion($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('promociones');
        if(!$query) return array();
        return $query->result();
    }
    public function get_all_s_promociones($search=false,$id_promocion=false)
    {
        if ($search) {
            $this->db->or_like('codigo', $search);
            $this->db->or_like('apellidos', $search);
            $this->db->or_like('nombre', $search);
           
        }
        if($id_promocion){
            $this->db->where('id_promocion',$id_promocion);
        }
    	return $this->db->count_all_results('solicitud_promociones');
    }
    public function get_s_promociones($search=false,$id_promocion=false,$limit=false, $offset=false)
    {
       
        $this->db->select('solicitud_promociones.id,solicitud_promociones.nombre,solicitud_promociones.apellidos,solicitud_promociones.celular,solicitud_promociones.email,solicitud_promociones.marca_aparato,solicitud_promociones.direccion,solicitud_promociones.fecha_registro,solicitud_promociones.state,solicitud_promociones.codigo,tipo_aparato.tipo,promociones.nombre_promocion');
        $this->db->join('tipo_aparato', 'tipo_aparato.id_tipo_aparato = solicitud_promociones.id_aparato', 'left');
        $this->db->join('promociones', 'promociones.id=solicitud_promociones.id_promocion', 'left');
        
        if ($search) {
            $this->db->or_like('codigo', $search);
            $this->db->or_like('apellidos', $search);
            $this->db->or_like('nombre', $search);
        }
        if($id_promocion){
            $this->db->where('id_promocion', $id_promocion);
        }
        if ($limit!=false) {
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by('fecha_registro','desc');
        $query = $this->db->get('solicitud_promociones');
        if(!$query) return array();
        return $query->result();
    }

    public function get_total_servicios($fecha_in=false, $fecha_fin=false, $nombre_cliente=false, $nombre_tecnico=false, $orden_servicio=false)
    {
        $this->db->select('id');
        $this->db->join('users', 'users.id=servicios.id_usuario', 'left');
        $this->db->join('tecnicoss', 'tecnicoss.id=servicios.id_tecnico', 'left');
        if ($fecha_in!==false && $fecha_fin!==false) {
            $this->db->where(' (servicios.fecha between "'.$fecha_in.'" and "'.$fecha_fin.'") ');
        }
        if ($nombre_cliente!==false) {
            $this->db->where(" (users.name like '%$nombre_cliente%' or users.apellidos like '%$nombre_cliente%') ");
        }
        if ($nombre_tecnico!==false) {
            $this->db->where(" (tecnicoss.nombres like '%$nombre_tecnico%' or tecnicoss.apellidos like '%$nombre_tecnico%') ");
        }
        if ($orden_servicio!==false) {
            $this->db->where(" servicios.clave_servicio like '%$orden_servicio%' ");
        }
        return $this->db->count_all_results('servicios');
    }

    public function get_list_servicios($fecha_in=false, $fecha_fin=false, $nombre_cliente=false, $nombre_tecnico=false, $orden_servicio=false, $limit=false, $offset=false)
    {
        $this->db->select('servicios.id, servicios.fecha, servicios.id_usuario, servicios.clave_servicio, servicios.valor, servicios.valor_tecnico, tecnicoss.nombres as nombre_tecnico, tecnicoss.apellidos as apellido_tecnico, users.name as nombre_cliente, users.apellidos as apellido_cliente, aparatos.tipo_aparato, aparatos.id_aparato');
        $this->db->join('users', 'users.id=servicios.id_usuario', 'left');
        $this->db->join('tecnicoss', 'tecnicoss.id=servicios.id_tecnico', 'left');
        $this->db->join('aparatos', 'aparatos.id_aparato=servicios.id_aparato', 'left');
        if ($fecha_in!==false && $fecha_fin!==false) {
            $this->db->where(' (servicios.fecha between "'.$fecha_in.'" and "'.$fecha_fin.'") ');
        }
        if ($nombre_cliente!==false) {
            $this->db->where(" (users.name like '%$nombre_cliente%' or users.apellidos like '%$nombre_cliente%') ");
        }
        if ($nombre_tecnico!==false) {
            $this->db->where(" (tecnicoss.nombres like '%$nombre_tecnico%' or tecnicoss.apellidos like '%$nombre_tecnico%') ");
        }
        if ($orden_servicio!==false) {
            $this->db->where(" servicios.clave_servicio like '%$orden_servicio%' ");
        }
        if ($limit!=false) {
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by('servicios.id','DESC');
        $query = $this->db->get('servicios');
        if(!$query) return array();
        return $query->result();
    }
    public function get_all_posts($search=false)
    {
        if ($search) {
            $this->db->or_like('titulo', $search);
        }
    	return $this->db->count_all_results('blog');
    }
    public function get_posts($search=false, $limit=false, $offset=false)
    {
        if ($search) {
            $this->db->or_like('titulo', $search);   
        }
        if ($limit!=false) {
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by('fecha','desc');
        $query = $this->db->get('blog');
        if(!$query) return array();
        return $query->result();
    }
    public function get_post($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('blog');
        if(!$query) return array();
        return $query->result();
    }
}