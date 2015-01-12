<?php
/*
Plugin Name: DT Author Box
Plugin URI: http://www.digitaltweaker.com/web/wordpress/2012/04/digital-tweakers-author-box-plugin-for-wordpress
Description: Easily adds an author box signature to the end of your posts or articles with little setup. Adds profile image, author bio, and social(Twitter,Facebook,Google+,LinkedIn,YouTube,Pinterest. All settings can be found under user profile. For more documentation, visit the plugin website.
Version: 1.2.2
License: GPL
Author: Digital Tweaker
Author URI: http://www.digitaltweaker.com
*/?>
<?php


DT_authorbox_Controller::init();

class DT_authorbox_Controller {
	function init() {
		register_activation_hook(   __FILE__, array( __CLASS__, 'activate'   ) );
		register_deactivation_hook( __FILE__, array( __CLASS__, 'deactivate' ) );
		load_plugin_textdomain( dt_author_box, false, dirname ( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
	function activate() {
		global $wpdb;
		$wordpressurl = get_bloginfo('wpurl');

		register_uninstall_hook( __FILE__, array( __CLASS__, 'uninstall' ) );
	}
	function deactivate() {

	}
	function uninstall() {
		mysql_query("DELETE FROM $wpdb->usermeta WHERE meta_key='dt_twitter' OR meta_key='dt_facebook'  OR meta_key='dt_linkedin'  OR meta_key='dt_googleplus'  OR meta_key='dt_youtube'  OR meta_key='dt_pinterest' OR meta_key='dt_image' OR meta_key='dt_poweredby'");
	}
}

/* FUNCTION TO ADD SOCIAL FIELDS TO PROFILE */
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
function my_show_extra_profile_fields( $user ) {
global $wpdb;?>
<?php //echo "<img src="' .plugins_url( 'images/wordpress.png' , __FILE__ ). '" > "; ?>
<?php $pluginurl = plugins_url( 'images/dt_authorbox_header.jpg', __FILE__ ); ?>


<?php echo "<a href='http://www.digitaltweaker.com/web/wordpress/2012/04/digital-tweakers-author-box-plugin-for-wordpress' title='DT Author Box Plugin Documentation' target='_blank'><img src='$pluginurl' border='0' width='300'></a>"; ?>
	<h3>DT Author Box Profile Information</h3>
<span><a href="http://www.digitaltweaker.com/web/wordpress/2012/04/digital-tweakers-author-box-plugin-for-wordpress/" title="DT Author Box Plugin Documentation" target="_blank">Documentation</a> | </span>
<span><a href="http://www.digitaltweaker.com/web/wordpress/2012/05/dt-author-box-plugin-feature-requests-bug-reporting/" title="DT Author Box Plugin Documentation" target="_blank">Feature Request / Bug Report</a></span>

	<table class="form-table">

		<tr>
			<th><label for="dt_twitter"><?php _e( 'Twitter', 'dt_author_box' ); ?></label></th>

			<td>
				<input type="text" name="dt_twitter" id="dt_twitter" value="<?php echo esc_attr( get_the_author_meta( 'dt_twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e( 'Please enter your Twitter username', 'dt_author_box' ); ?></span>
			</td>
		</tr>
        <tr>
			<th><label for="dt_facebook"><?php _e( 'Facebook', 'dt_author_box' ); ?></label></th>

			<td>
				<input type="text" name="dt_facebook" id="dt_facebook" value="<?php echo esc_attr( get_the_author_meta( 'dt_facebook', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e( 'Please enter your Facebook URL', 'dt_author_box' ); ?></span>
			</td>
		</tr>
        <tr>
			<th><label for="dt_twitter"><?php _e( 'LinkedIn', 'dt_author_box' ); ?></label></th>

			<td>
				<input type="text" name="dt_linkedin" id="dt_linkedin" value="<?php echo esc_attr( get_the_author_meta( 'dt_linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e( 'Please enter your LinkedIn URL', 'dt_author_box' ); ?></span>
			</td>
		</tr>
        <tr>
			<th><label for="dt_twitter"><?php _e( 'Google+', 'dt_author_box' ); ?></label></th>

			<td>
				<input type="text" name="dt_googleplus" id="dt_googleplus" value="<?php echo esc_attr( get_the_author_meta( 'dt_googleplus', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e( 'Please enter your Google+ URL', 'dt_author_box' ); ?></span>
			</td>
		</tr>
        <tr>
			<th><label for="dt_twitter"><?php _e( 'Youtube', 'dt_author_box' ); ?></label></th>

			<td>
				<input type="text" name="dt_youtube" id="dt_youtube" value="<?php echo esc_attr( get_the_author_meta( 'dt_youtube', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e( 'Please enter your Youtube URL', 'dt_author_box' ); ?></span>
			</td>
		</tr>
        <tr>
			<th><label for="dt_twitter"><?php _e( 'Pinterest', 'dt_author_box' ); ?></label></th>

			<td>
				<input type="text" name="dt_pinterest" id="dt_pinterest" value="<?php echo esc_attr( get_the_author_meta( 'dt_pinterest', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e( 'Please enter your Pinterest username.', 'dt_author_box' ); ?></span>
			</td>
		</tr>
        <tr>
            <th><label for="image"><?php _e( 'Profile Image', 'dt_author_box' ); ?></label></th>
             
            <td>
            <?php if ( get_the_author_meta( 'dt_image', $user->ID ) ) { ?>
            <img src="<?php echo esc_attr( get_the_author_meta( 'dt_image', $user->ID ) ); ?>" style="height:50px;padding-right:20px;" align="left">
            <?php } ?>
            <input type="text" name="dt_image" id="dt_image" value="<?php echo esc_attr( get_the_author_meta( 'dt_image', $user->ID ) ); ?>" class="regular-text" /><input type='button' class="button-primary" value="<?php _e( 'Upload Image', 'dt_author_box' ); ?>" id="uploadimage"/><br />
            <span class="description"><?php _e( 'Upload an image or provide image url for your profile (square images work best)', 'dt_author_box' ); ?></span>
            </td>
        </tr>
        <tr>
			<th><label for="dt_poweredby"><?php _e( 'Powered by', 'dt_author_box' ); ?> DT Author Box</label></th>

			<td><?php
			global $current_user;
			if ($_GET['user_id'] != ""){$dtpbuser = $_GET['user_id'];} else {$dtpbuser = $current_user->ID;}
			$dtpbcheck = mysql_query("SELECT * FROM $wpdb->usermeta WHERE user_id='$dtpbuser' AND meta_key='dt_poweredby'");
			$dtpbcheckres = mysql_fetch_array($dtpbcheck);
			if ($dtpbcheckres['meta_key'] == 'dt_poweredby'){echo "<input type='checkbox' name='dt_poweredby' id='dt_poweredby' value='yes' checked />";} else 
			{echo "<input type='checkbox' name='dt_poweredby' id='dt_poweredby' value='yes' />";}?>
				<span class="description"> <?php _e( 'Leaving powered by DT Author Box gives credit to the developer and is appreciated', 'dt_author_box' ); ?> </span>
			</td>
		</tr>

	</table>
   
<?php } 
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'dt_twitter', $_POST['dt_twitter'] );
	update_usermeta( $user_id, 'dt_facebook', $_POST['dt_facebook'] );
	update_usermeta( $user_id, 'dt_linkedin', $_POST['dt_linkedin'] );
	update_usermeta( $user_id, 'dt_googleplus', $_POST['dt_googleplus'] );
	update_usermeta( $user_id, 'dt_youtube', $_POST['dt_youtube'] );
	update_usermeta( $user_id, 'dt_pinterest', $_POST['dt_pinterest'] );
	update_usermeta( $user_id, 'dt_image', $_POST['dt_image'] );
	update_usermeta( $user_id, 'dt_poweredby', $_POST['dt_poweredby'] );
}
/* FUNCTION TO ADD AUTHOR BOX TO POSTS */

add_action( 'wp_enqueue_scripts', 'dt_authorbox_style' );

function dt_authorbox_style(){
wp_register_style( 'custom-style', plugins_url( 'css/style.php', __FILE__ ), array(), '20130820', 'all' );
wp_enqueue_style( 'custom-style' );
}

function dt_add_post_content($content) { ?>

    <?php

	$authorlink = get_author_posts_url(get_the_author_meta( 'ID' ));
	$blogurl = get_site_url();
	$authordisplayname = get_the_author();
	$authorbio = get_the_author_meta( 'description' );
	$pluginurl = plugins_url();
	if (is_single()) {
		
		$content .= '<div class="author-profile vcard" id="authorprofilebox">';
		if ( get_the_author_meta( 'dt_poweredby' ) == "yes" ) { 
		// $content .= '<p class="poweredbydt">'. __( 'Powered By', 'dt_author_box' ) .' DT Author Box</p>';
		}// End check for poweredby
		$content .= '<p> Autor: <a href="'.$authorlink.'">'.$authordisplayname.'</a></p><p>';
		if ( get_the_author_meta( 'dt_image', $user->ID ) ) { 
		$content .= '
		<img src="'.esc_attr( get_the_author_meta( 'dt_image', $user->ID ) ).'" alt="'.$authordisplayname.'"  class="wp-caption alignleft" align="left" width="95" height="95" />';
		} // End check for profile image
		
		//Start social bar
		if ( get_the_author_meta( 'description' ) ) { 
		$content .= $authorbio.'</p>';
		} // End check for bio
        
		$content .= '<div class="socfooter">';
		
        if ( get_the_author_meta( 'user_url' ) ) { 
		$content .= '<a href="'.get_the_author_meta( 'user_url' ).'" target="_blank" title="'. __( 'Author\'s Website', 'dt_author_box' ) .'"><img src="'.plugins_url( 'images/website.jpg', __FILE__ ).'" border="0" class="homepageicon"></a>';
		} // End check for website

		if ( get_the_author_meta( 'dt_twitter' ) ) {
		$content .= '<a href="http://twitter.com/'.get_the_author_meta( 'dt_twitter' ).'" title="'. __( 'Follow', 'dt_author_box' ) .' '.$authordisplayname.' '. __( 'on Twitter', 'dt_author_box' ) .'" target="_blank"><img src="'.plugins_url( 'images/twitter.jpg', __FILE__ ).'" border="0" class="socicons"></a>';
		}// End check for twitter
		
		if ( get_the_author_meta( 'dt_facebook' ) ) {
		$content .= '<a href="'.get_the_author_meta( 'dt_facebook' ).'" title="'. __( 'Follow', 'dt_author_box' ) .' '.$authordisplayname.' '. __( 'on Facebook', 'dt_author_box' ) .'" target="_blank"><img src="'.plugins_url( 'images/facebook.jpg', __FILE__ ).'" border="0" class="socicons"></a>';
		}// End check for facebook
		
		if ( get_the_author_meta( 'dt_linkedin' ) ) {
		$content .= '<a href="'.get_the_author_meta( 'dt_linkedin' ).'" title="'. __( 'Connect with', 'dt_author_box' ) .' '.$authordisplayname.' '. __( 'on LinkedIn', 'dt_author_box' ) .'" target="_blank"><img src="'.plugins_url( 'images/linkedin.jpg', __FILE__ ).'" border="0" class="socicons"></a>';
		}// End check for linkedin
		
		if ( get_the_author_meta( 'dt_googleplus' ) ) {
		$content .= '<a href="'.get_the_author_meta( 'dt_googleplus' ).'" title="'. __( 'Follow', 'dt_author_box' ) .' '.$authordisplayname.' '. __( 'on Google+', 'dt_author_box' ) .'" target="_blank"><img src="'.plugins_url( 'images/google-plus.jpg', __FILE__ ).'" border="0" class="socicons"></a>';
		}// End check for googleplus
		
		if ( get_the_author_meta( 'dt_youtube' ) ) {
		$content .= '<a href="'.get_the_author_meta( 'dt_youtube' ).'" title="'. __( 'Follow', 'dt_author_box' ) .' '.$authordisplayname.' '. __( 'on YouTube', 'dt_author_box' ) .'" target="_blank"><img src="'.plugins_url( 'images/youtube.jpg', __FILE__ ).'" border="0" class="socicons"></a>';
		}// End check for youtube
		
		if ( get_the_author_meta( 'dt_pinterest' ) ) {
		$content .= '<a href="http://www.pinterest.com/'.get_the_author_meta( 'dt_pinterest' ).'" title="'. __( 'Follow', 'dt_author_box' ) .' '.$authordisplayname.' '. __( 'on Pinterest', 'dt_author_box' ) .'" target="_blank"><img src="'.plugins_url( 'images/pinterest.jpg', __FILE__ ).'" border="0" class="socicons"></a>';
		}// End check for pinterest
		
		$content .= '</div>';
		//End social bar

		
      
		$content .= '</div>';
		
	 }
	return $content;
}
add_filter ('the_content', 'dt_add_post_content', 0);

//Profile Image Upload


function dt_profile_image_upload() {
?><script type="text/javascript">
jQuery(document).ready(function() {
jQuery(document).find("input[id^='uploadimage']").live('click', function(){
//var num = this.id.split('-')[1];
formfield = jQuery('#dt_image').attr('name');
tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 
window.send_to_editor = function(html) {
imgurl = jQuery('img',html).attr('src');
jQuery('#dt_image').val(imgurl);
tb_remove();
}
 
return false;
});
});
</script>
<?php
}
global $pagenow;  
  
if ( 'profile.php' || 'users.php' == $pagenow ) {
add_action('admin_head','dt_profile_image_upload');
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_enqueue_style('thickbox'); //thickbox styles css
	}
?>
<?php
//Plugin header goes here
//add_action( init, pb_msp_init );
//function pb_msp_init() {
//Assuming you have a languages folder in your plugin - Typically run within the init action
//load_plugin_textdomain( dt_author_box, false, dirname ( plugin_basename( __FILE__ ) ) . '/languages/' );   }
//end pb_msp_init //More functions
?>