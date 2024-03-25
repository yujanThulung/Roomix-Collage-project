<link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>
    <script>
        swal({
            title: "<?php echo  $_SESSION['status']; ?>",
            text: "",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "Ok",
        });
    </script>
<?php
    unset($_SESSION['status']);
}
?>

<script>
    $(document).ready(function() {
        $('.delete_btn_ajx').click(function(e) {
            e.preventDefault();
            var deleteid = $(this).closest("tr").find((".delete_id_value")).val();
            // console.log(deleteid);
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "code.php",
                            data: {
                                "delete_btn_set": 1,
                                "delete_id": deleteid,
                            },
                            success: function(response) {
                                swal("Data Deleted Successfully.!",{
                                    icon: "success",
                                }).then((result)=>{
                                    location.reload();
                                });
                            }
                        });
                    }
                });
        });
    });
</script>
<script>swal("Hello world!");</script>
