<?php
    $doctor_name_msg = "Name cannot be empty!";
    $phone_msg = "Phone Number cannot be empty!";
    $email_msg = "Email cannot be empty!";
    $dob_msg = "Date of birth cannot be empty!";
    $gender_msg = "Gender cannot be empty!";
    $hospital_msg = "Hospital cannot be empty!";
    $service_msg = "Service cannot be empty!";
    $nationality_msg = "Nationality cannot be empty!";
    $address_msg = "Address cannot be empty!";
?>

<div class="content">       
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Doctor</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form id="doctorForm" novalidate>
                <div class="row">
                    <!-- License Number -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>License Number <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" readonly>
                        </div>
                    </div>
                    <!-- Doctor Name -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Doctor Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="doctor_name">
                            <span class="text-danger" id="doctor_name_msg" style="display:none;"><?= $doctor_name_msg ?></span>
                        </div>
                    </div>
                    <!-- Phone -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone <span class="text-danger">*</span></label>
                            <input class="form-control" type="tel" id="phone">
                            <span class="text-danger" id="phone_msg" style="display:none;"><?= $phone_msg ?></span>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input class="form-control" type="email" id="email">
                            <span class="text-danger" id="email_msg" style="display:none;"><?= $email_msg ?></span>
                        </div>
                    </div>
                    <!-- Date of Birth -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Date of Birth <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" id="dob">
                            </div>
                            <span class="text-danger" id="dob_msg" style="display:none;"><?= $dob_msg ?></span>
                        </div>
                    </div>
                    <!-- Gender -->
                    <div class="col-sm-6">
                        <div class="form-group gender-select">
                            <label class="gen-label">Gender <span class="text-danger">*</span></label>
                            <?php
                                $genders = mysqli_query($connection, 'SELECT * FROM gender');
                                while($gender = mysqli_fetch_array($genders)) {
                                    echo "
                                        <div class='form-check-inline'>
                                            <label class='form-check-label'>
                                                <input type='radio' name='gender' class='form-check-input' value='" . $gender['gender_id'] . "'> " . $gender['gender_name'] . "
                                            </label>
                                        </div>
                                    ";
                                }
                            ?>
                        </div>
                        <span class="text-danger" id="gender_msg" style="display:none;"><?= $gender_msg ?></span>
                    </div>
                    <!-- Hospital -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Hospital Name <span class="text-danger">*</span></label>
                            <select class="form-control select" id="hospital">
                                <option value="" disabled selected>---*** Choose Hospital ***--- </option>
                                <?php
                                    $hospitals = mysqli_query($connection, 'SELECT * FROM hospital');
                                    while($hospital = mysqli_fetch_array($hospitals)) {
                                        echo "<option value='" . $hospital["hospital_id"] . "'>" . $hospital["hospital_name"] . "</option>";
                                    }
                                ?>
                            </select>
                            <span class="text-danger" id="hospital_msg" style="display:none;"><?= $hospital_msg ?></span>
                        </div>
                    </div>
                    <!-- Service -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Service <span class="text-danger">*</span></label>
                            <select class="form-control select" id="service">
                                <option value="" disabled selected>---*** Choose Service ***--- </option>
                                <?php
                                    $service_departments = mysqli_query($connection, 'SELECT * FROM service_department');
                                    while($service_department = mysqli_fetch_array($service_departments)) {
                                        echo "<option value='" . $service_department["service_id"] . "'>" . $service_department["service_en"] . "</option>";
                                    }
                                ?>
                            </select>
                            <span class="text-danger" id="service_msg" style="display:none;"><?= $service_msg ?></span>
                        </div>
                    </div>
                    <!-- Nationality -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nationality <span class="text-danger">*</span></label>
                            <select class="form-control select" id="nationality">
                                <option value="" disabled selected>---*** Choose Nationality ***--- </option>
                                <?php
                                    $nationalitys = mysqli_query($connection, 'SELECT * FROM nationality');
                                    while($nationality = mysqli_fetch_array($nationalitys)) {
                                        echo "<option value='" . $nationality["nationality_id"] . "'>" . $nationality["nationality_name"] . "</option>";
                                    }
                                ?>
                            </select>
                            <span class="text-danger" id="nationality_msg" style="display:none;"><?= $nationality_msg ?></span>
                        </div>
                    </div>
                    <!-- Address -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Address <span class="text-danger">*</span></label>
                            <select class="form-control select" id="address">
                                <option value="" disabled selected>---*** Choose Address ***--- </option>
                                <?php
                                    $addresses = mysqli_query($connection, 'SELECT * FROM address');
                                    while($address = mysqli_fetch_array($addresses)) {
                                        echo "<option value='" . $address["address_id"] . "'>" . $address["address_name"] . "</option>";
                                    }
                                ?>
                            </select>
                            <span class="text-danger" id="address_msg" style="display:none;"><?= $address_msg ?></span>
                        </div>
                    </div>
                    <!-- Photo -->
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Avatar</label>
                            <div class="profile-upload">
                                <div class="upload-img">
                                    <img alt="" src="assets/img/user.jpg">
                                </div>
                                <div class="upload-input">
                                    <input type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Biography -->
                <div class="form-group">
                    <label>Doctor Biography</label>
                    <textarea class="form-control" rows="3" cols="30"></textarea>
                </div>
                <div class="m-t-20 text-center">
                    <button type="submit" class="btn btn-primary submit-btn">Create Doctor</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('doctorForm').addEventListener('submit', function(e) {
        let valid = true;

        // Doctor Name
        const doctorName = document.getElementById('doctor_name').value.trim();
        if (!doctorName) {
            document.getElementById('doctor_name_msg').style.display = 'block';
            valid = false;
        } else {
            document.getElementById('doctor_name_msg').style.display = 'none';
        }

        // Phone
        const phone = document.getElementById('phone').value.trim();
        if (!phone) {
            document.getElementById('phone_msg').style.display = 'block';
            valid = false;
        } else {
            document.getElementById('phone_msg').style.display = 'none';
        }

        // Email
        const email = document.getElementById('email').value.trim();
        if (!email) {
            document.getElementById('email_msg').style.display = 'block';
            valid = false;
        } else {
            document.getElementById('email_msg').style.display = 'none';
        }

        // Date of Birth
        const dob = document.getElementById('dob').value.trim();
        if (!dob) {
            document.getElementById('dob_msg').style.display = 'block';
            valid = false;
        } else {
            document.getElementById('dob_msg').style.display = 'none';
        }

        // Gender
        const genderChecked = document.querySelector('input[name="gender"]:checked');
        if (!genderChecked) {
            document.getElementById('gender_msg').style.display = 'block';
            valid = false;
        } else {
            document.getElementById('gender_msg').style.display = 'none';
        }

        // Hospital
        const hospital = document.getElementById('hospital').value;
        if (!hospital) {
            document.getElementById('hospital_msg').style.display = 'block';
            valid = false;
        } else {
            document.getElementById('hospital_msg').style.display = 'none';
        }

        // Service
        const service = document.getElementById('service').value;
        if (!service) {
            document.getElementById('service_msg').style.display = 'block';
            valid = false;
        } else {
            document.getElementById('service_msg').style.display = 'none';
        }

        // Nationality
        const nationality = document.getElementById('nationality').value;
        if (!nationality) {
            document.getElementById('nationality_msg').style.display = 'block';
            valid = false;
        } else {
            document.getElementById('nationality_msg').style.display = 'none';
        }

        // Address
        const address = document.getElementById('address').value;
        if (!address) {
            document.getElementById('address_msg').style.display = 'block';
            valid = false;
        } else {
            document.getElementById('address_msg').style.display = 'none';
        }

        if (!valid) {
            e.preventDefault();
        }
    });
</script>