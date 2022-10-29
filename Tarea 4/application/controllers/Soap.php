<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");


class soap extends REST_Controller {
   

   public function index_get(){
      $datos = $this->data();
      $this->response();    
   }

   function data(){
      $location = "https://banguat.gob.gt/variables/ws/TipoCambio.asmx?WSDL";

      $request= '
      <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://www.banguat.gob.gt/variables/ws/">
         <soapenv:Header/>
         <soapenv:Body>
            <ws:TipoCambioDia/>
         </soapenv:Body>
      </soapenv:Envelope>
      ';



      $action = "TipoCambioDia";
      $headers = [
         'Method: POST',
         'Connection: Keep-Alive',
         'User-Agent: Apache-HttpClient/4.5.5 (Java/16.0.1)',
         'Content-Type: text/xml;charset=UTF-8',
         'SOAPAction: http://www.banguat.gob.gt/variables/ws/TipoCambioDia',
      ];

      //Segun Documentacion
      $ch = curl_init($location);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
      curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

      $response = curl_exec($ch);
      $err_status = curl_errno($ch);


      print($response);

      $convertido = json_encode($response);
      //return $convertido;
   }

}








