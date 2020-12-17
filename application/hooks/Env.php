<?php

class Env {
	
	public function load(){
		$dotenv = Dotenv\Dotenv::createImmutable(FCPATH);
		$dotenv->load();
	}
}