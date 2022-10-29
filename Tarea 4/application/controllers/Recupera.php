<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class recupera extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Recupera','recupera');
    }

    public function index_get(){
        $datos = $this->recupera->getUsers();
        $this->response($datos);    
    }

    function getcodigo($length)
    {
        $token = "";
        $codeAlphabet = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!?#$%&/()";
        
        $max = strlen($codeAlphabet)-1;

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[mt_rand(0, $max)];
        }

        if($this->recupera->verifica_codigo($token)){
            getcodigo(8);
        }else{
            return $token;
        }

        
    }
    
    public function index_post(){
        $codigoCarrera = $this->input->post("codigoCarrera");
		$anio = $this->input->post("anio");
		$correlativo = $this->input->post("correlativo");
        $correo = $this->input->post("correo");
        $codigoGenerado = $this->getcodigo(8);
        
        if($this->recupera->verifica_existencia($codigoCarrera, $anio, $correlativo)){
            $res = array (
                'status' => 201,
                'data' => $this->recupera->obtiene_existencia($correlativo),
                'comentario' => "recuperado"
            ); 
            $valor = $this->recupera->updateToken($codigoCarrera, $anio, $correlativo, $codigoGenerado);
            $valor2 = $this->recupera->eliminauser($correo);
                           
        }else{ 
            
            $res['status'] = 400;
            $res['message'] = 'no se pudo cambiar';
            
            
        }
        $this-> response($res,200);		
    }

}