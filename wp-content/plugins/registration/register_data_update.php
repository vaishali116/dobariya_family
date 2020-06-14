<?php
// function to create the DB / Options / Defaults
ini_set('error_reporting', E_STRICT);
function register_data_update() {
	global $wpdb;
	$table_name = $wpdb->prefix . "register";

    $fdetails = [];    
    if($_REQUEST['family_detail'] && $_REQUEST['family_detail']['title']){
        foreach ($_REQUEST['family_detail']['title'] as $key => $value) {
            $fdetails[$key]->title = $_REQUEST['family_detail']['title'][$key];
            $fdetails[$key]->first_name = $_REQUEST['family_detail']['first_name'][$key];
            $fdetails[$key]->middle_name = $_REQUEST['family_detail']['middle_name'][$key];
            $fdetails[$key]->last_name = $_REQUEST['family_detail']['last_name'][$key];
            $fdetails[$key]->relation = $_REQUEST['family_detail']['relation'][$key];
            $fdetails[$key]->gender = $_REQUEST['family_detail']['gender'][$key];
            $fdetails[$key]->blood_group = $_REQUEST['family_detail']['blood_group'][$key];
            $fdetails[$key]->birth_date = $_REQUEST['family_detail']['birth_date'][$key];
            $fdetails[$key]->qualification = $_REQUEST['family_detail']['qualification'][$key];
            $fdetails[$key]->occupation = $_REQUEST['family_detail']['occupation'][$key];
        }
    }

	$id = $_GET["id"];
	$title = $_REQUEST['title'];
	$first_name = $_REQUEST['first_name'];
	$middle_name = $_REQUEST['middle_name'];
	$last_name = $_REQUEST['last_name'];
	$street = $_REQUEST['street'];
	$landmark = $_REQUEST['landmark'];
	$area = $_REQUEST['area'];
	$city = $_REQUEST['city'];
	$post_code = $_REQUEST['post_code'];
	$mobile = $_REQUEST['mobile'];
	$other_mobile = $_REQUEST['other_mobile'];
	$email = $_REQUEST['email'];
	$village = $_REQUEST['village'];
	$created_at = date('Y-m-d H:i:s');
	$updated_at = date('Y-m-d H:i:s');
    $family_detail = json_encode($fdetails);
    //echo $family_detail;die;
//update
	if (isset($_POST['update'])) {
        $data = array(
                'title'=>$title, 
                'first_name'=>$first_name,
                'middle_name'=>$middle_name,
                'last_name'=>$last_name,
                'street'=>$street,
                'landmark'=>$landmark,
                'area'=>$area,
                'city'=>$city,
                'post_code'=>$post_code,
                'mobile'=>$mobile,
                'other_mobile'=>$other_mobile,
                'email'=>$email,
                'village'=>$village,
                'family_detail' => $family_detail
            );

        $wpdb->update( $table_name, $data,array('id'=>$id));

	}
//delete
	else if (isset($_POST['delete'])) {
		$wpdb->query($wpdb->prepare("DELETE FROM ".$table_name." WHERE id = %s", $id));
    } else {//selecting value to update	
    	$register = $wpdb->get_results($wpdb->prepare("SELECT * from ".$table_name." where id=%s", $id));

    	foreach ($register as $s) {
    		$title = $s->title;
            $first_name = $s->first_name;
            $middle_name = $s->middle_name;
            $last_name = $s->last_name;
            $street = $s->street;
            $landmark = $s->landmark;
            $area = $s->area;
            $city = $s->city;
            $post_code = $s->post_code;
            $mobile = $s->mobile;
            $other_mobile = $s->other_mobile;
            $email = $s->email;
            $village = $s->village;
            $created_at = date('Y-m-d H:i:s');
            $updated_at = date('Y-m-d H:i:s');
            $family_detail = json_encode($s->family_detail);
        }
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/style-admin.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <div class="wrap">
    	<h2>Register</h2>

    	<?php if ($_POST['delete']) { ?>
    		<div class="updated"><p>Data deleted</p></div>
    		<a href="<?php echo admin_url('admin.php?page=register_data_list') ?>">&laquo; Back to data list</a>

    	<?php } else if ($_POST['update']) { ?>
    		<div class="updated"><p>Data updated</p></div>
    		<a href="<?php echo admin_url('admin.php?page=register_data_list') ?>">&laquo; Back to data list</a>

    	<?php } else { ?>

         <form action="" name="form-registration" id="form-bussiness" method = "post">
            <fieldset class="border">
                <legend class="scheduler-border"><h4>Registration Form</h4></legend>
                <div class="row">   
                    <div class="col-md-2 text-right" style="border:0px red solid;">
                        <label for="title" class=""><b>Name</b></label> <span style="color:red;">*</span> :
                    </div>

                    <div class="col-md-1 text-center" style="border:0px red solid;">
                        <select id="title" name="title" style="padding:3.5px 8px;font-size: 12px;border-radius: 4px;border:1px lightgray solid;" required>
                            <option value="">Title</option>
                            <option value="Mr." <?php echo (!empty($title) && $title == 'Mr.') ? 'selected' : '' ?> >Mr.</option>
                            <option value="Mrs." <?= (!empty($title) && $title == 'Mrs.') ? 'selected' : '' ?>>Mrs.</option>
                            <option value="Miss." <?= (!empty($title) && $title == 'Miss.') ? 'selected' : '' ?>>Miss.</option>
                        </select>
                    </div>

                    <div class="col-md-3" style="padding:  0px 15px 0px 0px !important;">
                        <div class="form-group">
                            <input type="text" id="first_name" name="first_name" class="form-control form-control-sm" placeholder="First Name" value="<?= (!empty($first_name)) ? $first_name :'' ?>" required>
                        </div>
                    </div>

                    <div class="col-md-3" style="padding:  0px 15px 0px 0px !important;">
                        <div class="form-group">
                            <input type="text" id="middle_name" name="middle_name" class="form-control form-control-sm" value="<?= (!empty($middle_name)) ? $middle_name :'' ?>" placeholder="Middle Name" required>
                        </div>
                    </div>

                    <div class="col-md-3" style="padding:  0px 15px 0px 0px !important;">
                        <div class="form-group">
                            <input type="text" id="last_name" name="last_name" class="form-control form-control-sm" placeholder="Last Name" value="<?= (!empty($last_name)) ? $last_name :'' ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 text-right" style="border:0px red solid;">
                        <label for="street"><b>Address</b></label> <span style="color:red;">*</span> :
                    </div>

                    <div class="col-md-2" style="padding:  0px 15px 0px 15px !important;">
                        <div class="form-group">
                            <input type="text" id="street" name="street" class="form-control form-control-sm" placeholder="Street" value="<?= (!empty($street)) ? $street :'' ?>" style="font-size: 12px;" required>
                        </div>
                    </div>

                    <div class="col-md-2" style="padding:  0px 15px 0px 0px !important;">
                        <div class="form-group">
                            <input type="text" id="landmark" value="<?= (!empty($landmark)) ? $landmark :'' ?>" name="landmark" class="form-control form-control-sm" placeholder="Landmark" style="font-size: 12px;" required>
                        </div>
                    </div>

                    <div class="col-md-2" style="padding:  0px 15px 0px 0px !important;">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" id="area" name="area" placeholder="Area" value="<?= (!empty($area)) ? $area :'' ?>" style="font-size: 12px;" required>
                        </div>
                    </div>

                    <div class="col-md-2" style="padding:  0px 15px 0px 0px !important;">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" placeholder="City" id="city" name="city" value="<?= (!empty($city)) ? $city :'' ?>" style="font-size: 12px;" required>
                        </div>
                    </div>

                    <div class="col-md-2" style="padding:  0px 15px 0px 0px !important;">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Post Code" id="post_code" name="post_code" value="<?= (!empty($post_code)) ? $post_code :'' ?>" style="font-size: 12px;" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 text-right" style="border:0px red solid;">
                        <label for="mobile"><b>Mobile</b></label> <span style="color:red;">*</span> :
                    </div>

                    <div class="col-md-2" style="padding:  0px 15px 0px 15px !important;">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Mobile" id="mobile" name="mobile" value="<?= (!empty($mobile)) ? $mobile :'' ?>" style="font-size: 12px;" required>
                        </div>
                    </div>

                    <div class="col-md-2" style="padding:  0px 15px 0px 0px !important;">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Other Mobile" id="other_mobile" name="other_mobile" value="<?= (!empty($other_mobile)) ? $other_mobile :'' ?>" style="font-size: 12px;">
                        </div>
                    </div>

                    <div class="col-md-2 text-right" style="border:0px red solid;">
                        <label for="email"><b>Email</b></label> <span style="color:red;">*</span> :
                    </div>

                    <div class="col-md-2" style="padding:  0px 15px 0px 0px !important;">
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control form-control-sm" placeholder="Email" value="<?= (!empty($email)) ? $email :'' ?>" style="font-size: 12px;" required>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-2 text-right" style="border:0px red solid;">
                        <label for="village"><b>Village</b></label> <span style="color:red;">*</span> :
                    </div>

                    <div class="col-md-2" style="padding:  0px 15px 0px 15px !important;">
                        <div class="form-group">
                            <input type="text" id="village" name="village" class="form-control form-control-sm" placeholder="Village" value="<?= (!empty($village)) ? $village :'' ?>" style="font-size: 12px;" required>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset class="border" style="margin-top: 10px !important;">
                <legend class="scheduler-border" style="width: 230px;"><h4>Family Members</h4></legend>
                <?php 

                $detail = json_decode($family_detail,true);
                $familydetail = json_decode($detail);
                foreach ($familydetail as $familyKey => $familyValue) {
                    ?>
                    <!--NEW FORM-->
                    <div class="familydetail" id="familydetail1">
                      <div class="row">   
                        <div class="col-md-2 text-right" style="border:0px red solid;">
                            <label for="title" class=""><b>Name</b></label> <span style="color:red;">*</span> :
                        </div>

                        <div class="col-md-1 text-center" style="border:0px red solid;">

                            <select id="title" name="family_detail[title][]" style="padding:3.5px 8px;font-size: 12px;border-radius: 4px;border:1px lightgray solid;">
                                <option value="">Title</option>
                                <option value="0" <?= (!empty($familyValue) && $familyValue->title == 0) ? 'selected' : '' ?> >Mr.</option>
                                <option value="1" <?= (!empty($familyValue) && $familyValue->title == 1) ? 'selected' : '' ?>>Mrs.</option>
                                <option value="2" <?= (!empty($familyValue) && $familyValue->title == 2) ? 'selected' : '' ?> >Miss.</option>
                            </select>
                        </div>

                        <div class="col-md-3" style="padding:  0px 15px 0px 0px !important;">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" id="first_name" name="family_detail[first_name][]" value="<?= (!empty($familyValue)) ? $familyValue->first_name : '' ?>" placeholder="First Name" required>
                            </div>
                        </div>

                        <div class="col-md-3" style="padding:  0px 15px 0px 0px !important;">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Middle Name" id="middle_name" name="family_detail[middle_name][]" value="<?= (!empty($familyValue)) ? $familyValue->middle_name : '' ?>" required>
                            </div>
                        </div>

                        <div class="col-md-3" style="padding:  0px 15px 0px 0px !important;">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Last Name" id="last_name" name="family_detail[last_name][]" value="<?= (!empty($familyValue)) ? $familyValue->last_name : '' ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">   
                        <div class="col-md-2 text-right" style="border:0px red solid;">
                            <label for="relation" class=""><b>Relation</b></label> <span style="color:red;">*</span> :
                        </div>

                        <div class="col-md-2" style="border:0px red solid;">

                            <select id="relation" name="family_detail[relation][]" style="padding:3.5px 8px;font-size: 12px;border-radius: 4px;border:1px lightgray solid;" required>
                                <option value="">Select</option>
                                <option selected value="Title" <?= (!empty($familyValue) && $familyValue->relation == 'Title') ? 'selected' : '' ?> >Self</option>
                                <option value="Mr." <?= (!empty($familyValue) && $familyValue->relation == 'Mr.') ? 'selected' : '' ?> >Mother</option>
                                <option value="Mrs." <?= (!empty($familyValue) && $familyValue->relation == 'Mrs.') ? 'selected' : '' ?> >Father</option>
                                <option value="Miss." <?= (!empty($familyValue) && $familyValue->relation == 'Miss.') ? 'selected' : '' ?> >Grandmother</option>
                                <option value="Grandfather" <?= (!empty($familyValue) && $familyValue->relation == 'Grandfather') ? 'selected' : '' ?> >Grandfather</option>
                                <option value="Wife" <?= (!empty($familyValue) && $familyValue->relation == 'Wife') ? 'selected' : '' ?> >Wife</option>
                                <option value="Son" <?= (!empty($familyValue) && $familyValue->relation == 'Son') ? 'selected' : '' ?> >Son</option>
                                <option value="Daughter" <?= (!empty($familyValue) && $familyValue->relation == 'Daughter') ? 'selected' : '' ?>>Daughter</option>
                                <option value="Daughter-in-law" <?= (!empty($familyValue) && $familyValue->relation == 'Daughter-in-law') ? 'selected' : '' ?> >Daughter-in-law</option>
                                <option value="Brother" <?= (!empty($familyValue) && $familyValue->relation == 'Brother') ? 'selected' : '' ?> >Brother</option>
                                <option value="Sister" <?= (!empty($familyValue) && $familyValue->relation == 'Sister') ? 'selected' : '' ?> >Sister</option>
                                <option value="Sister-in-law" <?= (!empty($familyValue) && $familyValue->relation == 'Sister-in-law') ? 'selected' : '' ?> >Sister-in-law</option>
                                <option value="Uncle" <?= (!empty($familyValue) && $familyValue->relation == 'Uncle') ? 'selected' : '' ?> >Uncle</option>
                                <option value="Aunty" <?= (!empty($familyValue) && $familyValue->relation == 'Aunty') ? 'selected' : '' ?> >Aunty</option>
                                <option value="Nephew" <?= (!empty($familyValue) && $familyValue->relation == 'Nephew') ? 'selected' : '' ?> >Nephew</option>
                                <option value="Niece" <?= (!empty($familyValue) && $familyValue->relation == 'Niece') ? 'selected' : '' ?> >Niece</option>
                                <option value="Cousin" <?= (!empty($familyValue) && $familyValue->relation == 'Cousin') ? 'selected' : '' ?> >Cousin</option>
                                <option value="Grandson" <?= (!empty($familyValue) && $familyValue->relation == 'Grandson') ? 'selected' : '' ?> >Grandson</option>
                                <option value="Granddaughter" <?= (!empty($familyValue) && $familyValue->relation == 'Granddaughter') ? 'selected' : '' ?> >Granddaughter</option>
                            </select>
                        </div>

                        <div class="col-md-2 text-right" style="border:0px red solid;">
                            <label for="gender" class=""><b>Gender</b></label> <span style="color:red;">*</span> :
                        </div>

                        <div class="col-md-1 text-center" style="border:0px red solid;">

                            <select id="gender" name="family_detail[gender][]" style="padding:3.5px 8px;font-size: 12px;border-radius: 4px;border:1px lightgray solid;" required>
                                <option value="">Select</option>
                                <option value="Male" <?= (!empty($familyValue) && $familyValue->gender == 'Male') ? 'selected' : '' ?> >Male</option>
                                <option value="Female" <?= (!empty($familyValue) && $familyValue->gender == 'Female') ? 'selected' : '' ?> >Female</option>
                            </select>
                        </div>

                        <div class="col-md-2 text-right" style="border:0px red solid;">
                            <label for="bgp" class=""><b>Blood Group</b></label> <span style="color:red;">&nbsp;</span> :
                        </div>

                        <div class="col-md-1 text-center" style="border:0px red solid;">

                            <select id="blood_group" name="family_detail[blood_group][]" style="padding:3.5px 8px;font-size: 12px;border-radius: 4px;border:1px lightgray solid;" required>
                                <option value="">Select</option>
                                <option value="A+" <?= (!empty($familyValue) && $familyValue->blood_group == 'A+') ? 'selected' : '' ?> >A+</option>
                                <option value="A-" <?= (!empty($familyValue) && $familyValue->blood_group == 'A-') ? 'selected' : '' ?> >A-</option>
                                <option value="B+" <?= (!empty($familyValue) && $familyValue->blood_group == 'B+') ? 'selected' : '' ?> >B+</option>
                                <option value="B-" <?= (!empty($familyValue) && $familyValue->blood_group == 'B-') ? 'selected' : '' ?> >B-</option>
                                <option value="AB+" <?= (!empty($familyValue) && $familyValue->blood_group == 'AB+') ? 'selected' : '' ?> >AB+</option>
                                <option value="AB-" <?= (!empty($familyValue) && $familyValue->blood_group == 'AB-') ? 'selected' : '' ?> >AB-</option>
                                <option value="O+" <?= (!empty($familyValue) && $familyValue->blood_group == 'O+') ? 'selected' : '' ?> >O+</option>
                                <option value="O-" <?= (!empty($familyValue) && $familyValue->blood_group == 'O-') ? 'selected' : '' ?> >O-</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 text-right mt-2" style="border:0px red solid;">
                            <label for="birth_date" class=""><b>Birthdate</b></label> <span style="color:red;">&nbsp;</span> :
                        </div>

                        <div class="col-md-2 mt-2" style="">
                            <div class="form-group">
                                <input type="date" id="birth_date" name="family_detail[birth_date][]" class="form-control form-control-sm" value="<?= (!empty($familyValue)) ? $familyValue->birth_date : '' ?>" placeholder="DD/MM/YYYY">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-2 text-right" style="border:0px red solid;">
                            <label for="qualification" class=""><b>Qualification</b></label> <span style="color:red;">&nbsp;</span> :
                        </div>

                        <div class="col-md-2 " style="">
                            <div class="form-group">
                                <input type="text" id="qualification" name="family_detail[qualification][]" class="form-control form-control-sm" value="<?= (!empty($familyValue)) ? $familyValue->qualification : '' ?>" placeholder="Qualification" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-2 text-right" style="border:0px red solid;">
                            <label for="occupation" class=""><b>Occupation</b></label> <span style="color:red;">&nbsp;</span> :
                        </div>

                        <div class="col-md-2 " style="">
                            <div class="form-group">
                                <input type="text" id="occupation" name="family_detail[occupation][]" class="form-control form-control-sm" value="<?= (!empty($familyValue)) ? $familyValue->occupation : '' ?>" placeholder="Occupation" required>
                            </div>
                        </div>

                        <div class="col-md-2"></div>
                        <div class="col-md-4 text-center mt-1"></div>
                        <div class="col-md-2"></div>
                    </div>
                    <hr>
                </div>
            <?php } ?>
                    <div class="row" style="padding: 30px;">
                        <div class="col-md-4 text-center mt-1">
                            <a href="javascrit:void(0)" name="clone_div" id="clone_div"> click here to add new member form</a>
                        </div>

                        <div class="col-md-2">

                            <input type = "submit" name = "update" class="btn  btn-primary" value = "Submit" style="padding: 5px 20px;font-size: 15px;">
                        </div>
                    </div>
                </fieldset> 
            </form>
            <script type="text/javascript">
                $( document ).ready(function() {
                    $( "#clone_div" ).click(function() {
                        var clone = $('#familydetail1').clone();
                        clone.find("input").val("");
                        clone.find('select option').prop('selected',false);
                        $("div[id^='familydetail']:last").after(clone);
                    });

                });
            </script> 
        <?php } ?>

    </div>
    <?php
}