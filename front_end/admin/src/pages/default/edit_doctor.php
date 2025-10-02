<?php
    // Ensure we have an id to edit
    if (!isset($_GET['id'])) {
        echo "<div class='content'><div class='alert alert-danger'>Missing doctor id.</div></div>";
        return;
    }

    // Load current doctor data
    include_once "../databases/doctor/get_doctor_by_id.php"; // sets $doctor

    if (!$doctor) {
        echo "<div class='content'><div class='alert alert-danger'>Doctor not found.</div></div>";
        return;
    }

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate inputs similar to add_doctor
        if (empty($_POST['doctor_name']) || !preg_match('/^[A-Za-z\s]+$/', $_POST['doctor_name'])) {
            $errors['doctor_name'] = "Name must contain only letters and spaces!";
        }
        if (empty($_POST['phone']) || !preg_match('/^\d{9,10}$/', $_POST['phone'])) {
            $errors['phone'] = "Phone must be 9-10 digits!";
        }
        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format!";
        }
        if (empty($_POST['dob'])) {
            $errors['dob'] = "Date of birth cannot be empty!";
        }
        if (empty($_POST['gender'])) {
            $errors['gender'] = "Gender cannot be empty!";
        }
        if (empty($_POST['hospital'])) {
            $errors['hospital'] = "Hospital cannot be empty!";
        }
        if (empty($_POST['service'])) {
            $errors['service'] = "Service cannot be empty!";
        }
        if (empty($_POST['nationality'])) {
            $errors['nationality'] = "Nationality cannot be empty!";
        }
        if (empty($_POST['address'])) {
            $errors['address'] = "Address cannot be empty!";
        }

        // Handle optional image upload
        $photo_path = $doctor['doctor_photo'];
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['avatar'];
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $fileType = mime_content_type($file['tmp_name']);

            if (!in_array($fileType, $allowedTypes)) {
                $errors['avatar'] = "Only JPG, PNG, or GIF images are allowed!";
            } elseif ($file['size'] > 2 * 1024 * 1024) {
                $errors['avatar'] = "Image size must be less than 2MB!";
            } else {
                $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $new_filename = 'doctor_' . time() . '_' . uniqid() . '.' . $file_extension;
                $upload_dir = dirname(__FILE__) . '/../../../assets/doctor_photo/';

                if (!file_exists($upload_dir)) {
                    if (!mkdir($upload_dir, 0777, true)) {
                        $errors['avatar'] = "Failed to create upload directory!";
                    }
                }

                if (is_dir($upload_dir) && is_writable($upload_dir)) {
                    $upload_path = $upload_dir . $new_filename;
                    if (move_uploaded_file($file['tmp_name'], $upload_path)) {
                        // Delete old photo file if it exists and is local
                        if (!empty($photo_path) && !filter_var($photo_path, FILTER_VALIDATE_URL)) {
                            $old_full_path = dirname(__FILE__) . '/../../../' . $photo_path;
                            if (file_exists($old_full_path)) {
                                @unlink($old_full_path);
                            }
                        }
                        $photo_path = 'assets/doctor_photo/' . $new_filename;
                    } else {
                        $errors['avatar'] = "Failed to upload image! Upload directory: " . $upload_dir;
                    }
                } else {
                    $errors['avatar'] = "Upload directory is not writable! Directory: " . $upload_dir;
                }
            }
        }

        if (empty($errors)) {
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
            $doctor_id = (int)$doctor['doctor_id'];

            $sql = "UPDATE doctor SET 
                        doctor_name = '$doctor_name',
                        doctor_dob = '$dob',
                        email = '$email',
                        doctor_phone = '$phone',
                        bio_graphy = '$biography',
                        doctor_photo = '$photo_path',
                        service_id = '$service',
                        address_id = '$address',
                        gender_id = '$gender',
                        nationality_id = '$nationality',
                        hospital_id = '$hospital'
                    WHERE doctor_id = '$doctor_id'";

            if (mysqli_query($connection, $sql)) {
                echo "<div class='content'><div class='alert alert-success'>Doctor updated successfully!</div></div>";
                // Refresh $doctor with latest data
                $_GET['id'] = $doctor_id;
                include_once "../databases/doctor/get_doctor_by_id.php";
            } else {
                echo "<div class='content'><div class='alert alert-danger'>Error: " . mysqli_error($connection) . "</div></div>";
            }
        }
    }
?>

