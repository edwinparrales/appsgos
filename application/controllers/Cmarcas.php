<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cmarcas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->load->model('Model_Marcas');

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
     
        $data['contenido'] = "marcas/vmarcas";

        $this->load->view('plantilla/plantilla1', $data);
    }

 public function guardar() {

        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('marca', 'Marca', 'required|is_unique[marcas.nombre]');
            //mensajes de validacion
             $this->form_validation->set_message('is_unique', 'El nombre de %s ya existe en la base de datos');

       

            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', "", $error);
                $error = str_replace('<\/p>\n', "", $error);
                echo $error;
            } else {


                $v_marca = $this->input->post("marca");
                
                $datos = array(
                    "nombre" => $v_marca,
                   
                );
                if ($this->Model_Marcas->guardar($datos) == true) {
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
        $fila = $this->Model_Marcas->listar();

        foreach ($fila as $value) {

            $json['data'][] = $value;
        }


        echo json_encode($json);
    }

    public function eliminar() {
        if ($this->input->is_ajax_request()) {
            $idsele = $this->input->post("id");
            if ($this->Model_Marcas->eliminar($idsele) == true)
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
            $this->form_validation->set_rules('xmarca', 'Marca', 'required|is_unique[marcas.nombre]');
            //mensajes de validacion
            $this->form_validation->set_message('is_unique', 'El nombre de %s ya existe en la base de datos');

            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', "", $error);
                $error = str_replace('<\/p>\n', "", $error);
                echo $error;
            } else {
                $v_id = $this->input->post("xcodigo");
                $v_marca = $this->input->post("xmarca");


                $datos = array(
                    "cod_marc" => $v_id,
                    "nombre" => $v_marca,
                );
                if ($this->Model_Marcas->actualizar($v_id, $datos)) {
                    echo "Registro Actualizado";
                } else {

                    echo "Registro no actualizado";
                }
            }
        } else {

            show_404();
        }
    }

}
