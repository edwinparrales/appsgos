<?php

class Model_EquipoCliente extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function listar() {
        $query = $this->db->query(" select * from vequiposclientes");
        return $query->result();
    }


    function guardar($datos) {
        $this->db->insert("equiposClientes", $datos);

        if ($this->db->affected_rows()+0 > 0) {
            return true;
        } else {
            return false;
        }
    }

    function actualizar($id, $data) {
        $this->db->where('cons', $id);
        $this->db->update('equiposClientes', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminar($id) {
        $this->db->where('cons', $id);
        $this->db->delete('equiposClientes');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
        function cmbEq($idcli,$id) {
        $this->db->where('id_cliente', $idcli);   
        $this->db->like('serial', $id);
       

        $query = $this->db->select('cons as id,CONCAT("Cliente",id_cliente," S/N: ",serial)as text')
                ->get("equiposClientes");
        $json = $query->result();
        return $json;
    }
       function cmbEq2($par) {
//            $this->db->where('serial', $par);
           
        $this->db->like('serial', $par);
        $this->db->or_like('id_cliente', $par);
       

        $query = $this->db->select('cons as id,CONCAT("Cliente",id_cliente," S/N: ",serial)as text')
                ->get("equiposClientes");
        $json = $query->result();
        return $json;
    }
    
    
    //metodo para obtener equipos clientes pormedio de la ot
        function cmbEqOt($ot,$par) {
        $this->db->where('ot', $ot);   
        $this->db->like('serial', $par);
       

        $query = $this->db->select('cons as id,CONCAT("Cliente",id_cliente," S/N: ",serial)as text')
                ->get("veqot");
        $json = $query->result();
        return $json;
    }
    

}
