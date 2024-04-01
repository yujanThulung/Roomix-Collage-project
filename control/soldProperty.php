<?php
require '../includes/dbConnect.php'; ?>
<?php require('../includes/loginSession.php'); ?>


<?php
//sold update
if (isset($_POST['property_sold_btn'])) {
    $sold_id = $_POST['sold_id'];
    $sold_update_query = "SELECT * FROM property WHERE id='$sold_id' ";
    $sold_update_result = mysqli_query($conn, $sold_update_query);

    $row = mysqli_fetch_assoc($sold_update_result);
    $current_status = $row['sold_status'];

    $update_status = "UPDATE property SET sold_status = 0 WHERE id = $sold_id AND sold_status = $current_status"; //set sold status to true if it is currently
    $update_status_run = mysqli_query($conn, $update_status);

    if ($update_status_run) {
        $_SESSION['status'] = "Property marked as sold successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: ../admin/myProerty.php");
        exit;
    } else {
        $_SESSION['status'] = "Error updating property status!";
        $_SESSION['status_code'] = "error";
        header("Location: ../admin/myProerty.php");
        exit;
    }
} else {
    $_SESSION['status'] = "Error fetching current status!";
    $_SESSION['status_code'] = "error";
    header("Location: ../admin/myProerty.php");
    exit;
}
mysqli_close( $conn );
?>
