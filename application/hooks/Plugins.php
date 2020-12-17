<?php

class Plugins {
	
	public function load(){
		$folders = [];
		$dir = FCPATH.PLUGINS;
		$scan = array_diff(scandir($dir), array('..', '.'));
		foreach($scan as $file) {
			if (is_dir("{$dir}/$file")) {
				$folders[] = $file;
			}
		}
		if($folders){
			foreach($folders as $plugin){
				if(file_exists($dir.$plugin.'/'.$plugin.'.php')){
					include($dir.$plugin.'/'.$plugin.'.php');
				}
			}
		}
	}
}