<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cdispositivo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->load->model('Model_Dispositivo');

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
     
        $data['contenido'] = "dispositivo/vDispositivo";

        $this->load->view('plantilla/plantilla1', $data);
    }

 public function guardar() {

        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('nombre', 'Nombre dispositivo', 'required|callback_valDispo');
             $this->form_validation->set_rules('tipo', 'Tipo Tecnologia', 'required');
            
            
            //mensajes de validacion
             $this->form_validation->set_message('is_unique', 'El nombre de %s ya existe en la base de datos');
             $this->form_validation->set_message('valDispo', 'El Dispositivo ya existe en la base de datos');

       

            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', "", $error);
                $error = str_replace('<\/p>\n', "", $error);
                echo $error;
            } else {


                $dsp = $this->input->post();
                
                $datos = array(
                    "nombre" => $dsp['nombre'],
                    "tipo_tec"=>$dsp['tipo']
                   
                );
                if ($this->Model_Dispositivo->guardar($datos) == true) {
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
        $fila = $this->Model_Dispositivo->listar();

        foreach ($fila as $value) {

            $json['data'][] = $value;
        }


        echo json_encode($json);
    }

    public function eliminar() {
        if ($this->input->is_ajax_request()) {
            $idsele = $this->input->post("id");
            if ($this->Model_Dispositivo->eliminar($idsele) == true)
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

            $this->form_validation->set_rules('xnombre', 'Nombre dispositivo', 'required|callback_valDispo');
             $this->form_validation->set_rules('xtipo', 'Tipo Tecnologia', 'required');
            
            
            //mensajes de validacion
             $this->form_validation->set_message('is_unique', 'El nombre de %s ya existe en la base de datos');
             $this->form_validation->set_message('valDispo', 'El Dispositivo ya existe en la base de datos');

       

            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', "", $error);
                $error = str_replace('<\/p>\n', "", $error);
                echo $error;
            } else {


                $dsp = $this->input->post();
                $id=$this->input->post('xcodigo');
            
                
                $datos = array(
                    "nombre" => $dsp['xnombre'],
                    "tipo_tec"=>$dsp['xtipo']
                   
                );
                if ($this->Model_Dispositivo->actualizar($id,$datos) == true) {
                    echo "Registro Guardado";
                } else {
                    echo "El registro no fue guardado";
                }
            }
        } else {

            show_404();
        }
       
    }
    
    public function valDispo(){
        $nom=$this->input->post('nombre');
        $tp=$this->input->post('tipo');
        
        return $this->Model_Dispositivo->valida($nom,$tp);
        
    }

}
