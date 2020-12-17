<?php

class Functions {

	public $admin_head = array();
	public $admin_footer = array();
	
	public $head = array();
	public $footer = array();

	public function admin_head($text){
		if (!in_array($text, $this->admin_head)){
			$this->admin_head[] = $text;
		}
	}

	public function admin_footer($text){
		if (!in_array($text, $this->admin_footer)){
			$this->admin_footer[] = $text;
		}
	}

	public function add_to_head($text){
		$this->head[] = $text;
	}

	public function add_to_footer($text){
		$this->footer[] = $text;
	}

	public function get_admin_head(){
		return implode(PHP_EOL, $this->admin_head);
	}

	public function get_admin_footer(){
		return implode(PHP_EOL, $this->admin_footer);
	}

	public function get_head(){
		return implode(PHP_EOL, $this->head);
	}

	public function get_footer(){
		return implode(PHP_EOL, $this->footer);
	}
}