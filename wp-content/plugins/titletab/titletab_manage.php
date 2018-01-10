<?php
function title_tab_settings() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/titletab/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Title tab</h2>
        <div class="tablenav top">
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "titletab";

        $rows = $wpdb->get_results("SELECT * from $table_name");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
                <th class="manage-column ss-list-width">Title1</th>
                <th class="manage-column ss-list-width">Title2</th>
                <th class="manage-column ss-list-width">&nbsp;</th>
                <th class="manage-column ss-list-width">Status</th>
                <th class="manage-column ss-list-width">Emoji</th>
                <th class="manage-column ss-list-width">&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $row->title1; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->title2; ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=edit_title_tab_settings&id=' . $row->id); ?>">Edit</a></td>
                    <td class="manage-column ss-list-width">
                    	<?php if($row->status==1){
                    		echo "<a href='".admin_url('admin.php?page=status_update_title_tab_settings&id=' . $row->id.'&status='.$row->status)."'><button class='active-btn'>Active</button></a>";
                    	}else{
                    		echo "<a href='".admin_url('admin.php?page=status_update_title_tab_settings&id=' . $row->id.'&status='.$row->status)."'><button class='inactive-btn'>Inactive</button></a>";
                    	} ?>
                    </td>
                    <td class="manage-column ss-list-width"><img width="30" src="<?php echo WP_PLUGIN_URL; ?>/titletab/emoticons/<?php echo $row->emoji; ?>"></td>
                    <td class="manage-column ss-list-width"><a href="<?php echo admin_url('admin.php?page=upload_emoticon_title_settings&id=' . $row->id); ?>">Change emoji</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php
}