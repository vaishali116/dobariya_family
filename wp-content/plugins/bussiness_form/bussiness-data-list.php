<?php

function bussiness_data_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Bussiness</h2>  
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "bussiness";

        if (isset($_GET['deleteId'])) {
            $id = $_GET["deleteId"];
            $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = ". $id));
        }
        if (isset($_GET['deleteId'])) { ?>
            <div class="updated"><p>Business deleted</p></div>
            <a href="<?php echo admin_url('admin.php?page=bussiness_data_list') ?>">&laquo; Back to data list</a>
            <?php 
        }else{
            $rows = $wpdb->get_results("SELECT * from $table_name Order by id ASC");
            $i=1;
            ?>
            <div class="tablenav top">
                <div class="alignleft actions">
                    <a href="<?php echo admin_url('admin.php?page=bussiness_data_create'); ?>">Add New</a>
                </div>
                <br class="clear">
            </div>
            <table class='wp-list-table widefat fixed striped posts'>
                <tr>
                    <th class="manage-column ss-list-width"><b>ID</b></th>
                    <th class="manage-column ss-list-width"><b>Register As</b></th>
                    <th class="manage-column ss-list-width"><b>Company Name</b></th>
                    <th class="manage-column ss-list-width"><b>Full Name</b></th>
                    <th class="manage-column ss-list-width"><b>Education</b></th>
                    <th class="manage-column ss-list-width"><b>Mobile</b></th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($rows as $row) { ?>
                    <tr>
                        <td class="manage-column ss-list-width"><?php echo $i++; ?></td>
                        <td class="manage-column ss-list-width"><?php echo $row->register_as; ?></td>
                        <td class="manage-column ss-list-width"><?php echo $row->company_name; ?></td>
                        <td class="manage-column ss-list-width"><?php echo $row->full_name; ?></td>
                        <td class="manage-column ss-list-width"><?php echo $row->education; ?></td>
                        <td class="manage-column ss-list-width"><?php echo $row->mobile; ?></td>
                        <td>
                            <a href="<?php echo admin_url('admin.php?page=bussiness_data_update&id=' . $row->id); ?>">Edit</a>
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
    ?>