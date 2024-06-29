<?php
require('../includes/dbConnect.php');
include('../includes/sweetalert.php');

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
            $fileTmpName = $_FILES['file']['tmp_name'][$key];

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
    $kitchen = isset($_POST['kitchen']) ? (int)$_POST['kitchen'] : null;
    $bedroom = isset($_POST['bedrooms']) ? (int)$_POST['bedrooms'] : null;
    $living_room = isset($_POST['livingroom']) ? (int)$_POST['livingroom'] : null;
    $floor = isset($_POST['floor']) ? (int)$_POST['floor'] : null;
    $parking = isset($_POST['parking']) ? (int)$_POST['parking'] : null;
    $area = isset($_POST['area']) ? (float)$_POST['area'] : null;
    $total_price = isset($_POST['price']) ? (float)$_POST['price'] : 0;
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $expiry_date = isset($_POST['expiryDate']) ? $_POST['expiryDate'] : '';

    // Sanitize the data to prevent SQL injection
    $property_title = mysqli_real_escape_string($conn, $property_title);
    $description = mysqli_real_escape_string($conn, $description);
    $property_type = mysqli_real_escape_string($conn, $property_type);
    $location = mysqli_real_escape_string($conn, $location);
    $expiry_date = mysqli_real_escape_string($conn, $expiry_date);

    // Convert uploadedImages array to comma-separated string
    $imagesString = implode(",", $uploadedImages);

    //getting single id by session
    $user_id = $_SESSION['id'];

    // Insert into `property` table
    $query_property = "INSERT INTO property (property_title, description, property_type, total_price, location, user_id, media)
                    VALUES ('$property_title', '$description', '$property_type', $total_price, '$location', '$user_id', '$imagesString')";

    if (mysqli_query($conn, $query_property)) {
        $property_id = mysqli_insert_id($conn); // Get the auto-generated property_id

        // Insert into `facility` table
        $query_facility = "INSERT INTO facility (property_id, kitchen, bedroom, living_room, floor, parking, area)
                        VALUES ($property_id, $kitchen, $bedroom, $living_room, $floor, $parking, $area)";

        if (mysqli_query($conn, $query_facility)) {
            $_SESSION['status'] = "Property Added Successfully!";
            $_SESSION['status_code'] = "success";
            if ($_SESSION["userType"] == "Landlord") {
                header("Location: ../landlordAdmin\myProerty.php");
                exit;
            } elseif ($_SESSION["userType"] == "Admin") {
                header("Location: ../admin/myProperty.php");
                exit;
            }
        } else {
            $_SESSION['status'] = "Error adding property into facility!";
            $_SESSION['status_code'] = "error";
        }
    } else {
        $_SESSION['status'] = "Property Not Added!";
        $_SESSION['status_code'] = "error";
    }

    // Close connection
    mysqli_close($conn);
}
?>
<?php include('../includes/footer.php')?>
