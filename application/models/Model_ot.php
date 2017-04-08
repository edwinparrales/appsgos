<?php

class Model_ot extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function listar() {
        $query = $this->db->query("SELECT * FROM vtablaot");
        return $query->result();
    }


    function guardar($datos) {
        $this->db->insert("ordentrabajo", $datos);

        if ($this->db->affected_rows()+0 > 0) {
            return true;
        } else {
            return false;
        }
    }

    function actualizar($id, $data) {
        $this->db->where('cons_ot', $id);
        $this->db->update('ordentrabajo', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminar($id) {
        $this->db->where('cons_ot', $id);
        $this->db->delete('ordentrabajo');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    
    
    //para alimentar comb de ordenes de trabajo
    
         function listcmb($par) {
             $this->db->where('cons_ot',$par);
//             $this->db->like('id_cliente',$par);
             $this->db->or_like('id_cliente', $par);
      


        $query = $this->db->select('cons_ot as id,CONCAT(" Cod_ot: ",cons_ot," Cliente: ",id_cliente," Fecha: ",fecha)as text')
                ->get("ordentrabajo");
        $json = $query->result();
        return $json;
    }
    
    
    //buscar por codigo de ot
    public function buscar($idot) {
        if($idot!=null){
        $query = $this->db->query("SELECT * FROM vtablaot WHERE cons_ot=$idot");
        return $query->result();
        }else{
            return null;
        }
    }

}
