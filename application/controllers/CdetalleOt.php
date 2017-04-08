<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CdetalleOt extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->load->model('Model_DetalleOt');

        if (!$this->session->userdata('conectado')) {
            redirect(base_url());
        }
        $perfil=$this->session->userdata('perfil');
//        $v_login=$this->session->userdate('usuario');
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

        $data['contenido'] = "detalleot/vdetalleot";

        $this->load->view('plantilla/plantilla1', $data);
    }
    
//    metodo para guardar los detalles de ot

    public function guardar() {

        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('codot', 'Codigo ot', 'required');
            $this->form_validation->set_rules('idservicio', 'Codigo Servicio', 'required');
            $this->form_validation->set_rules('observaciones', 'Observaciones', 'required');
 

            //mensajes de validacion
            $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros');
            $this->form_validation->set_message('is_unique', 'El numero de %s ya existe en la base de datos');
            $this->form_validation->set_message('alpha_numeric_spaces', 'El valor del campo %s solo puede contener caracteres alfa numericos');
            $this->form_validation->set_message('valid_email', 'Ingrese un Email valido ejemplo:nomn@mail.com');
            $chk1=$this->input->post("chk1");
             if($chk1==true){
                 $this->form_validation->set_rules('factura', 'Numero factura', 'required');
                 $this->form_validation->set_rules('dispositivo', 'Dispositivo', 'required');
                 $this->form_validation->set_rules('marca', 'Marca', 'required');
                 $this->form_validation->set_rules('proveedor', 'Proveedor', 'required');
                 
             }


            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', " ", $error);
                $error = str_replace('<\/p>\n', " ", $error);
                echo $error;
            } else {
                
                $datos=$this->input->post();
                
                if($this->input->post("chk1")==false){

                $datos = array(
                    "id_ot" => $datos['codot'],
                    "id_ser" => $datos['idservicio'],
                    "observaciones" => $datos['observaciones'],
                    "id_dispo" => $datos['dispositivo']=null,
                    "modelo" => $datos['modelo'],
                    "id_marca" => $datos['marca']=null,
                    "seriales" => $datos['serial'],
                    "capacidad" => $datos['capacidad'],
                    "valor_dispositivo" => $datos['valor'],
                    "id_proveedor" => $datos['proveedor']=null,
                    "num_factura" => $datos['factura'],
                    "equipo_cliente" => $datos['infeqcliente']
                );
                
                }else{
                    $datos = array(
                    "id_ot" => $datos['codot'],
                    "id_ser" => $datos['idservicio'],
                    "observaciones" => $datos['observaciones'],
                    "id_dispo" => $datos['dispositivo'],
                    "modelo" => $datos['modelo'],
                    "id_marca" => $datos['marca'],
                    "seriales" => $datos['serial'],
                    "capacidad" => $datos['capacidad'],
                    "valor_dispositivo" => $datos['valor'],
                    "id_proveedor" => $datos['proveedor'],
                    "num_factura" => $datos['factura'],
                    "equipo_cliente" => $datos['infeqcliente']
                );
                    
                }
                
                if ($this->Model_DetalleOt->guardar($datos) == true) {
                    $da=array(
                        "cons"=>$this->input->post("cod_agenda"),
                        "estado_act"=>"SOLUCIONADO"
                    );
                    $this->load->model('Model_Agenda');
                    $this->Model_Agenda->actualizar($da['cons'],$da);
                    
                    echo "Registro Guardado";
                } else {
                    echo "El registro no fue guardado";
                }
            }
        } else {

            show_404();
        }
    }
    
    
    
