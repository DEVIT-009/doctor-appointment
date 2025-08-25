<!-- Header -->
<?php include "src/components/Header.php"; ?>

<!-- Menu -->
<?php include "src/components/menu_default.php" ?>

<div class="page-wrapper">
    <?php
        // Check if there's an 'id' parameter in the URL
        if (isset($_GET['id']) && isset($_GET['doctors'])) {
            // Route to profile.php when an ID is present
            $pageFile = "src/pages/default/profile.php";
        } else {
            // Original routing logic for when no ID is present
            $subpage = array_keys($_GET);
            unset($subpage[array_search('page', $subpage)]); // Remove 'page' from keys
            $subpage = reset($subpage); // Get the first subpage key, e.g., 'dashboards'
            $subpage = $subpage ? $subpage : 'dashboards'; // Default to 'dashboards' if not set

            $pageFile = "src/pages/default/" . strtolower($subpage) . ".php";
        }
        
        if (file_exists($pageFile)) {
            include $pageFile;
        } else {
            echo "<h2>Page not found</h2>";
        }
    ?>
    
    <!-- Mesage Duty -->
    <?php include "src/components/Message.php" ?>
</div>