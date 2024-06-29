<script src="sweetalert.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
if(isset($_SESSION['status']) && $_SESSION['status'] != '')
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "Ok",
        });
    </script>
    <?php
    unset($_SESSION["status"]);
} 
?>
<script>
$(document).ready(function(){
    $('.delete_btn_ajax').click(function (e) { 
        e.preventDefault();
        const deleteid = $(this).closest("tr").find('.delete_id_value').val();
        console.log(deleteid);
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "../control/user.php",
                    data: {
                        delete_btn_set: 1,
                        delete_id: deleteid,
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log("Success Response:", response); // Log the success response
                        if (response.success) {
                            swal("Data Deleted Successfully!!!", {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            });
                        } else {
                            swal("Error: " + response.message, {
                                icon: "error",
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                        console.log("XHR:", xhr);
                        console.log("XHR Response Text:", xhr.responseText);
                        swal("An error occurred: " + xhr.responseText, {
                            icon: "error",
                        });
                    }
                });
            } 
        });
    });
});
</script>



<!-- Session status script -->
<?php 
if(isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "Ok",
        });
    </script>
    <?php
    unset($_SESSION["status"]);
} 
?>

<!-- Property deletion script -->
<script>
$(document).ready(function(){
    $('.delete_property_btn_ajax').click(function (e) { 
        e.preventDefault();
        const deleteid = $(this).closest("tr").find('.delete_property_id_value').val();
        console.log(deleteid);
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this property!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "../control/deleteProperty.php", // URL to your PHP script
                    data: {
                        delete_property_btn_set: 1,
                        delete_id: deleteid,
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log("Success Response:", response); // Log the success response
                        if (response.success) {
                            swal("Property Deleted Successfully!!!", {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            });
                        } else {
                            swal("Error: " + response.message, {
                                icon: "error",
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                        console.log("XHR:", xhr);
                        console.log("XHR Response Text:", xhr.responseText);
                        swal("An error occurred: " + xhr.responseText, {
                            icon: "error",
                        });
                    }
                });
            } 
        });
    });
});
</script>
