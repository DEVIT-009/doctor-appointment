<?php
    // Database connection is already available from index.php
    
    // Handle doctor deletion
    if (isset($_GET['doctor_id'])) {
        $doctor_id = mysqli_real_escape_string($connection, $_GET['doctor_id']);
        $force_delete = isset($_GET['force']) && $_GET['force'] == '1';
        
        // First, get the doctor's photo path to delete the file
        $get_doctor_sql = "SELECT doctor_photo FROM doctor WHERE doctor_id = '$doctor_id'";
        $result = mysqli_query($connection, $get_doctor_sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $doctor_data = mysqli_fetch_assoc($result);
            $photo_path = $doctor_data['doctor_photo'];
            
            // Delete the photo file if it exists and is not a static URL
            if (!empty($photo_path) && !filter_var($photo_path, FILTER_VALIDATE_URL)) {
                $full_photo_path = dirname(__FILE__) . '/../../../assets/' . $photo_path;
                if (file_exists($full_photo_path)) {
                    unlink($full_photo_path);
                }
            }
            
            // First, check if doctor has any appointments
            $check_appointments_sql = "SELECT COUNT(*) as appointment_count FROM appointment WHERE doctor_id = '$doctor_id'";
            $appointment_result = mysqli_query($connection, $check_appointments_sql);
            $appointment_data = mysqli_fetch_assoc($appointment_result);
            
            if ($appointment_data['appointment_count'] > 0 && !$force_delete) {
                // Doctor has appointments, show warning with option to force delete
                echo "<div class='alert alert-warning'>Cannot delete doctor. This doctor has " . $appointment_data['appointment_count'] . " appointment(s).</div>";
                echo "<div class='alert alert-info'>";
                echo "<strong>Options:</strong><br>";
                echo "1. Delete or reassign the appointments first<br>";
                echo "2. <a href='index.php?page=default&delete_doctor&doctor_id=" . $doctor_id . "&force=1' class='btn btn-danger btn-sm'>Force Delete (will delete all appointments)</a>";
                echo "</div>";
                echo "<script>setTimeout(function(){ window.location.href = 'index.php?page=default&doctors'; }, 10000);</script>";
            } else {
                // Delete appointments first if force delete is requested
                if ($force_delete && $appointment_data['appointment_count'] > 0) {
                    $delete_appointments_sql = "DELETE FROM appointment WHERE doctor_id = '$doctor_id'";
                    if (mysqli_query($connection, $delete_appointments_sql)) {
                        echo "<div class='alert alert-info'>Deleted " . $appointment_data['appointment_count'] . " appointment(s) for this doctor.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Error deleting appointments: " . mysqli_error($connection) . "</div>";
                        echo "<script>setTimeout(function(){ window.location.href = 'index.php?page=default&doctors'; }, 3000);</script>";
                        return;
                    }
                }
                
                // Delete the doctor from database
                $delete_sql = "DELETE FROM doctor WHERE doctor_id = '$doctor_id'";
                if (mysqli_query($connection, $delete_sql)) {
                    if ($force_delete) {
                        echo "<div class='alert alert-success'>Doctor and all appointments deleted successfully!</div>";
                    } else {
                        echo "<div class='alert alert-success'>Doctor deleted successfully!</div>";
                    }
                    // Redirect to doctors page after successful deletion
                    echo "<script>setTimeout(function(){ window.location.href = 'index.php?page=default&doctors'; }, 1500);</script>";
                } else {
                    echo "<div class='alert alert-danger'>Error deleting doctor: " . mysqli_error($connection) . "</div>";
                }
            }
        } else {
            echo "<div class='alert alert-danger'>Doctor not found!</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Missing doctor ID</div>";
    }
?>
