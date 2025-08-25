<?php
    $hostname="localhost:3309";
    $username="root";
    $password="Devit@009";
    $dbname="doctor_appointment";

    $connection=mysqli_connect($hostname,$username,$password);

    if(!$connection){
        print("Database connection failed " . mysqli_connect_error());
        exit();
    }
    
    mysqli_select_db($connection, $dbname) 
    or die("Error selecting from database...");