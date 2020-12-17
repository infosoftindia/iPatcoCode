<?php
	class Admin_model extends CI_Model{
		
		public function admin_Email($email){
			$this->db->where('users_email', $email);
			$this->db->where('users_role', '121');
			return $this->db->get('users')->row();
		}
		
		public function user_Email($email){
			$this->db->where('users_email', $email);
			$this->db->where('(users_role = 1 OR users_role = 2)');
			return $this->db->get('users')->row();
		}
		
		public function check_Email($email){
			$this->db->where('users_email', $email);
			return $this->db->get('users')->row();
		}
		
		public function get_User_data($id){
			$this->db->where('users_id', $id);
			return $this->db->get('users')->row();
		}
		
		public function get_Mail_Email(){
			$this->db->where('mail_queue_status', 0);
			return $this->db->get('mail_queue')->row();
		}
		
		public function get_My_Profile(){
			$this->db->where('users_id', $this->session->userdata('user_id'));
			$this->db->join('address', 'address_id = users_address', 'left');
			return $this->db->get('users')->row_array();
		}
		
		public function save_New_User(){
			$this->db->insert('users', [
				'users_email'		=> $this->input->post('email'),
				'users_password'	=> HashPass($this->input->post('password')),
				'users_first_name'	=> $this->input->post('fname'),
				'users_last_name'	=> $this->input->post('lname'),
				'users_mobile'		=> $this->input->post('phone'),
				'users_role'		=> '1'
			]);
			return $this->db->insert_id();
		}
		
		public function save_New_Vendor(){
			$this->db->insert('users', [
				'users_email'		=> $this->input->post('email'),
				'users_password'	=> HashPass($this->input->post('password')),
				'users_first_name'	=> $this->input->post('fname'),
				'users_last_name'	=> $this->input->post('lname'),
				'users_mobile'		=> $this->input->post('phone'),
				'users_role'		=> '2'
			]);
			return $this->db->insert_id();
		}
		
		public function update_Profile(){
			$id = $this->session->userdata('user_id');
			$address = $this->get_My_Profile();
			$address_ID = $address['users_address'];
			$this->db->where('users_id', $id);
			$this->db->update('users', [
				'users_first_name'	=> $this->input->post('fname'),
				'users_last_name'	=> $this->input->post('lname'),
				'users_mobile'		=> $this->input->post('phone'),
			]);

			if(empty($address_ID)){
				$this->db->insert('address', [
					'address_line1'		=>	'India',
				]);
				$address_ID = $this->db->insert_id();
				$this->db->where('users_id', $id);
				$this->db->update('users', [
					'users_address'		=> $address_ID,
				]);
			}

			$this->db->where('address_id', $address_ID);
			$this->db->update('address', [
				'address_line2'		=>	$this->input->post('state'),
				'address_line3'		=>	$this->input->post('city'),
				'address_line4'		=>	$this->input->post('pin'),
				'address_line5'		=>	$this->input->post('address1'),
			]);
			return true;
		}
		
		public function change_Password(){
			$id = $this->session->userdata('user_id');
			$this->db->where('users_id', $id);
			$this->db->update('users', [
				'users_password'	=> HashPass($this->input->post('new_Password'))
			]);
			return true;
		}
		
		public function change_Password_Id($id, $hash, $password){
			$this->db->where('users_id', $id);
			$this->db->where('users_password', $hash);
			$this->db->update('users', [
				'users_password'	=> HashPass($password)
			]);
		}
		
		public function get_User_By_Token($token){
			$this->db->where('users_password', $token);
			$user = $this->db->get('users');
			if($user->num_rows() > 0){
				return $user->row()->users_id;
			}
		}
	}