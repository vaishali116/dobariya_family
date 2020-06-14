<?php

function register_data_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Register Users</h2>  
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "register";

        if (isset($_GET['deleteId'])) {
            $id = $_GET["deleteId"];
            $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = ". $id));
        }
        if (isset($_GET['deleteId'])) { ?>
            <div class="updated"><p>Data deleted</p></div>
            <a href="<?php echo admin_url('admin.php?page=register_data_list') ?>">&laquo; Back to data list</a>
            <?php 
        }else{
            $rows = $wpdb->get_results("SELECT * from $table_name Order by id ASC");
            $i=1;
            ?>
            <div class="tablenav top">
                <div class="alignleft actions">
                    <a href="<?php echo admin_url('admin.php?page=register_data_create'); ?>">Add New</a>
                </div>
                <br class="clear">
            </div>
            <table class='wp-list-table widefat fixed striped posts'>
                <tr>
                    <th class="manage-column ss-list-width"><b>ID</b></th>
                    <th class="manage-column ss-list-width"><b>Name </b></th>
                    <th class="manage-column ss-list-width"><b>Area</b></th>
                    <th class="manage-column ss-list-width"><b>city</b></th>
                    <th class="manage-column ss-list-width"><b>email</b></th>
                    <th class="manage-column ss-list-width"><b>Mobile</b></th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($rows as $row) { ?>
                    <tr>
                        <td class="manage-column ss-list-width"><?php echo $i++; ?></td>
                        <td class="manage-column ss-list-width"><?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name; ?></td>
                        <td class="manage-column ss-list-width"><?php echo $row->area; ?></td>
                        <td class="manage-column ss-list-width"><?php echo $row->city; ?></td>
                        <td class="manage-column ss-list-width"><?php echo $row->email; ?></td>
                        <td class="manage-column ss-list-width"><?php echo $row->mobile; ?></td>
                        <td>
                            <a href="<?php echo admin_url('admin.php?page=register_data_update&id=' . $row->id); ?>">Edit</a>
                            <a href="<?php echo $_SERVER['REQUEST_URI'].'&deleteId='.$row->id ?>" onclick= "confirm('Are you sure you want to delete this record ?');">
                                Delete
                            </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <?php
        }
    }