<?php
/*
Plugin Name: Contact List
Description: A custom contact list for testing
Version: 1.0
Author: Alex Barrios
Author URI: http://alexertech.com
*/

//menu items
add_action('admin_menu','alex_crud_modifymenu');

function alex_crud_modifymenu() {

	// This is the main item for the menu
	add_menu_page('Contacts',    //page title
  	'Contacts',                //menu title
  	'manage_options',          //capabilities
  	'alex_crud_list',          //menu slug
  	alex_crud_list             //function
	);

	// This is a submenu
	add_submenu_page('alex_crud_list', //parent slug
	'Add New Contact',           //page title
	'Add New',                   //menu title
	'manage_options',            //capability
	'alex_crud_create',          //menu slug
	'alex_crud_create');         //function

	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null,       //parent slug
	'Update Contact',            //page title
	'Update',                    //menu title
	'manage_options',            //capability
	'alex_crud_update',          //menu slug
	'alex_crud_update');         //function
}

define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'list.php');
require_once(ROOTDIR . 'create.php');
require_once(ROOTDIR . 'update.php');
