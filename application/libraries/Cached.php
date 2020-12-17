<?php

class Cached {
	
	public $cache;
	public function __construct(){
		$prc =& get_instance();
		$prc->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file', 'key_prefix' => 'ipatco_'.$prc->session->userdata('user_id').'_'));
	}
	
	public function text($key, $data){
		// $prc =& get_instance();
		// $check = $prc->cache->get($key);
		// if ( ! $check){
			// $prc->cache->save($key, $data);
			return $data;
		// }else{
			// return $check;
		// }
	}
	
	public function func($key, $data){
		// $prc =& get_instance();
		// $check = $prc->cache->get($key);
		// if ( ! $check){
			// $prc->cache->save($key, $data());
			return $data();
		// }else{
			// return $check;
		// }
	}
}
