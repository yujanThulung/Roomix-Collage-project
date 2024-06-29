<?php
require '../includes/dbConnect.php'; 
require '../includes/loginSession.php'; 

$response = array();

// Handle the AJAX request to delete property
if (isset($_POST['delete_property_btn_set']) && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $pro_delete_query = "DELETE FROM property WHERE id='$delete_id'";
    $delete_query_run = mysqli_query($conn, $pro_delete_query);

    if ($delete_query_run) {
        $response['success'] = true;
        $response['message'] = "Property Deleted Successfully!";
        // $_SESSION['status'] = "Your Property Deleted Successfully!";
        $_SESSION['status_code'] = "success";
    } else {
        $response['success'] = false;
        $response['message'] = "Your Property not Deleted!";
        // $_SESSION['status'] = "Your Property not Deleted!";
        $_SESSION['status_code'] = "error";
    }
    
    echo json_encode($response);
    exit;
}

mysqli_close($conn);
?>
