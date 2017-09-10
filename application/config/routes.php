<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';
//rohitkanta
$route['landing'] = 'nav_controller';
$route['logout'] = 'login_controller/logout';
//rohitkanta
//thoisana
$route['employee/registration'] = 'nav_controller/emp_reg';
$route['utility/department'] = 'nav_controller/master_department';
$route['utility/designation'] = 'nav_controller/master_designation';
$route['utility/user'] = 'nav_controller/master_user';
$route['utility/role'] = 'nav_controller/master_role';
//thoisana

//borison
$route['utility/semester'] = 'nav_controller/master_semester';
$route['utility/trade'] = 'nav_controller/master_trade';
$route['utility/course'] = 'nav_controller/master_course';
$route['utility/session'] = 'nav_controller/master_session';
$route['utility/exam'] = 'nav_controller/master_examtype';
$route['student/registration'] = 'nav_controller/student_reg';
$route['student/list'] = 'nav_controller/student_list';
$route['student/admission'] = 'nav_controller/student_admission';
//borison
$route['utility/page'] = 'nav_controller/master_page';
/* End of file routes.php */
/* Location: ./application/config/routes.php */