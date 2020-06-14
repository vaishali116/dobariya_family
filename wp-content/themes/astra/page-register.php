<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Graduate
 */
get_header(); 
ini_set('error_reporting', E_STRICT);

?>
<?php if ( has_post_thumbnail() ) : ?>
	<div class="post-thumb-img-content post-thumb"><?php the_post_thumbnail('full'); ?></div>
<?php endif; ?>	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
	.ast-separate-container {
		background-color: #FFF !important;
	}
	fieldset.border {
		border: 1px solid #000 !important;
		border-radius: 10px 0px;
		padding: 0px 20px !important;
		margin: 0px !important;
	}
	legend.scheduler-border {
		border:none;
		width:250px;
		font-size: 1.2em !important;
		font-weight: bold !important;
		text-align: left !important;
		color: #a19db3 !important;
		padding-left: 10px !important;
	}
	input{
		font-size: 12px !important;
	}
	
</style>
<?php 
if($_REQUEST['submit']) {
	global $wpdb; 
			 //echo "<pre/>";
	
	$details = [];
	if($_REQUEST['family_detail'] && $_REQUEST['family_detail']['title']){
		foreach ($_REQUEST['family_detail']['title'] as $key => $value) {
			$details[$key]->title = $_REQUEST['family_detail']['title'][$key];
			$details[$key]->first_name = $_REQUEST['family_detail']['first_name'][$key];
			$details[$key]->middle_name = $_REQUEST['family_detail']['middle_name'][$key];
			$details[$key]->last_name = $_REQUEST['family_detail']['last_name'][$key];
			$details[$key]->relation = $_REQUEST['family_detail']['relation'][$key];
			$details[$key]->gender = $_REQUEST['family_detail']['gender'][$key];
			$details[$key]->blood_group = $_REQUEST['family_detail']['blood_group'][$key];
			$details[$key]->birth_date = $_REQUEST['family_detail']['birth_date'][$key];
			$details[$key]->qualification = $_REQUEST['family_detail']['qualification'][$key];
			$details[$key]->occupation = $_REQUEST['family_detail']['occupation'][$key];
		}
	}
			 //print_r($details);
			 //print_r($_REQUEST);
			 //die("44");
	$password = $_REQUEST['password'];
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
	$family_detail = json_encode($details);
	
			   //$check_email = get_user_by( 'email', $email );
	
			   //$user_id = wp_create_user( $first_name, $password, $email );
			  // $user = get_user_by( 'id', $user_id );
	
	$save = $wpdb->query("INSERT INTO wp_register 
		(title,
		first_name,
		middle_name,
		last_name,
		street,
		landmark,
		area,
		city,
		post_code,
		mobile,other_mobile,email,village,created_at,updated_at,family_detail) 
		VALUES ('".$title."','".$first_name."','".$middle_name."','".$last_name."','".$street."','".$landmark."','".$area."','".$city."','".$post_code."','".$mobile."','".$other_mobile."','".$email."','".$village."','".$created_at."','".$updated_at."','".$family_detail."')" );	

		if($save){?>
			<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 30px;">
				Data Saved Successfully.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php }else{ ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: 30px;">
				Something went wrong. Please Try again Later.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php }			 
		
	}
	
	?>
	
	<div class="container" style="padding:50px 0px 50px 0px">
		<form action="" name="form-registration" id="form-bussiness" method = "post">
			<fieldset class="border">
				<legend class="scheduler-border"><h4>Registration Form</h4></legend>
				<div class="row">	
					<div class="col-md-2 text-right" style="border:0px red solid;">
						<label for="title" class=""><b>Name</b></label> <span style="color:red;">*</span> :
					</div>

					<div class="col-md-1 text-center" style="border:0px red solid;">
						
						<select id="title" name="title" style="font-size: 12px;border-radius: 4px;border:1px lightgray solid;" required>
							<option selected disabled value="">Title</option>
							<option value="Mr.">Mr.</option>
							<option value="Mrs.">Mrs.</option>
							<option value="Miss.">Miss.</option>
						</select>
					</div>
					
					<div class="col-md-3" style="padding:  0px 15px 0px 0px !important;">
						<div class="form-group">
							<input type="text" id="first_name" name="first_name" class="form-control form-control-sm" placeholder="First Name" required>
						</div>
					</div>

					<div class="col-md-3" style="padding:  0px 15px 0px 0px !important;">
						<div class="form-group">
							<input type="text" id="middle_name" name="middle_name" class="form-control form-control-sm" placeholder="Middle Name" required>
						</div>
					</div>
					
					<div class="col-md-3" style="padding:  0px 15px 0px 0px !important;">
						<div class="form-group">
							<input type="text" id="last_name" name="last_name" class="form-control form-control-sm" placeholder="Last Name" required>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-2 text-right" style="border:0px red solid;">
						<label for="street"><b>Address</b></label> <span style="color:red;">*</span> :
					</div>

					<div class="col-md-2" style="padding:  0px 15px 0px 15px !important;">
						<div class="form-group">
							<input type="text" id="street" name="street" class="form-control form-control-sm" placeholder="Street" style="font-size: 12px;" required>
						</div>
					</div>

					<div class="col-md-2" style="padding:  0px 15px 0px 0px !important;">
						<div class="form-group">
							<input type="text" id="landmark" name="landmark" class="form-control form-control-sm" placeholder="Landmark" style="font-size: 12px;" required>
						</div>
					</div>

					<div class="col-md-2" style="padding:  0px 15px 0px 0px !important;">
						<div class="form-group">
							<input type="text" class="form-control form-control-sm" id="area" name="area" placeholder="Area" style="font-size: 12px;" required>
						</div>
					</div>

					<div class="col-md-2" style="padding:  0px 15px 0px 0px !important;">
						<div class="form-group">
							<input type="text" class="form-control form-control-sm" placeholder="City" id="city" name="city" style="font-size: 12px;" required>
						</div>
					</div>

					<div class="col-md-2" style="padding:  0px 15px 0px 0px !important;">
						<div class="form-group">
							<input type="text" class="form-control form-control-sm" placeholder="Post Code" id="post_code" name="post_code" style="font-size: 12px;" required>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-2 text-right" style="border:0px red solid;">
						<label for="mobile"><b>Mobile</b></label> <span style="color:red;">*</span> :
					</div>

					<div class="col-md-2" style="padding:  0px 15px 0px 15px !important;">
						<div class="form-group">
							<input type="text" class="form-control form-control-sm" placeholder="Mobile" id="mobile" name="mobile" style="font-size: 12px;" required>
						</div>
					</div>

					<div class="col-md-2" style="padding:  0px 15px 0px 0px !important;">
						<div class="form-group">
							<input type="text" class="form-control form-control-sm" placeholder="Other Mobile" id="other_mobile" name="other_mobile" style="font-size: 12px;">
						</div>
					</div>
					
					<div class="col-md-2 text-right" style="border:0px red solid;">
						<label for="email"><b>Email</b></label> <span style="color:red;">*</span> :
					</div>

					<div class="col-md-2" style="padding:  0px 15px 0px 0px !important;">
						<div class="form-group">
							<input type="email" id="email" name="email" class="form-control form-control-sm" placeholder="Email" style="font-size: 12px;" required>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-2 text-right" style="border:0px red solid;">
						<label for="password"><b>Password</b></label> <span style="color:red;">*</span> :
					</div>

					<div class="col-md-2" style="padding:  0px 15px 0px 15px !important;">
						<div class="form-group">
							<input type="Password" class="form-control form-control-sm" placeholder="Password" id="password" name="password" style="font-size: 12px;" required>
						</div>
					</div>

					<div class="col-md-2" style="padding:  0px 15px 0px 0px !important;">
						<div class="form-group">
							<input type="password" class="form-control form-control-sm" placeholder="Confirm Password" id="confirm_password" name="confirm_password" style="font-size: 12px;">
						</div>
					</div>

					<div class="col-md-2 text-right" style="border:0px red solid;">

					</div>

					<div class="col-md-2" style="padding:  0px 15px 0px 0px !important;">
						<div class="form-group">

						</div>
					</div>
				</div>

				<div class="row">
					
					<div class="col-md-2 text-right" style="border:0px red solid;">
						<label for="village"><b>Village</b></label> <span style="color:red;">*</span> :
					</div>

					<div class="col-md-2" style="padding:  0px 15px 0px 15px !important;">
						<div class="form-group">
							<input type="text" id="village" name="village" class="form-control form-control-sm" placeholder="Village" style="font-size: 12px;" required>
						</div>
					</div>
				</div>
			</fieldset>
			
			<fieldset class="border" style="margin-top: 10px !important;">
				<legend class="scheduler-border" style="width: 230px;"><h4>Family Members</h4></legend>
				
				<!--NEW FORM-->
				<div class="familydetail" id="familydetail1">
					<!-- <h3 style="text-align: center;color: #a19db3;margin-top: -10px !important;" class="member_num">
						Member <span>1</span></h3> -->
						
						<div class="row">	
							<div class="col-md-2 text-right" style="border:0px red solid;">
								<label for="title" class=""><b>Name</b></label> <span style="color:red;">*</span> :
							</div>

							<div class="col-md-1 text-center" style="border:0px red solid;">
								
								<select id="title" name="family_detail[title][]" style="font-size: 12px;border-radius: 4px;border:1px lightgray solid;">
									<option selected disabled value="Title">Title</option>
									<option value="0">Mr.</option>
									<option value="1">Mrs.</option>
									<option value="2">Miss.</option>
								</select>
							</div>
							
							<div class="col-md-3" style="padding:  0px 15px 0px 0px !important;">
								<div class="form-group">
									<input type="text" class="form-control form-control-sm" id="first_name" name="family_detail[first_name][]" placeholder="First Name" required>
								</div>
							</div>

							<div class="col-md-3" style="padding:  0px 15px 0px 0px !important;">
								<div class="form-group">
									<input type="text" class="form-control form-control-sm" placeholder="Middle Name" id="middle_name" name="family_detail[middle_name][]" required>
								</div>
							</div>
							
							<div class="col-md-3" style="padding:  0px 15px 0px 0px !important;">
								<div class="form-group">
									<input type="text" class="form-control form-control-sm" placeholder="Last Name" id="last_name" name="family_detail[last_name][]" required>
								</div>
							</div>
						</div>
						
						<div class="row">	
							<div class="col-md-2 text-right" style="border:0px red solid;">
								<label for="relation" class=""><b>Relation</b></label> <span style="color:red;">*</span> :
							</div>

							<div class="col-md-2" style="border:0px red solid;">
								
								<select id="relation" name="family_detail[relation][]" style="padding:3.5px 8px;font-size: 12px;border-radius: 4px;border:1px lightgray solid;" required>
									<option disabled value="select">Select</option>
									<option selected value="Title">Self</option>
									<option value="Mr.">Mother</option>
									<option value="Mrs.">Father</option>
									<option value="Miss.">Grandmother</option>
									<option value="Grandfather">Grandfather</option>
									<option value="Wife">Wife</option>
									<option value="Son">Son</option>
									<option value="Daughter">Daughter</option>
									<option value="Daughter-in-law">Daughter-in-law</option>
									<option value="Brother">Brother</option>
									<option value="Sister">Sister</option>
									<option value="Sister-in-law">Sister-in-law</option>
									<option value="Uncle">Uncle</option>
									<option value="Aunty">Aunty</option>
									<option value="Nephew">Nephew</option>
									<option value="Niece">Niece</option>
									<option value="Cousin">Cousin</option>
									<option value="Grandson">Grandson</option>
									<option value="Granddaughter">Granddaughter</option>
								</select>
							</div>

							<div class="col-md-2 text-right" style="border:0px red solid;">
								<label for="gender" class=""><b>Gender</b></label> <span style="color:red;">*</span> :
							</div>

							<div class="col-md-1 text-center" style="border:0px red solid;">
								
								<select id="gender" name="family_detail[gender][]" style="padding:3.5px 8px;font-size: 12px;border-radius: 4px;border:1px lightgray solid;" required>
									<option disabled selected value="Title">Select</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>

							<div class="col-md-2 text-right" style="border:0px red solid;">
								<label for="bgp" class=""><b>Blood Group</b></label> <span style="color:red;">&nbsp;</span> :
							</div>

							<div class="col-md-1 text-center" style="border:0px red solid;">
								
								<select id="blood_group" name="family_detail[blood_group][]" style="padding:3.5px 8px;font-size: 12px;border-radius: 4px;border:1px lightgray solid;" required>
									<option disabled selected value="Title">Select</option>
									<option value="A+">A+</option>
									<option value="A-">A-</option>
									<option value="B+">B+</option>
									<option value="B-">B-</option>
									<option value="AB+">AB+</option>
									<option value="AB-">AB-</option>
									<option value="O+">O+</option>
									<option value="O-">O-</option>
								</select>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2 text-right mt-2" style="border:0px red solid;">
								<label for="birth_date" class=""><b>Birthdate</b></label> <span style="color:red;">&nbsp;</span> :
							</div>

							<div class="col-md-2 mt-2" style="">
								<div class="form-group">
									<input type="date" id="birth_date" name="family_detail[birth_date][]" class="form-control form-control-sm" placeholder="DD/MM/YYYY">
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-md-2 text-right" style="border:0px red solid;">
								<label for="qualification" class=""><b>Qualification</b></label> <span style="color:red;">&nbsp;</span> :
							</div>

							<div class="col-md-2 " style="">
								<div class="form-group">
									<input type="text" id="qualification" name="family_detail[qualification][]" class="form-control form-control-sm" placeholder="Qualification" required>
								</div>
							</div>
							
						</div>

						<div class="row">
							<div class="col-md-2 text-right" style="border:0px red solid;">
								<label for="occupation" class=""><b>Occupation</b></label> <span style="color:red;">&nbsp;</span> :
							</div>

							<div class="col-md-2 " style="">
								<div class="form-group">
									<input type="text" id="occupation" name="family_detail[occupation][]" class="form-control form-control-sm" placeholder="Occupation" required>
								</div>
							</div>

							<div class="col-md-2"></div>
							<div class="col-md-4 text-center mt-1"></div>
							<div class="col-md-2"></div>
						</div>
						<hr>
					</div>
					<div class="row" style="padding: 30px;">
						<div class="col-md-4 text-center mt-1">
							<a href="javascrit:void(0)" name="clone_div" id="clone_div"> click here to add new member form</a>
						</div>
						
						<div class="col-md-2">
							
							<input type = "submit" name = "submit" class="btn  btn-primary" value = "Submit" style="    padding: 10px 20px;font-size: 15px !important;border: 1px solid;border-radius: 10px;">
						</div>
					</div>
				</fieldset>	
			</form>
		</div>
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


		<?php
		get_footer();
		?>