<div class="content">       
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Edit Doctor</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form id="doctorEditForm" method="POST" enctype="multipart/form-data" novalidate>
                <input type="hidden" name="doctor_id" value="<?= htmlspecialchars($doctor['doctor_id']) ?>">
                <div class="row">
                    <!-- Doctor Name -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Doctor Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="doctor_name" name="doctor_name" value="<?= htmlspecialchars($_POST['doctor_name'] ?? $doctor['doctor_name']) ?>">
                            <span class="text-danger"><?= $errors['doctor_name'] ?? '' ?></span>
                        </div>
                    </div>
                    <!-- Phone -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone <span class="text-danger">*</span></label>
                            <input class="form-control" type="tel" id="phone" name="phone" value="<?= htmlspecialchars($_POST['phone'] ?? $doctor['doctor_phone']) ?>">
                            <span class="text-danger"><?= $errors['phone'] ?? '' ?></span>
                        </div>
                    </div>
                    <!-- License Number (read-only) -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>License Number</label>
                            <input class="form-control" type="text" value="<?= htmlspecialchars($doctor['license_num']) ?>" disabled>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input class="form-control" type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? $doctor['email']) ?>">
                            <span class="text-danger"><?= $errors['email'] ?? '' ?></span>
                        </div>
                    </div>
                    <!-- Date of Birth -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Date of Birth <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" id="dob" name="dob" value="<?= htmlspecialchars($_POST['dob'] ?? $doctor['doctor_dob']) ?>">
                            </div>
                            <span class="text-danger"><?= $errors['dob'] ?? '' ?></span>
                        </div>
                    </div>
                    <!-- Gender -->
                    <div class="col-sm-6">
                        <div class="form-group gender-select">
                            <label class="gen-label">Gender <span class="text-danger">*</span></label>
                            <?php
                                $genders = mysqli_query($connection, 'SELECT * FROM gender');
                                while($gender = mysqli_fetch_array($genders)) {
                                    $checked = ((isset($_POST['gender']) ? $_POST['gender'] : $doctor['gender_id']) == $gender['gender_id']) ? 'checked' : '';
                                    echo "
                                        <div class='form-check-inline'>
                                            <label class='form-check-label'>
                                                <input type='radio' name='gender' class='form-check-input' value='" . $gender['gender_id'] . "' $checked> " . $gender['gender_name'] . "
                                            </label>
                                        </div>
                                    ";
                                }
                            ?>
                            <span class="text-danger"><?= $errors['gender'] ?? '' ?></span>
                        </div>
                    </div>
                    <!-- Hospital -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Hospital Name <span class="text-danger">*</span></label>
                            <select class="form-control select" id="hospital" name="hospital">
                                <?php
                                    $hospitals = mysqli_query($connection, 'SELECT * FROM hospital');
                                    while($hospital = mysqli_fetch_array($hospitals)) {
                                        $selected = ((isset($_POST['hospital']) ? $_POST['hospital'] : $doctor["hospital_id"]) == $hospital["hospital_id"]) ? 'selected' : '';
                                        echo "<option value='" . $hospital["hospital_id"] . "' $selected>" . $hospital["hospital_name"] . "</option>";
                                    }
                                ?>
                            </select>
                            <span class="text-danger"><?= $errors['hospital'] ?? '' ?></span>
                        </div>
                    </div>
                    <!-- Service -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Service <span class="text-danger">*</span></label>
                            <select class="form-control select" id="service" name="service">
                                <?php
                                    $service_departments = mysqli_query($connection, 'SELECT * FROM service_department');
                                    while($service_department = mysqli_fetch_array($service_departments)) {
                                        $selected = ((isset($_POST['service']) ? $_POST['service'] : $doctor["service_id"]) == $service_department["service_id"]) ? 'selected' : '';
                                        echo "<option value='" . $service_department["service_id"] . "' $selected>" . $service_department["service_en"] . "</option>";
                                    }
                                ?>
                            </select>
                            <span class="text-danger"><?= $errors['service'] ?? '' ?></span>
                        </div>
                    </div>
                    <!-- Nationality -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nationality <span class="text-danger">*</span></label>
                            <select class="form-control select" id="nationality" name="nationality">
                                <?php
                                    $nationalitys = mysqli_query($connection, 'SELECT * FROM nationality');
                                    while($nationality = mysqli_fetch_array($nationalitys)) {
                                        $selected = ((isset($_POST['nationality']) ? $_POST['nationality'] : $doctor["nationality_id"]) == $nationality["nationality_id"]) ? 'selected' : '';
                                        echo "<option value='" . $nationality["nationality_id"] . "' $selected>" . $nationality["nationality_name"] . "</option>";
                                    }
                                ?>
                            </select>
                            <span class="text-danger"><?= $errors['nationality'] ?? '' ?></span>
                        </div>
                    </div>
                    <!-- Address -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Address <span class="text-danger">*</span></label>
                            <select class="form-control select" id="address" name="address">
                                <?php
                                    $addresses = mysqli_query($connection, 'SELECT * FROM address');
                                    while($address = mysqli_fetch_array($addresses)) {
                                        $selected = ((isset($_POST['address']) ? $_POST['address'] : $doctor["address_id"]) == $address["address_id"]) ? 'selected' : '';
                                        echo "<option value='" . $address["address_id"] . "' $selected>" . $address["address_name"] . "</option>";
                                    }
                                ?>
                            </select>
                            <span class="text-danger"><?= $errors['address'] ?? '' ?></span>
                        </div>
                    </div>
                    <!-- Photo -->
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Avatar</label>
                            <div class="profile-upload">
                                <div class="upload-img">
                                    <img alt="" src="<?= htmlspecialchars($doctor['doctor_photo'] ?: 'assets/img/user.jpg') ?>">
                                </div>
                                <div class="upload-input">
                                    <input type="file" class="form-control" name="avatar">
                                </div>
                            </div>
                            <span class="text-danger"><?= $errors['avatar'] ?? '' ?></span>
                        </div>
                    </div>
                </div>
                <!-- Biography -->
                <div class="form-group">
                    <label>Doctor Biography</label>
                    <textarea class="form-control" rows="3" cols="30" name="biography"><?= htmlspecialchars($_POST['biography'] ?? $doctor['bio_graphy']) ?></textarea>
                </div>
                <div class="m-t-20 text-center">
                    <button type="submit" class="btn btn-primary submit-btn">Update Doctor</button>
                </div>
            </form>
        </div>
    </div>
</div>