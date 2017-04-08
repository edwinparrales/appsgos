<?php

class Model_Usuario extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('encrypt');
    }
    
      public function listar() {
        $query = $this->db
                ->select("*")
                ->from("usuarios")
                ->join('profesionales', 'usuarios.dni_prof = profesionales.num_cedula')
                ->get();
        return $query->result();
    }
    
    
    
    

    public function listarold() {
        $query = $this->db
                ->select("*")
                ->from("usuarios")
                ->join('profesionales', 'usuarios.dni_prof = profesionales.num_cedula')
                ->where('usuarios.estado="ACTIVO"')
                ->order_by("usuarios.consec", "desc")
                ->get();
        return $query->result();
    }

   

    public function insert($login, $password, $perfil, $num_ced) {
        
        $encypPassword = md5($password);
        $arrayData = array(
            'login' => $login,
            'password' => $encypPassword,
            'perfil' => $perfil,
            'dni_prof' => $num_ced,
            'estado' => "ACTIVO"
        );
        return $this->db->insert('usuarios', $arrayData);
       // return $this->db->insert_id();
     
       
    }

    public function perfil() {

        $arrayPerfil = array(
            'OPERADOR',
            'TECNICO',
            'ADMINISTRADOR'
        );
        return $arrayPerfil;
    }

 
    
    //Metodos de paginacion
    
    public function numUsuarios(){
        return $this->db->get('usuarios')->num_rows();
        
    }
    
    public function getUsuarios($per_page) {
        $datos=$this->db->get('usuarios',$per_page,$this->uri->segment(3));
        return $datos;
    }
   
    
    
    	function total_paginados($por_pagina,$segmento) 
        {
             $query = $this->db
                ->select("*")
                ->from("usuarios")
                ->limit($por_pagina,$segmento)
                ->join('profesionales', 'usuarios.dni_prof = profesionales.num_cedula')
                
                ->order_by("usuarios.consec", "desc")
                ->get();
            
            
            return $query->result();
            
	}
        
        
        
       
    
   
        
        public function delete($id) {

        $this->db->where('consec', $id);
        $this->db->delete('usuarios');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
        

    }
    

    
    

    public function activar_desactivar($accion, $id) {
        
    }

    function update( $id,$login,$password,$perfil,$estado,$dniProf) {
        $data = array(
            'login' =>$login ,
            'password' => md5($password),
            'perfil' => $perfil,
            'dni_prof'=>$dniProf,
            'estado' => $estado
        );
        $this->db->where('consec', $id);
        return $this->db->update('usuarios',$data);
    }
    
    
    function consulta_id($id) {

        $query = $this->db
                ->select("*")
                ->from("usuarios")
                ->where('consec', $id)
                ->get();
        return $query->row();
    }
    
      public function updatePasswd($usu, $p1, $p2) {
        $p1e = md5($p1);
        $p2e = md5($p2);
        
        $this->db->set('password',$p2e);
        $this->db->where('login',$usu);
        $this->db->where('password',$p1e);
        $this->db->update('usuarios');
        if($this->db->affected_rows()>0){
            return true;
        }
        return false;

    }
    
    
    //metodo para verificar si un nombre de usuario ya esta registrado
      public function verifica_user($username) {
        $this->db->where('login',$username);
        $consulta = $this->db->get('usuarios');
		if($consulta->num_rows() == 1)
		{
	        $row = $consulta->row();
	        return $row->login;
		}
    }
    

}
