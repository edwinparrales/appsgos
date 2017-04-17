<?php

class Model_DetalleOt extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

//    lista todas las ordenes agendadas metodos para el administrado
//    
    public function listar($idot) {
          if ($idot == null) {
            $query = $this->db->query(" select * from vagendaprofesional ");
            return $query->result();
        }else{
        
          $query = $this->db->query(" select * from vagendaprofesional where id_ot=$idot ");
            return $query->result();
        }
        
    }

    public function listarDetalleOt($idot) {
        if($idot==null){
        $query = $this->db->query(" select * from vdetalleot ");
        return $query->result();
        }else{
            $query = $this->db->query(" select * from vdetalleot where id_ot=$idot");
            return $query->result();
        }
    }

    //listar la agenda segun el usuario logeado
    public function listarLogin($p_login,$idot) {
        $this->db->select('vlogin.*');
        $this->db->from('vlogin');
        $this->db->where('login', $p_login);
        $query = $this->db->get();

        $id = $query->row_array();

        $id_profesional = $id['id_pro'];
        if ($idot = null) {
            $query = $this->db->query(" select * from vagendaprofesional where vagendaprofesional.id_pro=$id_profesional");
            return $query->result();
        } elseif ($idot != null) {
            $query = $this->db->query(" select * from vagendaprofesional where vagendaprofesional.id_pro=$id_profesional and id_ot=$idot");
            return $query->result();
        }
    }

    public function listarDetalleOtLogin($p_login,$idot) {
        $this->db->select('vlogin.*');
        $this->db->from('vlogin');
        $this->db->where('login', $p_login);
        $query = $this->db->get();

        $id = $query->row_array();

        $id_profesional = $id['id_pro'];
        if ($idot == null) {
            $query = $this->db->query("SELECT vdetalleot.* FROM  vdetalleot 
        INNER JOIN agenda ON vdetalleot.id_ot = agenda.id_ot
        WHERE agenda.id_pro=$id_profesional");
        } elseif ($idot != null) {
            $query = $this->db->query("SELECT vdetalleot.* FROM  vdetalleot 
        INNER JOIN agenda ON vdetalleot.id_ot = agenda.id_ot
        WHERE agenda.id_pro=$id_profesional and vdetalleot.id_ot=$idot");
        }

        return $query->result();
        
    }

    function guardar($datos) {
        $this->db->insert("detalle_ot_servicios", $datos);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function actualizar($id, $data) {
        $this->db->where('cons', $id);
        $this->db->update('detalle_ot_servicios', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminar($id) {
        $this->db->where('cons', $id);
        $this->db->delete('detalle_ot_servicios');
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
