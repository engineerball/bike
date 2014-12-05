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

$route['default_controller'] = "shopping";
$route['renters'] = "renters";
$route['404_override'] = '';
$route['checkout'] = 'checkout';

$route['admin/bike'] = 'admin_bike/index';
$route['admin/bike/add'] = 'admin_bike/add';
$route['admin/bike/update'] = 'admin_bike/update';
$route['admin/bike/update/(:any)'] = 'admin_bike/update/$1';
$route['admin/bike/delete/(:any)'] = 'admin_bike/delete/$1';
$route['admin/bike/(:any)'] = 'admin_bike/index/$1';

$route['admin/shop'] = 'admin_shop/index';
$route['admin/shop/add'] = 'admin_shop/add';
$route['admin/shop/update'] = 'admin_shop/update';
$route['admin/shop/update/(:any)'] = 'admin_shop/update/$1';
$route['admin/shop/delete/(:any)'] = 'admin_shop/delete/$1';
$route['admin/shop/(:any)'] = 'admin_shop/index/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
