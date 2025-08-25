<!-- Menu -->
<?php
    $subpage = array_keys($_GET);
    unset($subpage[array_search('page', $subpage)]); // Remove 'page' from keys
    $subpage = reset($subpage); // Get the first subpage key, e.g., 'setting'
    $subpage = $subpage ? $subpage : 'login'; // Default to 'setting' if not set

    $pageFile = "src/pages/auth/" . strtolower($subpage) . ".php";
    if (file_exists($pageFile)) {
        include $pageFile;
    } else {
        echo "<h2>Page not found</h2>";
    }
?>

<!-- Mesage Duty -->
