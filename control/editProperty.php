<?php
require('../includes/dbConnect.php');
include('../includes/sweetalert.php');

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

echo $bedroom = isset($_POST['bedrooms']) ? (int)$_POST['bedrooms'] : 3;
// Check if the form is submitted
if (isset($_POST["edit_id"])) {
    $id = $_POST['edit_id'];
    $property_title = isset($_POST['name']) ? $_POST['name'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $property_type = isset($_POST['property_type']) ? $_POST['property_type'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';

    // Sanitize the data to prevent SQL injection
    $property_title = mysqli_real_escape_string($conn, $property_title);
    $description = mysqli_real_escape_string($conn, $description);
    $property_type = mysqli_real_escape_string($conn, $property_type);
    $location = mysqli_real_escape_string($conn, $location);

    // Update property table
    $update_property_query = "UPDATE property SET 
        property_title = '$property_title', 
        description = '$description', 
        property_type = '$property_type', 
        location = '$location' 
    WHERE id = '$id'";

    // Execute the update query for property table
    $property_updated = mysqli_query($conn, $update_property_query);

    // If property update is successful, proceed to update the facility table
    if ($property_updated) {
        $kitchen = isset($_POST['kitchen']) ? (int)$_POST['kitchen'] : 0;
        $bedroom = isset($_POST['bedrooms']) ? (int)$_POST['bedrooms'] : 0;
        $living_room = isset($_POST['livingroom']) ? (int)$_POST['livingroom'] : 0;
        $floor = isset($_POST['floor']) ? (int)$_POST['floor'] : 0;
        $parking = isset($_POST['parking']) ? (int)$_POST['parking'] : 0;
        $area = isset($_POST['area']) ? (float)$_POST['area'] : 0;

        // Update facility table query
        $update_facility_query = "UPDATE facility SET 
            kitchen = $kitchen, 
            bedroom = $bedroom, 
            living_room = $living_room, 
            floor = $floor, 
            parking = $parking, 
            area = $area 
        WHERE property_id = '$id'";

        // Execute the update query for facility table
        $facility_updated = mysqli_query($conn, $update_facility_query);

        // Check if both updates were successful
        if ($facility_updated) {
            $_SESSION['status'] = "Property Detail Updated Successfully!";
            $_SESSION['status_code'] = "success";
            header("Location: ../admin/myProerty.php");
            exit;
        } else {
            $_SESSION['status'] = "Property Detail Updated, but Facility details not updated!";
            $_SESSION['status_code'] = "error";
            header("Location: ../admin/myProerty.php?id=$id");
            exit;
        }
    } else {
        $_SESSION['status'] = "Error updating Property details: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header("Location: ../admin/myProerty.php?id=$id");
        exit;
    }
}

mysqli_close($conn);
?>
