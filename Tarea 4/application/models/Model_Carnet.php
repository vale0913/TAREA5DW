<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Carnet extends CI_Model {


       public function save($data)
       {     
           return $this->db->insert('Tb_Codigos', $data);        
       }
    

    public function getAlumnos(){
        $this->db->select("*");
        $this->db->from("Tb_Codigos");
        $results=$this->db->get();
        return $results->result();        
    }

    public function verifica_existencia($correlativo){
        $this->db->select("correlativo");
        $this->db->from("Tb_Codigos");
        $this->db->Where("correlativo", $correlativo);
        $results=$this->db->get()->row();
        return $results;        
    }

    public function obtiene_existencia($correlativo){
        $this->db->select("Nombre, Apellido, correo");
        $this->db->from("Tb_Codigos");
        $this->db->Where("correlativo", $correlativo);
        $results=$this->db->get();
        return $results->result();        
    }

    public function verifica_codigo($token){
        $this->db->select("codigoGenerado");
        $this->db->from("Tb_Codigos");
        $this->db->Where("codigoGenerado", $token);
        $results=$this->db->get()->row();
        return $results;        
    }
    
}
