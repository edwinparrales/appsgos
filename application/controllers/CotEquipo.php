<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CotEquipo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->load->model('Model_OtEquipoCliente');

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
     
        $data['contenido'] = "otEquipoCliente/vOtequipocliente";

        $this->load->view('plantilla/plantilla1', $data);
    }

 public function guardar() {

        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('eq', 'Codigo Equipo', 'required');
            $this->form_validation->set_rules('ot', 'Codigo Orden trabajo', 'required');
            $this->form_validation->set_rules('obser', 'Observaciones', 'required');
            
            
            
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
                    "id_equipo" => $obj['eq'],
                    "id_ot" =>intval(preg_replace('/[^0-9]+/', '', $obj['ot']), 10) ,
                    "observaciones" => $obj['obser']     
                );
                if ($this->Model_OtEquipoCliente->guardar($datos) == true) {
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
        $fila = $this->Model_OtEquipoCliente->listar();

        foreach ($fila as $value) {

            $json['data'][] = $value;
        }


        echo json_encode($json);
    }

    public function eliminar() {
        if ($this->input->is_ajax_request()) {
            $idsele = $this->input->post("id");
            if ($this->Model_OtEquipoCliente->eliminar($idsele) == true)
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

            $this->form_validation->set_rules('eq2', 'Codigo Equipo  ', 'required');
            $this->form_validation->set_rules('ot2', 'Codigo Orden trabajo ', 'required');
            $this->form_validation->set_rules('obser2', 'Observaciones ', 'required');
            
            
            
            //mensajes de validacion
             $this->form_validation->set_message('is_unique', 'El nombre de %s ya existe en la base de datos');

       

            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', "", $error);
                $error = str_replace('<\/p>\n', "", $error);
                echo $error;
            } else {

           
                $obj = $this->input->post();
                $id=$this->input->post('codigo_detotEquipo');
       
                $datos = array(
                    "id_equipo" => $obj['eq2'],
                    "id_ot" =>intval(preg_replace('/[^0-9]+/', '', $obj['ot2']), 10) ,
                    "observaciones" => $obj['obser2']     
                );
                if ($this->Model_OtEquipoCliente->actualizar($id,$datos) == true) {
                    echo "Registro Guardado";
                } else {
                    echo "El registro no fue guardado";
                }
            }
        } else {

            show_404();
        }
        
        
        
    }
    
    public function listOtcmb() {
         $this->load->model('Model_Ot');
        $q=$this->input->get('q');  
    
        $json = $this->Model_Ot->listcmb($q);
        echo json_encode($json);
        
    }
    
    
       public function cmbeqot($idot) {
        $this->load->model('Model_EquipoCliente');

        $q = $this->input->get('q');

        $json = $this->Model_EquipoCliente->cmbEqOt($idot, $q);
        echo json_encode($json);
    }

}
