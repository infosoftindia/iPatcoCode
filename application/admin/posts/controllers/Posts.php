<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends MX_Controller {

	public function manage(){
		auth([121]);
		$this->load->model('Posts_model');
		$data['title'] = 'Manage Posts';
		$data['posts'] = $this->Posts_model->listing();
		$data['page'] = $this->load->view('manage', $data, true);
		echo modules::run('layouts/layouts/load', $data);
	}

	public function create(){
		auth([121]);
		$this->load->model('Posts_model');
		$this->form_validation->set_rules('title', 'Product Name', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('short_desc', 'Short Description', 'min_length[10]');
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[10]');

		if ($this->form_validation->run() === FALSE){
			$data['thumbnail'] = base_url(getenv('uploads').'temp.png');
			$data['categories'] = $this->Posts_model->get_Categories();
			$data['tags'] = $this->Posts_model->get_Tags();
			$data['title'] = 'New Post';
			$data['page'] = $this->load->view('create', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->save_new_post();
		}
	}

	public function edit($id){
		auth([121]);
		$this->load->model('Posts_model');
		$this->form_validation->set_rules('title', 'Product Name', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('short_desc', 'Short Description', 'min_length[10]');
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[10]');

		if ($this->form_validation->run() === FALSE){
			$data['title'] = 'Edit Post';
			$data['categories'] = $this->Posts_model->get_Categories();
			$data['tags'] = $this->Posts_model->get_Tags();
			$data['post'] = $this->Posts_model->get_Single($id);
			$data['thumbnail'] = base_url(getenv('uploads').$data['post']['posts_cover']);
			$data['page'] = $this->load->view('edit', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->edit_Post($id);
		}
	}

	public function save_new_post(){
		auth([121]);
		$image = doUpload();
		$slug = makeSlug($this->input->post('title'));
		$insert = $this->Posts_model->insert($image, $slug);
		redirectF(getenv('admin').'/posts/edit/'.$insert, ['msg', 'Post added successfully']);
	}

	public function edit_Post($id){
		auth([121]);
		$this->load->model('Posts_model');
		if($_FILES['userfile']['name']){
			$image = doUpload();
		}else{
			$image = $this->input->post('old_Picture');
		}
		
		$this->Posts_model->update($id, $image);
		redirectF(getenv('admin').'/posts/edit/'.$id, ['msg', 'Post modified successfully']);
	}

	public function delete($id){
		auth([121]);
		$this->load->model('Posts_model');
		$this->Posts_model->delete($id);
		redirectF($_SERVER['HTTP_REFERER'], ['msg', 'Post has been successfully deleted']);
	}

	public function categories(){
		auth([121]);
		$this->load->model('Posts_model');
		$this->form_validation->set_rules('name', 'Category Name', 'required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('parent', 'Short Description', 'is_numeric');
		$this->form_validation->set_rules('description', 'Description', 'min_length[5]');
		
		if ($this->form_validation->run() === FALSE){
			$data['thumbnail'] = base_url(getenv('uploads').'temp.png');
			$data['categories'] = $this->Posts_model->get_Categories();
			$data['title'] = 'Categories';
			$data['page'] = $this->load->view('categories', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->save_New_Category();
		}
	}

	public function categories_edit($id){
		auth([121]);
		$this->load->model('Posts_model');
		$data['category'] = $this->Posts_model->get_Categories($id);
		$data['categories'] = $this->Posts_model->get_Categories();
		$this->load->view('categories-edit', $data);
	}

	public function categories_update($id){
		auth([121]);
		$this->load->model('Posts_model');
		$slug = make_Category_Slug($this->input->post('name'), $id);
		$insert = $this->Posts_model->update_Category($id, $slug);
		saveCategoryMeta($id, '_description', $this->input->post('description'));
		redirectF(getenv('admin').'/posts/categories', ['msg', 'Category modified successfully']);
	}

	public function categories_delete($id){
		auth([121]);
		$insert = $this->Basic_model->deleteCategory($id);
		redirectF(getenv('admin').'/posts/categories', ['msg', 'Category has been successfully deleted']);
	}

	public function save_New_Category(){
		auth([121]);
		$this->load->model('Posts_model');
		$slug = make_Category_Slug($this->input->post('name'));
		$insert = $this->Posts_model->insert_Category($slug);
		saveCategoryMeta($insert, '_description', $this->input->post('description'));
		redirectF(getenv('admin').'/posts/categories', ['msg', 'Category added successfully']);
	}

	public function tags(){
		auth([121]);
		$this->load->model('Posts_model');
		$this->form_validation->set_rules('name', 'Tag', 'required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('description', 'Description', 'min_length[5]');
		
		if ($this->form_validation->run() === FALSE){
			$data['tags'] = $this->Posts_model->get_Tags();
			$data['title'] = 'Tags';
			$data['page'] = $this->load->view('tags', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->save_New_Tag();
		}
	}

	public function tags_edit($id){
		auth([121]);
		$this->load->model('Posts_model');
		$data['tag'] = $this->Posts_model->get_Tags($id);
		$this->load->view('tags-edit', $data);
	}

	public function tags_update($id){
		auth([121]);
		$this->load->model('Posts_model');
		$insert = $this->Posts_model->update_Tag($id);
		// redirect('posts/tags');
		redirectF(getenv('admin').'/posts/tags', ['msg', 'Tag modified successfully']);
	}

	public function tags_delete($id){
		auth([121]);
		$this->load->model('Posts_model');
		$insert = $this->Posts_model->delete_Tag($id);
		// redirect('posts/tags');
		redirectF(getenv('admin').'/posts/tags', ['msg', 'Tag has been successfully deleted']);
	}

	public function save_New_Tag(){
		auth([121]);
		$this->load->model('Posts_model');
		$insert = $this->Posts_model->insert_Tag();
		// redirect(getenv('admin').'/posts/tags');
		redirectF(getenv('admin').'/posts/tags', ['msg', 'Tag added successfully']);
	}
}




















