<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Filemanager extends MX_Controller {

		public function index(){
			$this->load->model('Filemanager_model');
			$data['title'] = 'Manage Users';
			// $data['users'] = $this->Users_model->listing();
			$data['page'] = $this->load->view('filemanager', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		}
	}