//    metodo que muestra la agenda segun el usuario logeado
    public function listar() {
        $perfil=$this->session->userdata('perfil');
        $v_login=$this->session->userdata('usuario');
//         
//
        if ($perfil == "ADMINISTRADOR") {
            $fila = $this->Model_DetalleOt->listar();
          
            foreach ($fila as $value) {

                $json['data'][] = $value;
            }


            echo json_encode($json);
        }
//        
//         
         if ($perfil=="TECNICO") {
//           
            $fila = $this->Model_DetalleOt->listarLogin($v_login);
            if (!$fila == null) {

                foreach ($fila as $value) {

                    $json['data'][] = $value;
                }


                echo json_encode($json);
            }
            
            if($fila==null){

            $json['data'][] = array("cons" => "null", "fecha_reg" => "null", "id_ot" => "null", "id_pro" => "null", "observaciones" => "null", "estado_act" => "null", "prioridad" => "null", "OT" => "null", "EQUIPO" => "null", "ESPECIALISTA" => "null");
            echo json_encode($json);
            }
        }
    }

    
    
    public function listarDetalleOt() {
        $v_login=$this->session->userdata('usuario');
        $perfil=$this->session->userdata('perfil');
        
       if($perfil=="ADMINISTRADOR"){
        $fila = $this->Model_DetalleOt->listarDetalleOt();

        foreach ($fila as $value) {
            
             
            $json['data'][] = $value;
        }


        echo json_encode($json);
       }
       
           if ($perfil=="TECNICO") {
//           
            $fila = $this->Model_DetalleOt->listarDetalleOtLogin($v_login);
            if (!$fila == null) {

                foreach ($fila as $value) {
                    if ($value!=null) {

                        $json['data'][] = $value;
                    } 
                        
                        
                    if ($value==null) {
                        $json['data'][] = "***";
                    }
                }


                echo json_encode($json);
            }

            if($fila==null){

            $json['data'][] = 
            array("cons"=>"null","id_ot"=>"null","id_ser"=>"null","observaciones"=>"null","id_dispo"=>"null","modelo"=>"null","id_marca"=>"null","seriales"=>"null","capacidad"=>"null","valor_dispositivo"=>"null","id_proveedor"=>"null","num_factura"=>"num","equipo_cliente"=>"null","proveedor"=>"null","dispositivo"=>"null","marca"=>"null","servicios"=>"null","OT"=>"null","SUM"=>"null");
            echo json_encode($json);
            }
        }
       
       
       
    }
     
    
 

    public function eliminar() {
        if ($this->input->is_ajax_request()) {
            $idsele = $this->input->post("id");
            if ($this->Model_DetalleOt->eliminar($idsele) == true)
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

            $this->form_validation->set_rules('xcodot', 'Codigo ot', 'required');
            $this->form_validation->set_rules('xidservicio', 'Codigo Servicio', 'required');
            $this->form_validation->set_rules('xobservaciones', 'Observaciones', 'required');
 

            //mensajes de validacion
            $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros');
            $this->form_validation->set_message('is_unique', 'El numero de %s ya existe en la base de datos');
            $this->form_validation->set_message('alpha_numeric_spaces', 'El valor del campo %s solo puede contener caracteres alfa numericos');
            $this->form_validation->set_message('valid_email', 'Ingrese un Email valido ejemplo:nomn@mail.com');
            $xchk1=$this->input->post("xchk1");
            $id=$this->input->post("idDetot");
             if($xchk1==true){
                 $this->form_validation->set_rules('xfactura', 'Numero factura', 'required');
                 $this->form_validation->set_rules('xdispositivo', 'Dispositivo', 'required');
                 $this->form_validation->set_rules('xmarca', 'Marca', 'required');
                 $this->form_validation->set_rules('xproveedor', 'Proveedor', 'required');
                 
             }


            if ($this->form_validation->run() == false) {
                $error = json_encode(validation_errors());
                $error = str_replace('"', " ", $error);
                $error = str_replace('<\/p>\n', " ", $error);
                echo $error;
            } else {
                
                $datos=$this->input->post();
                
                if($this->input->post("xchk1")==false){

                $datos = array(
                    "id_ot" => $datos['xcodot'],
                    "id_ser" => $datos['xidservicio'],
                    "observaciones" => $datos['xobservaciones'],
                    "id_dispo" => $datos['xdispositivo']=null,
                    "modelo" => $datos['xmodelo'],
                    "id_marca" => $datos['xmarca']=null,
                    "seriales" => $datos['xserial'],
                    "capacidad" => $datos['xcapacidad'],
                    "valor_dispositivo" => $datos['xvalor'],
                    "id_proveedor" => $datos['xproveedor']=null,
                    "num_factura" => $datos['xfactura'],
                    "equipo_cliente" => $datos['xinfeqcliente']
                );
                
                }else{
                    $datos = array(
                    "id_ot" => $datos['xcodot'],
                    "id_ser" => $datos['xidservicio'],
                    "observaciones" => $datos['xobservaciones'],
                    "id_dispo" => $datos['xdispositivo'],
                    "modelo" => $datos['xmodelo'],
                    "id_marca" => $datos['xmarca'],
                    "seriales" => $datos['xserial'],
                    "capacidad" => $datos['xcapacidad'],
                    "valor_dispositivo" => $datos['xvalor'],
                    "id_proveedor" => $datos['xproveedor'],
                    "num_factura" => $datos['xfactura'],
                    "equipo_cliente" => $datos['xinfeqcliente']
                );
                    
                }
                
                if ($this->Model_DetalleOt->actualizar($id,$datos) == true) {
                    echo "Registro Guardado";
                } else {
                    echo "El registro no fue guardado";
                }
            }
        } else {

            show_404();
        }
    

    }

}
