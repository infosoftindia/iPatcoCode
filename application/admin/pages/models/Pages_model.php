<?php
	class Pages_model extends CI_Model{
		
		public function listing($limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			$this->db->order_by('posts_id', 'DESC');
			$this->db->where('posts_type', 'page');
			$this->db->join('pages', 'pages_post = posts_id', 'left');
			$this->db->join('users', 'users_id = posts_author', 'left');
			$this->db->join('seo', 'posts_id = seo_post', 'left');
			return $this->db->get('posts')->result_array();
		}
		
		public function get_Single($id){
			$this->db->where('posts_id', $id);
			$this->db->where('posts_type', 'page');
			$this->db->join('pages', 'pages_post = posts_id', 'left');
			$this->db->join('seo', 'posts_id = seo_post', 'left');
			return $this->db->get('posts')->row_array();
		}
		
		public function insert($image){
			$this->db->insert('posts', [
				'posts_title' => $this->input->post('title'),
				'posts_slug' => makeSlug($this->input->post('title')),
				'posts_author' => 1,//$this->session->userdata('user_id'),
				'posts_cover' => $image,
				'posts_type' => 'page',
				'posts_status' => $this->input->post('status'),
				'posts_created' => now(),
			]);
			$post = $this->db->insert_id();
			
			$this->db->insert('seo', [
				'seo_post' => $post,
				'seo_keyword' => $this->input->post('keyword'),
				'seo_description' => $this->input->post('meta_desc')
			]);
			
			$this->db->insert('pages', [
				'pages_post' => $post,
				'pages_description' => $this->input->post('description'),
			]);
			return $post;
		}
		
		public function update($id, $image){
			$this->db->where('posts_id', $id);
			$this->db->update('posts', [
				'posts_title' => $this->input->post('title'),
				'posts_slug' => makeSlug($this->input->post('title'), $id),
				'posts_cover' => $image,
				'posts_status' => $this->input->post('status'),
			]);
			
			$this->db->where('seo_post', $id);
			$this->db->update('seo', [
				'seo_keyword' => $this->input->post('keyword'),
				'seo_description' => $this->input->post('meta_desc')
			]);
			
			$this->db->where('pages_post', $id);
			$this->db->update('pages', [
				'pages_description' => $this->input->post('description'),
			]);
			return $id;
		}

		public function delete($id){
			$this->db->where('posts_id', $id);
			$this->db->delete('posts');
			
			$this->db->where('seo_post', $id);
			$this->db->delete('seo');
			
			$this->db->where('pages_post', $id);
			$this->db->delete('pages');
		}
	}