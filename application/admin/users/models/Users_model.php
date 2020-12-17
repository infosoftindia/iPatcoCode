<?php
	class Users_model extends CI_Model{
		
		public function listing($id = FALSE){
			$pUsers = [];
			
			if($id){
				$this->db->where('users_id', $id);
				return $this->db->get('users')->row_array();
			}

			$this->db->order_by('users_id', 'DESC');
			$users = $this->db->get('users')->result_array();

			if($users){
				foreach($users as $user){
					$this->db->where('posts_author', $user['users_id']);
					$user['total_posts'] = $this->db->get('posts')->num_rows();
					$pUsers[] = $user;
				}
			}
			return $pUsers;
		}
		
		public function insert(){
			$this->db->insert('users', [
				'users_first_name' => $this->input->post('fname'),
				'users_last_name' => $this->input->post('lname'),
				'users_email' => $this->input->post('email'),
				'users_password' => $this->input->post('password'),
				'users_mobile' => $this->input->post('mobile'),
				'users_role' => $this->input->post('role'),
				'users_status' => 1,
				'users_created' => now(),
			]);
			return $this->db->insert_id();
		}
		
		public function update($id){
			$this->db->where('users_id', $id);
			$this->db->update('users', [
				'users_first_name' => $this->input->post('fname'),
				'users_last_name' => $this->input->post('lname'),
				'users_email' => $this->input->post('email'),
				'users_mobile' => $this->input->post('mobile'),
				'users_role' => $this->input->post('role'),
			]);
		}
		
		public function delete($id){
			$this->db->where('users_id', $id);
			$this->db->delete('users');
		}
	}