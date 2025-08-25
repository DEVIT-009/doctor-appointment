<!-- Database -->
<?php  
  include_once "databases/config.php"; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - Medilab Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    
    <!-- Style -->
    <!-- 
      How to include page in php?
      + require
      + require_once
      + include
      + include_once
    -->
    <?php include "style.php"; ?> 

  </head>
<body class="index-page">

  <?php 
    // if($_GET['']){

    // }else{
    //   include "src/layouts/layout_home.php";
    // };
  ?>
  <!-- dynamic main -->
  <?php include "src/layouts/layout_home.php" ?>
  
  <!-- Script -->
  <?php include "script.php" ?>
</body>

</html>