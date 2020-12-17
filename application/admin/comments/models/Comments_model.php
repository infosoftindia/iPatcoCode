<?php
	class Comments_model extends CI_Model{
		
		public function listing($limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			$this->db->order_by('comments_id', 'DESC');
			$this->db->where('(comments_reply < 1 OR comments_reply is NULL)');
			$this->db->join('posts', 'comments_post = posts_id', 'left');
			$this->db->join('users', 'users_id = comments_user', 'left');
			return $this->db->get('comments')->result_array();
		}
		
		public function get_Single($id){
			$this->db->where('comments_id', $id);
			$this->db->join('posts', 'comments_post = posts_id', 'left');
			$this->db->join('users', 'users_id = comments_user', 'left');
			return $this->db->get('comments')->row_array();
		}
		
		public function update($id){
			$this->db->where('comments_id', $id);
			$this->db->update('comments', [
				'comments_name' => $this->input->post('name'),
				'comments_email' => $this->input->post('email'),
				'comments_url' => $this->input->post('url'),
				'comments_message' => $this->input->post('message'),
				'comments_status' => $this->input->post('status'),
			]);
			return $id;
		}
		
		public function update_Status($id, $status = 1){
			$this->db->where('comments_id', $id);
			$this->db->update('comments', [
				'comments_status' => $status,
			]);
			return $id;
		}
		
		public function save_Reply($id){
			$this->db->insert('comments', [
				'comments_reply' => $id,
				'comments_name' => $this->session->userdata('user_name').'a',
				'comments_email' => $this->session->userdata('user_email').'a',
				'comments_url' => '',
				'comments_message' => $this->input->post('message'),
				'comments_status' => 1,
			]);
			return $id;
		}

		public function delete($id){
			$this->db->where('comments_id', $id);
			$this->db->delete('comments');
		}
	}