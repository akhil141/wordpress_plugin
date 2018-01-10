<?php
ob_start();
function status_update_title_tab_settings(){
	global $wpdb;
	$status = $_GET['status'];
	$id = $_GET['id'];
	$table_name = $wpdb->prefix.'titletab';
	if($status==1){
	$wpdb->update(
                $table_name, //table
                array('status' => 0), //data
                array('id' => $id), //where
                array('%s'), //data format
                array('%s') //where format
        );
    }else{
    	$wpdb->update(
                $table_name, //table
                array('status' => 1), //data
                array('id' => $id), //where
                array('%s'), //data format
                array('%s') //where format
        );
    }
    wp_redirect('?page=title_tab_settings');
}
?>