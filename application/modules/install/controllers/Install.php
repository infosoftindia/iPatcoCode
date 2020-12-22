<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends MX_Controller {

	public function index(){
		// Step 1
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$url = str_replace('install', '', $url);
		update_ENV('url', $url);
		$this->load->model('Install_model');
		$this->form_validation->set_rules('hostname', 'Host Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'min_length[1]');
		$this->form_validation->set_rules('database', 'Database Name', 'required');
		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('step1');
		} else {
			$this->writeAutoLoad();
			$this->Install_model->save_Database_Config();
			redirect('install/step2');
		}
	}

	public function step2(){
		// Site Configuration
		$this->load->model('Install_model');
		$this->form_validation->set_rules('title', 'Site Title', 'required');
		$this->form_validation->set_rules('tag', 'Tag', 'required|max_length[50]');
		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('step2');
		} else {
			$this->Install_model->save_Site_Config();
			redirect('install/step3');
		}
	}

	public function step3(){
		// Admin
		$this->load->model('Install_model');
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required');
		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('step3');
		} else {
			$this->Install_model->save_Admin();
			redirect(getenv('admin').'/login');
		}
	}

	public function writeAutoLoad()
	{
		$template_path 	= APPPATH.'modules/install/file/autoload.php';
		$output_path 	= APPPATH.'config/autoload.php';
		$autoload = file_get_contents($template_path);
		$handle = fopen($output_path,'w+');
		@chmod($output_path,0777);
		if(is_writable($output_path)) {
			if(fwrite($handle, $autoload)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}




















