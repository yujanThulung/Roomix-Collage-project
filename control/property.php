<?php require('../includes/dbConnect.php')?>
<?php include('../includes/sweetalert.php')?>
<?php
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize the array to hold uploaded image paths
    $uploadedImages = array();

    // Check if files were uploaded
    if (!empty($_FILES['file']['name']) && is_array($_FILES['file']['name'])) {
        // Handle multiple file uploads
        $uploadDir = "../uploads/";

        foreach ($_FILES['file']['name'] as $key => $image) {
            $fileName = $_FILES['file']['name'][$key];
            $fileSize = $_FILES['file']['size'][$key];
            $fileTmpName = $_FILES['file']['tmp_name'][$key];
            $fileType = $_FILES['file']['type'][$key];
            $fileError = $_FILES['file']['error'][$key];

            // Check file size (limit to 5MB)
            $maxFileSize = 5 * 1024 * 1024; // 5MB
            if ($fileSize > $maxFileSize) {
                echo "Error: File $fileName exceeds the maximum file size limit (5MB).";
                continue; // Skip this file and continue with the next one
            }

            $targetFilePath = $uploadDir . $fileName;

            // Move uploaded file to the destination directory
            if (move_uploaded_file($fileTmpName, $targetFilePath)) {
                $uploadedImages[] = $targetFilePath;
            } else {
                echo "Error uploading file $fileName.";
            }
        }
    }

    // Retrieve form data
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

    // Convert uploadedImages array to comma-separated string
    $imagesString = implode(",", $uploadedImages);// how?


    //getting single id by session
    $id = $_SESSION['id'];
    $query = "INSERT INTO property (property_title, description, property_type, kitchen, bedroom, living_room, floor, parking, area, total_price, location, user_id, media) VALUES ('$property_title', '$description', '$property_type', $kitchen, $bedroom, $living_room, $floor, $parking, $area, $total_price, '$location', '$id','$imagesString')";
    if (mysqli_query($conn, $query)) {
            $_SESSION['status'] = "Property Added Successfully!";
            $_SESSION['status_code'] = "success";
            if ($_SESSION["userType"] = "Landlord") {
                header("Location: ../landlordAdmin\myProerty.php");
                exit;
            }elseif ($_SESSION["userType"] = "Admin") {
                header("Location: ../admin/myProerty.php");
                exit;
            }
            exit;
    } else {
            $_SESSION['status'] = "Property Not Added!";
            $_SESSION['status_code'] = "error";
            if ($_SESSION["userType"] = "Landlord") {
                header("Location: ../landlordAdmin\myProerty.php");
                exit;
            }elseif ($_SESSION["userType"] = "Admin") {
                header("Location: ../admin/myProerty.php");
                exit;
            }
            exit;
    }
}


?>
<?php include('../includes/footer.php')?>
<?
// Close database connection
mysqli_close($conn);
?>
