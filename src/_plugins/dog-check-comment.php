<?php
/*
Plugin Name: dogfood Check Comment
Plugin URI: http://
Description: Überprüft ob Checkbox angekreuzt ist, um den Kommentar durch Spamfilter zu lassen.
Version: 0.1
Author: Kai Pahl
Author URI: http://
*/


/*******************************************************************************
 * Let's use wp_nonce to secure the forms. 
 * Source: http://michaeldaw.org/papers/securing_wp_plugins/
 * Code is being implemented at different locations, always commented as "### SECURING FORMS ###"
 ******************************************************************************/
	if ( !function_exists('wp_nonce_field') ) {
	        function dog_nonce_field($action = -1) { return; }
	        $dog_nonce = -1;
	} else {
	        function dog_nonce_field($action = -1) { return wp_nonce_field($action); }
	        $dog_nonce = 'mcsp-update-key';
	}






/*******************************************************************************
 * Input validation. 
 ******************************************************************************/
function dog_check_input($comment_data) {
	global $user_ID;

	if ( !isset($user_ID) ) $user_ID = 0;
	
    if (  ($user_ID == 0 ) && ( $comment_data['comment_type'] == '' ) ) { 
    // if (  ( !isset($user_ID) ) && ( $comment_data['comment_type'] == '' ) ) { 
	// if (  ( $comment_data['comment_type'] == '' ) ) { 

		// Get actual result
		$status_checkbox = $_POST[ 'dog_check_comment' ];
		
		// DIE if there was an error. Apply filter for security reasons (strip JS code, etc.)
		if ($status_checkbox != 'angeklickt') {
			dog_die( apply_filters('pre_comment_content', 'Sorry! Checkbox ist nicht angeklickt gewesen. Daher ist der Kommentar gelöscht worden. Bitte im Browser den [Zurück]-Button benützen.') );
				break;
		}

	}

	return $comment_data;

}



/*******************************************************************************
 * Apply plugin
 ******************************************************************************/

/* AUSKOMMENTIERT, DA AUSGESCHALTET!
add_filter('preprocess_comment', 'dog_check_input', 0);
*/



function dog_die($message) {

		wp_die($message);

}

?>