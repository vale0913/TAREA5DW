<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlumnosController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->load->model('Model_Alumnos');
	}
	public function index()
	{
		$this->load->view('index');
	}

	public function insert(){
		if ($this->input->is_ajax_request()){
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('apellido', 'Apellido', 'required');
			$this->form_validation->set_rules('direccion', 'Direccion', 'required');
			$this->form_validation->set_rules('dpi', 'Dpi', 'required');
			$this->form_validation->set_rules('movil', 'Movil', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('inactivo', 'Inactivo', 'required');

			if($this->form_validation->run() == FALSE){
				$data = array('responce' => 'error', 'message' => validation_errors());
			}else{
				$ajax_data = $this->input->post();
				if ($this->Model_Alumnos->insert_entry($ajax_data)) {
					$data = array('responce' => 'success', 'message' => 'Alumno Agregado');
				}else{
					$data = array('responce' => 'error', 'message' => 'No se pudo agregar');
				}						
			}
		}else{
			echo "No direct script access allowed";
		}	
		echo json_encode($data);
	}

	public function fetch(){
		if($this->input->is_ajax_request()){
			$posts = $this->Model_Alumnos->ObtieneDatos();
			echo json_encode($posts);
		}
	}

	public function eliminar(){
		if($this->input->is_ajax_request()){
			$del_id = $this->input->post('del_id');

			
			if($this->Model_Alumnos->elimina($del_id)){
				$data = array('responce' => "success");

			}else{
				$data = array('responce' => "error");
			}
		}
		echo json_encode($data);
	}

	public function edit()
	{
		if($this->input->is_ajax_request()){
			$edit_id = $this->input->post('edit_id');

			if($post = $this->Model_Alumnos->single_entry($edit_id)){
				$data = array('responce' => "success", 'post' => $post);
			}else{
				$data = array('responce' => "error", 'message' => 'failed');
			}
		}
		echo json_encode($data);

	}

	public function update(){
		if ($this->input->is_ajax_request()){
			$this->form_validation->set_rules('edit_nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('edit_apellido', 'Apellido', 'required');
			$this->form_validation->set_rules('edit_direccion', 'Direccion', 'required');
			$this->form_validation->set_rules('edit_dpi', 'Dpi', 'required');
			$this->form_validation->set_rules('edit_movil', 'Movil', 'required');
			$this->form_validation->set_rules('edit_email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('edit_inactivo', 'Inactivo', 'required');
		
			if($this->form_validation->run() == FALSE){
				$data = array('responce' => 'error', 'message' => validation_errors());
			}else{
				$edit_id = $this->input->post('edit_id');
				$data['nombre'] = $this->input->post('edit_nombre');
				$data['apellido'] = $this->input->post('edit_apellido');
				$data['direccion'] = $this->input->post('edit_direccion');
				$data['movil'] = $this->input->post('edit_movil');
				$data['email'] = $this->input->post('edit_email');
				$data['inactivo'] = $this->input->post('edit_inactivo');
				$data['dpi'] = $this->input->post('edit_dpi');
				$data['user'] = $this->input->post('edit_user');
				if ($this->Model_Alumnos->update_entry($data, $edit_id)) {
					$data = array('responce' => 'success', 'message' => 'Alumno Actualizado');
				}else{
					$data = array('responce' => 'error', 'message' => 'No se pudo Actualizar');
				}						
			}
		}else{
			echo "No direct script access allowed";
		}	
		echo json_encode($data);
	}
}
