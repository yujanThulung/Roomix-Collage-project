<?php
if(session_status() == PHP_SESSION_NONE) {
    // Only start the session if it's not already started
    session_start();
}
$servername = "localhost";
$username = "root";
$password = "";
$database = "roomix";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    header('Location: 404error.php');
} else {
     //echo "Connected successfully";
}

// if(!$_SESSION['username']){
//     header('Location: ../client/login.php');
// }
// ?>



