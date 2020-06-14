<?php
/*
Plugin Name: Bussiness 
Description:
Version: 1
Author: Vaishali Dobariya
*/
// function to create the DB / Options / Defaults					
function ss_options_install() {

    global $wpdb;

    $table_name = $wpdb->prefix . "bussiness";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
			 `id` int(11) NOT NULL,
			  `register_as` varchar(255) DEFAULT NULL,
			  `full_name` varchar(255) DEFAULT NULL,
			  `gender` varchar(255) DEFAULT NULL,
			  `birthdate` date DEFAULT NULL,
			  `company_name` text,
			  `address` text,
			  `city` varchar(255) DEFAULT NULL,
			  `village` varchar(255) DEFAULT NULL,
			  `education` varchar(255) DEFAULT NULL,
			  `mobile` varchar(255) DEFAULT NULL,
			  `whatsapp_no` varchar(255) DEFAULT NULL,
			  `email` varchar(100) NOT NULL,
			  `bussiness_category` varchar(255) DEFAULT NULL,
			  `website` varchar(255) DEFAULT NULL,
			  `created_date` date DEFAULT NULL,
			  `updated_date` date DEFAULT NULL,
			  `name` tinytext NOT NULL,
			  `age` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
          ) $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'ss_options_install');

//menu items
add_action('admin_menu','bussiness_menu');
function bussiness_menu() {
	
	//this is the main item for the menu
	add_menu_page('Bussiness', //page title
	'Bussiness', //menu title
	'manage_options', //capabilities
	'bussiness_data_list', //menu slug
	'bussiness_data_list' //function
	);
	
	//this is a submenu
	add_submenu_page('bussiness_data_list', //parent slug
	'Add New Data', //page title
	'Add New', //menu title
	'manage_options', //capability
	'bussiness_data_create', //menu slug
	'bussiness_data_create'); //function
	
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update Bussiness', //page title
	'Update', //menu title
	'manage_options', //capability
	'bussiness_data_update', //menu slug
	'bussiness_data_update'); //function
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'bussiness-data-list.php');
require_once(ROOTDIR . 'bussiness_data_create.php');
require_once(ROOTDIR . 'bussiness_data_update.php');
