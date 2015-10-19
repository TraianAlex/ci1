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
$route['auth'] = 'auth';
$route['auth/login_validation'] = 'auth/login_validation';
$route['auth/logout'] = 'auth/logout';

$route['helpers/area_of_circle/(:any)'] = 'helpers/area_of_circle/$1';
$route['helpers/show_mysql_date'] = 'helpers/show_mysql_date';
$route['helpers/new_library'] = 'helpers/new_library';
$route['helpers/new_library2'] = 'helpers/new_library2';
$route['helpers/test_form'] = 'helpers/test_form';
$route['helpers/form'] = 'helpers/form';
$route['helpers/form_submit'] = 'helpers/form_submit';
//http://localhost/ci1/contact
//if no folder $route['contact'] = 'contact/index/contactview (the index file is contactview)';
$route['contact'] = 'contact';//folder contact func index
$route['contact/multiple_email'] = 'contact/multiple_email';
//http://localhost/ci1/user
$route['user'] = 'user/users/userview';//folder users / func users
$route['user/users'] = 'user/users';
$route['user/create'] = 'user/create';
$route['user/delete/(:any)'] = 'user/delete/$1';
$route['user/update/(:any)'] = 'user/update/$1';
//http://localhost/ci1/example2/more/1/2/3
$route['example2/(:any)'] = 'example2/more/$1/$2/$3';//no folder / f more

//http://localhost/ci1/news/create
$route['news/create'] = 'news/create';//db / form insert folder news
$route['news/(:any)'] = 'news/view/$1';//db / view a selection folder news
$route['news'] = 'news';//db / all folder news / func index

$route['divers'] = 'hello/divers';
//http://localhost/ci1/hello
$route['hello'] = 'hello';//static / no folder / func index
$route['hello/new_post'] = 'hello/new_post';
$route['hello/view/(:any)'] = 'hello/view/$1';
$route['hello/edit/(:any)'] = 'hello/edit/$1';
$route['hello/delete/(:any)'] = 'hello/delete/$1';

$route['(:any)'] = 'pages/view/$1';//static folder pages

$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
/* End of file routes.php */
/* Location: ./application/config/routes.php */