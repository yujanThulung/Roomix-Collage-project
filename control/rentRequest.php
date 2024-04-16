<?php
require ('../includes/dbConnect.php');?>
<?('../includes/loginSession.php');?>

<?php

//Request property 
if (isset($_POST['property_request_btn'])) {
    $request_id = $_POST['request_id'];
    $user_id = $_SESSION["id"];

    $landlord_id = "SELECT * FROM property WHERE  id='$request_id'";
    $query = mysqli_query($conn, $landlord_id);
    $landlord_id = mysqli_fetch_assoc($query)['user_id'];
    echo $landlord_id;

    // Check if the user has already requested the property
    $check_query = "SELECT * FROM rent_requests WHERE user_id='$user_id' AND property_id='$request_id'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['status'] = "You have already requested this property!";
        $_SESSION['status_code'] = "error";
        echo "<script>window.history.back();</script>";
        exit;
    } else {
        // Proceed with the request
        $request_query = "INSERT INTO rent_requests(user_id, property_id,landlord_id) VALUES ('$user_id', '$request_id',$landlord_id)";
        $request_query_run = mysqli_query($conn, $request_query);

        if ($request_query_run) {
            $_SESSION['status'] = "Property Requested Successfully!";
            $_SESSION['status_code'] = "success";
            header( "Location:../clientAfterLogin\index.php" );
            exit;
        } else {
            $_SESSION['status'] = "Property Request Failed!";
            $_SESSION['status_code'] = "error";
            echo "<script>window.history.back();</script>";
            exit;
        }
    }
}


$request_id = $_GET['id'];
echo $request_id;
if(isset($_POST['property_cancel_btn'])){
    $delete_id = $_POST['delete_id'];
    $pro_delete_query="DELETE FROM rent_requests WHERE id='$delete_id' ";
    $delete_query_run = mysqli_query($conn, $pro_delete_query);

    if ($delete_query_run) {
        $_SESSION['status']="Your Property Cancel Successfully!";
        $_SESSION['status_code'] ="warning";
        echo "<script>window.history.back();</script>";
        exit;
    }else{
        $_SESSION['status'] = "Your Property  not Canceled!";
        $_SESSION['status_code'] = "error";
        echo "<script>window.history.back();</script>";
        exit;
    }
}





include('../includes/footer.php');

// Close database connection
mysqli_close($conn);
?>
