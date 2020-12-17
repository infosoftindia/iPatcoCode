<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MX_Controller {

	public function manage(){
		auth([121]);
		$this->load->model('Pages_model');
		$data['title'] = 'Manage Pages';
		$data['posts'] = $this->Pages_model->listing();
		$data['page'] = $this->load->view('manage', $data, true);
		echo modules::run('layouts/layouts/load', $data, true);
	}

	public function create(){
		auth([121]);
		$this->form_validation->set_rules('title', 'Page Title', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$this->form_validation->set_rules('keyword', 'Meta Keyword', 'required');
		$this->form_validation->set_rules('meta_desc', 'Meta Description', 'required');
		
		if ($this->form_validation->run() === FALSE){
			$data['thumbnail'] = base_url(getenv('uploads').'temp.png');
			$data['title'] = 'New Pages';
			$data['page'] = $this->load->view('create', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->save_New_Page();
		}
	}

	public function edit($id){
		auth([121]);
		$this->load->model('Pages_model');
		
		$this->form_validation->set_rules('title', 'Page Title', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$this->form_validation->set_rules('keyword', 'Meta Keyword', 'required');
		$this->form_validation->set_rules('meta_desc', 'Meta Description', 'required');
		
		if ($this->form_validation->run() === FALSE){
			$data['post'] = $this->Pages_model->get_Single($id);
			$data['thumbnail'] = base_url(getenv('uploads').$data['post']['posts_cover']);
			$data['title'] = 'Edit Page';
			$data['page'] = $this->load->view('edit', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->edit_Page($id);
		}
	}

	public function save_New_Page(){
		auth([121]);
		$this->load->model('Pages_model');
		if($_FILES['userfile']['name']){
			$image = doUpload();
		}else{
			$image = "default.png";
		}
		$insert = $this->Pages_model->insert($image);
		redirectF(getenv('admin').'/pages/edit/'.$insert, ['msg', 'Page added successfully']);
	}

	public function edit_Page($id){
		auth([121]);
		$this->load->model('Pages_model');
		if($_FILES['userfile']['name']){
			$image = doUpload();
		}else{
			$image = $this->input->post('old_Picture');
		}
		$this->Pages_model->update($id, $image);
		redirectF(getenv('admin').'/pages/edit/'.$id, ['msg', 'Page modified successfully']);
	}

	public function delete($id){
		auth([121]);
		$this->load->model('Pages_model');
		$this->Pages_model->delete($id);
		redirectF($_SERVER['HTTP_REFERER'], ['msg', 'Page has been successfully deleted']);
	}
}




















