<?php

require 'includes/fpdf/fpdf.php';



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Creportespdf extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('M_pdf');
        $this->load->database();

        $this->load->model('Model_ReportesPdf');

        if (!$this->session->userdata('conectado')) {
            redirect(base_url());
        }
    }

    public function index() {
        $perfil = $this->session->userdata('perfil');
        if ($perfil == "ADMINISTRADOR") {
            $data['nav'] = "plantilla/nav";
        }
        if ($this->session->userdata('perfil') == "OPERADOR") {
            $data['nav'] = "plantilla/navopera";
        }
        if ($this->session->userdata('perfil') == "TECNICO") {
            $data['nav'] = "plantilla/navtecnico";
        }

        $data['contenido'] = "reportes/vreportes";
        $this->load->view('plantilla/plantilla1', $data);
    }

    public function prueba($idot = null) {
//
//        $data['volante'] = $this->Model_ReportesPdf->reporteCosto($idot);
//
//
//        foreach ($data['volante'] as $value) {
//            echo "Valor:" . $value->Valor_Total . "<br>";
//            echo $value->valor_dispositivo;
//        }


        $data = $this->Model_ReportesPdf->reporteIngOt($idot);


        foreach ($data as $value) {
            echo "Valor:" . $value->fecha . "<br>";
            echo $value->nombre;
        }
    }

//    public function prueba2($idot = null) {
//        $data = $this->Model_ReportesPdf->reporteIngEqu($idot);
//        $data2['volante'] = $this->Model_ReportesPdf->reporteIngOt($idot);
//        if ($data != null) {
//            foreach ($data as $value) {
//                echo "Modelos:" . $value->nombre . "<br>";
//            }
//        } else {
//            echo "No se encontraron registros con los datos ingresados";
//        }
//
//        $data['volante'] = $this->Model_ReportesPdf->reporteIngOt($idot);
//
//
//        foreach ($data2['volante'] as $value) {
//            echo "Valor:" . $value->fecha . "<br>";
//            echo $value->cliente;
//        }
//
////         $data = $this->Model_ReportesPdf->reporteIngEqu($idot);
////          $i=0;
////           foreach ($data as $value) {
////             $filas[$i]=array('modelo'=>
////                 $value->modelo
////             );
////             $i++;
////           
////        }
////        
////         echo $filas[0]['modelo']." <br>" ;
////         echo $filas[1]['modelo'];
//    }
//     metodo para imprimir un comprovante de orden

    public function volanteIngreso() {
        $idot = $nombre = $this->input->post('ot');

        $ot = $this->Model_ReportesPdf->reporteIngOt($idot);
        $i = 0;
        if ($ot != null) {
            foreach ($ot as $value) {
                $datos[$i] = array(
                    'ot' => $value->cons_ot,
                    'fecha' => $value->fecha,
                    'codCliente' => $value->id_cliente,
                    'solicitud' => $value->solicitud,
                    'dni' => $value->dni,
                    'nombre_cliente' => $value->nombre,
                    'email' => $value->email,
                    'obs_ot' => $value->observaciones,
                    'cod_equipo' => $value->id_equipo,
                    'obs_equipo' => $value->Observaciones,
                    'nombre_dispo' => $value->nom_dispositivo,
                    'tipo' => $value->tipo_tec,
                    'ot' => $value->cons_ot,
                    'modelo' => $value->modelo,
                    'serial' => $value->serial,
                    'placa' => $value->placa,
                    'detallesFiscios' => $value->detallesFisicos,
                    'marca' => $value->nom_marca,
                );
                $i++;
            }
        }
         //load mPDF library
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'A4');
        $mpdf->SetHTMLHeader('<img src="http://localhost/demosots/public/img/logofor.jpg"/>');
        $mpdf->WriteHTML("<br><br><br><br><br><br><br>");
        $mpdf->WriteHTML("Fecha:".  date("d-m-Y (H:i:s)",  time())."<br>");
        
        $mpdf->WriteHTML("<h5>Orden No: ".$datos[0]['ot']."</h5>");
        
        $mpdf->WriteHTML("Cliente:".$datos[0]['nombre_cliente']."<br><br><br>");

        $mpdf->SetStyles('<link rel="stylesheet" href="http://localhost/demosots/public/css/bootstrap.css" ');
        
         $mpdf->WriteHTML("<h3 ALIGN='center'>COMPROBANTE DE ORDEN SERVICIO</h3><br><br>");
        
        
         $html = 
   
        "  <!DOCTYPE html>
           <html>
           <head>
          
           </head>
           <body>
            <h5>* DATOS DE LA ORDEN DE SERVICIO</h5>
            
            <br><br>
            <table border='1' align='center'>
            
            <tr>
            <th>NOMBRE CLIENTE</th>
            <th>DNI</th>
            <th>EMAIL</th>
            <th>SOLICITUD</th>
            <th>OBSERVACIONES</th>
            </tr>";
        $mpdf->WriteHTML($html);
   
        foreach ($ot as $value) {
            $mpdf->WriteHTML("<tr>");
          
            $mpdf->WriteHTML("<td>$value->nombre</td>");
            $mpdf->WriteHTML("<td>$value->dni</td>");
            $mpdf->WriteHTML("<td>$value->email</td>");
            $mpdf->WriteHTML("<td>$value->solicitud</td>");
             $mpdf->WriteHTML("<td>$value->observaciones</td>");

            $mpdf->WriteHTML("</tr>");
        }
        

