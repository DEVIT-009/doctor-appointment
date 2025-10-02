<?php
    // $doctor_name_msg = "Name cannot be empty!";
    // $phone_msg = "Phone Number cannot be empty!";
    // $email_msg = "Email cannot be empty!";
    // $dob_msg = "Date of birth cannot be empty!";
    // $gender_msg = "Gender cannot be empty!";
    // $hospital_msg = "Hospital cannot be empty!";
    // $service_msg = "Service cannot be empty!";
    // $nationality_msg = "Nationality cannot be empty!";
    // $address_msg = "Address cannot be empty!";
    
    // Error messages
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Doctor Name
        if (empty($_POST['doctor_name']) || !preg_match('/^[A-Za-z\s]+$/', $_POST['doctor_name'])) {
            $errors['doctor_name'] = "Name must contain only letters and spaces!";
        }

        // Phone
        if (empty($_POST['phone']) || !preg_match('/^\d{9,10}$/', $_POST['phone'])) {
            $errors['phone'] = "Phone must be 9-10 digits!";
        }

        // Email
        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format!";
        }

        // Date of Birth
        if (empty($_POST['dob'])) {
            $errors['dob'] = "Date of birth cannot be empty!";
        }

        // Gender
        if (empty($_POST['gender'])) {
            $errors['gender'] = "Gender cannot be empty!";
        }

        // Hospital
        if (empty($_POST['hospital'])) {
            $errors['hospital'] = "Hospital cannot be empty!";
        }

        // Service
        if (empty($_POST['service'])) {
            $errors['service'] = "Service cannot be empty!";
        }

        // Nationality
        if (empty($_POST['nationality'])) {
            $errors['nationality'] = "Nationality cannot be empty!";
        }

        // Address
        if (empty($_POST['address'])) {
            $errors['address'] = "Address cannot be empty!";
        }

        // Image validation and upload handling
        $photo_path = '';
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['avatar'];
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $fileType = mime_content_type($file['tmp_name']);
            
            if (!in_array($fileType, $allowedTypes)) {
                $errors['avatar'] = "Only JPG, PNG, or GIF images are allowed!";
            } elseif ($file['size'] > 2 * 1024 * 1024) {
                $errors['avatar'] = "Image size must be less than 2MB!";
            } else {
                // Generate unique filename
                $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $new_filename = 'doctor_' . time() . '_' . uniqid() . '.' . $file_extension;
                
                // Set upload directory - use absolute path to avoid issues
                $upload_dir = dirname(__FILE__) . '/../../../assets/doctor_photo/';
                
                // Create directory if it doesn't exist
                if (!file_exists($upload_dir)) {
                    if (!mkdir($upload_dir, 0777, true)) {
                        $errors['avatar'] = "Failed to create upload directory!";
                    }
                }
                
                // Check if directory exists and is writable
                if (is_dir($upload_dir) && is_writable($upload_dir)) {
                    $upload_path = $upload_dir . $new_filename;
                    
                    // Move uploaded file
                    if (move_uploaded_file($file['tmp_name'], $upload_path)) {
                        $photo_path = 'assets/doctor_photo/' . $new_filename;
                    } else {
                        $errors['avatar'] = "Failed to upload image! Upload directory: " . $upload_dir;
                    }
                } else {
                    $errors['avatar'] = "Upload directory is not writable! Directory: " . $upload_dir;
                }
            }
        } else {
            $errors['avatar'] = "Please select an image!";
        }

        // If no errors, process the form (e.g., save to database)
        if (empty($errors)) {
            // Prepare data
            $doctor_name = mysqli_real_escape_string($connection, $_POST['doctor_name']);
            $phone = mysqli_real_escape_string($connection, $_POST['phone']);
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $dob = mysqli_real_escape_string($connection, $_POST['dob']);
            $gender = mysqli_real_escape_string($connection, $_POST['gender']);
            $hospital = mysqli_real_escape_string($connection, $_POST['hospital']);
            $service = mysqli_real_escape_string($connection, $_POST['service']);
            $nationality = mysqli_real_escape_string($connection, $_POST['nationality']);
            $address = mysqli_real_escape_string($connection, $_POST['address']);
            $biography = mysqli_real_escape_string($connection, $_POST['biography']);

            // Static license number
            $result = mysqli_query($connection, "SELECT license_num FROM doctor ORDER BY doctor_id DESC LIMIT 1");
            if ($row = mysqli_fetch_assoc($result)) {
                $last_license = $row['license_num']; // e.g. LIC021
                $last_number = (int)substr($last_license, 3); // take digits only
                $new_number  = str_pad($last_number + 1, 4, "0", STR_PAD_LEFT); 
                $license_num = "LIC" . $new_number; // e.g. LIC0022
            } else {
                $license_num = "LIC0001"; // first one
            }

            // Use uploaded photo path
            $photo = $photo_path;

            // Insert query (matching your sample)
            $sql = "INSERT INTO doctor 
                (doctor_name, doctor_dob, email, doctor_phone, license_num, bio_graphy, doctor_photo, service_id, address_id, gender_id, nationality_id, hospital_id)
                VALUES
                ('$doctor_name', '$dob', '$email', '$phone', '$license_num', '$biography', '$photo', '$service', '$address', '$gender', '$nationality', '$hospital')";
            if (mysqli_query($connection, $sql)) {
                echo "<div class='alert alert-success'>Doctor added successfully!</div>";
                $_POST = [];
                // Optionally, clear $_POST or redirect
            } else {
                echo "<div class='alert alert-danger'>Error: " . mysqli_error($connection) . "</div>";
            }
        }
    }
?>

