<?php
require('../includes/dbConnect.php');
include('../includes/sweetalert.php');

// Check if the form is submitted
if(isset($_POST["edit_id"])){
    $id = $_POST['edit_id'];
    $property_title = isset($_POST['name']) ? $_POST['name'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : ''; 
    $property_type = isset($_POST['property_type']) ? $_POST['property_type'] : '';
    $kitchen = isset($_POST['kitchen']) ? $_POST['kitchen'] : 0;
    $bedroom = isset($_POST['bedrooms']) ? $_POST['bedrooms'] : 0;
    $living_room = isset($_POST['livingroom']) ? $_POST['livingroom'] : 0;
    $floor = isset($_POST['floor']) ? $_POST['floor'] : 0;
    $parking = isset($_POST['parking']) ? $_POST['parking'] : 0;
    $area = isset($_POST['area']) ? $_POST['area'] : 0;
    $total_price = isset($_POST['price']) ? $_POST['price'] : 0;
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $expiry_date = isset($_POST['expiryDate']) ? $_POST['expiryDate'] : '';

    // Sanitize the data to prevent SQL injection
    $property_title = mysqli_real_escape_string($conn, $property_title);
    $description = mysqli_real_escape_string($conn, $description);
    $property_type = mysqli_real_escape_string($conn, $property_type);
    $kitchen = (int)mysqli_real_escape_string($conn, $kitchen);
    $bedroom = (int)mysqli_real_escape_string($conn, $bedroom);
    $living_room = (int)mysqli_real_escape_string($conn, $living_room);
    $floor = (int)mysqli_real_escape_string($conn, $floor);
    $parking = (int)mysqli_real_escape_string($conn, $parking);
    $area = (float)mysqli_real_escape_string($conn, $area);
    $total_price = (float)mysqli_real_escape_string($conn, $total_price);
    $location = mysqli_real_escape_string($conn, $location);
    $expiry_date = mysqli_real_escape_string($conn, $expiry_date);

    // Update data into the database (excluding the image update)
    $query = "UPDATE property SET 
        property_title = '$property_title', 
        description = '$description', 
        property_type = '$property_type', 
        kitchen = $kitchen, 
        bedroom = $bedroom, 
        living_room = $living_room, 
        floor = $floor, 
        parking = $parking, 
        area = $area, 
        total_price = $total_price, 
        location = '$location', 
        expiry_date = '$expiry_date'  
    WHERE id = '$id'";

    // Execute the update query
    $update_query = mysqli_query($conn, $query);

    // Checking if the update query was successful
    if ($update_query) {
        $_SESSION['status'] = "Property Detail Updated Successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: ../admin/myProerty.php");
        exit;
    } else {
        $_SESSION['status'] = "Property Detail not Updated!";
        $_SESSION['status_code'] = "error";
        header("Location: ../admin/myProerty.php?id=$id");
        exit;
    }
}
mysqli_close($conn);
?>
