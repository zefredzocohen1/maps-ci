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
|	https://codeigniter.com/user_guide/general/routing.html
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
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'base/Home/index';
$route['Home/index'] = 'base/Home/index';
$route['home'] = 'base/Home/index';
$route['Home'] = 'base/Home/index';
//$route['']
//$route['login'] = 'user/index';
//$route['default_controller'] = 'MapsPro/index';
//$route['404_override'] = '';
//$route['device/ajax_search'] = 'MapsPro/search';
$route['tst/(.*)'] = 'MapsPro/printTestDev/$1';
$route['tst'] = 'MapsPro/printTestDev';
$route['sc'] = 'MapsPro/printSession';
//$route['device/getMainConfig']='MapsPro/getMainConfig';
//$route['device/saveConfig']='MapsPro/saveConfig';
//$route['translate_uri_dashes'] = FALSE;
//$route['device/test'] = 'MapsPro/test';
//$route['device/startDevice'] = 'MapsPro/startDevice';
//$route['device/stopDevice'] = 'MapsPro/stopDevice';
//$route['device/downloadConfigDevice'] = 'MapsPro/downloadConfigDevice';
//$route['device/blinkDevice'] = 'MapsPro/blinkDevice';
//$route['device/setTimeDevice'] = 'MapsPro/setTimeDevice';
//$route['user/(.*)'] ='user/$1' ;
//$route['home'] = 'MapsPro/index';
//$route['table'] = 'MapsPro/table';
//$route['device/add'] = 'device/add';
//$route['modem'] = 'modem/index';
