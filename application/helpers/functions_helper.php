<?php

	function _csrf(){
		$prc =& get_instance();
		return '<input type="hidden" name="'.$prc->security->get_csrf_token_name().'" value="'.$prc->security->get_csrf_hash().'">';
	}
	
	function adminMenu($array){
		// $menu = array(
			// 'url' => site_url('dashboard'),
			// 'text' => 'Dashboards',
			// 'icon' => 'icon-laptop_windows'
		// );
		// adminMenu($menu);
		$menu = '';
		$icon = (!empty($array['icon']))?'<span class="has-icon"><i class="'.$array['icon'].'"></i></span>':'';
		$text = $array['text'];
		if(isset($array['children']) && is_array($array['children'])){
			$menu.= '<li>';
			$menu.= '<a href="javascript:;" class="has-arrow" aria-expanded="false">';
			$menu.= $icon;
			$menu.= '<span class="nav-title">'.$text.'</span>';
			$menu.= '</a>';
			$menu.= '<ul aria-expanded="false">';
			foreach($array['children'] as $child){
				$menu.= '<li>';
				$menu.= '<a href="'.$child['url'].'">'.$child['text'].'</a>';
				$menu.= '</li>';
			}
			$menu.= '</ul>';
			$menu.= '</li>';
		}else{
			$select = (current_url() == $array['url'])?'selected':'';
			$active = (current_url() == $array['url'])?'current-page active':'';
			$menu.= '<li class="'.$select.'">';
			$menu.= '<a href="'.$array['url'].'" aria-expanded="false" class="'.$active.'">';
			$menu.= $icon;
			$menu.= '<span class="nav-title">'.$text.'</span>';
			$menu.= '</a>';
			$menu.= '</li>';
		}
		echo $menu;
	}
	
	function makeSlug($text, $id = FALSE){
		$prc =& get_instance();
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);
		$text = preg_replace('~[^-\w]+~', '', $text);
		$text = trim($text, '-');
		$text = preg_replace('~-+~', '-', $text);
		$text = strtolower($text);
		return $prc->Basic_model->checkSlugExist($text, $id);
	}
	
	function make_Category_Slug($text, $id = FALSE){
		$prc =& get_instance();
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);
		$text = preg_replace('~[^-\w]+~', '', $text);
		$text = trim($text, '-');
		$text = preg_replace('~-+~', '-', $text);
		$text = strtolower($text);
		return $prc->Basic_model->checkSlugExist($text, $id);
	}
	
	function now($format = 'Y-m-d H:i:s'){
		return date($format);
	}
	
	function redirectF($path, $array){
		$prc =& get_instance();
		$prc->session->set_flashdata($array[0], $array[1]);
		redirect($path);
	}

	function doUpload($name = 'userfile') {
		$prc =& get_instance();
		$image = $prc->Basic_model->uploadImage($name);
		return $image;
	}

	function saveMedia($key, $value, $type = FALSE) {
		$prc =& get_instance();
		return $prc->Basic_model->saveMedia($key, $value, $type);
	}

	function getMedia($id, $column = FALSE) {
		$prc =& get_instance();
		return $prc->Basic_model->getMedia($id, $column);
	}

	function savePostMeta($post, $key, $value) {
		$prc =& get_instance();
		return $prc->Basic_model->savePostMeta($post, $key, $value);
	}

	function getPostMeta($post, $key) {
		$prc =& get_instance();
		return $prc->Basic_model->getPostMeta($post, $key);
	}

	function saveCategoryMeta($cat, $key, $value) {
		$prc =& get_instance();
		return $prc->Basic_model->saveCategoryMeta($cat, $key, $value);
	}

	function getCategoryMeta($cat, $key) {
		$prc =& get_instance();
		return $prc->Basic_model->getCategoryMeta($cat, $key);
	}

	function getCategoryName($id) {
		$prc =& get_instance();
		return $prc->Basic_model->getCategoryName($id);
	}

	function HashPass($pass){
		$options = [
			'cost' => 12,
		];
		return password_hash($pass, PASSWORD_BCRYPT, $options);
	}

	function verifyPass($password, $hash){
		return password_verify($password, $hash);
	}

	function alert($type, $key){
		$prc =& get_instance();
		if($prc->session->flashdata($key)){
			return '<div class="alert alert-'.$type.' alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$prc->session->flashdata($key).'</div>';
		}
	}

	function admin_head($text){
		$prc =& get_instance();
		$prc->load->library('functions');
		$prc->functions->admin_head($text);
	}

	function admin_footer($text){
		$prc =& get_instance();
		$prc->load->library('functions');
		$prc->functions->admin_footer($text);
	}

	function add_head($text){
		$prc =& get_instance();
		$prc->load->library('functions');
		$prc->functions->add_to_head($text);
	}

	function add_footer($text){
		$prc =& get_instance();
		$prc->load->library('functions');
		$prc->functions->add_to_footer($text);
	}

	function get_admin_head(){
		$prc =& get_instance();
		$prc->load->library('functions');
		return "\n".$prc->functions->get_admin_head()."\n";
	}

	function get_admin_footer(){
		$prc =& get_instance();
		$prc->load->library('functions');
		return "\n".$prc->functions->get_admin_footer()."\n";
	}

	function get_add_head(){
		$prc =& get_instance();
		$prc->load->library('functions');
		return "\n".$prc->functions->get_head()."\n";
	}

	function get_add_footer(){
		$prc =& get_instance();
		$prc->load->library('functions');
		return "\n".$prc->functions->get_footer()."\n";
	}

	function update_ENV($key, $value){
		$path = FCPATH.'.env';
		if (file_exists($path)) {
			file_put_contents($path, str_replace(
				$key . '=' . getenv($key),
				$key . '=' . $value,
				file_get_contents($path)
			));
			file_put_contents($path, str_replace(
				$key . '="' . getenv($key).'"',
				$key . '="' . $value . '"',
				file_get_contents($path)
			));
		}
		return true;
	}
	
	function info($key){
		return getenv($key);
	}
	
	function theme($name, $data = [], $text = FALSE){
		$prc =& get_instance();
		return $prc->load->view(getenv('theme').'/'.$name, $data, $text);
		return $prc->cached->func('theme_'.$name, function() use ($prc, $name, $data, $text){
			return $prc->load->view(getenv('theme').'/'.$name, $data, $text);
		});
	}
	
	function asset($filename = ""){
		return base_url('themes/'.getenv('theme').'/assets/'.$filename);
	}
	
	function upload($filename = ""){
		return base_url(getenv('uploads').$filename);
	}
	
	function admin_url($uri = ""){
		return site_url(getenv('admin').'/'.$uri);
	}
	
	function auth($array = []){
		$prc =& get_instance();
		$prc->Basic_model->auth_Validation($array);
	}
	
	function iMail($to, $subject, $body){
		$prc =& get_instance();
		$result = $prc->email
			->from(getenv('MailUser'))
			->to($to)
			->subject($subject)
			->message($body)
			->send();
	}
	
	function partial($name, $data = FALSE){
		return theme('partials/'.$name, $data, true);
	}
	
	function set_Style($array){
		$prc =& get_instance();
		print_r($array);
		$prc->template->set_Style($array);
	}
	
	function get_Style(){
		$prc =& get_instance();
		$styles = $prc->template->get_Style();
		if($styles){
			foreach($styles as $style){
				echo "\n". $style;
			}
		}
	}
	
	function set_Script($array){
		$prc =& get_instance();
		$prc->template->set_Script($array);
	}
	
	function get_Script(){
		$prc =& get_instance();
		$scripts = $prc->template->get_Script();
		if($scripts){
			foreach($scripts as $script){
				echo "\n". $script;
			}
		}
	}
	
	function category($id){
		$prc =& get_instance();
		return $prc->Basic_model->category($id);
	}
	
	function settings($key){
		$prc =& get_instance();
		return $prc->Basic_model->settings($key);
	}
	
	function plugin($name){
		$prc =& get_instance();
		return $prc->Basic_model->getPlugin($name);
	}

	function price($num){
		return 'A$ '.$num;
	}

	function valid($num){
		$prc =& get_instance();
		if($prc->session->userdata('user_role') != $num){
			redirect();
		}
	}
	
	function getSubDirectories($dir){
		$folders = [];
		$scan = array_diff(scandir($dir), array('..', '.'));
		foreach($scan as $file) {
			if (is_dir("{$dir}/$file")) {
				$folders[] = $file;
			}
		}
		return $folders;
	}
	
	function deleteDir($dirPath) {
		if (! is_dir($dirPath)) {
			throw new InvalidArgumentException("$dirPath must be a directory");
		}
		if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
			$dirPath .= '/';
		}
		$files = glob($dirPath . '*', GLOB_MARK);
		foreach ($files as $file) {
			if (is_dir($file)) {
				deleteDir($file);
			} else {
				unlink($file);
			}
		}
		rmdir($dirPath);
	}

	function lang($key){
		$prc =& get_instance();
		return $prc->lang->line($key);
	}
	
	function sendSMS($phone)
	{
		$field = array(
			"sender_id" => "FSTSMS",
			"language" => "english",
			"route" => "qt",
			"numbers" => $phone,
			"message" => "14110",
			"variables" => "{#BB#}",
			"variables_values" => "123456"
		);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($field),
		CURLOPT_HTTPHEADER => array(
		"authorization: gPMJX4FCoZqRibVE00jYF3yeTys5WGrRcbEJUC8BhLaqOHgsUcGw54Q4F0fq",
		"cache-control: no-cache",
		"accept: */*",
		"content-type: application/json"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		echo "cURL Error #:" . $err;
		} else {
		echo $response;
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	