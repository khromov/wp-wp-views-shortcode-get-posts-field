<?php
/*
Plugin Name: WP Views get wp_posts column data
Plugin URI: http://khromov.wordpress.com
Description: Gets a a column from the wp_posts table by post ID. Example usage: [wpv-get-post-column id="[wpv-post-id]" field="guid"]
Version: 1.0
Author: Stanislav Khromov
Author URI: http://khromov.se
License: GPL2
 
Full list of available columns in wp_posts:
 * ID
 * post_author
 * post_date
 * post_data_gmt
 * post_content
 * post_title
 * post_excerpt
 * post_status
 * comment_status
 * ping_status
 * post_password
 * post_name
 * to_ping
 * pinged
 * post_modified
 * post_modified_gmt
 * post_content_filtered
 * post_parent
 * guid
 * menu_order
 * post_type
 * post_mine_type
 * comment_count
*/

function shortcode_get_posts_field($atts)
{
	global $wpdb;
	
	extract( shortcode_atts(array(
		'id' => '0',
		'column' => '0'
	), $atts ));
	
	//Sanitize $field 
	
	if($id != 0)
	{
		
		/**
		 * Limit allowed column names to a-z (upper/lowercase) and numbers 0-9 for security.
		 * Strips any characters outside the set noted above.
		 */ 
		$column = preg_replace('/[^a-zA-Z0-9_]/', '', $column);
		
		$result = $wpdb->get_row("SELECT {$column} FROM $wpdb->posts WHERE ID = {$id} LIMIT 1");
		
		if(isset($result->$column) && $result->$column!='')
			return $result->$column;
		else
			return '';
	}
	else
		return __('<strong>Error: No id specified.</strong>');
}

add_shortcode('wpv-get-post-column', 'shortcode_get_posts_field');