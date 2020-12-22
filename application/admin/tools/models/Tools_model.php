<?php
	class Tools_model extends CI_Model{
		
		public function get_Meta($key){
			$this->db->where('settings_key', $key);
			return $this->db->get('settings ')->row_array();
		}
		
		public function get_Tables(){
			return $this->db->list_tables();
		}
		
		public function insert(){
			$title = $this->get_Meta('site_meta_title');
			if($title){
				$this->db->where('settings_key', 'site_meta_title')->update('settings',[
					'settings_value' => $this->input->post('title'),
					'settings_updated' => now(),
				]);
			}else{
				$this->db->insert('settings', [
					'settings_key' => 'site_meta_title',				
					'settings_value' => $this->input->post('title'),
					'settings_updated' => now(),
				]);
			}
			
			$description = $this->get_Meta('site_meta_description');
			if($description){
				$this->db->where('settings_key', 'site_meta_description')->update('settings', [
					'settings_value' => $this->input->post('description'),
					'settings_updated' => now(),
				]);
			}else{
				$this->db->insert('settings', [
					'settings_key' => 'site_meta_description',				
					'settings_value' => $this->input->post('description'),
					'settings_updated' => now(),
				]);
			}
		}

		public function backUpTables($name)
		{
			$this->load->dbutil();
			$prefs = array(
				'tables'        => $this->input->post('tables'),
				'ignore'        => array(),
				'format'        => $this->input->post('file_type'),
				'filename'      => $name.'.sql',
				'add_drop'      => TRUE,
				'add_insert'    => TRUE,
				'newline'       => "\n" 
			);
			return $this->dbutil->backup($prefs);
		}

		public function backUpDatabase()
		{
			$this->load->dbutil();
			$prefs = array(
				'format'        => 'txt',
				'filename'      => $name.'.sql',
				'add_drop'      => TRUE,
				'add_insert'    => TRUE,
				'newline'       => "\n" 
			);
			return $this->dbutil->backup($prefs);
		}
	}