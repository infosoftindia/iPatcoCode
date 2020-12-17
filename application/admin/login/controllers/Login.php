<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

	public function index(){
		$data['title'] = 'Login to Admin Panel';
		$data['css'] = modules::run('layouts/layouts/css');
		$data['sidebar'] = $this->load->view('sidebar', false, true);
		$data['pagetitle'] = $this->load->view('page-title', false, true);
		$data['js'] = modules::run('layouts/layouts/js');
		$data['header'] = $this->cached->text('auth.header', $this->load->view('header', $data, true));
		$data['footer'] = $this->cached->text('auth.footer', $this->load->view('footer', $data, true));
		$this->load->view('index', $data);
	}

	public function login_script(){
		$this->load->model('Admin_model');
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		if(!empty($email) && !empty($password)){
			// Get Admin Info by Email Address
			$uEmail = $this->Admin_model->admin_Email($email);
			if(!empty($uEmail)){
				$hash = $uEmail->users_password;
				if(verifyPass($password, $hash)){
					$this->session->set_userdata([
						'user_id' => $uEmail->users_id,
						'user_fname' => $uEmail->users_first_name,
						'user_lname' => $uEmail->users_last_name,
						'user_name' => $uEmail->users_first_name.' '.$uEmail->users_last_name,
						'user_email' => $uEmail->users_email,
						'user_mobile' => $uEmail->users_mobile,
						'user_role' => $uEmail->users_role,
						'user_in' => 1
					]);
					redirectF(getenv('admin').'/dashboard', ['success', 'Login Successful. Welcome to Admin Panel']);
				}else{
					redirectF(getenv('admin').'/login', ['error', 'Wrong Password!']);
				}
			}else{
				redirectF(getenv('admin').'/login', ['error', 'Looks like admin not found!']);
			}
		}else{
			redirectF(getenv('admin').'/login', ['error', 'Email and Password are required!']);
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect();
	}

	public function profile(){
		auth([121]);
		$this->load->model("Admin_model");
		$data["title"] = "Profile";
		$data['profile'] = $this->Admin_model->get_My_Profile();
		$data["page"] = $this->load->view("profile", $data, true);
		echo modules::run("layouts/layouts/load", $data);
	}

	public function user_login_script($id = FALSE){
		$this->load->model('Admin_model');
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if($id){
			$uEmail = $this->Admin_model->get_User_data($id);
			$this->session->set_userdata([
				'user_id' => $uEmail->users_id,
				'user_fname' => $uEmail->users_first_name,
				'user_lname' => $uEmail->users_last_name,
				'user_name' => $uEmail->users_first_name.' '.$uEmail->users_last_name,
				'user_email' => $uEmail->users_email,
				'user_mobile' => $uEmail->users_mobile,
				'user_role' => $uEmail->users_role,
				'user_in' => 1
			]);
		}
		
		if(!empty($email) && !empty($password)){
			// Get User Info by Email Address
			$uEmail = $this->Admin_model->user_Email($email);
			if(!empty($uEmail)){
				$hash = $uEmail->users_password;
				if(verifyPass($password, $hash)){
					$this->session->set_userdata([
						'user_id' => $uEmail->users_id,
						'user_fname' => $uEmail->users_first_name,
						'user_lname' => $uEmail->users_last_name,
						'user_name' => $uEmail->users_first_name.' '.$uEmail->users_last_name,
						'user_email' => $uEmail->users_email,
						'user_mobile' => $uEmail->users_mobile,
						'user_role' => $uEmail->users_role,
						'user_in' => 1
					]);
					redirectF($this->input->get('redirect'), ['success', 'Welcome to '.getenv('title')]);
				}else{
					redirectF($_SERVER['HTTP_REFERER'], ['error', 'Wrong Password!']);
				}
			}else{
				redirectF($_SERVER['HTTP_REFERER'], ['error', 'Looks like user not found!']);
			}
		}else{
			redirectF($_SERVER['HTTP_REFERER'], ['error', 'Email and Password are required!']);
		}
	}

	public function user_register_script(){
		$this->load->model('Admin_model');
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'min_length[1]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.users_email]|valid_email',
		array(
			'is_unique'     => 'This Email is already registered.'
		));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('phone', 'Phone', 'min_length[10]|is_numeric');
		
		if ($this->form_validation->run() === FALSE){
			$array = [
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
			];
			$this->session->set_flashdata($array);
			//////////////////////////////////////////////////////////////////////////////
			redirectF($_SERVER['HTTP_REFERER'], ['msg', validation_errors()]);
			//////////////////////////////////////////////////////////////////////////////
		}else{
			$user = $this->Admin_model->save_New_User();
			$this->user_login_script($user);
			redirectF('', ['msg', 'User Registered Successfully']);
		}
	}

	public function vendor_register_script(){
		$this->load->model('Admin_model');
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'min_length[1]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.users_email]|valid_email',
		array(
			'is_unique'     => 'This Email is already registered.'
		));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('phone', 'Phone', 'min_length[10]|is_numeric');
		
		if ($this->form_validation->run() === FALSE){
			$array = [
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
			];
			$this->session->set_flashdata($array);
			//////////////////////////////////////////////////////////////////////////////
			redirectF($_SERVER['HTTP_REFERER'], ['msg', validation_errors()]);
			//////////////////////////////////////////////////////////////////////////////
		}else{
			$user = $this->Admin_model->save_New_Vendor();
			$this->user_login_script($user);
			redirectF('', ['msg', 'Vendor Registered Successfully']);
		}
	}

	public function forgot_password_script(){
		$this->load->model('Admin_model');
		
		$email = $this->input->post('email');
		$uEmail = $this->Admin_model->user_Email($email);
		if($uEmail){
			$token = $uEmail->users_password;
			$data['link'] = site_url('reset-password/?token='.$token);
			$page = $this->load->view('forgot-password', $data);
			addMailQueue($email, getenv('title').' Password Reset', $page);
		}
		redirectF($_SERVER['HTTP_REFERER'], ['success', 'Password Reset link is sent to your email address']);
	}

	public function reset_password(){
		$this->load->model('Admin_model');
		$password = $this->input->post('password');
		$token = $this->input->get('token');
		$user = $this->Admin_model->get_User_By_Token($token);
		if($user){
			$uEmail = $this->Admin_model->change_Password_Id($user, $token, $password);
			redirect('login');
		}
	}

	public function is_email_exist(){
		$this->load->model('Admin_model');
		$email = $this->input->post('email');
		$uEmail = $this->Admin_model->check_Email($email);
		if(!$uEmail){
			die('1');
		}
		die('0');
	}

	public function update_profile(){
		auth([121]);
		$this->load->model('Admin_model');

		$update = $this->Admin_model->update_Profile();
		if($update){
			redirectF($_SERVER['HTTP_REFERER'], ['success', 'Successfully updated your profile']);
		}else{
			redirectF($_SERVER['HTTP_REFERER'], ['error', 'Something went wrong while updating your profile']);
		}
	}

	public function change_password(){
		auth([121]);
		$this->load->helper('security');
		$this->load->model('Admin_model');

		$this->form_validation->set_rules('old_Password', 'Old Password', 'required|callback_check_old_password');
		$this->form_validation->set_rules('new_Password', 'New Password', 'required|min_length[8]');
		$this->form_validation->set_rules('confirm_Password', 'Confirm Password', 'required|matches[password]');
			
		if ($this->form_validation->run($this) === FALSE){
			$this->profile();
		}else{
			$update = $this->Admin_model->change_Password();
			if($update){
				redirect($_SERVER['HTTP_REFERER'], ['success', 'Successfully updated your password']);
			}else{
				redirect($_SERVER['HTTP_REFERER'], ['error', 'Something went wrong while updating your password']);
			}
		}
	}
	
	public function check_old_password($password){
		$this->db->where('users_id', $this->session->userdata('user_id'));
		$user_Password = $this->db->get('users')->row()->users_password;
		if(verifyPass($password, $user_Password)){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_old_password', 'Your current password is invalid.');
			return FALSE;
		}
	}
	
	public function callback($social){
		if($social == 'google'){
			$id = $this->input->post('id');
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$check = $this->checkUserSocial($id);
			if($check){
				$this->db->where('users_email', $email);
				$this->db->where('users_password', $id);
				$id = $this->db->get('users')->row()->users_id;
				$this->user_login_script($id);
			}else{
				// Register
				$this->db->insert('users', [
					'users_email'		=> $email,
					'users_password'	=> $id,
					'users_first_name'	=> $name,
					'users_last_name'	=> NULL,
					'users_mobile'		=> NULL,
					'users_role'		=> '1',
					'users_created' => now()
				]);
				$id = $this->db->insert_id();
				$this->user_login_script($id);
			}
		}
		
		if($social == 'facebook'){
			$this->load->library('facebook');
			$userData = array(); 
			if($this->facebook->is_authenticated()){
				$fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 
				$userData['oauth_provider'] = 'facebook'; 
				$userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';; 
				$userData['first_name']    = !empty($fbUser['first_name'])?$fbUser['first_name']:''; 
				$userData['last_name']    = !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
				$userData['email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
				$userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:''; 
				$userData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
				$userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 
				$userID = $this->checkUserSocial($fbUser['id']); 
				$this->session->set_userdata('loginwith', 'facebook');
				if($userID){
					$this->db->where('users_email', $userData['email']);
					$this->db->where('users_password', $userData['oauth_uid']);
					$id = $this->db->get('users')->row()->users_id;
					$this->user_login_script($id);
				}else{
					$user_data = array(
						'users_first_name' => $userData['first_name'],
						'users_last_name' => $userData['last_name'],
						'users_email' => $userData['email'],
						'users_password' => $userData['oauth_uid'],
						'users_mobile' => ''	,		
						'users_role' => '1',
						'users_status' => '1',
						'users_created' => now()
					);
					$this->db->insert('users', $user_data);
					$id = $this->db->insert_id();
					$this->user_login_script($id);
				}
			}
		}
	}
	
	public function checkUserSocial($id){
		$this->db->where('users_password', $id);
		return $this->db->get('users')->num_rows();
	}
}
// modules::run('module/controller/method', $params, $...);