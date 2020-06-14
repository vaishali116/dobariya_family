<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Graduate
 */
 
get_header(); 
define('WP_DEBUG',true);
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
<?php if ( has_post_thumbnail() ) : ?>
	<div class="post-thumb-img-content post-thumb"><?php the_post_thumbnail('full'); ?></div>
<?php endif; ?>	
<div class="container" style="padding: 50px 0px 50px 0px;width: fit-content;">
	<style type="text/css">
		.ast-separate-container {
			background-color: #FFF !important;
		}
		form#form-bussiness {
			border: 1px solid #ccc;
			border-radius: 20px;
			padding: 24px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			margin-top: 40px;

		}
	</style>
<?php

if($_REQUEST['submit']) {
     global $wpdb; 
     $table_name ='wp_bussiness';
	 $register_as = $_REQUEST['register_as'];
	 $full_name = $_REQUEST['full_name'];
	 $gender = $_REQUEST['gender'];
	 $birthdate = $_REQUEST['birthdate'];
	 $company_name = $_REQUEST['company_name'];
	 $address = $_REQUEST['address'];
	 $city = $_REQUEST['city'];
	 $village = $_REQUEST['village']; 
	 $education = $_REQUEST['education'];
	 $mobile = $_REQUEST['mobile'];
	 $whatsapp_no = $_REQUEST['whatsapp_no'];
	 $email = $_REQUEST['email'];
	 $bussiness_category = $_REQUEST['bussiness_category'];
	 $website = $_REQUEST['website'];
	 $created_date = date('Ý-m-d');
	 $updated_date = date('Ý-m-d');
	 
     $save = $wpdb->query("INSERT INTO ".$table_name." (register_as,full_name,gender,birthdate,company_name,address,city,village,education,mobile,whatsapp_no,email,bussiness_category,website,created_date,updated_date) 
	 VALUES ('".$register_as."','".$full_name."','".$gender."','".$birthdate."','".$company_name."','".$address."','".$city."','".$village."','".$education."','".$mobile."','".$whatsapp_no."','".$email."','".$bussiness_category."','".$website."','".$created_date."','".$updated_date."')" );
	  
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

		<h4 style="color: #2856a3;"> <strong>Youth Skills Development mission registraion form:</strong> </h4>

		<form action="" name="form-bussiness" id="form-bussiness" method = "post">
			
			<div class="form-group">
				<label for="full_name"><b>Register as</b></label>	<br/>	
				<input type="radio" id="register_as_comp" value="company" name="register_as">
				<label for="com" >Company</label>
				
				<input type="radio" id="register_as_studen" value="student" name="register_as">
				<label for="stu">Student</label>
			</div>

			<div class="form-group">
			<label for="full_name"><b>Full Name</b></label>			
			<input class="form-control" type="text" id="full_name" name="full_name" placeholder="Full Name" size="50%">
			</div>

			<div class="form-group">
				<b>Gender</b><br>
				<input type="radio" name="gender" id="male" value="male" >
				<label for="male">Male</label><br>
				<input type="radio" name="gender" id="female" value="female" >
				<label for="female">Female</label>
			</div>

			<div class="form-group">
				<label for="birthdate"><b>Birthday</b></label>
				<input type="date" id="birthdate" name="birthdate" placeholder="DD/MM/YYYY" class="form-control">
			</div>

			<div class="form-group">
				<label for="company_name"><b>Company Name</b></label>
				<input type="text" id="company_name" name="company_name" placeholder="Company Name" class="form-control">
			</div>			

			<div class="form-group">
				<label for="address"><b>Address</b></label><br>
				<textarea  id="address" name="address" class="form-control" rows="3"></textarea>
			</div>

			<div class="form-group">
				<label for="city"><b>City</b></label>
				<input type="text" id="city" name="city" placeholder="City" class="form-control">
			</div>

			<div class="form-group">
				<label for="village"><b>Village</b></label>
				<input type="text" id="village" name="village" placeholder="Village" class="form-control">
			</div>
		
			<div class="form-group">
				<label for="education"><b>Education</b></label>
				<input type="text" id="edu" name="education" placeholder="Education" class="form-control">
			</div>
	
			<div class="form-group">
				<label for="mobile"><b>Mobile</b> (Example: 9898586523)</label>
				<input type="text" id="mobile" name="mobile" placeholder="Mobile" class="form-control">
			</div>

			<div class="form-group">
				<label for="whatsapp_no"><b>Whatsapp No</b></label>
				<input type="text" id="whatsapp_no" name="whatsapp_no" placeholder="Whatsapp No" class="form-control">
			</div>
	
			<div class="form-group">
				<label for="email"><b>Email</b></label>
				<input type="email" name="email" id="email" placeholder="Email" class="form-control">
			</div>
		
			<label for=""><b>Business Category</b></label>
			<select name="bussiness_category" id="bussiness_category" class="custom-select">
				<option value="">Select Bussiness Category</option>
                <option value="advertising_service">Advertising Services</option>
				<option value="agriculture">Agriculture</option>
				<option value="agro_processing">Agro Processing</option>
				<option value="automobile" >>Automobile</option>
				<option value="ayurvedic_and_naturopathy" >Ayurvedic and Naturopathy</option>
				<option value="beauty_care" >Beauty care</option>
				<option value="cafes">Cafes</option>
				<option value="ceramics">Ceramics</option>
				<option value="ceramics_machinery" >Ceramics Machinery</option>
				<option value="chemicals" >Chemicals</option>
				<option value="cold_storage" >Cold Storage</option>
				<option value="computer_hardware" >Computer Hardware</option>
				<option value="construction" >Construction</option>
				<option value="consultancy_and_training_services" >Consultancy and Training Services</option>
				<option value="courier_services" >Courier Services</option>
				<option value="dairy_products" >Dairy Products</option>
				<option value="education" >Education</option>
				<option value="electricals" >Electricals</option>
				<option value="energy_and_power">Energy and Power</option>
				<option value="engineering" >Engineering</option>
				<option value="entertainment" >Entertainment</option>
				<option value="financial_services"  >Financial Services</option>
				<option value="food_and_bverages" >Food and Bverages</option>
				<option value="foundry" >Foundry</option>
				<option value="garments_and_accessories" >Garments and Accessories</option>
				<option value="gems_and_jewellery" >Gems and jewellery</option>
				<option value="handcraft_items" >Handcraft Items</option>
				<option value="home_decor" >Home Decor</option>
				<option value="home_products">Home Products</option>
				<option value="hotels" >Hotels</option>
				<option value="insurance" >Insurance</option>
				<option value="iron_and_steel" >Iron and Steel</option>
				<option value="it_and_software" >It and Software</option>
				<option value="legal_services">Legal Services</option>
				<option value="matrimonial_service" >Matrimonial Service</option>
				<option value="media">Media</option>
				<option value="medical">Medical</option>
				<option value="mining">Mining</option>
				<option value="music">Music</option>
				<option value="paper_and_stationary">Paper and Stationery</option>
				<option value="petroleum">Petroleum</option>
				<option value="pharmaceuticals">Pharmaceuticals</option>
				<option value="photography">Photography</option>
				<option value="plastic">Plastic</option>
				<option value="ports_and_shipbuilding">Ports and Shipbuilding</option>
				<option value="printing_and_publishing">Printing and Publishing</option>
				<option value="real_estate">Real Estate</option>
				<option value="rental_services">Rental Services</option>
				<option value="restaurants">Restaurants</option>
				<option value="security_services">Security Services</option>
				<option value="shipbuilding">Shipbuilding</option>
				<option value="sports">Sports</option>
				<option value="telecom">Telecom</option>
				<option value="textiles">Textiles</option>
				<option value="transport">Transport</option>
				<option>Travel and Tourism</option>
				<option>Videography</option>
				<option>Water</option>
			</select>
		
			<div class="form-group">
				<label for="website" class="pt-3"><b>Website</b></label>
				<input type="text" id="website" name="website" class="form-control" placeholder="Website">
			</div>
		
			<input type = "submit" name = "submit" value = "Submit" style=" border-radius: 10px;border:1px lightgray solid;margin: 12px;">
		</form>
	</div>

<?php
get_footer();
 ?>
