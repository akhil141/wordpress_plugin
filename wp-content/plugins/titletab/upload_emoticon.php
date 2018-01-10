<?php

function upload_emoticon_title_settings() {
    global $wpdb;
    $table_name = $wpdb->prefix . "titletab";
    $id = $_GET["id"];

//update
    if (isset($_POST['update'])) {
   /* if(isset($_FILES['uploadEmoticon'])){
                $pdf = $_FILES['uploadEmoticon'];
 
                // Use the wordpress function to upload
                // test_upload_pdf corresponds to the position in the $_FILES array
                // 0 means the content is not associated with any other posts
                $uploaded=media_handle_upload('uploadEmoticon', 0);
                // Error checking using WP functions
                if(is_wp_error($uploaded)){
                        echo "Error uploading file: " . $uploaded->get_error_message();
                }else{
                        echo "File upload successful!";
                }
        }*/
        if(isset($_FILES['uploadEmoticon']['name'])){
          $target_dir = plugin_dir_path( __FILE__ ).'/emoticons/';
		  $filename = explode('.',$_FILES['uploadEmoticon']['name']);
		  $ext = $filename[1];
		  $imgname = time().'.'.$ext;
		  $target_file = $target_dir . $imgname ;
		  if (move_uploaded_file($_FILES["uploadEmoticon"]["tmp_name"], $target_file)) {
		     $wpdb->update(
                $table_name, //table
                array('emoji' => $imgname), //data
                array('id' => $id), //where
                array('%s'), //data format
                array('%s') //where format
             );
             wp_redirect('?page=title_tab_settings');
		    }
		}
 }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/titletab/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Choose Emoticon</h2>

            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
                <table class='wp-list-table widefat fixed'>
                    <tr><th>Choose emoticons</th><td><input type="file" name="uploadEmoticon" /></td></tr>
                    
                </table>
                <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
                
            </form>
       

    </div>
    <?php
}