<div class="content">       
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Doctor</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form id="doctorForm" method="POST" enctype="multipart/form-data" novalidate>
                <div class="row">
                    <!-- Doctor Name -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Doctor Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="doctor_name" name="doctor_name" value="<?= htmlspecialchars($_POST['doctor_name'] ?? '') ?>">
                            <span class="text-danger" id="doctor_name_msg"><?= $errors['doctor_name'] ?? '' ?></span>
                        </div>
                    </div>
                    <!-- Phone -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone <span class="text-danger">*</span></label>
                            <input class="form-control" type="tel" id="phone" name="phone" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
                            <span class="text-danger" id="phone_msg"><?= $errors['phone'] ?? '' ?></span>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input class="form-control" type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                            <span class="text-danger" id="email_msg"><?= $errors['email'] ?? '' ?></span>
                        </div>
                    </div>
                    <!-- Date of Birth -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Date of Birth <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" id="dob" name="dob" value="<?= htmlspecialchars($_POST['dob'] ?? '') ?>">
                            </div>
                            <span class="text-danger" id="dob_msg"><?= $errors['dob'] ?? '' ?></span>
                        </div>
                    </div>
                    <!-- Gender -->
                    <div class="col-sm-6">
                        <div class="form-group gender-select">
                            <label class="gen-label">Gender <span class="text-danger">*</span></label>
                            <?php
                                $genders = mysqli_query($connection, 'SELECT * FROM gender');
                                while($gender = mysqli_fetch_array($genders)) {
                                    $checked = (isset($_POST['gender']) && $_POST['gender'] == $gender['gender_id']) ? 'checked' : '';
                                    echo "
                                        <div class='form-check-inline'>
                                            <label class='form-check-label'>
                                                <input type='radio' name='gender' class='form-check-input' value='" . $gender['gender_id'] . "' $checked> " . $gender['gender_name'] . "
                                            </label>
                                        </div>
                                    ";
                                }
                            ?>
                        </div>
                        <span class="text-danger" id="gender_msg"><?= $errors['gender'] ?? '' ?></span>
                    </div>
                    <!-- Hospital -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Hospital Name <span class="text-danger">*</span></label>
                            <select class="form-control select" id="hospital" name="hospital">
                                <option value="" disabled selected>---*** Choose Hospital ***--- </option>
                                <?php
                                    $hospitals = mysqli_query($connection, 'SELECT * FROM hospital');
                                    while($hospital = mysqli_fetch_array($hospitals)) {
                                        $selected = (isset($_POST['hospital']) && $_POST['hospital'] == $hospital["hospital_id"]) ? 'selected' : '';
                                        echo "<option value='" . $hospital["hospital_id"] . "' $selected>" . $hospital["hospital_name"] . "</option>";
                                    }
                                ?>
                            </select>
                            <span class="text-danger" id="hospital_msg"><?= $errors['hospital'] ?? '' ?></span>
                        </div>
                    </div>
                    <!-- Service -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Service <span class="text-danger">*</span></label>
                            <select class="form-control select" id="service" name="service">
                                <option value="" disabled selected>---*** Choose Service ***--- </option>
                                <?php
                                    $service_departments = mysqli_query($connection, 'SELECT * FROM service_department');
                                    while($service_department = mysqli_fetch_array($service_departments)) {
                                        $selected = (isset($_POST['service']) && $_POST['service'] == $service_department["service_id"]) ? 'selected' : '';
                                        echo "<option value='" . $service_department["service_id"] . "' $selected>" . $service_department["service_en"] . "</option>";
                                    }
                                ?>
                            </select>
                            <span class="text-danger" id="service_msg"><?= $errors['service'] ?? '' ?></span>
                        </div>
                    </div>
                    <!-- Nationality -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nationality <span class="text-danger">*</span></label>
                            <select class="form-control select" id="nationality" name="nationality">
                                <option value="" disabled selected>---*** Choose Nationality ***--- </option>
                                <?php
                                    $nationalitys = mysqli_query($connection, 'SELECT * FROM nationality');
                                    while($nationality = mysqli_fetch_array($nationalitys)) {
                                        $selected = (isset($_POST['nationality']) && $_POST['nationality'] == $nationality["nationality_id"]) ? 'selected' : '';
                                        echo "<option value='" . $nationality["nationality_id"] . "' $selected>" . $nationality["nationality_name"] . "</option>";
                                    }
                                ?>
                            </select>
                            <span class="text-danger" id="nationality_msg"><?= $errors['nationality'] ?? '' ?></span>
                        </div>
                    </div>
                    <!-- Address -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Address <span class="text-danger">*</span></label>
                            <select class="form-control select" id="address" name="address">
                                <option value="" disabled selected>---*** Choose Address ***--- </option>
                                <?php
                                    $addresses = mysqli_query($connection, 'SELECT * FROM address');
                                    while($address = mysqli_fetch_array($addresses)) {
                                        $selected = (isset($_POST['address']) && $_POST['address'] == $address["address_id"]) ? 'selected' : '';
                                        echo "<option value='" . $address["address_id"] . "' $selected>" . $address["address_name"] . "</option>";
                                    }
                                ?>
                            </select>
                            <span class="text-danger" id="address_msg"><?= $errors['address'] ?? '' ?></span>
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
                                    <input type="file" class="form-control" name="avatar">
                                </div>
                            </div>
                            <span class="text-danger" id="image_msg"><?= $errors['avatar'] ?? '' ?></span>
                        </div>
                    </div>
                </div>
                <!-- Biography -->
                <div class="form-group">
                    <label>Doctor Biography</label>
                    <textarea class="form-control" rows="3" cols="30" name="biography"><?= htmlspecialchars($_POST['biography'] ?? '') ?></textarea>
                </div>
                <div class="m-t-20 text-center">
                    <button type="submit" class="btn btn-primary submit-btn">Create Doctor</button>
                </div>
            </form>
        </div>
    </div>
</div>