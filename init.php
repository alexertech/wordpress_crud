<?php
/*
Plugin Name: Contact List
Description: A simple contact list for CRUD testing / learning
Version: 1.0
Author: Alex Barrios
Author URI: http://alexertech.com
*/

// Add action to the Admin Menu
add_action('admin_menu','alex_crud_modifymenu');

// At the moment of activation of the plugin, add the "Contacts" option
function alex_crud_modifymenu() {

	// This is the main item for the menu
	add_menu_page('Contacts',          // page title
  	'Contacts',                      // menu title
  	'manage_options',                // capabilities
  	'alex_crud_list',                // menu slug
  	alex_crud_list                   // function
	);

	// This is a submenu
	add_submenu_page('alex_crud_list', // parent slug
	'Add New Contact',                 // page title
	'Add New',                         // menu title
	'manage_options',                  // capability
	'alex_crud_create',                // menu slug
	'alex_crud_create');               // function

	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null,             // parent slug
	'Update Contact',                  // page title
	'Update',                          // menu title
	'manage_options',                  // capability
	'alex_crud_update',                // menu slug
	'alex_crud_update');               // function

}

// We now include the functions for the plugin options
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'list.php');
require_once(ROOTDIR . 'create.php');
require_once(ROOTDIR . 'update.php');