$mpdf->WriteHTML("</table><br><br>");


 $mpdf->WriteHTML("<h5>* INFORMACION EQUIPOS DEL CLIENTE</h5><br>");


   $mpdf->WriteHTML("<table border='1' align='center'>
            
            <tr>
            <th>NOMBRE EQUIPO</th>
            <th>SERIAL</th>
            <th>MODELO</th>
            <th>PLACA</th>
            <th>OBSERVACIONES</th>
       
            </tr>");
     foreach ($ot as $value) {
            $mpdf->WriteHTML("<tr>");
          
            $mpdf->WriteHTML("<td>$value->nom_dispositivo</td>");
            $mpdf->WriteHTML("<td>$value->serial</td>");
            $mpdf->WriteHTML("<td>$value->modelo</td>");
            $mpdf->WriteHTML("<td>$value->placa</td>");
             $mpdf->WriteHTML("<td>$value->Observaciones</td>");

            $mpdf->WriteHTML("</tr>");
        }
        $mpdf->WriteHTML("</table>");
        
        
      $mpdf->SetHTMLFooter("<br><footer>Firma:______________________________________ </footer>");
        


$mpdf->WriteHTML("</body></html>");


        // $html = $this->load->view('v_dpdf',$date,true);
        //$html="asdf";
        //this the the PDF filename that user will get to download
     

  
        $mpdf->Output();















    
    }

    public function volanteCostoOt() {
   
        $idot = $nombre = $this->input->post('ot');

         if($idot!=null){
        $ot = $this->Model_ReportesPdf-> reporteCostoOt($idot);
       // print_r($ot);
             $i=0;
                foreach ($ot as $value) {
                     $datos[$i] = array(
                'cons' =>$value->cons,
                'id_ot' =>$value->id_ot,
                'id_ser' =>$value->id_ser,
                'observacione' =>$value->observaciones,
                'id_dispo' =>$value->id_dispo,
                'model' =>$value->modelo,
                'id_marca' =>$value->id_marca,
                'seriales' =>$value->seriales,
                'capacidad' =>$value->capacidad,
                'valor_dispositivo' =>$value->valor_dispositivo,
                'equipo_cliente' =>$value->equipo_cliente,
                'InfoServicios' =>$value->InfoServicios,
                'ValorServicio' =>$value->ValorServicio,
                'InfoDispositivo' =>$value->InfoDispositivo,
                'nombreMarca' =>$value->nombreMarca,
                'Valor_Total_Dispositivos' =>$value->Valor_Total_Dispositivos,
                'Valor_Total_Servicios' =>$value->Valor_Total_Servicios,
                'Valor_Total' =>$value->Valor_Total,
                'cliente' =>$value->InformacionCliente,
                            
                         );
                      $i++;
            }
        }



      //load mPDF library
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'A4');
        $mpdf->SetHTMLHeader('<img src="http://localhost/demosots/public/img/logofor.jpg"/>');
        
       $mpdf->WriteHTML("<br><br><br><br><br><br><br>");
         $mpdf->WriteHTML("Fecha:".  date("d-m-Y (H:i:s)",  time())."<br>");
        
        $mpdf->WriteHTML("No orden: <font size=10> ".$datos[0]['id_ot']."</font> <br>");
        
         $mpdf->WriteHTML("Cliente:".$datos[0]['cliente']."<br>");

      $mpdf->SetStyles('<link rel="stylesheet" href="http://localhost/demosots/public/css/bootstrap.css" ');



       

        //load the view and saved it into $html variable
      $html = 
   
        "  <!DOCTYPE html>
           <html>
           <head>
          
           </head>
           <body>
            <label>DETALLE DE SERVICIOS</label>
            
            <br><br>
            <table border='1' align='center'>
            <thead class=\"thead-inverse\">
            
            <tr>
            <th>CODIGO</th>
            <th>INFORMACION SERVICIOS</th>
            <th>OBSERVACIONES</th>
            <th>VALOR UNIDAD SERVICIO</th>  
            </tr>
            </thead>";
        $mpdf->WriteHTML($html);
        $mpdf->WriteHTML("<tr>");
        foreach ($ot as $value) {
            $mpdf->WriteHTML("<tr>");
            $cons = $value->cons;
            $infoser = $value->InfoServicios;
            $observaciones = $value->observaciones;
            $valser=$value->ValorServicio;
            $mpdf->WriteHTML("<td>$cons</td>");
            $mpdf->WriteHTML("<td>$infoser</td>");
            $mpdf->WriteHTML("<td>$observaciones</td>");
            $mpdf->WriteHTML("<td>$valser</td>");

            $mpdf->WriteHTML("</tr>");
        }
        

