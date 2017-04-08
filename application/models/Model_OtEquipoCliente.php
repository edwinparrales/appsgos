<?php

class Model_OtEquipoCliente extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function listar() {
        $query = $this->db->query(" select * from vOtEquipoCliente");
        return $query->result();
    }


    function guardar($datos) {
        $this->db->insert("ot_EquipoCliente", $datos);

        if ($this->db->affected_rows()+0 > 0) {
            return true;
        } else {
            return false;
        }
    }

    function actualizar($id, $data) {
        $this->db->where('cons', $id);
        $this->db->update('ot_EquipoCliente', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminar($id) {
        $this->db->where('cons', $id);
        $this->db->delete('ot_EquipoCliente');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
        function cmbEq($id) {
        $this->db->like('serial', $id);
        $this->db->or_like('id_cliente', $id);

        $query = $this->db->select('cons as id,CONCAT("Cliente",id_cliente," S/N: ",serial)as text')
                ->get("equiposClientes");
        $json = $query->result();
        return $json;
    }
    
    

}
