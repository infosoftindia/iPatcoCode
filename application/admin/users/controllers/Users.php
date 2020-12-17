<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller {

	public function manage(){
		auth([121]);
		$this->load->model('Users_model');
		$data['title'] = 'Manage Users';
		$data['users'] = $this->Users_model->listing();
		$data['page'] = $this->load->view('manage', $data, true);
		echo modules::run('layouts/layouts/load', $data);
	}

	public function create(){
		auth([121]);
		$this->form_validation->set_rules('fname', 'First Name', 'required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('lanme', 'Last Name', 'min_length[1]|max_length[100]');
		$this->form_validation->set_rules('email', 'Email Address', 'required|min_length[6]|valid_email|max_length[100]|is_unique[users.users_email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('role', 'User Role', 'required|min_length[1]|is_numeric');
		
		if ($this->form_validation->run($this) === FALSE){
			$data['title'] = 'Add New User';
			$data['page'] = $this->load->view('create', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->save_New_User();
		}
	}

	public function edit($id){
		auth([121]);
		$this->load->model('Users_model');
		$this->form_validation->set_rules('fname', 'First Name', 'required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('lanme', 'Last Name', 'min_length[1]|max_length[100]');
		$this->form_validation->set_rules('email', 'Email Address', 'required|min_length[6]|valid_email|max_length[100]');
		$this->form_validation->set_rules('role', 'User Role', 'required|min_length[1]|is_numeric');
		
		if ($this->form_validation->run($this) === FALSE){
			$data['title'] = 'Edit User';
			$data['user'] = $this->Users_model->listing($id);
			$data['page'] = $this->load->view('edit', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->edit_User($id);
		}
	}

	public function save_New_User(){
		auth([121]);
		$this->load->model('Users_model');
		$insert = $this->Users_model->insert();
		if($this->input->post('send_Email') == 1){
			// Send Mail to user for Notification
		}
		redirectF(getenv('admin').'/users/edit/'.$insert, ['success', 'User successfully added']);
	}

	public function edit_User($id){
		auth([121]);
		$this->load->model('Users_model');
		$insert = $this->Users_model->update($id);
		redirectF($_SERVER['HTTP_REFERER'], ['success', 'User successfully updated']);
	}

	public function delete($id){
		auth([121]);
		$this->load->model('Users_model');
		$insert = $this->Users_model->delete($id);
		redirectF($_SERVER['HTTP_REFERER'], ['success', 'User successfully deleted']);
	}
}




















