<?php
	class Install_model extends CI_Model{
		
		public function save_Database_Config(){
			update_ENV('DbHost', $this->input->post('hostname'));
			update_ENV('DbName', $this->input->post('database'));
			update_ENV('DbUser', $this->input->post('username'));
			update_ENV('DbPass', $this->input->post('password'));
		}
		
		public function save_Site_Config(){
			$this->load->database();
			update_ENV('title', $this->input->post('title'));
			update_ENV('tag', $this->input->post('tag'));
			if ($this->db->query('CREATE DATABASE IF NOT EXISTS '.getenv('DbName'))){
				$this->table_Address();
				$this->table_Blogs();
				$this->table_Categories();
				$this->table_Categories_Meta();
				$this->table_Comments();
				$this->table_Contacts();
				$this->table_Pages();
				$this->table_Posts();
				$this->table_Post_Category();
				$this->table_Post_Metas();
				$this->table_Seo();
				$this->table_Settings();
				$this->table_Uploads();
				$this->table_Users();
				$this->table_User_Metas();
			}
		}

		public function save_Admin(){
			$this->db->insert('users', [
				'users_first_name' => $this->input->post('fname'),
				'users_last_name' => $this->input->post('lname'),
				'users_email' => $this->input->post('email'),
				'users_password' => HashPass($this->input->post('password')),
				'users_mobile' => $this->input->post('phone'),
				'users_role' => 121,
				'users_status' => 1,
				'users_created' => now(),
			]);
		}

		public function table_Address(){
			$table = 'address';
			$fields = array(
				'address_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'address_line1' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'null' => TRUE,
				),
				'address_line2' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'null' => TRUE,
				),
				'address_line3' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'null' => TRUE,
				),
				'address_line4' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'null' => TRUE,
				),
				'address_line5' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'null' => TRUE,
				),
				'address_line6' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'null' => TRUE,
				),
				'address_line7' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'null' => TRUE,
				),
				'address_line8' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'null' => TRUE,
				),
				'address_line9' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'null' => TRUE,
				),
			);
			$this->load->dbforge();
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key("{$table}_id", TRUE);
			if(!$this->db->table_exists($table)){
				$this->dbforge->create_table($table, TRUE);
				$this->db->query("ALTER TABLE {$table} ADD {$table}_created VARCHAR(25) NOT NULL");
				$this->db->query("ALTER TABLE {$table} ADD {$table}_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
			}
		}

		public function table_Blogs(){
			$table = 'blogs';
			$fields = array(
				'blogs_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'blogs_post' => array(
					'type' => 'INT',
					'constraint' => '11',
					'unique' => TRUE,
				),
				'blogs_excert' => array(
					'type' => 'TEXT',
					'null' => TRUE,
				),
				'blogs_description' => array(
					'type' => 'LONGTEXT',
				),
				'blogs_tags' => array(
					'type' => 'TEXT',
					'null' => TRUE,
				),
				'blogs_feature' => array(
					'type' => 'INT',
					'constraint' => 11,
				),
			);
			$this->load->dbforge();
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key("{$table}_id", TRUE);
			if(!$this->db->table_exists($table)){
				$this->dbforge->create_table($table, TRUE);
			}
		}

		public function table_Categories(){
			$table = 'categories';
			$fields = array(
				'categories_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'categories_name' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'categories_slug' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
				),
				'categories_icon' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'null' => TRUE,
				),
				'categories_type' => array(
					'type' => 'VARCHAR',
					'constraint' => '50',
				),
				'categories_parent' => array(
					'type' => 'INT',
					'constraint' => 11,
					'default' => 0,
				),
				'categories_status' => array(
					'type' => 'INT',
					'constraint' => 11,
					'default' => 0,
				),
			);
			$this->load->dbforge();
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key("{$table}_id", TRUE);
			if(!$this->db->table_exists($table)){
				$this->dbforge->create_table($table, TRUE);
				$this->db->query("ALTER TABLE {$table} ADD {$table}_created VARCHAR(25) NOT NULL");
				$this->db->query("ALTER TABLE {$table} ADD {$table}_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
			}
		}

		public function table_Categories_Meta(){
			$table = 'categories_meta';
			$fields = array(
				'cat_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'cat_parent' => array(
					'type' => 'INT',
					'constraint' => 11,
				),
				'cat_key' => array(
					'type' => 'TEXT',
					'null' => TRUE,
				),
				'cat_value' => array(
					'type' => 'TEXT',
					'null' => TRUE,
				),
				'cat_meta' => array(
					'type' => 'TEXT',
					'null' => TRUE,
				),
			);
			$this->load->dbforge();
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key("cat_id", TRUE);
			if(!$this->db->table_exists($table)){
				$this->dbforge->create_table($table, TRUE);
			}
		}

		public function table_Comments(){
			$table = 'comments';
			$fields = array(
				'comments_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'comments_post' => array(
					'type' => 'INT',
					'constraint' => 11,
				),
				'comments_reply' => array(
					'type' => 'INT',
					'constraint' => 11,
					'default' => 0,
				),
				'comments_user' => array(
					'type' => 'INT',
					'constraint' => 11,
				),
				'comments_name' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'comments_email' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'comments_url' => array(
					'type' => 'VARCHAR',
					'constraint' => '255',
				),
				'comments_message' => array(
					'type' => 'TEXT',
				),
				'comments_status' => array(
					'type' => 'INT',
					'constraint' => 11,
					'default' => 0,
				),
			);
			$this->load->dbforge();
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key("{$table}_id", TRUE);
			if(!$this->db->table_exists($table)){
				$this->dbforge->create_table($table, TRUE);
				$this->db->query("ALTER TABLE {$table} ADD {$table}_created VARCHAR(25) NOT NULL");
				$this->db->query("ALTER TABLE {$table} ADD {$table}_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
			}
		}

		public function table_Contacts(){
			$table = 'contacts';
			$fields = array(
				'contacts_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'contacts_name' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'contacts_email' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'contacts_phone' => array(
					'type' => 'VARCHAR',
					'constraint' => '20',
					'null' => TRUE,
				),
				'contacts_message' => array(
					'type' => 'LONGTEXT',
					'null' => TRUE,
				),
				'contacts_opt1' => array(
					'type' => 'TEXT',
					'null' => TRUE,
				),
				'contacts_opt2' => array(
					'type' => 'TEXT',
					'null' => TRUE,
				),
				'contacts_status' => array(
					'type' => 'INT',
					'constraint' => 11,
					'default' => 0,
				),
			);
			$this->load->dbforge();
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key("{$table}_id", TRUE);
			if(!$this->db->table_exists($table)){
				$this->dbforge->create_table($table, TRUE);
				$this->db->query("ALTER TABLE {$table} ADD {$table}_created VARCHAR(25) NOT NULL");
				$this->db->query("ALTER TABLE {$table} ADD {$table}_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
			}
		}

		public function table_Pages(){
			$table = 'pages';
			$fields = array(
				'pages_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'pages_post' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unique' => TRUE,
				),
				'pages_description' => array(
					'type' => 'LONGTEXT',
				),
			);
			$this->load->dbforge();
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key("{$table}_id", TRUE);
			if(!$this->db->table_exists($table)){
				$this->dbforge->create_table($table, TRUE);
			}
		}

		public function table_Posts(){
			$table = 'posts';
			$fields = array(
				'posts_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'posts_title' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'posts_slug' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
				),
				'posts_author' => array(
					'type' => 'INT',
					'constraint' => 11,
				),
				'posts_cover' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'posts_type' => array(
					'type' => 'VARCHAR',
					'constraint' => 50,
				),
				'posts_address' => array(
					'type' => 'INT',
					'constraint' => 11,
					'default' => 0,
				),
				'posts_status' => array(
					'type' => 'INT',
					'constraint' => 11,
					'default' => 0,
				),
			);
			$this->load->dbforge();
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key("{$table}_id", TRUE);
			if(!$this->db->table_exists($table)){
				$this->dbforge->create_table($table, TRUE);
				$this->db->query("ALTER TABLE {$table} ADD {$table}_created VARCHAR(25) NOT NULL");
				$this->db->query("ALTER TABLE {$table} ADD {$table}_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
			}
		}

		public function table_Post_Category(){
			$table = 'post_category';
			$fields = array(
				'post_category_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'post_category_post' => array(
					'type' => 'INT',
					'constraint' => 11,
				),
				'post_category_category' => array(
					'type' => 'INT',
					'constraint' => 11,
				),
			);
			$this->load->dbforge();
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key("{$table}_id", TRUE);
			if(!$this->db->table_exists($table)){
				$this->dbforge->create_table($table, TRUE);
			}
		}

		public function table_Post_Metas(){
			$table = 'post_metas';
			$fields = array(
				'post_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'post_posts' => array(
					'type' => 'INT',
					'constraint' => 11,
				),
				'post_key' => array(
					'type' => 'TEXT',
					'null' => TRUE,
				),
				'post_value' => array(
					'type' => 'LONGTEXT',
					'null' => TRUE,
				),
				'post_meta' => array(
					'type' => 'TEXT',
					'null' => TRUE,
				),
			);
			$this->load->dbforge();
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key("post_id", TRUE);
			if(!$this->db->table_exists($table)){
				$this->dbforge->create_table($table, TRUE);
			}
		}

		public function table_Seo(){
			$table = 'seo';
			$fields = array(
				'seo_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'seo_post' => array(
					'type' => 'INT',
					'constraint' => 11,
				),
				'seo_keyword' => array(
					'type' => 'TEXT',
				),
				'seo_description' => array(
					'type' => 'TEXT',
				),
			);
			$this->load->dbforge();
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key("{$table}_id", TRUE);
			if(!$this->db->table_exists($table)){
				$this->dbforge->create_table($table, TRUE);
				$this->db->query("ALTER TABLE {$table} ADD {$table}_created TEXT(25) NOT NULL");
				$this->db->query("ALTER TABLE {$table} ADD {$table}_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
			}
		}

		public function table_Settings(){
			$table = 'settings';
			$fields = array(
				'settings_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'settings_key' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
				),
				'settings_value' => array(
					'type' => 'TEXT',
				),
			);
			$this->load->dbforge();
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key("{$table}_id", TRUE);
			if(!$this->db->table_exists($table)){
				$this->dbforge->create_table($table, TRUE);
				$this->db->query("ALTER TABLE {$table} ADD {$table}_created VARCHAR(25) NOT NULL");
				$this->db->query("ALTER TABLE {$table} ADD {$table}_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
			}
		}

		public function table_Uploads(){
			$table = 'uploads';
			$fields = array(
				'uploads_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'uploads_name' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'uploads_slug' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
				),
				'uploads_user' => array(
					'type' => 'INT',
					'constraint' => 11,
					'default' => 0,
				),
				'uploads_text' => array(
					'type' => 'VARCHAR',
					'constraint' => '50',
					'null' => TRUE,
				),
				'uploads_post' => array(
					'type' => 'INT',
					'constraint' => 11,
					'default' => 0,
				),
			);
			$this->load->dbforge();
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key("{$table}_id", TRUE);
			if(!$this->db->table_exists($table)){
				$this->dbforge->create_table($table, TRUE);
				$this->db->query("ALTER TABLE {$table} ADD {$table}_created VARCHAR(25) NOT NULL");
				$this->db->query("ALTER TABLE {$table} ADD {$table}_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
			}
		}

		public function table_Users(){
			$table = 'users';
			$fields = array(
				'users_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'users_first_name' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
				),
				'users_last_name' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'null' => TRUE,
				),
				'users_email' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
				),
				'users_password' => array(
					'type' => 'VARCHAR',
					'constraint' => '255',
				),
				'users_mobile' => array(
					'type' => 'VARCHAR',
					'constraint' => '20',
					'null' => TRUE,
					'unique' => TRUE,
				),
				'users_address' => array(
					'type' => 'INT',
					'constraint' => 11,
					'default' => 0,
				),
				'users_role' => array(
					'type' => 'INT',
					'constraint' => 11,
					'default' => 0,
				),
				'users_status' => array(
					'type' => 'INT',
					'constraint' => 11,
					'default' => 0,
				),
			);
			$this->load->dbforge();
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key("{$table}_id", TRUE);
			if(!$this->db->table_exists($table)){
				$this->dbforge->create_table($table, TRUE);
				$this->db->query("ALTER TABLE {$table} ADD {$table}_created VARCHAR(25) NOT NULL");
				$this->db->query("ALTER TABLE {$table} ADD {$table}_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
			}
		}

		public function table_User_Metas(){
			$table = 'user_metas';
			$fields = array(
				'user_id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'user_users' => array(
					'type' => 'INT',
					'constraint' => 11,
				),
				'user_key' => array(
					'type' => 'TEXT',
					'null' => TRUE,
				),
				'user_value' => array(
					'type' => 'TEXT',
					'null' => TRUE,
				),
				'user_meta' => array(
					'type' => 'TEXT',
					'null' => TRUE,
				),
			);
			$this->load->dbforge();
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key("user_id", TRUE);
			if(!$this->db->table_exists($table)){
				$this->dbforge->create_table($table, TRUE);
			}
		}
	}