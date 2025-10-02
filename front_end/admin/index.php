<!-- database -->
<?php  
  include_once "../databases/config.php"; 
  
  // Check if user is trying to access auth pages (login, register, etc.)
  $page = isset($_GET['page']) ? $_GET['page'] : 'default';
  
  // If not accessing auth pages, check authentication
  if ($page !== 'auth') {
      include "src/auth/check_auth.php"; 
      checkAdminAuth();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital</title>
    
    <!-- Style -->
    <?php include "style.php"; ?>  

    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- Layout -->
        <?php include "src/layouts/layout_root.php"; ?>
    </div>
    
    <div class="sidebar-overlay" data-reff=""></div> 
    
    <!-- Script -->
    <?php include "script.php"; ?>
</body>



</html>