<?php

class Model_Profesionales extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function listar() {
        $query = $this->db->query(" select * from profesionales");
        return $query->result();
    }

    public function getProfesional($dni) {
        $this->db->select('*');
        $this->db->from('profesionales');
        $this->db->like('num_cedula', $dni);
        return $query = $this->db->get();
    }

    function guardar($datos) {
        $this->db->insert("profesionales", $datos);

        if ($this->db->affected_rows() + 0 > 0) {
            return true;
        } else {
            return false;
        }
    }

    function actualizar($id, $data) {
        $this->db->where('id_pro', $id);
        $this->db->update('profesionales', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminar($id) {
        $this->db->where('id_pro', $id);
        $this->db->delete('profesionales');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function list3($ced) {
        $this->db->like('num_cedula', $ced);
        $this->db->or_like('apellidos', $ced);

        $query = $this->db->select('num_cedula as id,CONCAT(num_cedula," ", nombres," ",apellidos)as text')
                ->get("profesionales");
        $json = $query->result();
        return $json;
    }
      function list2($ced) {
        $this->db->like('num_cedula', $ced);
        $this->db->or_like('apellidos', $ced);

        $query = $this->db->select('id_pro as id,CONCAT(num_cedula," ", nombres," ",apellidos)as text')
                ->get("profesionales");
        $json = $query->result();
        return $json;
    }

}
