<?php

class Model_Proveedor extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function listar() {
        $query = $this->db->query(" select * from proveedores");
        return $query->result();
    }

  

    function guardar($datos) {
        $this->db->insert("proveedores", $datos);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function actualizar($id, $data) {
        $this->db->where('codigo_prove', $id);
        $this->db->update('proveedores', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminar($id) {
        $this->db->where('codigo_prove', $id);
        $this->db->delete('proveedores');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
     function cmbProveedor($p) {
        $this->db->where('nit', $p);
        $this->db->or_like('nombre', $p);
       

        $query = $this->db->select('codigo_prove as id,CONCAT(" Cod: ",codigo_prove," Nit: ",nit," Nonbre: ", nombre)as text')
                ->get("proveedores");
        $json = $query->result();
        return $json;
    }
//         function listcmbCli2($dni) {
//        $this->db->like('cod_client', $dni);
//        $this->db->or_like('nombre', $dni);
//       
//
//        $query = $this->db->select('cod_client as id,CONCAT(" Cod: ",cod_client," Dni: ",dni," Nombres: ", nombre)as text')
//                ->get("clientes");
//        $json = $query->result();
//        return $json;
//    }

}
