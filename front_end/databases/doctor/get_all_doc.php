<!-- Get data from db -->
<?php 
    $sql = "
        SELECT d.*,
          s.service_en AS service_name,
          a.address_name,
          g.gender_name,
          n.nationality_name,
          h.hospital_name
        FROM
          doctor d
        JOIN
          service_department s ON d.service_id = s.service_id
        JOIN
          address a ON d.address_id = a.address_id
        JOIN
          gender g ON d.gender_id = g.gender_id
        JOIN
          nationality n ON d.nationality_id = n.nationality_id
        JOIN
          hospital h ON d.hospital_id = h.hospital_id;
    ";
    $result = mysqli_query($connection, $sql);
    // echo $result; 
?>