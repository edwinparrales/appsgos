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




        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->SetFont('Arial', 'B', '16');
        $pdf->AddPage();
         
        $pdf->Image('http://localhost/demosots/public/img/logofor.jpg');
        $pdf->Ln(20);
        $pdf->Header();
        $pdf->SetFillColor(232, 232, 232);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 10, '', 0, 0, 'C', 0);
        $pdf->Cell(100, 10, 'COMPROBANTE DE ORDEN SERVICIO', 0, 0, 'C', 0);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(50, 10, 'Fecha: ' . date("Y-m-d H:i:s"), 0);
        $pdf->Ln(20);
        $pdf->Cell(150, 10, '', 0, 0, 'C', 0);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(150, 10, 'Orden No: ' . $datos[0]['ot'] . '', 0);
        $pdf->Ln(20);
        //Fin del encabezado
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 10, '', 0, 0, 'C', 0);
        $pdf->Cell(100, 10, '**************DATOS DE LA ORDEN DE SERVICIO**************', 0, 0, 'C', 0);
        $pdf->Ln(10);
        if ($ot != null) {
            $pdf->SetFont('Arial', '', 9);

            $pdf->Cell(85, 10, 'Nombre cliente:  ' . $datos[0]['nombre_cliente'], 0, 0, 'L', 0);
            $pdf->Cell(50, 10, 'Dni:  ' . $datos[0]['dni'], 0, 0, 'L', 0);
            $pdf->Cell(50, 10, 'Email:  ' . $datos[0]['email'], 0, 0, 'L', 0);
            $pdf->Ln();

            $pdf->Cell(140, 20, 'Solicitud:' . utf8_decode($datos[0]['solicitud']), 2, 'L', 0, 0);
            $pdf->Ln();
            $pdf->Cell(100, 20, 'Observaciones:  ' . utf8_decode($datos[0]['obs_ot']), 0, 0, 'C', 0);
            $pdf->Ln();
        } else {
            $pdf->Cell(100, 10, 'No se encontraron registros con los datos ingresados', 0, 0, 'C', 0);
        }
        $pdf->Ln();
        $pdf->Cell(40, 10, '', 0, 0, 'C', 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(100, 10, utf8_decode('*******INFORMACIÓN EQUIPOS DEL CLIENTE*********'), 0, 0, 'C', 0);
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 9);
        if ($ot != null) {
            foreach ($ot as $value) {
//            echo "Cliente :" . $value->cliente. "<br>";
                $pdf->Cell(100, 10, 'Nombre Equipo: ' . $value->nom_dispositivo, 0, 0, 'C', 0);
                $pdf->Cell(100, 10, 'Serial: ' . $value->serial, 0, 0, 'C', 0);
                $pdf->Ln();
                $pdf->Cell(100, 10, 'Modelo: ' . $value->modelo, 0, 0, 'C', 0);
                $pdf->Cell(100, 10, 'Placa: ' . $value->placa, 0, 0, 'C', 0);
            }
        } else {
            $pdf->Cell(100, 10, '****No se encontraron registros con los datos ingresados****', 0, 0, 'C', 0);
        }


        //pie  de pagina
        $pdf->Footer();
        $pdf->SetY(260);
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Cell(0, 10, 'Pagina ' . $pdf->PageNo(), 0, 0, 'C');

        $pdf->Output();
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
        
$mpdf->WriteHTML("***********************************************************Total Servicios:$".$datos[0]['Valor_Total_Servicios'] );


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
  $mpdf->WriteHTML("<br>***********************************************************Total Dispositivos:$".$datos[0]['Valor_Total_Dispositivos'] );
  $mpdf->WriteHTML("<br>+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>");
 $mpdf->WriteHTML("Total:$".$datos[0]['Valor_Total']);
  $mpdf->WriteHTML("+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>");
$mpdf->WriteHTML("</body>");


        // $html = $this->load->view('v_dpdf',$date,true);
        //$html="asdf";
        //this the the PDF filename that user will get to download
     

  
        $mpdf->Output();
    }
    
    
    

}

