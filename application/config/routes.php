<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['p/(:any)'] = "home/page/$1";
$route['new_template/(:any)'] = "home/new_template/$1";
$route['create_account'] = "home/create_account";
$route['login'] = "home/login";
$route['logout'] = "home/logout";
$route['student_login/(:num)'] = "home/student_login/$1";

$route['admin_login'] = "home/page/admin_login";
$route['validate_admin'] = "home/validate_admin";
$route['update_password'] = "home/update_password";
$route['create_admin'] = "home/create_admin";
$route['admin_logout'] = "home/admin_logout";
$route['update_dept_account/(:num)/(:num)'] = "home/update_dept_account/$1/$2";
$route['delete_dept_account/(:any)'] = "home/delete_dept_account/$1";

$route['dashboard'] = "user/control_panel";
$route['dashboard/(:num)'] = "user/control_panel/$1";

$route['u/(:any)'] = "user/u/$1";
$route['control_panel'] = "user/control_panel";
$route['control_panel/(:any)'] = "user/$1";
$route['control_panel/(:any)/(:any)'] = "user/$1/$2";
$route['control_panel/(:any)/(:any)/(:any)'] = "user/$1/$2/$3";
$route['control_panel/(:any)/(:any)/(:any)/(:any)'] = "user/$1/$2/$3/$4";
$route['control_panel/(:any)/(:any)/(:any)/(:any)/(:any)'] = "user/$1/$2/$3/$4/$5";

$route['student_validate'] = 'home/student_validate';
$route['student_logout'] = "home/student_logout";
$route['delete_student/(:num)/(:num)'] = "user/delete_student/$1/$2";
$route['nextQuestion'] = "student/nextQuestion";
