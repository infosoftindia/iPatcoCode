<?php

class Template {
	
	public $css = [];
	public $js = [];
	
	
	public function set_Script($array){
		$this->js = $array;
	}
	
	public function set_Style($array){
		$this->css = $array;
		print_r($array);
	}
	
	public function get_Script(){
		return $this->js;
	}
	
	public function get_Style(){
		return $this->css;
	}
}
