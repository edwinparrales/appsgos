<?php

class Model_Dispositivo extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function listar() {
        $query = $this->db->query(" select * from dispositivos ");
        return $query->result();
    }

  

    function guardar($datos) {
        $this->db->insert("dispositivos", $datos);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function actualizar($id, $data) {
        $this->db->where('cons_dispo', $id);
        $this->db->update('dispositivos', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminar($id) {
        $this->db->where('cons_dispo', $id);
        $this->db->delete('dispositivos');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    
    function valida($nom, $tipo) {

        $this->db->select('cons_dispo');
        $this->db->from('dispositivos');
        $this->db->where('nombre', $nom);
        $this->db->where('tipo_tec', $tipo);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
         function cmbDispositivo($id) {
        $this->db->where('cons_dispo', $id);
        $this->db->or_like('nombre', $id);


        $query = $this->db->select('cons_dispo as id,CONCAT(" Cod: ",cons_dispo," Nombres: ", nombre," Tipo: ",tipo_tec)as text')
                ->get("dispositivos");
        $json = $query->result();
        return $json;
    }

}
