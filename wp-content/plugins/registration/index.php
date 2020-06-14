<?php
/*
Plugin Name: Registration 
Description:
Version: 1
Author: Vaishali Dobariya
*/
// function to create the DB / Options / Defaults					
function ss_options_install_register() {

    global $wpdb;

    $table_name = $wpdb->prefix . "register";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
			 `title` int(11) NOT NULL,
			  `first_name` varchar(255) DEFAULT NULL,
			  `middle_name` varchar(255) DEFAULT NULL,
			  `last_name` varchar(255) DEFAULT NULL,
			  `street` varchar(255) DEFAULT NULL,
			  `landmark	` varchar(255) DEFAULT NULL,
			  `area` varchar(255) DEFAULT NULL,
			  `city` varchar(255) DEFAULT NULL,
			  `post_code` varchar(255) DEFAULT NULL,
			  `mobile` varchar(255) DEFAULT NULL,
			  `other_mobile` varchar(255) DEFAULT NULL,
			  `email` varchar(100) NOT NULL,
			  `bussiness_category` varchar(255) DEFAULT NULL,
			  `village` varchar(255) DEFAULT NULL,
			  `family_detail` text,
			  `created_date` date DEFAULT NULL,
			  `updated_date` date DEFAULT NULL,
            PRIMARY KEY (`id`)
          ) $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'ss_options_install_register');

//menu items
add_action('admin_menu','user_menu');
function user_menu() {
	
	//this is the main item for the menu
	add_menu_page('Registration', //page title
	'Registration', //menu title
	'manage_options', //capabilities
	'register_data_list', //menu slug
	'register_data_list' //function
	);
	
	//this is a submenu
	add_submenu_page('register_data_list', //parent slug
	'Add New Data', //page title
	'Add New', //menu title
	'manage_options', //capability
	'register_data_create', //menu slug
	'register_data_create'); //function
	
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update Register', //page title
	'Update', //menu title
	'manage_options', //capability
	'register_data_update', //menu slug
	'register_data_update'); //function
}
define('ROOTDIR1', plugin_dir_path(__FILE__));

require_once(ROOTDIR1 . 'register-data-list.php');
require_once(ROOTDIR1 . 'register_data_create.php');
require_once(ROOTDIR1 . 'register_data_update.php');