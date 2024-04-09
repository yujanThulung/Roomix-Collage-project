<?php
require '../includes/dbConnect.php'; ?>
<?php require('../includes/loginSession.php'); ?>

<?php
// Check if 'id' is received
if(isset($_POST['id'], $_POST['user_id'])) {
    $id = $_POST['id'];
    $request_id = $_POST['request_id'];
    $user_id = $_POST['user_id'];
    echo $user_id; 
}else{
    echo "data not found";
}
?>

<?php
//sold update
if (isset($_POST['property_request_btn'])) {
    $sold_id = $_POST['request_id'];
    $sold_update_query = "SELECT * FROM property WHERE user_id='$user_id' AND id = '$property_id'";
    $sold_update_result = mysqli_query($conn, $sold_update_query);

    echo $sold_update_result;

    $row = mysqli_fetch_assoc($sold_update_result);
    $current_status = $row['sold_status'];

    $update_status = "UPDATE property SET sold_status = 2 WHERE id = $sold_id AND sold_status = $current_status"; //set sold status to true if it is currently
    $update_status_run = mysqli_query($conn, $update_status);

    if ($update_status_run) {
        $_SESSION['status'] = "Property marked as sold successfully!";
        $_SESSION['status_code'] = "success";
        //header("Location: ../userAdmin\index.php");
        exit;
    } else {
        $_SESSION['status'] = "Error updating property status!";
        $_SESSION['status_code'] = "error";
        //header("Location: ../userAdmin\index.php");
        exit;
    }
} else {
    $_SESSION['status'] = "Error fetching current status!";
    $_SESSION['status_code'] = "error";
    //header("Location: ../userAdmin\index.php");
    exit;
}
mysqli_close( $conn );
?>
