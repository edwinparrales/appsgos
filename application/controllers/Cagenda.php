<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cagenda extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->load->model('Model_Agenda');
         $this->load->model('Model_ot');
       
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

            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', "", $error);
                $error = str_replace('<\/p>\n', "", $error);
                echo $error;
            } else {
                $obj = $this->input->post();
              

                $datos = array(
                    "id_ot" => $obj['pot'],
                    "id_pro" => $obj['selectpro'],
                    "observaciones" => $obj['observaciones'],
                    "estado_act" => "ABIERTO",
                    "prioridad" => $obj['selectprioridad']
                );
                

                $oper = $this->preGuardar($datos);
                 if ($oper) {
                    $dataModelOt = array('estado_proce' => "PROCESO");
                    $this->Model_ot->actualizar($datos['id_ot'], $dataModelOt);
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

            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', "", $error);
                $error = str_replace('<\/p>\n', "", $error);
                echo $error;
            } else {
                $obj = $this->input->post();
                $id=$this->input->post('idagenda');
                $datos = array(
                    "id_ot" =>$obj['potx'],
                    "id_pro"=>$obj['selectprox'],
                    "observaciones"=>$obj['observacionesx'],
                    "estado_act"=>$obj['estAgenda'],
                    "prioridad"=>$obj['selectprioridadx']
                );
                
                if ($this->Model_Agenda->actualizar($id,$datos) == true) {
                    
                    echo "Registro Actualizado";
                } else {
                    echo "El registro no fue Actualizado";
                }
            }
        } else {

            show_404();
        }
        
    }
    
    //Metodo para listar agenda segun el numero de ot

    public function listarAgendaOt($idot) {

        if ($this->Model_Agenda->listAgendaOt($idot) == true) {
            $fila = $this->Model_Agenda->listAgendaOt($idot);

            foreach ($fila as $value) {

                $json['data'][] = $value;
            }


            echo json_encode($json);
        } else {
            echo 'La busqueda no tiene resultados verifique los datos';
        }
    }
    
    
    
    
    public function preGuardar($datos) {
          $ind=false;
          $est=$this->getEstadoOt($datos['id_ot']);
          $val="REGISTRADO";
         
        if($est===$val){
         
           $ind=$this->Model_Agenda->guardar($datos);
        }
        if ( $ind == true) {
            echo "Registro Guardado";
            return true;
                       
        } else {
            echo "El registro no fue guardado se encuentra en estado $est y debe estar en REGISTRADO";
        }
        
      
        
           
    }
    
    public function getEstadoOt($idot=null) {

        $filaOt = $this->Model_Agenda->getOrdenTrabajo($idot);

        foreach ($filaOt as $value) {

            $json[] = $value;
        }

        foreach ($json as $value1) {
            $estado = $value1->estado_proce;
        }
      
        return $estado;
    }

}
