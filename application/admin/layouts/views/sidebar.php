

				<!-- BEGIN .app-side -->
				<aside class="app-side" id="app-side">
					<!-- BEGIN .side-content -->
					<div class="side-content ">
						<!-- BEGIN .user-profile -->
						<div class="user-profile">
							<a href="" class="logo">
								<img src="<?=base_url()?>assets/img/unify.png" alt="Unify Admin Dashboard" />
							</a>
							<h6 class="location-name">San Francisco</h6>
							<ul class="profile-actions">
								<li>
									<a href="#">
										<i class="icon-social-skype"></i>
										<span class="count-label yellow"></span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="count-label green"></span>
										<i class="icon-drafts"></i>
									</a>
								</li>
								<li>
									<a href="login.html">
										<i class="icon-export"></i>
									</a>
								</li>
							</ul>
						</div>
						<!-- END .user-profile -->
						<!-- BEGIN .side-nav -->
						<nav class="side-nav">
							<!-- BEGIN: side-nav-content -->
							<ul class="unifyMenu" id="unifyMenu">
								<li class="<?=(current_url() == admin_url('dashboard'))?'selected':''?>">
									<a href="<?=admin_url('dashboard')?>" aria-expanded="false" class="<?=(current_url() == admin_url('dashboard'))?'current-page active':''?>">
										<span class="has-icon">
											<i class="icon-laptop_windows"></i>
										</span>
										<span class="nav-title">Dashboards</span>
									</a>
								</li>
								<li>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-file-text"></i>
										</span>
										<span class="nav-title">Pages</span>
									</a>
									<ul aria-expanded="false" class="greenBg">
										<li>
											<a href="<?=admin_url('pages/manage')?>">Manage Pages</a>
										</li>
										<li>
											<a href="<?=admin_url('pages/create')?>">Add New</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-file-text2"></i>
										</span>
										<span class="nav-title">Posts</span>
									</a>
									<ul aria-expanded="false" class="greenBg">
										<li>
											<a href="<?=admin_url('posts/manage')?>">Manage Posts</a>
										</li>
										<li>
											<a href="<?=admin_url('posts/create')?>">Add New</a>
										</li>
										<li>
											<a href="<?=admin_url('posts/categories')?>">Categories</a>
										</li>
										<li>
											<a href="<?=admin_url('posts/tags')?>">Tags</a>
										</li>
									</ul>
								</li>
								
								<li class="<?=(current_url() == admin_url('filemanager'))?'selected':''?>">
									<a href="<?=admin_url('filemanager')?>" aria-expanded="false" class="<?=(current_url() == admin_url('filemanager'))?'current-page active':''?>">
										<span class="has-icon">
											<i class="icon-copy"></i>
										</span>
										<span class="nav-title">File Manager</span>
									</a>
								</li>
								<li class="<?=(current_url() == admin_url('comments'))?'selected':''?>">
									<a href="<?=admin_url('comments')?>" aria-expanded="false" class="<?=(current_url() == admin_url('comments'))?'current-page active':''?>">
										<span class="has-icon">
											<i class="icon-bubble"></i>
										</span>
										<span class="nav-title">Comments</span>
									</a>
								</li>
								<li>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-paint-format"></i>
										</span>
										<span class="nav-title">Appearance</span>
									</a>
									<ul aria-expanded="false" class="greenBg">
										<li>
											<a href="<?=admin_url('appearance/themes')?>">Themes</a>
										</li>
										<li>
											<a href="<?=admin_url('appearance/customizer')?>">Customizer</a>
										</li>
										<li>
											<a href="<?=admin_url('appearance/widgets')?>">Widgets</a>
										</li>
										<li>
											<a href="<?=admin_url('appearance/menus')?>">Menus</a>
										</li>
										<li>
											<a href="<?=admin_url('appearance/theme_editor')?>">Theme Editor</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-power-cord"></i>
										</span>
										<span class="nav-title">Plugins</span>
									</a>
									<ul aria-expanded="false" class="greenBg">
										<li>
											<a href="<?=admin_url('plugins/manage')?>">Installed Plugins</a>
										</li>
										<li>
											<a href="<?=admin_url('plugins/new')?>">Add New</a>
										</li>
									</ul>
								</li>
								
								<li>
									<a href="<?=admin_url('contacts/manage')?>">
										<span class="has-icon">
											<i class="icon-pencil3"></i>
										</span>
										<span class="nav-title">Cantact Data</span>
									</a>
								</li>
								
								<li>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-users"></i>
										</span>
										<span class="nav-title">Users</span>
									</a>
									<ul aria-expanded="false" class="greenBg">
										<li>
											<a href="<?=admin_url('users/manage')?>">Manage Users</a>
										</li>
										<li>
											<a href="<?=admin_url('users/create')?>">Add New</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-wrench"></i>
										</span>
										<span class="nav-title">Tools</span>
									</a>
									<ul aria-expanded="false" class="greenBg">
										<li>
											<a href="<?=admin_url('tools/backup')?>">BackUp</a>
										</li>
										<li>
											<a href="<?=admin_url('tools/seo')?>">SEO</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-cog"></i>
										</span>
										<span class="nav-title">Settings</span>
									</a>
									<ul aria-expanded="false" class="greenBg">
										<li>
											<a href="<?=admin_url('settings/general')?>">General</a>
										</li>
										<li>
											<a href="<?=admin_url('settings/email')?>">Email</a>
										</li>
										<li>
											<a href="<?=admin_url('settings/reading')?>">Reading</a>
										</li>
										<li>
											<a href="<?=admin_url('settings/captcha')?>">Captcha</a>
										</li>
										<li>
											<a href="<?=admin_url('settings/media')?>">Media</a>
										</li>
										<li>
											<a href="<?=admin_url('settings/site-legal')?>">Site Legals</a>
										</li>
									</ul>
								</li>
							</ul>
							<!-- END: side-nav-content -->
						</nav>
						<!-- END: .side-nav -->
					</div>
					<!-- END: .side-content -->
				</aside>
				<!-- END: .app-side -->
