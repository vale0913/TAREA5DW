<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");


class Api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Carnet','carnet');
    }

    public function index_get(){
        $datos = $this->carnet->getAlumnos();
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
        
        if($this->carnet->verifica_codigo($token)){
            getcodigo(8);
        }else{
            return $token;
        }

        
    }

    public function index_post(){
		$codigoCarrera = $this->input->post("codigoCarrera");
		$anio = $this->input->post("anio");
		$correlativo = $this->input->post("correlativo");
        $Nombre = $this->input->post("Nombre");
		$Apellido = $this->input->post("Apellido");
		$correo = $this->input->post("correo");
		$codigoGenerado = $this->getcodigo(8);
			$data = array(
				"codigoCarrera"=>$codigoCarrera,
				"anio"=>$anio,
				"correlativo"=>$correlativo,
				"Nombre"=> $Nombre,
				"Apellido"=>$Apellido,
				"correo"=>$correo,
				"codigoGenerado"=>$codigoGenerado

			);

            if($this->carnet->verifica_existencia($correlativo)){
                $res = array (
                    'status' => 400,
                    'data' => $this->carnet->obtiene_existencia($correlativo),
                    'comentario' => "existe"
                );
            }else{
                $datos = $this->carnet->save($data);
                if($datos) {
                    $res['status'] = 201;
                    $res['message'] = 'Registro Insertado';
                    
                } else {
                    $res['status'] = 400;
                    $res['message'] = 'insert failed';
                   
                }
            }
        $this-> response($res,200);		
    }

}