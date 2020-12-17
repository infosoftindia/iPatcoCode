<?php

class Env {
	
	public function __construct(){
		$dotenv = Dotenv\Dotenv::createImmutable(FCPATH);
		$dotenv->load();
	}
}