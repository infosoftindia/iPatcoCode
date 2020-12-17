<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layouts extends MX_Controller {

	public function css(){
		return $this->cached->text('css', $this->load->view('css', false, true));
		
	}

	public function js(){
		return $this->cached->text('js', $this->load->view('js', false, true));
	}

	public function sidebar(){
		// return $this->cached->text('js', $this->load->view('sidebar', false, true));
		return $this->load->view('sidebar', false, true);
	}

	public function load($data){
		auth([121]);
		// $scanRoutes = scandir(APPPATH.'admin');
		// foreach($scanRoutes as $file){
			// if(is_dir(APPPATH.'admin/'.$file)){
				// $menu[] = modules::run('module/controller/method');
			// }
		// }
		$data['css'] = $this->css();
		$data['sidebar'] = $this->sidebar();
		$data['pagetitle'] = $this->load->view('page-title', $data, true);
		$data['js'] = $this->js();
		$data['header'] = $this->load->view('header', $data, true);
		$data['footer'] = $this->load->view('footer', $data, true);
		$this->load->view('index', $data);
	}
}
// modules::run('module/controller/method', $params, $...);