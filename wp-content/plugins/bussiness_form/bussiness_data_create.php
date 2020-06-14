<?php

function bussiness_data_create() {


    //insert
    if (isset($_POST['insert'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . "bussiness";

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

        $wpdb->insert($table_name, 
            array(
                'register_as'=>$register_as, 
                'full_name'=>$full_name,
                'gender'=>$gender,
                'birthdate'=>$birthdate,
                'company_name'=>$company_name,
                'address'=>$address,
                'city'=>$city,
                'village'=>$village,
                'education'=>$education,
                'mobile'=>$mobile,
                'email'=>$email,
                'bussiness_category'=>$bussiness_category,
                'website'=>$website,
            )
        );
      
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/sinetiks-schools/style-admin.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <div class="wrap">
        <h2>Business</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Business deleted</p></div>
            <a href="<?php echo admin_url('admin.php?page=bussiness_data_list') ?>">&laquo; Back to data list</a>

        <?php } else if ($_POST['insert']) { ?>
            <div class="updated"><p>Business Inserted</p></div>
            <a href="<?php echo admin_url('admin.php?page=bussiness_data_list') ?>">&laquo; Back to data list</a>

        <?php } else { ?>

            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" name="form-bussiness" id="form-bussiness" method = "post">

                <b>Register as </b><br/>
                <div class="form-group">
                    <input type="radio" id="register_as_comp" value="company" name="register_as" <?= ($register_as=="company") ? 'checked' : ''; ?> />
                    <label for="com" >Company</label>

                    <input type="radio" id="register_as_studen" value="student" name="register_as" <?= ($register_as=="student") ? 'checked' : ''; ?>>
                    <label for="stu">Student</label>
                </div>

                <div class="form-group">
                    <label for="full_name"><b>Full Name</b></label>         
                    <input class="form-control" type="text" value="<?php echo $full_name; ?>" id="full_name" name="full_name" placeholder="Full Name" size="50%">
                </div>

                <div class="form-group">
                    <b>Gender</b><br>
                    <input type="radio" name="gender" id="male" <?= ($gender=="male") ? 'checked' : ''; ?>>
                    <label for="male">Male</label><br>
                    <input type="radio" name="gender" id="female" <?= ($gender=="female") ? 'checked' : ''; ?>>
                    <label for="female">Female</label>
                </div>

                <div class="form-group">
                    <label for="birthdate"><b>Birthday</b></label>
                    <input type="date" id="birthdate" name="birthdate" value="<?= $birthdate; ?>" placeholder="DD/MM/YYYY" class="form-control">
                </div>

                <div class="form-group">
                    <label for="company_name"><b>Company Name</b></label>
                    <input type="text" id="company_name" name="company_name" value="<?= $company_name; ?>" placeholder="Company Name" class="form-control">
                </div>          

                <div class="form-group">
                    <label for="address"><b>Address</b></label><br>
                    <textarea  id="address" name="address" class="form-control" rows="3"><?= $address; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="city"><b>City</b></label>
                    <input type="text" id="city" name="city" value="<?= $city; ?>" placeholder="City" class="form-control">
                </div>

                <div class="form-group">
                    <label for="village"><b>Village</b></label>
                    <input type="text" id="village" name="village" value="<?= $village; ?>" placeholder="Village" class="form-control">
                </div>

                <div class="form-group">
                    <label for="education"><b>Education</b></label>
                    <input type="text" id="edu" name="education" placeholder="Education" class="form-control" value="<?= $education; ?>" >
                </div>

                <div class="form-group">
                    <label for="mobile"><b>Mobile</b> (Example: 9898586523)</label>
                    <input type="text" id="mobile" name="mobile" placeholder="Mobile" class="form-control" value="<?= $mobile; ?>">
                </div>

                <div class="form-group">
                    <label for="whatsapp_no"><b>Whatsapp No</b></label>
                    <input type="text" id="whatsapp_no" name="whatsapp_no" placeholder="Whatsapp No" value="<?= $whatsapp_no; ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email"><b>Email</b></label>
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="<?= $email; ?>" >
                </div>

                <label for=""><b>Business Category</b></label><br/>
                <select name="bussiness_category" id="bussiness_category" class="form-control custom-select form-control">
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
                    <option value="gems_andjewellery" >Gems and jewellery</option>
                    <option>Handcraft Items</option>
                    <option>Home Decor</option>
                    <option>Home Products</option>
                    <option>Hotels</option>
                    <option>Insurance</option>
                    <option>Iron and Steel</option>
                    <option>It and Software</option>
                    <option>Legal Services</option>
                    <option>Matrimonial Servicse</option>
                    <option>Media</option>
                    <option>Medical</option>
                    <option>Mining</option>
                    <option>Music</option>
                    <option>Paper and Stationery</option>
                    <option>Petroleum</option>
                    <option>Pharmaceuticals</option>
                    <option>Photography</option>
                    <option>Plastic</option>
                    <option>Ports and Shipbuilding</option>
                    <option>Printing and Publishing</option>
                    <option>Real Estate</option>
                    <option>Rental Services</option>
                    <option>Restaurants</option>
                    <option>Security Services</option>
                    <option>Shipbuilding</option>
                    <option>Sports</option>
                    <option>Telecom</option>
                    <option>Textiles</option>
                    <option>Transport</option>
                    <option>Travel and Tourism</option>
                    <option>Videography</option>
                    <option>Water</option>
                </select>

                <div class="form-group">
                    <label for="website" class="pt-3"><b>Website</b></label>
                    <input type="text" id="website" name="website" class="form-control" placeholder="Website" value="<?= $website; ?>">
                </div>

                <input type='submit' name="insert" value='Save' class='button'> &nbsp;&nbsp;
            </form>
        <?php } ?>

    </div>
    <?php
}