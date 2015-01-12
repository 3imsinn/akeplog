<?php
/*
Plugin Name: 24liveblog
Plugin URI: http://wordpress.org/extend/plugins/24liveblog
Description: 24liveblog is a simple, functional, powerful and FREE live blogging tool. 24liveblog is the easiest way to live blogging. It's free to use and works with any type of website
Author: 24liveblog
Version: 1.1
Author URI: http://www.24liveblog.com/
*/
$domain = $_SERVER['HTTP_HOST'];

function u24liveblog_admin() {
  include('u24liveblog_plugin_admin.php');
}

function u24liveblog_add_pages() {
add_object_page(
				'24LiveBlog',
				'24LiveBlog',
				'manage_options',
				'u24liveblog_setting', 
				'u24liveblog_admin', 
				plugin_dir_url(__FILE__) . 'images/u24liveblog_plug_log.png' 
			);
}

add_action('admin_menu', 'u24liveblog_add_pages', 10);

function load_external_jQuery() { // load external file  
    wp_enqueue_script('jquery');
}  
add_action('wp_enqueue_scripts', 'load_external_jQuery');

?>
