<?php

class Model_Cliente extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function listar() {
        $query = $this->db->query(" select * from clientes");
        return $query->result();
    }

  

    function guardar($datos) {
        $this->db->insert("clientes", $datos);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function actualizar($id, $data) {
        $this->db->where('cod_client', $id);
        $this->db->update('clientes', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminar($id) {
        $this->db->where('cod_client', $id);
        $this->db->delete('clientes');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
     function listcmbCli($dni) {
        $this->db->like('dni', $dni);
        $this->db->or_like('nombre', $dni);
       

        $query = $this->db->select('cod_client as id,CONCAT(" Cod: ",cod_client," Dni: ",dni," Nombres: ", nombre)as text')
                ->get("clientes");
        $json = $query->result();
        return $json;
    }
         function listcmbCli2($dni) {
        $this->db->like('cod_client', $dni);
        $this->db->or_like('nombre', $dni);
       

        $query = $this->db->select('cod_client as id,CONCAT(" Cod: ",cod_client," Dni: ",dni," Nombres: ", nombre)as text')
                ->get("clientes");
        $json = $query->result();
        return $json;
    }

}
