<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cagenda extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->load->model('Model_Agenda');

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
        
        
     
        $data['contenido'] = "agenda/vagenda";

        $this->load->view('plantilla/plantilla1', $data);
    }

 public function guardar() {

        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('pot', 'Orden de trabajo', 'required');
            $this->form_validation->set_rules('selectpro', 'Profesional', 'required');
            $this->form_validation->set_rules('selectprioridad', 'Prioridad', 'required');
            
            
           
            //mensajes de validacion
            $this->form_validation->set_message('is_unique', 'El nombre de %s ya existe en la base de datos');

       

            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', "", $error);
                $error = str_replace('<\/p>\n', "", $error);
                echo $error;
            } else {
                $obj = $this->input->post();
                
                $datos = array(
                    "id_ot" => intval(preg_replace('/[^0-9]+/', '', $obj['pot']), 10),
                    "id_pro"=>$obj['selectpro'],
                    "observaciones"=>$obj['observaciones'],
                    "estado_act"=>"ABIERTO",
                    "prioridad"=>$obj['selectprioridad']
                );
                if ($this->Model_Agenda->guardar($datos) == true) {
                     $this->load->model('Model_Ot');
                     $dat=array(
                         "estado_proce"=>"PROCESO"
                     );
                     $this->Model_Ot->actualizar($datos['id_ot'],$dat);
                    
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
        $fila = $this->Model_Agenda->listar();

        foreach ($fila as $value) {

            $json['data'][] = $value;
        }


        echo json_encode($json);
    }

    public function eliminar() {
        if ($this->input->is_ajax_request()) {
            $idsele = $this->input->post("id");
            if ($this->Model_Agenda->eliminar($idsele) == true)
                echo "exito";
            else
                echo "Registro no eliminado";
        }
        else {
            show_404();
        }
    }

    public function actualizar() {
          if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('potx', 'Orden de trabajo', 'required');
            $this->form_validation->set_rules('selectprox', 'Profesional', 'required');
            $this->form_validation->set_rules('selectprioridadx', 'Prioridad', 'required');
            
            
           
            //mensajes de validacion
            $this->form_validation->set_message('is_unique', 'El nombre de %s ya existe en la base de datos');

       

            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', "", $error);
                $error = str_replace('<\/p>\n', "", $error);
                echo $error;
            } else {
                $obj = $this->input->post();
                $id=$this->input->post('idagenda');
                $datos = array(
                    "id_ot" => intval(preg_replace('/[^0-9]+/', '', $obj['potx']), 10),
                    "id_pro"=>$obj['selectprox'],
                    "observaciones"=>$obj['observacionesx'],
                    "estado_act"=>$obj['estAgenda'],
                    "prioridad"=>$obj['selectprioridadx']
                );
                if ($this->Model_Agenda->actualizar($id,$datos) == true) {
                     $this->load->model('Model_Ot');
                     $dat=array(
                         "estado_proce"=>"PROCESO"
                     );
                     $this->Model_Ot->actualizar($datos['id_ot'],$dat);
                    
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
