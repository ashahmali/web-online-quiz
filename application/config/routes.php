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
$route['home'] = "users/home";
$route['(:any)/home'] = "users/home";

$route['add_subject'] = "admin/add_subject";
$route['(:any)/add_subject'] = "admin/add_subject";

$route['quizzes'] = "admin/quizzes";
$route['(:any)/quizzes'] = "admin/quizzes";

$route['questions'] = "admin/questions";
$route['(:any)/questions'] = "admin/questions";

$route['register'] = "users/register";
$route['(:any)/register'] = "users/register";

$route['login'] = "users/login";
$route['(:any)/login'] = "users/login";

$route['manage_users'] = "admin/manage_users";
$route['(:any)/manage_users'] = "admin/manage_users";

$route['question_detail'] = "admin/question_detail";
$route['(:any)/question_detail'] = "admin/question_detail";

$route['quiz_detail'] = "admin/quiz_detail";
$route['(:any)/quiz_detail'] = "admin/quiz_detail";

$route['new_aswer'] = "admin/new_aswer";
$route['(:any)/new_aswer'] = "admin/new_aswer";


$route['(:any)/home'] = "users/home";
$route['(:any)/detail'] = "users/detail";
$route['(:any)/evaluate'] = "quiz/evaluate";
$route['(:any)/timer'] = "quiz/timer";
$route['(:any)/save_answer'] = "quiz/save_answer";
$route['quiz/(\d+)/(\d+)'] = "quiz/showQuiz/$1/$2";
$route['quiz/(:any)'] = "quiz/showQuiz";


$route['default_controller'] = "login";
//$route['subject'] = 'admin_subject';
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */