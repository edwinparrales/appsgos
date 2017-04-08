<?php

class Model_Servicio extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function listar() {
        $query = $this->db->query(" select * from servicios ");
        return $query->result();
    }

  

    function guardar($datos) {
        $this->db->insert("servicios", $datos);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function actualizar($id, $data) {
        $this->db->where('id_act', $id);
        $this->db->update('servicios', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminar($id) {
        $this->db->where('id_act', $id);
        $this->db->delete('servicios');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function cmbSer($param){
        $this->db->where('id_act', $param);   
        $this->db->or_like('nombre', $param);
       

        $query = $this->db->select('id_act as id,CONCAT("Cod:",id_act,"Nombre:",nombre,"Desc:",descripcion,"TipoSer:","\n",tipo_servicio,"SubCat:",subcategoria)as text')
                ->get("servicios");
        $json = $query->result();
        return $json;
        
        
        
    }

}
