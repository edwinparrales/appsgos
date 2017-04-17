<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cot extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Model_ot');
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
     
        $data['contenido'] = "ot/vot";

        $this->load->view('plantilla/plantilla1', $data);
    }

    public function guardar() {

        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('select01cliente', 'Codigo Cliente', 'required');
            $this->form_validation->set_rules('solicitud', 'Solicitud', 'required');
           

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
                $datos = $this->input->post();
                $v_idclie = $datos['select01cliente'];
                $v_solicitud = $datos['solicitud'];
                $v_estado="REGISTRADO";
                $v_usuario=$datos['usuario'];


               
                $datos = array(
                    "id_cliente" => $v_idclie,
                    "solicitud" => $v_solicitud,
                    "estado_proce"=>$v_estado,
                    "usuario"=>$v_usuario
                );
                if ($this->Model_ot->guardar($datos) == true) {
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
        $fila = $this->Model_ot->listar();

        foreach ($fila as $value) {

            $json['data'][] = $value;
        }


        echo json_encode($json);
    }

    public function eliminar() {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post("id");
           
            if ($this->Model_ot->eliminar($id) == true)
                echo "Registro Eliminado";
            else
                echo "El registro no fue eliminado";
        }
        else {
            show_404();
        }
    }

    public function actualizar() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('xid_cliente', 'Codigo Cliente', 'required');
            $this->form_validation->set_rules('xsolicitud', 'Solicitud', 'required');
            $this->form_validation->set_rules('xestado', 'Estado orden', 'required');

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
                $datos = $this->input->post();
                $v_cod=$datos['xcodigo'];
                $id=intval(preg_replace('/[^0-9]+/', '', $v_cod), 10);
                $v_idclie = $datos['xid_cliente'];
                $v_solicitud = $datos['xsolicitud'];
                $v_estado=$datos['xestado'];
                $v_usuario=$datos['xusuario'];
                $v_fentrega=$datos['xfecha_entrega'];


             
                $datos = array(
                    "id_cliente" => $v_idclie,
                    "solicitud" => $v_solicitud,
                    "estado_proce"=>$v_estado,
                    "usuario"=>$v_usuario,
                    "fecha_entrega"=>$v_fentrega
                );

           
                if ($this->Model_ot->actualizar($id, $datos)) {
                    echo json_encode("Registro Actualizado");
                } else {

                    echo json_encode("Error,Registro no actualizado");
                }
            }
        } else {

            show_404();
        }
    }
    public function listcmbClient() {
        $q=$this->input->get('q');  
    
        $json = $this->Model_Cliente->listcmbCli($q);
        echo json_encode($json);
        
    }
     public function listcmbClient2() {
        $q=$this->input->get('q');  
    
        $json = $this->Model_Cliente->listcmbCli2($q);
        echo json_encode($json);
        
    }
    
    
     
     //lista solo los equipos que pertenecen a cada cliente
      public function listcmbEquipos($idcl) {
          $this->load->model('Model_EquipoCliente');
          
        $q=$this->input->get('q');  
    
        $json = $this->Model_EquipoCliente->cmbEq($idcl,$q);
        echo json_encode($json);
        
    }
    
    
    //lista todos los equipos de los clientes
      public function listcmbEquipos2() {
          $this->load->model('Model_EquipoCliente');
          
        $q=$this->input->get('q');  
    
        $json = $this->Model_EquipoCliente->cmbEq2($q);
        echo json_encode($json);
        
    }
    
    
    //listar filtro
    
    public function buscar($idot) {

        
        
        if ($this->Model_ot->buscar($idot) == true) {
            $fila = $this->Model_ot->buscar($idot);

            foreach ($fila as $value) {

                $json['data'][] = $value;
            }


            echo json_encode($json);
        }else{
            echo 'La busqueda no tiene resultados verifique los datos';
        }
    }

}