$mpdf->WriteHTML("</table>");
        
$mpdf->WriteHTML("<h4  type='number'>***********************************************************Total Servicios:$".$datos[0]['Valor_Total_Servicios']."</h4>" );


$mpdf->WriteHTML("<br><br>DETALLE DE DISPOSITIVOS<br>");

 $mpdf->WriteHTML("<table border='1' align='center'>
            
            
            <tr>
            <th>CODIGO</th>
            <th>DISPOSITIVO</th>
            <th>MARCA</th>
            <th>SERIALES</th>
            <th>VALOR UNIDAD DISPOSITIVO</th>
            </tr>
            ");
 
 
       foreach ($ot as $value) {
            $mpdf->WriteHTML("<tr>");
            $cons = $value->cons;
            $infdis = $value->InfoDispositivo;
            $marca = $value->nombreMarca;
            $serial=$value->seriales;
            $valdis=$value->valor_dispositivo;
            $mpdf->WriteHTML("<td>$cons</td>");
            $mpdf->WriteHTML("<td>$infdis</td>");
            $mpdf->WriteHTML("<td>$marca</td>");
            $mpdf->WriteHTML("<td>$serial</td>");
            $mpdf->WriteHTML("<td>$valdis</td>");

            $mpdf->WriteHTML("</tr>");
        }
 

 $mpdf->WriteHTML("</table>");
  $mpdf->WriteHTML("<br><h4>***********************************************************Total Dispositivos:$".$datos[0]['Valor_Total_Dispositivos']."</h4>" );
  $mpdf->WriteHTML("<br>+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>");
 $mpdf->WriteHTML("Total:$".$datos[0]['Valor_Total']);
  $mpdf->WriteHTML("+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>");
   $mpdf->SetHTMLFooter("<br><footer>Firma:______________________________________ </footer>");
$mpdf->WriteHTML("</body></html>");


        // $html = $this->load->view('v_dpdf',$date,true);
        //$html="asdf";
        //this the the PDF filename that user will get to download
     

  
        $mpdf->Output();
    }
    
    
    

}

