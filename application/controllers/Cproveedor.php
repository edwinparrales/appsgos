<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cproveedor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->load->model('Model_Proveedor');

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

        $data['contenido'] = "proveedores/vProveedor";

        $this->load->view('plantilla/plantilla1', $data);
    }

    public function guardar() {

        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('nit', 'Nit', 'required|numeric|is_unique[proveedores.nit]');
            $this->form_validation->set_rules('fijo', 'Telefono', 'required|min_length[3]|alpha_numeric_spaces|trim');
            $this->form_validation->set_rules('movil', 'Numero Celular', 'numeric|required|exact_length[10]');
            $this->form_validation->set_rules('email', 'Email', 'valid_email');
            $this->form_validation->set_rules('direccion', 'Direccion', 'required');
            $this->form_validation->set_rules('ciudad', 'Ciudad', 'required');

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


                $prove = $this->input->post();
                



                $datos = array(
                    "nombre" => $prove['nombre'],
                    "nit" => $prove['nit'],
                    "num_tel" => $prove['fijo'],
                    "num_movil" => $prove['movil'],
                    "email" => $prove['email'],
                    "direccion" => $prove['direccion'],
                    "ciudad" => $prove['ciudad'],
                    
                );
                if ($this->Model_Proveedor->guardar($datos) == true) {
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
        $fila = $this->Model_Proveedor->listar();

        foreach ($fila as $value) {

            $json['data'][] = $value;
        }


        echo json_encode($json);
    }

    public function eliminar() {
        if ($this->input->is_ajax_request()) {
            $idsele = $this->input->post("id");
            if ($this->Model_Proveedor->eliminar($idsele) == true)
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

            $this->form_validation->set_rules('xnombre', 'Nombre', 'required');
            $this->form_validation->set_rules('xnit', 'Nit', 'required|numeric');
            $this->form_validation->set_rules('xfijo', 'Telefono', 'required|min_length[3]|alpha_numeric_spaces|trim');
            $this->form_validation->set_rules('xmovil', 'Numero Celular', 'numeric|required|exact_length[10]');
            $this->form_validation->set_rules('xemail', 'Email', 'valid_email');
            $this->form_validation->set_rules('xdireccion', 'Direccion', 'required');
            $this->form_validation->set_rules('xciudad', 'Ciudad', 'required');

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


                $prove = $this->input->post();
                
                $id=$this->input->post('xcodigo');


                $datos = array(
                    "nombre" => $prove['xnombre'],
                    "nit" => $prove['xnit'],
                    "num_tel" => $prove['xfijo'],
                    "num_movil" => $prove['xmovil'],
                    "email" => $prove['xemail'],
                    "direccion" => $prove['xdireccion'],
                    "ciudad" => $prove['xciudad'],
                    
                );
                if ($this->Model_Proveedor->actualizar($id,$datos) == true) {
                    echo "Registro Guardado";
                } else {
                    echo "El registro no fue guardado";
                }
            }
        } else {

            show_404();
        }
       
    }
    
    
    //lista de proveedores para los selects
      public function cmbProveedor() {
               
        $q=$this->input->get('q');  
    
        $json = $this->Model_Proveedor->cmbProveedor($q);
        echo json_encode($json);
        
    }

}
