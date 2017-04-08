<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CequipoCliente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->load->model('Model_EquipoCliente');
 

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
     
        $data['contenido'] = "clientes/vEquipo";

        $this->load->view('plantilla/plantilla1', $data);
    }

 public function guardar() {

        if ($this->input->is_ajax_request()) {

             $this->form_validation->set_rules('dispositivo', 'Nombre dispositivo', 'required');
             $this->form_validation->set_rules('marca', 'Marca', 'required');
             $this->form_validation->set_rules('cliente', 'Cliente', 'required');
             $this->form_validation->set_rules('modelo', 'Modelo', 'required');
             $this->form_validation->set_rules('serial', 'Serial', 'required|is_unique[equiposClientes.serial]');
//             $this->form_validation->set_rules('placa', 'Placa', 'required');
             $this->form_validation->set_rules('dtefisico', 'Detalles fisicos', 'required');
            
            
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
                    "id_dispo" => $obj['dispositivo'],
                    "id_marca"=>$obj['marca'],
                    "id_cliente"=>$obj['cliente'],
                    "modelo"=>$obj['modelo'],
                    "serial"=>$obj['serial'],
                    "placa"=>$obj['placa'],
                    "detallesFisicos"=>$obj['dtefisico'],
                    
                   
                );
                if ($this->Model_EquipoCliente->guardar($datos) == true) {
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
        $fila = $this->Model_EquipoCliente->listar();

        foreach ($fila as $value) {

            $json['data'][] = $value;
        }


        echo json_encode($json);
    }

    public function eliminar() {
        if ($this->input->is_ajax_request()) {
            $idsele = $this->input->post("id");
            if ($this->Model_EquipoCliente->eliminar($idsele) == true)
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

             $this->form_validation->set_rules('xdispositivo', 'Nombre dispositivo', 'required');
             $this->form_validation->set_rules('xmarca', 'Marca', 'required');
             $this->form_validation->set_rules('xcliente', 'Cliente', 'required');
             $this->form_validation->set_rules('xmodelo', 'Modelo', 'required');
             $this->form_validation->set_rules('xserial', 'Serial', 'required');
//             $this->form_validation->set_rules('placa', 'Placa', 'required');
             $this->form_validation->set_rules('xdtefisico', 'Detalles fisicos', 'required');
            
            
            //mensajes de validacion
             $this->form_validation->set_message('is_unique', 'El nombre de %s ya existe en la base de datos');
             

       

            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', "", $error);
                $error = str_replace('<\/p>\n', "", $error);
                echo $error;
            } else {


                $obj = $this->input->post();
                $id=$this->input->post('xcodigo');
                
                $datos = array(
                    "id_dispo" => $obj['xdispositivo'],
                    "id_marca"=>$obj['xmarca'],
                    "id_cliente"=>$obj['xcliente'],
                    "modelo"=>$obj['xmodelo'],
                    "serial"=>$obj['xserial'],
                    "placa"=>$obj['xplaca'],
                    "detallesFisicos"=>$obj['xdtefisico'],
                    
                   
                );
                if ($this->Model_EquipoCliente->actualizar($id,$datos) == true) {
                    echo "Registro Guardado";
                } else {
                    echo "El registro no fue guardado";
                }
            }
        } else {

            show_404();
        }
       
    }

    
    
       public function listcmbClient2() {
                  $this->load->model('Model_Cliente');
        $q=$this->input->get('q');  
    
        $json = $this->Model_Cliente->listcmbCli2($q);
        echo json_encode($json);
        
    }
        public function cmbDsp() {
        $this->load->model('Model_Dispositivo');
        $q=$this->input->get('q');  
    
        $json = $this->Model_Dispositivo->cmbDispositivo($q);
        echo json_encode($json);
        
    }
    public function cmbMarca() {
        $this->load->model('Model_Marcas');
        $q=$this->input->get('q');  
    
        $json = $this->Model_Marcas->cmbMarca($q);
        echo json_encode($json);
        
    }

}
