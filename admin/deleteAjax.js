$(document).ready(function() {
  // Use .off() to remove any previous event handlers
  $(document).off('click', '.delete_property_btn_ajax');

  // Attach the click event handler
  $(document).on('click', '.delete_property_btn_ajax', function(e) {
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
            success: function(response) {
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
            error: function(xhr, status, error) {
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
