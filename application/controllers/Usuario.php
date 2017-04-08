<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Model_Usuario');
        $this->load->model('Model_Profesionales');
      
    

        if (!$this->session->userdata('conectado')) {
            redirect(base_url());
        }
    }
    
   

    public function index() {
        $perfil=$this->session->userdata('perfil');
        if($perfil=="ADMINISTRADOR"){
            $data['nav'] = "plantilla/nav"; 
        }
          if($this->session->userdata('perfil')=="OPERADOR"){
            $data['nav'] = "plantilla/navopera"; 
        }
           if($this->session->userdata('perfil')=="TECNICO"){
            $data['nav'] = "plantilla/navtecnico"; 
        }
    
        $data['prof'] = $this->Model_Profesionales->listar();
        $perfiles = array("ADMINISTRADOR", "TECNICO", "OPERADOR");
        $data['perfiles'] = $perfiles;
        $data['contenido'] = "usuario/vUsuario";
        $data['usuarios'] = $this->Model_Usuario->listar();
        $this->load->view('plantilla/plantilla1', $data);
    }

    public function insert() {
        $datos = $this->input->post();
        $v_login = $datos['login'];
        $v_passwd = $datos['password'];
        $v_perfil = $datos['perfil'];
        $v_idProf = $datos['cedula'];

       if(!$this->Model_Usuario->verifica_user($v_login)==$v_login){
          $this->Model_Usuario->insert($v_login, $v_passwd, $v_perfil, $v_idProf);
           $this->session->set_flashdata('susses', '!El usuario: '.$v_login.' fue registrado correctamente¡ ');
           //redirect('usuario/index');
       }

       $this->session->set_flashdata('error', '!Error el nombre de usuario '.$v_login.' ya existe ¡ ');

        redirect('usuario/index');
    }

    public function delete() {
        $id= $this->input->post("id");
        if ($this->Model_Usuario->delete($id)==true) {
             echo "exito";
            //redirect('usuario/index');
        }
    }

    public function edit($id = NULL) {
            $perfil=$this->session->userdata('perfil');
            if($perfil=="ADMINISTRADOR"){
            $data['nav'] = "plantilla/nav"; 
        }
        
        
        
        $estados = array("ACTIVO", "DESACTIVO",);
        if ($id != null) {
            $data['contenido'] = 'usuario/edit';
            $data['est'] = $estados;
            $data['perfiles'] = $this->Model_Usuario->perfil();

            $data['usuarios'] = $this->Model_Usuario->consulta_id($id);
            $this->load->view('plantilla/plantilla1', $data);
        }
    }

    public function update() {
      
        $datos = $this->input->post();
          echo $datos['cedula'];
        
        
        
        $v_id = $datos['id'];
        $v_login = $datos['login'];
        $v_passwd = $datos['password'];
        $v_perfil = $datos['perfil'];
        $v_idProf = $datos['cedula'];
        $v_estado = $datos['estado'];
        $this->Model_Usuario->update($v_id, $v_login, $v_passwd, $v_perfil, $v_estado,$v_idProf);
        redirect('usuario/index');
    }

    public function updatePasswd() {
        $datos = $this->input->post();
        $v_us = $datos['usuario'];
        $v_p1 = $datos['passwd1'];
        $v_p2 = $datos['passwd2'];
        if($this->Model_Usuario->updatePasswd($v_us, $v_p1, $v_p2)){
            $this->session->set_flashdata('updatePasswd','Contraseña modificada correctamente');
            redirect('Usuario');
        }   
        $this->session->set_flashdata('updatePasswd2','Error al modificar la contraseña verifique sus datos');
        redirect('Usuario');
    }
    
    public function getProfesionales() {
        
     $fila=$this->Model_Profesionales->listar();
     foreach ($fila as $value) {
         $result[]=$value->num_cedula;
         
     }
        
        echo json_encode($result);
    }

}
