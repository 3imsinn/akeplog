<?php
/**
 * @package digialnight
 * @version 1.6
 */
/*
Plugin Name: DigitaLnight
Plugin URI: http://wordpress.org/plugins/digitalnight/
Description: digitalnight is a plugin to post status-updates
Author: Michael Schneider / 3imsinn
Version: 1.0
Author URI: http://www.3imsinn.de/
*/

// Register function to be called when plugin is activated




register_activation_hook( __FILE__, 'digitalnight_activation' );

// Activation Callback
function digitalnight_activation() {
	// Get access to global database access class
	global $wpdb;

	// Check to see if WordPress installation is a network
	if ( is_multisite() ) {

		// If it is, cycle through all blogs, switch to them
		// and call function to create plugin table

		if ( isset( $_GET['networkwide'] ) && ( $_GET['networkwide'] == 1) ) {
			$start_blog = $wpdb->blogid;

			$blog_list = $wpdb->get_col( 'SELECT blog_id FROM ' . $wpdb->blogs );
			foreach ( $blog_list as $blog ) {
				switch_to_blog( $blog );

				// Send blog table prefix to table creation function
				society_create_table( $wpdb->get_blog_prefix() );
			}
			switch_to_blog( $start_blog );
			return;
		}
	}

	// Create table on main blog in network mode or single blog
	digitalnight_create_table( $wpdb->get_blog_prefix() );
}

add_shortcode( 'digitalnight', 'digitalnight_status' );





// Create & organize Commissions

function digitalnight_status(){

	global $wpdb;
	
	$email = ltrim($_GET['email']);
	$email = rtrim($email);
	
	if(!empty( $_GET['email']))
	{
		$wpdb->update( $wpdb->get_blog_prefix() . 'digitalnight_member', array('status' => '1'), array( 'email' => $email) );
		echo "Merci! you'll get your ticket soon! <br/>We'll send it to: ".$email." <br/> 
		Please validate if this address is correct. If you have any trouble getting your ticket or 
		if you can't enjoy the digital please contact <a href=\"mailto:schneider@boev.de\">
		Michael Schneider, akep</a>";
	}
	
}





function digitalnight_create_table( $prefix ) {
	// Prepare SQL query to create database table
	// using received table prefix
	
	$creation_query =
		'CREATE TABLE ' . $prefix . 'digitalnight_member (
			`uid` int(20) NOT NULL AUTO_INCREMENT,
			`vname` varchar(200),
			`nname` varchar(200),
			`email` varchar(200),
			`company` varchar(100),
			`status` varchar(100),			
			PRIMARY KEY (`uid`)
			);';

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $creation_query );
}







?>
