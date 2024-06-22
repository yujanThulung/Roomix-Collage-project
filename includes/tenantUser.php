
<?php 
include '../includes/dbConnect.php';
// FOR UPDATE
if (isset($_POST['register_update_btn'])) {
    $update_id = $_POST['edit_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query_update = "UPDATE user SET fname ='$fname',lname ='$lname',email ='$email', phone ='$phone', email ='$email' WHERE id ='$update_id' ";
    $query_update_run = mysqli_query($conn, $query_update);

    // Checking if the update query was successful
    if ($query_update_run) {
        $_SESSION['status'] = "Data Updated Successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: ../userAdmin/userDetail.php");
        exit;
    } else {
        $_SESSION['status'] = "Data not Updated!";
        $_SESSION['status_code'] = "error";
        header("Location: ../userAdmin/userDetail.php?id=$update_id");
        exit;
    }
}
?>