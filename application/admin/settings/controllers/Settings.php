<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MX_Controller {

	public function general(){
		auth([121]);
		$this->form_validation->set_rules('title', 'Site Title', 'required');
		$this->form_validation->set_rules('tagline', 'Tagline', 'required');
		$this->form_validation->set_rules('baseurl', 'Site URL', 'required');
		$this->form_validation->set_rules('email', 'Email Address', 'required');
		$this->form_validation->set_rules('timezone', 'Timezone', 'required');
		$this->form_validation->set_rules('date_format', 'Date Format', 'required');
		$this->form_validation->set_rules('time_format', 'Time Format', 'required');

		if ($this->form_validation->run() === FALSE){
			$data['title'] = 'General Settings';
			$data['page'] = $this->load->view('general', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->save_General_Setting();
			redirectF(getenv('admin').'/settings/general', ['success', 'General Setting Updated Successfully']);
		}
	}

	public function save_General_Setting(){
		auth([121]);
		update_ENV('title', $this->input->post('title'));
		update_ENV('tag', $this->input->post('tagline'));
		update_ENV('url', $this->input->post('baseurl'));
		update_ENV('email', $this->input->post('email'));
		update_ENV('TimeZone', $this->input->post('timezone'));
		update_ENV('DateFormat', $this->input->post('date_format'));
		update_ENV('TimeFormat', $this->input->post('time_format'));
	}

	public function email(){
		auth([121]);
		$this->form_validation->set_rules('server', 'Server', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('port', 'Port', 'required|is_numeric');
		$this->form_validation->set_rules('username', 'Username', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[1]');

		if ($this->form_validation->run() === FALSE){
			$data['title'] = 'Email Settings';
			$data['page'] = $this->load->view('email', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->save_Email_Setting();
			redirectF(getenv('admin').'/settings/email', ['success', 'Email Setting Updated Successfully']);
		}
	}

	public function save_Email_Setting(){
		auth([121]);
		update_ENV('MailServer', $this->input->post('server'));
		update_ENV('MailPort', $this->input->post('port'));
		update_ENV('MailUser', $this->input->post('username'));
		update_ENV('MailPassword', $this->input->post('password'));
		update_ENV('MailCrypto', $this->input->post('encryption'));
	}

	public function reading(){
		auth([121]);
		$this->form_validation->set_rules('post_per_page', 'Post Per Page', 'required|is_numeric');
		$this->form_validation->set_rules('auto_approve_comment', 'Auto Approve Comment', 'required');
		
		if ($this->form_validation->run() === FALSE){
			$data['title'] = 'Reading Settings';
			$data['page'] = $this->load->view('reading', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->save_Reading_Setting();
			redirectF(getenv('admin').'/settings/reading', ['success', 'Reading Setting Updated Successfully']);
		}
	}

	public function save_Reading_Setting(){
		auth([121]);
		update_ENV('PostPerPage', $this->input->post('post_per_page'));
		update_ENV('AutoApproveComment', $this->input->post('auto_approve_comment'));
	}

	public function captcha(){
		auth([121]);
		$this->form_validation->set_rules('captcha', 'Captcha', 'required');
		$this->form_validation->set_rules('site', 'Captcha Key', 'required');
		$this->form_validation->set_rules('secret', 'Captcha Secret', 'required');
		
		if ($this->form_validation->run() === FALSE){
			$data['title'] = 'reCAPTCHA Settings';
			$data['page'] = $this->load->view('captcha', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->save_Captcha_Setting();
			redirectF(getenv('admin').'/settings/captcha', ['success', 'Captcha Setting Updated Successfully']);
		}
	}

	public function save_Captcha_Setting(){
		auth([121]);
		update_ENV('Captcha', $this->input->post('captcha'));
		update_ENV('CaptchaKey', $this->input->post('site'));
		update_ENV('CaptchaSecret', $this->input->post('secret'));
	}

	public function media(){
		auth([121]);
		$this->form_validation->set_rules('i_height', 'Image Height', 'required|is_numeric');
		$this->form_validation->set_rules('i_width', 'Image Width', 'required|is_numeric');
		$this->form_validation->set_rules('t_height', 'Thumbnail Height', 'required|is_numeric');
		$this->form_validation->set_rules('t_width', 'Thumbnail Width', 'required|is_numeric');
		
		if ($this->form_validation->run() === FALSE){
			$data['title'] = 'Media Settings';
			$data['page'] = $this->load->view('media', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->save_Media_Setting();
			redirectF(getenv('admin').'/settings/media', ['success', 'Media Setting Updated Successfully']);
		}
	}

	public function save_Media_Setting(){
		auth([121]);
		update_ENV('ImageHeight', $this->input->post('i_height'));
		update_ENV('ImageWidth', $this->input->post('i_width'));
		update_ENV('ThumbnailHeight', $this->input->post('t_height'));
		update_ENV('ThumbnailWidth', $this->input->post('t_width'));
	}

	public function site_legal(){
		auth([121]);
		$this->form_validation->set_rules('terms', 'Terms and Conditions', 'max_length[10000]');
		$this->form_validation->set_rules('policies', 'Privacy and Policies', 'max_length[10000]');
		
		if ($this->form_validation->run() === FALSE){
			$data['title'] = 'Site Legal Information';
			$data['page'] = $this->load->view('site_legal', $data, true);
			echo modules::run('layouts/layouts/load', $data);
		} else {
			$this->save_Site_Legal();
			redirectF(getenv('admin').'/settings/site-legal', ['success', 'Site Legal Information Updated Successfully']);
		}
	}

	public function save_Site_Legal(){
		auth([121]);
		
	}
}




















