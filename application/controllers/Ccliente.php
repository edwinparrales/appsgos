<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ccliente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->load->model('Model_Cliente');

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


        $data['contenido'] = "clientes/vCliente";

        $this->load->view('plantilla/plantilla1', $data);
    }

    public function guardar() {

        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('tdocumento', 'Tipo documento', 'required');
            $this->form_validation->set_rules('dni', 'Documento', 'required|numeric|is_unique[clientes.dni]');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]|alpha_numeric_spaces|trim');
            $this->form_validation->set_rules('celular', 'Numero Celular', 'numeric|required|exact_length[10]');
            $this->form_validation->set_rules('email', 'Email', 'valid_email');

            //mensajes de validacion
            $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros');
            $this->form_validation->set_message('is_unique', 'El numero de %s ya existe en la base de datos');
            $this->form_validation->set_message('alpha_numeric_spaces', 'El valor del campo %s solo puede contener caracteres alfa numericos');
            $this->form_validation->set_message('valid_email', 'Ingrese un Email valido ejemplo:nomn@mail.com');



            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', " ", $error);
                $error = str_replace('<\/p>\n', " ", $error);
                echo $error;
            } else {


                $v_tdoc = $this->input->post("tdocumento");
                $v_dni = $this->input->post("dni");
                $v_nombre = $this->input->post("nombre");
                $v_celular = $this->input->post("celular");
                $v_email = $this->input->post("email");
                $v_ciudad = $this->input->post("ciudad");
                $v_direccion = $this->input->post("direccion");
                $v_barrio = $this->input->post("barrio");
                $v_observaciones = $this->input->post("observaciones");




                $datos = array(
                    "tipo_dni" => $v_tdoc,
                    "dni" => $v_dni,
                    "nombre" => $v_nombre,
                    "email" => $v_email,
                    "num_celular" => $v_celular,
                    "ciudad" => $v_ciudad,
                    "direccion" => $v_direccion,
                    "barrio" => $v_barrio,
                    "observaciones" => $v_observaciones
                );
                if ($this->Model_Cliente->guardar($datos) == true) {
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
        $fila = $this->Model_Cliente->listar();

        foreach ($fila as $value) {

            $json['data'][] = $value;
        }


        echo json_encode($json);
    }

    public function eliminar() {
        if ($this->input->is_ajax_request()) {
            $idsele = $this->input->post("id");
            if ($this->Model_Cliente->eliminar($idsele) == true)
                echo "Registro Eliminado";
            else
                echo "Registro no eliminado";
        }
        else {
            show_404();
        }
    }

    public function actualizar() {
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('xtdocumento', 'Tipo documento', 'required');
            $this->form_validation->set_rules('xdni', 'Documento', 'required|numeric');
            $this->form_validation->set_rules('xnombre', 'Nombre', 'required|min_length[3]|alpha_numeric_spaces|trim');
            $this->form_validation->set_rules('xcelular', 'Numero Celular', 'numeric|required|exact_length[10]');
            $this->form_validation->set_rules('xemail', 'Email', 'valid_email');

            //mensajes de validacion
            $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros');
            $this->form_validation->set_message('is_unique', 'El numero de %s ya existe en la base de datos');
            $this->form_validation->set_message('alpha_numeric_spaces', 'El valor del campo %s solo puede contener caracteres alfa numericos');
            $this->form_validation->set_message('valid_email', 'Ingrese un Email valido ejemplo:nomn@mail.com');



            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', " ", $error);
                $error = str_replace('<\/p>\n', " ", $error);
                echo $error;
            } else {

                $v_id=$this->input->post("xcodigo");
                $v_tdoc = $this->input->post("xtdocumento");
                $v_dni = $this->input->post("xdni");
                $v_nombre = $this->input->post("xnombre");
                $v_celular = $this->input->post("xcelular");
                $v_email = $this->input->post("xemail");
                $v_ciudad = $this->input->post("xciudad");
                $v_direccion = $this->input->post("xdireccion");
                $v_barrio = $this->input->post("xbarrio");
                $v_observaciones = $this->input->post("xobservaciones");




                $datos = array(
                    "cod_client"=>$v_id,
                    "tipo_dni" => $v_tdoc,
                    "dni" => $v_dni,
                    "nombre" => $v_nombre,
                    "email" => $v_email,
                    "num_celular" => $v_celular,
                    "ciudad" => $v_ciudad,
                    "direccion" => $v_direccion,
                    "barrio" => $v_barrio,
                    "observaciones" => $v_observaciones
                );
                if ($this->Model_Cliente->actualizar($v_id,$datos) == true) {
                    echo "Registro Actualizado";
                } else {
                    echo "El registro no fue Actualizado";
                }
            }
        } else {

            show_404();
        }
    }

}
