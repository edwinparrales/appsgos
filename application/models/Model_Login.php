<?php

class Model_Login extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function validar($usuario, $password){
      $this->db->select('*');
      $this->db->from('usuarios');
      $this->db->join('profesionales', 'usuarios.dni_prof = profesionales.num_cedula');
      $this->db->where('login', $usuario);
      $this->db->where('password',$password);
      $this->db->where('estado','ACTIVO');
      $consulta = $this->db->get();
      $resultado = $consulta->row();
      if($resultado!=null){
          return $resultado;
      }else{
          return null;
      }
      
      
   }
   

}