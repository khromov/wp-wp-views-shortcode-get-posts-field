wp-wp-views-shortcode-get-posts-field
=====================================

Wordpress shortcode. Gets a a column from the wp_posts table by post ID.

Example usage (gets the GUID of the post with ID 10):  
'[wpv-get-posts-field id="10" field="guid"]'

Example usage #2 (gets the GUID of the post with ID 1):  
'[wpv-get-post-column id="1" column="post_content"]'


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

Note:
This shortcode is usable with Toolset Views. (Set id="[wpv-post-id]" in your View)