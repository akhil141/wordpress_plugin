<?php
/**
 * Plugin Name: Title tab
 * Description: This plugin change title when tabs are switched.
 * Version:     1.0.0
 * Author:      Acutweb
 * Author URI:  http://acutweb.com/
 */
function create_options_install() {
    global $wpdb;
    $table_name = $wpdb->prefix . "titletab";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
            `id` varchar(3) CHARACTER SET utf8 NOT NULL,
            `title1` varchar(50) CHARACTER SET utf8 NOT NULL,
            `title2` varchar(50) CHARACTER SET utf8 NOT NULL,
            `emoji` varchar(50) CHARACTER SET utf8 NOT NULL,
            `status` varchar(3) CHARACTER SET utf8 NOT NULL,
            PRIMARY KEY (`id`)
          ) $charset_collate; ";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}
function insert_options_install(){
	global $wpdb;
    $table_name = $wpdb->prefix.'titletab';
    $id = 1;
    $title1 = 'Come Back';
    $title2 = 'We Miss You';
    $emoji = 'crying.png';
    $status = 1;
    $wpdb->insert($table_name, array('id' => $id, 'title1' => $title1, 'title2' => $title2, 'emoji' => $emoji, 'status' => $status));
}
// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'create_options_install');
register_activation_hook(__FILE__, 'insert_options_install');
//menu items
add_action('admin_menu','title_tab_modify_settings');
function title_tab_modify_settings() {
	//this is the main item for the menu
	add_menu_page('Title Tab', //page title
	'Title Tab', //menu title
	'manage_options', //capabilities
	'title_tab_settings', //menu slug
	'title_tab_settings' //function
	);
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update Title', //page title
	'Update', //menu title
	'manage_options', //capability
	'edit_title_tab_settings', //menu slug
	'edit_title_tab_settings'); //function
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Status Change Title', //page title
	'Status update', //menu title
	'manage_options', //capability
	'status_update_title_tab_settings', //menu slug
	'status_update_title_tab_settings'); //function
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Upload Emoji Title', //page title
	'Upload emoji', //menu title
	'manage_options', //capability
	'upload_emoticon_title_settings', //menu slug
	'upload_emoticon_title_settings'); //function

}
require_once(plugin_dir_path(__FILE__) . 'titletab_manage.php');
require_once(plugin_dir_path(__FILE__) . 'edit_titletab.php');
require_once(plugin_dir_path(__FILE__) . 'status_update_title.php');
require_once(plugin_dir_path(__FILE__) . 'upload_emoticon.php');
function title_tab_enque(){
    wp_register_script( 'jquery.min', plugin_dir_url(__FILE__) . 'js/jquery.min.js', array('jquery') );
    wp_enqueue_script( 'jquery.min' );
}

add_action( 'wp_enqueue_scripts', 'title_tab_enque' );
require_once(plugin_dir_path(__FILE__) . 'titletab_script.php');


?>