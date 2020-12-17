<?php
	class Plugins_model extends CI_Model{
		
		public function listing(){
			$plugins = [];
			$path = FCPATH.PLUGINS;
			$folders = getSubDirectories($path);
			if($folders){
				foreach($folders as $plugin){
					if(file_exists($path.$plugin.'/'.$plugin.'.php')){
						if(file_exists($path.$plugin.'/plugin.json')){
							$json = file_get_contents($path.$plugin.'/plugin.json');
							$array = json_decode($json, true);
							$array['slug'] = $plugin;
							$plugins[] = $array;
						}
					}
				}
			}
			return $plugins;
		}

		public function delete($plugin){
			deleteDir(FCPATH.PLUGINS.$plugin);
		}
	}