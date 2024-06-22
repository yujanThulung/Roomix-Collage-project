<?php
require '../includes/dbConnect.php';
require('../includes/loginSession.php');

if(isset($_POST['property_sold_btn'])) {
    
    $sold_id = $_POST['sold_id'];
    $property_id = $_POST['property_id'];
    
    // Update the sold_status for the specified sold_id in rent_requests table
    $update_rent_status_query = "UPDATE rent_requests SET sold_status = 0 WHERE id = $sold_id";

    // Update the sold_status for the specified property_id in property table
    $update_property_status_query = "UPDATE property SET sold_status = 0 WHERE id = $property_id";

    // Execute both queries
    if(mysqli_query($conn, $update_rent_status_query) && mysqli_query($conn, $update_property_status_query)) {
        // If updates are successful, set success message and redirect back to the properties page
        $_SESSION['status'] = "Property has been sold!";
        $_SESSION['status_code'] = "success";
        header("Location: ../landlordAdmin/soldProperties.php");
        exit;
    } else {
        // If there's an error, set error message and redirect back with the error message
        $_SESSION['status'] = "Error updating property status: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header("Location: ../landlordAdmin/rentRequest.php");
        exit;
    }
} else {
    // If the form is not submitted properly, redirect back with an error message
    $_SESSION['status'] = "Error: Property sold form not submitted properly!";
    $_SESSION['status_code'] = "error";
    header("Location: ../landlordAdmin/rentRequest.php");
    exit;
}

mysqli_close($conn);
?>
