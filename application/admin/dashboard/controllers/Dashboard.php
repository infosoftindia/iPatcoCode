<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function index(){
		$data['title'] = 'Dashboard';
		$data['page'] = $this->load->view('dashboard', false, true);
		echo modules::run('layouts/layouts/load', $data);
	}
}
// 