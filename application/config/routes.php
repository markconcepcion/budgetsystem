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
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// $route['(:any)'] = 'pages/view/$1';

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//BUDGET HEAD ROUTES
    $route['BH'] = 'Budget_head/Home';
    //CHART
        $route['BH/augment'] = 'Budget_head/Home/augmentation';
        $route['BH/augment_view'] = 'Budget_head/Home/view_augmentations';  
    //LBP
        $route['BH_viewLBPs/(:any)'] = 'Budget_head/Lbp/view_lbp/$1'; //LIST OF LBP BY YEAR
        $route['BH_printLBP1/(:any)'] = 'Budget_head/Lbp/print_lbp_1/$1'; //VIEW OR PRINT LBP 1 BY YEAR 
        $route['BH_printLBP2/(:any)'] = 'Budget_head/Lbp/print_lbp_2/$1'; //VIEW OR PRINT LBP 2 BY LBP ID
        $route['BH_viewLBP2/(:any)'] = 'Budget_head/Lbp/view_lbp_2/$1'; //VIEW AND APPROVE LBP 2 BY LBP ID
    //LOGBOOK
        $route['BH/supp_view/(:any)'] = 'Budget_head/Logbook/view_supplementations/$1';
        $route['BH/LOGS/(:any)'] = 'Budget_head/Logbook/readLogs/$1';
    //OBR
        $route['BH/VIEW_OBR/(:any)/(:any)'] = 'Budget_head/Obr/view_checked_obr/$1/$2';
    //NOTEBOOK
        $route['BH/NOTEBOOK/(:any)'] = 'Budget_head/CNotebook/viewNotebooks/$1';
        $route['BH/DEPT_NOTEBOOK/(:any)/(:any)'] = 'Budget_head/CNotebook/notebook_dept_view/$1/$2';
    //REPORT
        $route['BH/REPORT/(:any)'] = 'Budget_head/Reports/viewReports/$1';
        $route['BH/REPORT/CQ/(:any)/(:any)'] = 'Budget_head/Reports/consolidatedQuarter/$1/$2';
        $route['BH/REPORT/CA/(:any)'] = 'Budget_head/Reports/consolidatedAnnual/$1';
        $route['BH/REPORT/DQ/(:any)/(:any)/(:any)'] = 'Budget_head/Reports/departmentQuarter/$1/$2/$3';
        $route['BH/REPORT/DA/(:any)/(:any)'] = 'Budget_head/Reports/departmentAnnual/$1/$2';
        

//BUDGET OFFICER ROUTES
    $route['BO'] = 'Budget_officer/Home';
    //LBP
        $route['BO/lbp_list/(:any)'] = 'Budget_officer/Lbp/view_lbp/$1'; //LIST OF LBP BY YEAR
        $route['BO/printLBP1/(:any)'] = 'Budget_officer/Lbp/print_lbp_1/$1'; //VIEW OR PRINT LBP 1 BY YEAR 
        $route['B0/printLBP2/(:any)'] = 'Budget_officer/Lbp/print_lbp_2/$1'; //VIEW OR PRINT LBP 2 BY LBP ID
    //LOGBOOK
        $route['BO/supp_view/(:any)'] = 'Budget_officer/Logbook/view_supplementations/$1';
    //OBR
        $route['BO/VIEW_OBR/(:any)/(:any)'] = 'Budget_officer/Obr/view_pending_obr/$1/$2';
    //NOTEBOOK
        $route['BO/NOTEBOOK/(:any)'] = 'Budget_officer/ControlNotebook/viewNotebooks/$1';
    
//DEPARTMENT HEAD ROUTES
    $route['DH'] = 'Department_head/Home';
    //LBP
        $route['DH/LBP/(:any)'] = 'Department_head/Lbp/lbp_index/$1'; // ADD OR REMOVE AN EXPENDITURE IN UN-FINALIZED LBP PROPOSAL
        $route['DH/EDIT/LBP2/(:any)'] = 'Department_head/Lbp/return_select/$1'; // ADD OR REMOVE AN EXPENDITURE IN UN-FINALIZED LBP PROPOSAL
        $route['DH/DEL/LBP2_EXP/(:any)'] = 'Department_head/Lbp/remove_exp/$1'; 
        $route['DH/ADD/LBP2_EXP/(:any)'] = 'Department_head/Lbp/add_lbp_exp/$1'; 
    
/*
| -------------------------------------------------------------------------
| COOKIE MADE ROUTES
| -------------------------------------------------------------------------
*/