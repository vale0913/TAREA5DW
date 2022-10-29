<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Login extends CI_Model {
    public function getUsers(){
        $this->db->select("*");
        $this->db->from("tb_users");
        $results=$this->db->get();
        return $results->result();        
    }

    public function verifica_correo($correo){
        $this->db->select("*");
        $this->db->from("Tb_users");
        $this->db->Where("correo", $correo);
        $results=$this->db->get()->row();
        return $results;        
    }
    public function verifica_contra($contrasenia){
        $this->db->select("*");
        $this->db->from("tb_users");
        $this->db->Where("contrasenia", $contrasenia);
        $results=$this->db->get()->row();
        return $results;        
    }
    public function obtiene_existencia($correo){
        $this->db->select("Nombre, Apellido");
        $this->db->from("Tb_Codigos");
        $this->db->Where("correo", $correo);
        $results=$this->db->get();
        return $results->result();        
    }
    
}