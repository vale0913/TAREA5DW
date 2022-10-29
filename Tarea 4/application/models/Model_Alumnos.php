<?php
class Model_Alumnos extends CI_Model{

    public function ObtieneDatos(){
        $query = $this->db->get('alumnos');
        if (count($query->result())>0) {
            return $query->result();
        }
        
    }
    public function insert_entry($data){
        return $this->db->insert('alumnos', $data);
    }
    public function elimina($id){
        return $this->db->delete('alumnos', array('alumno' => $id));
    }


    public function single_entry($id)
    {
        $this->db->select("*");
        $this->db->from("alumnos");
        $this->db->where("alumno", $id);
        $query = $this->db->get();
        if(count($query->result())>0){
            return $query->row();
        }
    }

    public function update_entry($data, $id){
        return $this->db->update('alumnos', $data, array('alumno' => $id));
    }
}

