<?php
	class Posts_model extends CI_Model{
		
		public function listing(){
			$this->db->order_by('posts_id', 'DESC');
			$this->db->where('posts_type', 'post');
			$this->db->join('blogs', 'blogs_post = posts_id', 'left');
			$this->db->join('users', 'posts_author = users_id', 'left');
			$this->db->join('seo', 'posts_id = seo_post', 'left');
			return $this->db->get('posts')->result_array();
		}
		
		public function get_Single($id){
			$this->db->where('posts_id', $id);
			$this->db->where('posts_type', 'post');
			$this->db->join('blogs', 'blogs_post = posts_id', 'left');
			$this->db->join('users', 'posts_author = users_id', 'left');
			$this->db->join('seo', 'posts_id = seo_post', 'left');
			$post = $this->db->get('posts')->row_array();
			
			$this->db->where('post_category_post', $id);
			$post['categories'] = $this->db->get('post_category')->result_array();
			
			return $post;
		}
		
		public function insert($image, $slug){
			$categories = $this->input->post('category');
			$tag = $this->input->post('tags');
			$tags = implode(', ', $tag);
			
			$this->db->insert('posts', [
				'posts_title' => $this->input->post('title'),
				'posts_slug' => $slug,
				'posts_author' => '1',
				'posts_cover' => $image,
				'posts_type' => 'post',
				'posts_address' => 1,
				'posts_status' => $this->input->post('status'),
				'posts_created' => now(),
			]);
			$post = $this->db->insert_id();
			
			$this->db->insert('blogs', [
				'blogs_post' => $post,
				'blogs_excert' => $this->input->post('short_desc'),
				'blogs_description' => $this->input->post('description'),
				'blogs_tags' => $tags,
			]);
			
			$this->db->insert('seo', [
				'seo_post' => $post,
				'seo_keyword' => $this->input->post('keyword'),
				'seo_description' => $this->input->post('meta_desc')
			]);
			
			if($categories){
				foreach($categories as $category){
					$this->db->insert('post_category', [
						'post_category_post' => $post,
						'post_category_category' => $category,
					]);
				}
			}
			return $post;
		}
		
		public function update($id, $image){
		    $tag = [];
		   $slug =  makeSlug($this->input->post('title'), $id);
			$categories = $this->input->post('category');
			if($this->input->post('tags')){
			     $tag = $this->input->post('tags');
		    	
			}
            $tags = implode(', ', $tag);
			$this->db->where('posts_id', $id)->update('posts', [
				'posts_title' => $this->input->post('title'),
				'posts_slug' => $slug,
				'posts_cover' => $image,
				'posts_status' => $this->input->post('status'),
			]);
			
	    	
			$this->db->where('seo_post', $id);
			$this->db->update('seo', [
				'seo_keyword' => $this->input->post('keyword'),
				'seo_description' => $this->input->post('meta_desc')
			]);
			
			$this->db->where('blogs_post', $id);
			$this->db->update('blogs', [
				'blogs_excert' => $this->input->post('short_desc'),
				'blogs_description' => $this->input->post('description'),
				'blogs_tags' => $tags,
			]);
			
			if($categories){
				$this->db->where('post_category_post', $id);
				$this->db->delete('post_category');
				foreach($categories as $category){
					$this->db->insert('post_category', [
						'post_category_post' => $id,
						'post_category_category' => $category,
					]);
				}
			}
			return $id;
		}

		public function delete($id){
			$this->db->where('posts_id', $id);
			$this->db->delete('posts');
			
			$this->db->where('seo_post', $id);
			$this->db->delete('seo');
			
			$this->db->where('blogs_post', $id);
			$this->db->delete('blogs');
		}
		
		public function insert_Category($slug){
			$this->db->insert('categories', [
				'categories_name' => $this->input->post('name'),
				'categories_slug' => $slug,
				'categories_icon' => 'temp.png',
				'categories_type' => 'post',
				'categories_parent' => $this->input->post('parent'),
				'categories_status' => 1,
				'categories_created' => now(),
			]);
			return $this->db->insert_id();
		}
		
		public function update_Category($id, $slug){
			return $this->db->where('categories_id', $id)->update('categories', [
				'categories_name' => $this->input->post('name'),
				'categories_slug' => $slug,
				'categories_parent' => $this->input->post('parent'),
				'categories_status' => $this->input->post('status'),
			]);
		}
		
		public function get_Categories($id = FALSE){
			if($id){
				$this->db->where('categories_id', $id);
				$this->db->where('categories_type', 'post');
				return $this->db->get('categories')->row();
			}
			$this->db->order_by('categories_id', 'DESC');
			$this->db->where('categories_type', 'post');
			return $this->db->get('categories')->result();
		}
		
		public function insert_Tag(){
			$this->db->insert('tags', [
				'tags_name' => $this->input->post('name'),
				'tags_description' => $this->input->post('description'),
			]);
			return $this->db->insert_id();
		}
		
		public function update_Tag($id){
			return $this->db->where('tags_id', $id)->update('tags', [
				'tags_name' => $this->input->post('name'),
				'tags_description' => $this->input->post('description'),
			]);
		}
		
		public function delete_Tag($id){
			return $this->db->where('tags_id', $id)->delete('tags');
		}
		
		public function get_Tags($id = FALSE){
			if($id){
				$this->db->where('tags_id', $id);
				return $this->db->get('tags')->row();
			}
			$this->db->order_by('categories_id', 'DESC');
			$this->db->where('categories_type', 'post');
			return $this->db->get('categories')->result();
			
			
			if($id){
				$this->db->where('tags_id', $id);
				return $this->db->get('tags')->row();
			}
			$this->db->order_by('tags_id', 'DESC');
			return $this->db->get('tags')->result();
		}
	}