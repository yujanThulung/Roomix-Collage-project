<?php
require '../includes/dbConnect.php'; ?>
<?php require('../includes/loginSession.php'); ?>
<?php
//delete  property 
if(isset($_POST['property_delete_btn'])){
    $delete_id = $_POST['delete_id'];
    $pro_delete_query="DELETE FROM property WHERE id='$delete_id' ";
    $delete_query_run = mysqli_query($conn, $pro_delete_query);

    if ($delete_query_run) {
        $_SESSION['status']="Your Property Deleted Successfully!";
        $_SESSION['status_code'] ="warning";
        echo "<script>window.history.back();</script>";
        exit;
    }else{
        $_SESSION['status'] = "Your Property  not Deleted!";
        $_SESSION['status_code'] = "error";
        echo "<script>window.history.back();</script>";
        exit;
    }
}

?>
<?php include('../includes/footer.php')?>
<?
// Close database connection
mysqli_close($conn);
?>