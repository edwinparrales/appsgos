<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cservicio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->load->model('Model_Servicio');

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
        
     
        $data['contenido'] = "servicios/vservicios";

        $this->load->view('plantilla/plantilla1', $data);
    }

 public function guardar() {

        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('nombre', 'Nombre', 'required|is_unique[servicios.nombre]');
            $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
            $this->form_validation->set_rules('tservicio', 'Servicio', 'required');
            $this->form_validation->set_rules('subcategoria', 'Subcategoria', 'required');
            $this->form_validation->set_rules('valor', 'Valor', 'required|numeric');
            
            
            
            
            
            //mensajes de validacion
             $this->form_validation->set_message('is_unique', 'El nombre de %s ya existe en la base de datos');

       

            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', "", $error);
                $error = str_replace('<\/p>\n', "", $error);
                echo $error;
            } else {


                $servicio = $this->input->post();
                
                $datos = array(
                    "nombre" =>$servicio['nombre'],
                    "descripcion" =>$servicio['descripcion'],
                    "tipo_servicio" =>$servicio['tservicio'],
                    "subcategoria" =>$servicio['subcategoria'],
                    "valor" =>$servicio['valor']
                    
                   
                );
                if ($this->Model_Servicio->guardar($datos) == true) {
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
        $fila = $this->Model_Servicio->listar();

        foreach ($fila as $value) {

            $json['data'][] = $value;
        }


        echo json_encode($json);
    }

    public function eliminar() {
        if ($this->input->is_ajax_request()) {
            $idsele = $this->input->post("id");
            if ($this->Model_Servicio->eliminar($idsele) == true)
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
            $this->form_validation->set_rules('xdescripcion', 'Descripcion', 'required');
            $this->form_validation->set_rules('xtservicio', 'Servicio', 'required');
            $this->form_validation->set_rules('xsubcategoria', 'Subcategoria', 'required');
            $this->form_validation->set_rules('xvalor', 'Valor', 'required|numeric');
            
            
            
            
            
            //mensajes de validacion
             $this->form_validation->set_message('is_unique', 'El nombre de %s ya existe en la base de datos');

       

            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', "", $error);
                $error = str_replace('<\/p>\n', "", $error);
                echo $error;
            } else {


                $servicio = $this->input->post();
                $id=$this->input->post('xcodigo');
                $datos = array(
                    "id_act"=>$servicio['xcodigo'],
                    "nombre" =>$servicio['xnombre'],
                    "descripcion" =>$servicio['xdescripcion'],
                    "tipo_servicio" =>$servicio['xtservicio'],
                    "subcategoria" =>$servicio['xsubcategoria'],
                    "valor" =>$servicio['xvalor']
                    
                   
                );
                if ($this->Model_Servicio->actualizar($id,$datos) == true) {
                    echo "Registro Guardado";
                } else {
                    echo "El registro no fue guardado";
                }
            }
        } else {

            show_404();
        }
        
        
        
    }
    public function cmbServicios(){
        
         $q=$this->input->get('q');  
    
        $json = $this->Model_Servicio->cmbSer($q);
        echo json_encode($json);
        
    }

}
