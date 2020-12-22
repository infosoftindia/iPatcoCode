<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$admin = getenv('admin').'/';


$route[$admin.'dashboard'] = 'dashboard';

$route[$admin.'pages/manage'] = 'pages/manage';
$route[$admin.'pages/create'] = 'pages/create';
$route[$admin.'pages/edit/(:num)'] = 'pages/edit/$1';
$route[$admin.'pages/delete/(:num)'] = 'pages/delete/$1';

$route[$admin.'posts/manage'] = 'posts/manage';
$route[$admin.'posts/create'] = 'posts/create';
$route[$admin.'posts/edit/(:num)'] = 'posts/edit/$1';
$route[$admin.'posts/delete/(:num)'] = 'posts/delete/$1';
$route[$admin.'posts/categories'] = 'posts/categories';
$route[$admin.'posts/categories/edit/(:num)'] = 'posts/categories_edit/$1';
$route[$admin.'posts/categories/update/(:num)'] = 'posts/categories_update/$1';
$route[$admin.'posts/categories/delete/(:num)'] = 'posts/categories_delete/$1';
$route[$admin.'posts/tags'] = 'posts/tags';
$route[$admin.'posts/tags/edit/(:num)'] = 'posts/tags_edit/$1';
$route[$admin.'posts/tags/update/(:num)'] = 'posts/tags_update/$1';
$route[$admin.'posts/tags/delete/(:num)'] = 'posts/tags_delete/$1';

$route[$admin.'file-manager'] = 'filemanager';

$route[$admin.'comments'] = 'comments';
$route[$admin.'comments/approve/(:num)'] = 'comments/approve/$1';
$route[$admin.'comments/edit/(:num)'] = 'comments/edit/$1';
$route[$admin.'comments/delete/(:num)'] = 'comments/delete/$1';
$route[$admin.'comments/save_reply/(:num)'] = 'comments/save_reply/$1';
$route[$admin.'comments/reply/(:num)'] = 'comments/reply/$1';

$route[$admin.'plugins/manage'] = 'plugins/manage';
$route[$admin.'plugins/delete/(:any)'] = 'plugins/delete/$1';
$route[$admin.'plugins/new'] = 'plugins/new';

$route[$admin.'users/create'] = 'users/create';
$route[$admin.'users/manage'] = 'users/manage';
$route[$admin.'users/edit/(:num)'] = 'users/edit/$1';

$route[$admin.'tools/backup'] = 'tools/backup';
$route[$admin.'tools/backup-table']['post'] = 'tools/exportTable';
$route[$admin.'tools/backup-database']['post'] = 'tools/exportDatabase';
$route[$admin.'tools/seo'] = 'tools/seo';

$route[$admin.'settings/general'] = 'settings/general';
$route[$admin.'settings/email'] = 'settings/email';
$route[$admin.'settings/reading'] = 'settings/reading';
$route[$admin.'settings/captcha'] = 'settings/captcha';
$route[$admin.'settings/media'] = 'settings/media';
$route[$admin.'settings/site-legal'] = 'settings/site_legal';

$route[$admin.'login'] = 'login';
$route[$admin.'login.php'] = 'login/login_script';
$route[$admin.'logout.php'] = 'login/logout';
$route[$admin.'user/register.php'] = 'login/user_register_script';
$route[$admin.'user/register-vendor.php'] = 'login/vendor_register_script';
$route[$admin.'user/login.php'] = 'login/user_login_script';
$route[$admin.'user/forgot-password.php'] = 'login/forgot_password_script';
$route[$admin.'user/password.php'] = 'login/reset_password';

$route[$admin.'profile'] = 'login/profile';
$route[$admin.'profile/update'] = 'login/update_profile';
$route[$admin.'profile/change-password'] = 'login/change_password';

$route[$admin.'contacts/manage'] = 'contacts/manage';
$route[$admin.'contacts/view/(:num)'] = 'contacts/view/$1';
