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

$route['default_controller'] = "shop2";
$route['renters'] = "renters";
$route['404_override'] = '';
$route['checkout'] = 'checkout';

$route['admin'] = 'admin_product/index';
$route['admin/add'] = 'admin_product/add';
$route['admin/update'] = 'admin_product/update';
$route['admin/update/(:any)'] = 'admin_product/update/$1';
$route['admin/delete/(:any)'] = 'admin_product/delete/$1';
$route['admin/(:any)'] = 'admin_product/index/$1';

$route['admin/product'] = 'admin_product/index';
$route['admin/product/add'] = 'admin_product/add';
$route['admin/product/update'] = 'admin_product/update';
$route['admin/product/update/(:any)'] = 'admin_product/update/$1';
$route['admin/product/delete/(:any)'] = 'admin_product/delete/$1';
$route['admin/product/(:any)'] = 'admin_product/index/$1';

$route['admin/category'] = 'admin_category/index';
$route['admin/category/add'] = 'admin_category/add';
$route['admin/category/update'] = 'admin_category/update';
$route['admin/category/update/(:any)'] = 'admin_category/update/$1';
$route['admin/category/delete/(:any)'] = 'admin_category/delete/$1';
$route['admin/category/(:any)'] = 'admin_category/index/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
