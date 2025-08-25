<!-- Header -->
<?php include "src/components/Header.php"; ?>

<!-- Menu -->
<?php include "src/components/menu_mail.php" ?>

<div class="page-wrapper">
    <?php
        $subpage = array_keys($_GET);
        unset($subpage[array_search('page', $subpage)]); // Remove 'page' from keys
        $subpage = reset($subpage); // Get the first subpage key, e.g., 'inbox'
        $subpage = $subpage ? $subpage : 'inbox'; // Default to 'inbox' if not set

        $pageFile = "src/pages/mail/" . strtolower($subpage) . ".php";
        if (file_exists($pageFile)) {
            include $pageFile;
        } else {
            echo "<h2>Page not found</h2>";
        }
    ?>
    
    <!-- Mesage Duty -->
    <?php include "src/components/Message.php" ?>
</div>