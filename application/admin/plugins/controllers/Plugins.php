<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plugins extends MX_Controller {

	public function manage(){
		auth([121]);
		$this->load->model('Plugins_model');
		$data['title'] = 'Manage Plugins';
		$data['plugins'] = $this->Plugins_model->listing();
		$data['page'] = $this->load->view('manage', $data, true);
		echo modules::run('layouts/layouts/load', $data, true);
	}

	public function new(){
		auth([121]);
		$data['title'] = 'New Plugins';
		$data['page'] = $this->load->view('create', $data, true);
		echo modules::run('layouts/layouts/load', $data);
	}

	public function delete($plugin){
		auth([121]);
		$this->load->model('Plugins_model');
		$this->Plugins_model->delete($plugin);
		redirectF($_SERVER['HTTP_REFERER'], ['msg', 'Plugin has been successfully deleted']);
	}
}




















