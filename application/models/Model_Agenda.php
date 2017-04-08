<?php

class Model_Agenda extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function listar() {
        $query = $this->db->query(" select * from vagenda ");
        return $query->result();
    }

  

    function guardar($datos) {
        $this->db->insert("agenda", $datos);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function actualizar($id, $data) {
        $this->db->where('cons', $id);
        $this->db->update('agenda', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminar($id) {
        $this->db->where('cons', $id);
        $this->db->delete('agenda');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    

    
        function cmbDispositivo($id) {
        $this->db->like('cons_dispo', $id);
        $this->db->or_like('nombre', $id);


        $query = $this->db->select('cons_dispo as id,CONCAT(" Cod: ",cons_dispo," Nombres: ", nombre," Tipo: ",tipo_tec)as text')
                ->get("dispositivos");
        $json = $query->result();
        return $json;
    }

}
