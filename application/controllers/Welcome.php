<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function layout($data){
        $data['css'] = theme('inc/css', [], true);
        $data['js'] = theme('inc/js', [], true);
        $data['navbar'] = theme('inc/nav', [], true);
        $data['header'] = theme('inc/header', $data, true);
        $data['footer'] = theme('inc/footer', [], true);
        theme('inc/template', $data);
    }


    public function index()
    {
        $data['title'] = 'Home';
        $data['page'] = 'View Page'; // theme('home', $data, true);
        $this->layout($data);
    }
	
}
