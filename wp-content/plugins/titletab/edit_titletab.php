<?php

function edit_title_tab_settings() {
    global $wpdb;
    $table_name = $wpdb->prefix . "titletab";
    $id = $_GET["id"];
    $title1 = $_POST["title1"];
    $title2 = $_POST["title2"];
//update
    if (isset($_POST['update'])) {
        $wpdb->update(
                $table_name, //table
                array('title1' => $title1,'title2' => $title2), //data
                array('id' => $id), //where
                array('%s'), //data format
                array('%s') //where format
        );
        wp_redirect('?page=title_tab_settings');
    }else {//selecting value to update  
        $titles = $wpdb->get_results($wpdb->prepare("SELECT * from $table_name where id=%s", $id));
        foreach ($titles as $s) {
            $title1 = $s->title1;
            $title2 = $s->title2;
        }
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/titletab/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Edit Data</h2>

        
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed'>
                    <tr><th>Title1</th><td><input type="text" name="title1" value="<?php echo $title1; ?>"/></td></tr>
                    <tr><th>Title2</th><td><input type="text" name="title2" value="<?php echo $title2; ?>"/></td></tr>
                    
                </table>
                <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
                
            </form>
        

    </div>
    <?php
}