<?php

class Model_ReportesPdf extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    

    public function reporteCosto($idot){
        
       $query= $this->db->query("call preportecosto($idot)");
 
        if($query!=null){
        return $query->result();
        }else{
            return null;
        }
        
    }
    
    
    
    
//    Retorna la informacion de orden de trabajo
    public function reporteIngOt($idot) {
        $query = $this->db->query("CALL p_volanteingreso($idot)");

        if ($query != null) {
            return $query->result();
        } else {
            return null;
        }
    }
    
//    Reporte de costo de las ordenes de trabajo
    
    
    
    public function reporteCostoOt($idot) {
         $query = $this->db->query("CALL ptotalizador($idot)");
          if ($query != null) {
            return $query->result();
        } else {
            return null;
        }
    }


}