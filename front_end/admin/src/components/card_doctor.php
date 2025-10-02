<?php
    include_once "../databases/doctor/get_all_doc.php";
?>

<!-- Display -->
<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo "
            <div class='col-md-4 col-sm-4 col-lg-3'>
                <div class='profile-widget'>
                <div class='doctor-img'>
                    <a class='avatar' href='index.php?default&doctors&id=" . $row['doctor_id'] . "'>
                        <img alt='doctor-" . $row['doctor_name'] . "' src='" . $row['doctor_photo'] . "' />
                    </a>
                </div>
                <div class='dropdown profile-action'>
                    <a
                        href='#'
                        class='action-icon dropdown-toggle' 
                        data-toggle='dropdown'
                        aria-expanded='false'
                    >
                        <i class='fa fa-ellipsis-v'></i>
                    </a>
                    <div class='dropdown-menu dropdown-menu-right'>
                        <a class='dropdown-item' href='index.php?page=default&edit_doctor&id=" . $row['doctor_id'] . "'>
                            <i class='fa fa-pencil m-r-5'></i> Edit</a>
                        <a
                            class='dropdown-item'
                            href='#'
                            onclick='confirmDelete(" . $row['doctor_id'] . ", \"" . htmlspecialchars($row['doctor_name']) . "\")'
                            >
                            <i class='fa fa-trash-o m-r-5'></i> 
                            Delete
                        </a>
                    </div>
                </div>
                <h4 class='doctor-name text-ellipsis'>
                    <a href='profile.html'>" . $row['doctor_name'] . "</a>
                </h4>
                <div class='doc-prof'>" . $row['service_name'] . "</div>
                <div class='user-country'>
                    <i class='fa fa-map-marker'></i> " . $row['address_name'] . "
                </div>
                </div>
            </div>
        ";
    }
} else {
    echo "<h1>Data not found...</h1>";
    exit();
}
echo "<p class='ml-4'>" . mysqli_num_rows($result) . " doctors</>";
?>
