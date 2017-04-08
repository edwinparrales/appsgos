<?php

class Model_Marcas extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function listar() {
        $query = $this->db->query(" select * from marcas ");
        return $query->result();
    }

  

    function guardar($datos) {
        $this->db->insert("marcas", $datos);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function actualizar($id, $data) {
        $this->db->where('cod_marc', $id);
        $this->db->update('marcas', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminar($id) {
        $this->db->where('cod_marc', $id);
        $this->db->delete('marcas');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
         function cmbMarca($id) {
        $this->db->like('cod_marc', $id);
        $this->db->or_like('nombre', $id);
       

        $query = $this->db->select('cod_marc as id,CONCAT(" Cod: ",cod_marc,"  Nombre: ", nombre)as text')
                ->get("marcas");
        $json = $query->result();
        return $json;
    }

}
