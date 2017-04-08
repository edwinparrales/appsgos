<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Model_Login');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('sots/frmlogin');
    }

    public function inicio() {

        $usuario = $this->input->post('usuario');
        $password = $this->input->post('password');
        //cargar el modelo invocar el metodo y hacer la consulta a la BDD

        $fila = $this->Model_Login->validar($usuario, md5($password));

        if ($fila != null) {
            $usuario = array(
                'usuario' => $fila->login,
                'perfil' => $fila->perfil,
                'nombre' => $fila->nombres . " " . $fila->apellidos,
                'conectado' => true,
            );

            $this->session->set_userdata($usuario);

            redirect('Inicio/index');
            
        } else {
          
            
            $this->session->set_flashdata('error','Datos incorrectos');
            
            
            redirect(base_url());
        }
    }

    public function logout() {
        $this->session->sess_destroy();

        redirect('login');
    }

}
