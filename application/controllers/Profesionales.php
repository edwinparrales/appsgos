<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profesionales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
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
        $cargos = array("TÉCNICO SISTEMAS", "TÉCNICO ELECTRONICA", "OPERARIO", "INGENIERO SISTEMAS", "ING TELECOMUNICACIONES");
        $data['cargos'] = $cargos;
        $data['contenido'] = "profesionales/vProfesionales";

        $this->load->view('plantilla/plantilla1', $data);
    }

    public function guardar() {

        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('nombres', 'Nombres', 'required|min_length[3]|alpha_numeric_spaces|trim');
            $this->form_validation->set_rules('apellidos', 'Apellidos', 'required|min_length[3]|alpha_numeric_spaces|trim');
            $this->form_validation->set_rules('cedula', 'Cedula', 'required|numeric|is_unique[profesionales.num_cedula]');
            $this->form_validation->set_rules('direccion', 'Direccion', 'required');
            $this->form_validation->set_rules('telefono', 'Telefono', 'required|numeric');
            $this->form_validation->set_rules('celular', 'Numero celular', 'required|numeric');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
             $this->form_validation->set_rules('cargo', 'Cargo', 'required');


            //mensajes de validacion
            $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros');
            $this->form_validation->set_message('is_unique', 'El numero de %s ya existe en la base de datos');
            $this->form_validation->set_message('alpha_numeric_spaces', 'El valor del campo %s solo puede contener caracteres alfa numericos');
            $this->form_validation->set_message('valid_email', 'Ingrese un Email valido ejemplo:nomn@mail.com');

            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', "", $error);
                $error = str_replace('<\/p>\n', "", $error);
                echo $error;
            } else {


                $v_nombres = $this->input->post("nombres");
                $v_apellidos = $this->input->post("apellidos");
                $v_cedula = $this->input->post("cedula");
                $v_direccion = $this->input->post("direccion");
                $v_telefono = $this->input->post("telefono");
                $v_celular = $this->input->post("celular");
                $v_tprofesional = $this->input->post("tprofesional");
                $v_cargo = $this->input->post("cargo");
                $v_email = $this->input->post("email");
                $datos = array(
                    "nombres" => $v_nombres,
                    "apellidos" => $v_apellidos,
                    "num_cedula" => $v_cedula,
                    "direccion" => $v_direccion,
                    "num_tel" => $v_telefono,
                    "num_movil" => $v_celular,
                    "num_tarjeProfe" => $v_tprofesional,
                    "cargo" => $v_cargo,
                    "email" => $v_email,
                    "estado_bd" => "ACTIVO"
                );
                if ($this->Model_Profesionales->guardar($datos) == true) {
                    echo "Registro Guardado";
                } else {
                    echo "El registro no fue guardado";
                }
            }
        } else {

            show_404();
        }
    }

    public function listar() {
        $fila = $this->Model_Profesionales->listar();

        foreach ($fila as $value) {

            $json['data'][] = $value;
        }


        echo json_encode($json);
    }

    public function eliminar() {
        if ($this->input->is_ajax_request()) {
            $idsele = $this->input->post("id");

            if ($this->Model_Profesionales->eliminar($idsele)) {
                echo "exito";
            } else {
                echo "error";
            }
        } else {
            show_404();
        }
    }

    public function actualizar() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('xnombres', 'Nombres', 'required|min_length[3]|alpha_numeric_spaces|trim');
            $this->form_validation->set_rules('xapellidos', 'Apellidos', 'required|min_length[3]|alpha_numeric_spaces|trim');
            $this->form_validation->set_rules('xcedula', 'Cedula', 'required|numeric');
            $this->form_validation->set_rules('xdireccion', 'Direccion', 'required');
            $this->form_validation->set_rules('xtelefono', 'Telefono', 'required|numeric');
            $this->form_validation->set_rules('xcelular', 'Numero celular', 'required|numeric');
            $this->form_validation->set_rules('xemail', 'Email', 'required|valid_email');
             $this->form_validation->set_rules('xcargo', 'Cargo', 'required');

            //mensajes de validacion
            $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros');
            $this->form_validation->set_message('is_unique', 'El numero de %s ya existe en la base de datos');
            $this->form_validation->set_message('alpha', 'El valor del campo %s solo puede contener letras');
            $this->form_validation->set_message('valid_email', 'Ingrese un Email valido ejemplo:nomn@mail.com');

            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', "", $error);
                $error = str_replace('<\/p>\n', "", $error);
                echo $error;
            } else {
                $v_id = $this->input->post("id");
                $v_nombres = $this->input->post("xnombres");
                $v_apellidos = $this->input->post("xapellidos");
                $v_cedula = $this->input->post("xcedula");
                $v_direccion = $this->input->post("xdireccion");
                $v_telefono = $this->input->post("xtelefono");
                $v_celular = $this->input->post("xcelular");
                $v_tprofesional = $this->input->post("xtprofesional");
                $v_cargo = $this->input->post("xcargo");
                $v_email = $this->input->post("xemail");
                $v_estado = $this->input->post("xestado");
                $datos = array(
                    "nombres" => $v_nombres,
                    "apellidos" => $v_apellidos,
                    "num_cedula" => $v_cedula,
                    "direccion" => $v_direccion,
                    "num_tel" => $v_telefono,
                    "num_movil" => $v_celular,
                    "num_tarjeProfe" => $v_tprofesional,
                    "cargo" => $v_cargo,
                    "email" => $v_email,
                    "estado_bd" => $v_estado
                );
                if ($this->Model_Profesionales->actualizar($v_id, $datos)) {
                    echo json_encode("Registro Actualizado");
                } else {

                    echo json_encode("El registro no fue modificado");
                }
            }
        } else {

            show_404();
        }
    }
    
    function listar2() {
         $q=$this->input->get('q');  
        
         $d= $this->Model_Profesionales->list2($q);
        
        
        echo json_encode($d);
    }
    

    public function list3() {
        $q=$this->input->get('q');  
    
        $json = $this->Model_Profesionales->list3($q);
        echo json_encode($json);
    }

}
