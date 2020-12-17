<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends MX_Controller {

	public function backup(){
		auth([121]);
		$data['title'] = 'Database Backup';
		$data['page'] = $this->load->view('backup', $data, true);
		echo modules::run('layouts/layouts/load', $data);
	}

	public function seo(){
		auth([121]);
		$this->load->model('Tools_model');
		$this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[10]');

		if ($this->form_validation->run() === FALSE){
			$data['titles'] = $this->Tools_model->get_Meta('site_meta_title');
			$data['description'] = $this->Tools_model->get_Meta('site_meta_description');
			$data['title'] = 'SEO';
			$data['page'] = $this->load->view('seo', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->save_meta();
		}
	}
	
	public function save_meta(){
		auth([121]);
		$this->Tools_model->insert();
		redirectF(getenv('admin').'/tools/seo',['msg', 'Meta added successfully']);
	}
	
}




















