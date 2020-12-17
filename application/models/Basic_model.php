<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basic_model extends CI_Model {

	public function checkSlugExist($slug, $postId = FALSE){
		$count = 0;
		$backup = $slug;
		while(true){
			$this->db->select('posts_slug');
			if($postId){
				$this->db->where('posts_id <> '.$postId);
			}
			$this->db->where('posts_slug', $slug);
			$query = $this->db->get('posts');
			if ($query->num_rows() == 0) break;
			$slug = $backup . '-' . (++$count);
		}
		$this->db->get('settings');
		return $slug;
	}

	public function checkCategorySlugExist($slug, $id = FALSE){
		$count = 0;
		$backup = $slug;
		while(true){
			$this->db->select('categories_slug');
			if($id){
				$this->db->where('categories_id <> '.$id);
			}
			$this->db->where('categories_slug', $slug);
			$query = $this->db->get('categories');
			if ($query->num_rows() == 0) break;
			$slug = $backup . '-' . (++$count);
		}
		return $slug;
	}

	public function deletePostImages($id){
		$this->db->where('images_post', $id);
		$query = $this->db->get('images');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $img){
				unlink(getenv('uploads') . $img['images_image']);
				$this->db->where('images_id', $img['images_id']);
				$query = $this->db->delete('images');
			}
		}
	}
	
	public function getCategoryChilds($id){
		$newArray = array();
		array_push($newArray, $id);
		while(true){
			$this->db->where('categories_parent', $id);
			$query = $this->db->get('categories');
			if ($query->num_rows() == 0) break;
			$childArray = $query->result_array();
			foreach($childArray as $arr){
				array_push($newArray, $arr['categories_id']);
				$id = $arr['categories_id'];
			}
		}
		return $newArray;
	}
	
	public function deleteCategory($id){
		$newArray = $this->getCategoryChilds($id);
		foreach($newArray as $cat){
			$this->db->where('categories_id', $cat);
			$query = $this->db->get('categories');
			$array = $query->result_array();
			foreach($array as $arr){
				unlink(getenv('uploads').$arr['categories_icon']);
				$this->db->where('categories_id', $arr['categories_id']);
				$query = $this->db->delete('categories');
				$this->db->where('cat_parent', $arr['categories_id']);
				$query = $this->db->delete('categories_meta');
			}
		}
		return $newArray;
	}
	
	public function countPosts($type){
		if($type){
			$this->db->select('*');
			$this->db->from('posts');
			$this->db->where('posts_type', $type);
			return $this->db->get()->num_rows();
		}
		return '0';
	}
	
	public function getPostsData($slug){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('posts_slug', $slug);
		return $this->db->get()->row_array();
	}
	
	public function contactData($id = FALSE){
		$this->db->select('*');
		$this->db->from('contacts');
		$this->db->order_by('contacts_id', 'DESC');
		if($id){
			$this->db->where('contacts_id', $id);
			return $this->db->get()->row_array();
		}
		return $this->db->get()->result_array();
	}
	
	public function allUsers(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('users_id', 'DESC');
		return $this->db->get()->result_array();
	}
	
	public function allBlogs(){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('posts_type', 'blog');
		$this->db->order_by('posts_id', 'DESC');
		$this->db->join('users', 'posts_author = users_id', 'left');
		return $this->db->get()->result_array();
	}
	
	public function getCategoriesOfPosts(){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('posts_type', 'blog');
		$this->db->order_by('posts_id', 'DESC');
		$this->db->join('users', 'posts_author = users_id', 'left');
		return $this->db->get()->result_array();
	}

	public function uploadImage($file = 'userfile'){
	    
		if($_FILES[$file]['name']){
			$ext = new SplFileInfo($_FILES[$file]['name']);
			$ext = $ext->getExtension();
			if($file != 'userfile'){
    	    	$files = $_FILES;
    			$_FILES['userfile']['name'] = $files[$file]['name'];
    			$_FILES['userfile']['type'] = $files[$file]['type'];
    			$_FILES['userfile']['tmp_name'] = $files[$file]['tmp_name'];
    			$_FILES['userfile']['error'] = $files[$file]['error'];
    			$_FILES['userfile']['size'] = $files[$file]['size'];
			}
			$config['upload_path'] = getenv('uploads');
			$config['allowed_types'] = '*';
			$config['remove_spaces'] = TRUE;
			$filenameis = random_string('alnum', 25).'.'.$ext;
			$string = preg_replace('/\s+/', '', $filenameis);
			$config['file_name'] = $string;
			
			$this->upload->initialize($config);

			if(!$this->upload->do_upload()){
				$errors = array('error' => $this->upload->display_errors());
				return 'temp.png';
			} else {
				$data = array('upload_data' => $this->upload->data());
				return $string;
			}
		}else{
			return ($this->input->post('old') != ''?$this->input->post('old'):'temp.png');
		}
	}

	public function saveMeta($key, $value, $type = FALSE){
		$data = array(
			'metas_key' => $key,
			'metas_value' => $value,
			'metas_type' => $type,
		);
		$this->db->where('metas_key', $key);
		$query = $this->db->get('metas');
		if($query->num_rows() > 0){
			$id = $query->row(0)->metas_id;
			$this->db->where('metas_id', $id);
			$this->db->update('metas', $data);
		}else{
			$this->db->insert('metas', $data);
			return $this->db->insert_id();
		}
	}

	public function getMedia($id, $column = FALSE){
		$this->db->where('uploads_id', $id);
		$query = $this->db->get('uploads');
		if($query->num_rows() > 0){
			if($column){
				return $query->row(0)->uploads_ . $column;
			}else{
				return $query->row(0)->uploads_name;
			}
		}else{
			return '';
		}
	}

	public function dbMedia($img = FALSE, $id = FALSE, $file = FALSE){
		if($img){
			$data = array(
				'uploads_name' => $img,
				'uploads_slug' => $img,
				'uploads_user' => '',
				'uploads_text' => '',
				'uploads_post' => ''
			);
			if($id){
				$this->db->where('uploads_id', $id);
				$upload = $this->db->get('uploads');
				if($upload->num_rows() > 0){
					$file = $upload->row(0)->uploads_name;
					if(file_exists(getenv('uploads').$file)){
						unlink(getenv('uploads').$file);
					}
				}
				$this->db->where('uploads_id', $id);
				$this->db->update('uploads', $data);
			}elseif($file){
				$this->db->where('uploads_name', $file);
				$upload = $this->db->get('uploads');
				if($upload->num_rows() > 0){
					$file = $upload->row(0)->uploads_name;
					if(file_exists(getenv('uploads').$file)){
						unlink(getenv('uploads').$file);
					}
				}
				$this->db->where('uploads_name', $file);
				$this->db->update('uploads', $data);
				
				$this->db->where('uploads_name', $file);
				return $this->db->get('uploads')->row()->uploads_id;
			}else{
				$this->db->insert('uploads', $data);
				return $this->db->insert_id();
			}
		}else{
			return '0';
		}
	}
	
	public function savePostMeta($post, $key, $value){
		$data = array(
			'post_key' => $key,
			'post_value' => $value,
			'post_posts' => $post,
		);
		$this->db->where('post_key', $key);
		$this->db->where('post_posts', $post);
		$query = $this->db->get('post_metas');
		if($query->num_rows() > 0){
			$id = $query->row(0)->post_id;
			$this->db->where('post_id', $id);
			$this->db->update('post_metas', $data);
		}else{
			$this->db->insert('post_metas', $data);
			return $this->db->insert_id();
		}
	}
	
	public function getPostMeta($post, $key){
		$this->db->where('post_key', $key);
		$this->db->where('post_posts', $post);
		$query = $this->db->get('post_metas');
		if($query->num_rows() > 0){
			return $query->row(0)->post_value;
		}else{
			return '';
		}
	}
	
	public function saveCategoryMeta($id, $key, $value){
		$data = array(
			'cat_key' => $key,
			'cat_value' => $value,
			'cat_parent' => $id,
		);
		$this->db->where('cat_key', $key);
		$this->db->where('cat_parent', $id);
		$query = $this->db->get('categories_meta');
		if($query->num_rows() > 0){
			$id = $query->row(0)->cat_id;
			$this->db->where('cat_id', $id);
			$this->db->update('categories_meta', $data);
		}else{
			$this->db->insert('categories_meta', $data);
			return $this->db->insert_id();
		}
	}
	
	public function getCategoryMeta($id, $key){
		$this->db->where('cat_key', $key);
		$this->db->where('cat_parent', $id);
		$query = $this->db->get('categories_meta');
		if($query->num_rows() > 0){
			return $query->row(0)->cat_value;
		}else{
			return '';
		}
	}
	
	public function getCategoryName($id){
		$this->db->where('categories_id', $id);
		$query = $this->db->get('categories');
		if($query->num_rows() > 0){
			return $query->row()->categories_name;
		}else{
			return 'N/A';
		}
	}
	
	public function check_Email_Exist($email){
		$this->db->where('users_email', $email);
		$query = $this->db->get('users');
		return $query->row_array();
	}
	
	public function auth_Validation($array = []){
		if($this->uri->segment(1) != 'admin'){
			show_404();
		}
		$role = $this->session->userdata('user_role');
		if(!in_array($role, $array)){
			redirectF(getenv('admin').'/login', ['error', 'Unauthorized Access']);
		}
	}
	
	public function category($id){
		$this->db->where('categories_id', $id);
		return $this->db->get('categories')->row();
	}
	
	public function settings($key){
		$this->db->where('settings_key', $key);
		return $this->db->get('settings')->row()->settings_value;
	}
	
	public function getPlugin($name){
		// if(file_exists(FCPATH.'plugins/'.$name.'/'.$name.'.php')){
			// include(FCPATH.'plugins/'.$name.'/'.$name.'.php');
		// }
	}
	
	

}






