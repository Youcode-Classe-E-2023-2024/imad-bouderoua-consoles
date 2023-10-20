<?php
session_start();


if (isset($_POST['disconnect'])) {

    unset($_SESSION['name']);
    unset($_SESSION['chosenAvatar']);
    
   
    session_destroy();

    header('Location: frontpage.php');
    exit;
} else {
    echo "No disconnect request received.";
}
?>
