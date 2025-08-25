<!-- Layout dynamic -->
<?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'default';

    switch ($page) {
        case 'conversation':
            include "src/layouts/layout_conversation.php";
            break;
        case 'mail':
            include "src/layouts/layout_mail.php";
            break;
        case 'setting':
            include "src/layouts/layout_setting.php";
            break;
        case 'auth':
            include "src/layouts/layout_auth.php";
            break;
        case 'error':
            include "src/layouts/layout_error.php";
            break;
        // Add more cases for other layouts as needed
        default:
            include "src/layouts/layout_default.php";
            break;
    }
?>