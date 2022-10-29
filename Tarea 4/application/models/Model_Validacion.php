<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Validacion extends CI_Model {


       public function save($data)
       {     
           return $this->db->insert('tb_users', $data);        
       }
    

    public function getUsers(){
        $this->db->select("*");
        $this->db->from("tb_users");
        $results=$this->db->get();
        return $results->result();        
    }

    public function verifica_existencia($codigoGenerado){
        $this->db->select("*");
        $this->db->from("Tb_Codigos");
        $this->db->Where("codigoGenerado", $codigoGenerado);
        $results=$this->db->get()->row();
        return $results;        
    }

    public function verifica_existencia2($correo){
        $this->db->select("*");
        $this->db->from("Tb_Codigos");
        $this->db->Where("correo", $correo);
        $results=$this->db->get()->row();
        return $results;        
    }
    public function verifica_existencia3($correo){
        $this->db->select("*");
        $this->db->from("Tb_users");
        $this->db->Where("correo", $correo);
        $results=$this->db->get()->row();
        return $results;        
    }


    public function obtiene_existencia($codigoGenerado){
        $this->db->select("Nombre, Apellido, correo");
        $this->db->from("Tb_Codigos");
        $this->db->Where("codigoGenerado", $codigoGenerado);
        $results=$this->db->get();
        return $results->result();        
    }
    
}