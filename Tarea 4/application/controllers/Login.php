<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class login extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Login','Login');
    }

    public function index_get(){
        $datos = $this->Login->getUsers();
        $this->response($datos);    
    }
    
    public function index_post(){
        $correo = $this->input->post("correo");
        $passw = $this->input->post("contrasenia");

        $contrasenia = bin2hex($passw);

        $data = array(
            "correo"=>$correo,
            "contrasenia"=>$contrasenia
        );
        
        if($this->Login->verifica_correo($correo) && $this->Login->verifica_contra($contrasenia)){
            $res = array (
                'status' => 201,
                'data' => $this->Login->obtiene_existencia($correo),
                'comentario' => "existe"
            ); 

                           
        }else{ 

            $res['status'] = 400;
            $res['message'] = 'No existe';
            
            
        }
        $this-> response($res,200);		
    }

}