<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends MX_Controller {

	public function index(){
		auth([121]);
		$this->load->model('Comments_model');
		$data['title'] = 'Comments';
		$data['comments'] = $this->Comments_model->listing();
		$data['page'] = $this->load->view('manage', $data, true);
		echo modules::run('layouts/layouts/load', $data, true);
	}

	public function edit($id){
		auth([121]);
		$this->load->model('Comments_model');
		
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('url', 'Website', 'min_length[1]');
		$this->form_validation->set_rules('message', 'Message', 'required');
		
		if ($this->form_validation->run() === FALSE){
			$data['comment'] = $this->Comments_model->get_Single($id);
			$data['title'] = 'Edit Comment';
			$data['page'] = $this->load->view('edit', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->edit_Comment($id);
		}
	}

	public function reply($id){
		auth([121]);
		$data['id'] = $id;
		$data['page'] = $this->load->view('reply', $data);
	}

	public function edit_Comment($id){
		auth([121]);
		$this->load->model('Comments_model');
		$this->Comments_model->update($id);
		redirect('comments/edit/'.$id);
	}

	public function save_reply($id){
		auth([121]);
		$this->load->model('Comments_model');
		$this->Comments_model->save_Reply($id);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function approve($id){
		auth([121]);
		$this->load->model('Comments_model');
		$this->Comments_model->update_Status($id, 1);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete($id){
		auth([121]);
		$this->load->model('Comments_model');
		$this->Comments_model->delete($id);
		redirect($_SERVER['HTTP_REFERER']);
	}
}




















