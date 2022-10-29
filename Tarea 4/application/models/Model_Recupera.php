<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Recupera extends CI_Model {

    

    public function getUsers(){
        $this->db->select("*");
        $this->db->from("tb_codigos");
        $results=$this->db->get();
        return $results->result();        
    }

    public function verifica_existencia($codigo, $anio, $correlativo){
        $sql = "SELECT * FROM tb_codigos WHERE codigoCarrera = $codigo AND anio = $anio AND correlativo = $correlativo";
        $query = $this->db->query($sql);
        return $query->result();
        return $results;        
    }
    public function verifica_codigo($token){
        $this->db->select("codigoGenerado");
        $this->db->from("tb_codigos");
        $this->db->Where("codigoGenerado", $token);
        $results=$this->db->get()->row();
        return $results;        
    }

    public function updateToken($code, $anio, $corre, $token){
        $sql = "UPDATE `tb_codigos` SET `codigoGenerado` = '$token' WHERE `codigoCarrera` = '$code' AND `anio` = '$anio' AND `correlativo` = '$corre';";
        $query = $this->db->query($sql);   
    }

    public function eliminauser($correo){
        $sql = "DELETE FROM `tb_users` WHERE `correo` = '$correo';";
        $query = $this->db->query($sql);
    }
    public function obtiene_existencia($correlativo){
        $this->db->select("Nombre, Apellido, correo");
        $this->db->from("Tb_Codigos");
        $this->db->Where("correlativo", $correlativo);
        $results=$this->db->get();
        return $results->result();        
    }
    
    
}