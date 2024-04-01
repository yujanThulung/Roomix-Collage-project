<?php
include '../includes/dbConnect.php';

if (isset($_POST['register_btn'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $c_password = $_POST['c-password'];

    // Checking if password and confirm password match
    if ($password === $c_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the database
        $query = "INSERT INTO register (fname, lname, email, phone, password) VALUES ('$fname', '$lname', '$email', '$phone', '$hashed_password')";
        $insert = mysqli_query($conn, $query);

        // Checking if the query was successful
        if ($insert) {
            $_SESSION['email'] = $email;
            $_SESSION['status'] = "Registered Successfully!";
            $_SESSION['status_code'] = "success";
            header("Location: ../client/index.php");
            exit; // Added exit to prevent further execution
        } else {
            $_SESSION['email'] = $email;
            $_SESSION['status'] = "Data not Registered!";
            $_SESSION['status_code'] = "error";
            header("Location: ../client/registration.php");
            exit;
        }
    } else {
        $_SESSION['email'] = $email;
        $_SESSION['status'] = "Data not Registered!";
        $_SESSION['status_code'] = "error";
        header("Location: ../client/registration.php");
        exit;
    }
}

// FOR UPDATE
if (isset($_POST['register_update_btn'])) {
    $update_id = $_POST['edit_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query_update = "UPDATE register SET fname ='$fname',lname ='$lname',email ='$email', phone ='$phone', email ='$email' WHERE id ='$update_id' ";
    $query_update_run = mysqli_query($conn, $query_update);

    // Checking if the update query was successful
    if ($query_update_run) {
        $_SESSION['status'] = "Data Updated Successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: ../admin/userDetail.php");
        exit;
    } else {
        $_SESSION['status'] = "Data not Updated!";
        $_SESSION['status_code'] = "error";
        header("Location: ../admin/editProfile.php?id=$update_id");
        exit;
    }
}


//DELETE
if(isset($_POST['register_delete_btn'])){
    $delete_id = $_POST['delete_id'];

    $reg_del_query = "DELETE FROM register WHERE id ='$delete_id' ";
    $reg_del_query_run =  mysqli_query($conn,$reg_del_query);

    if($reg_del_query_run){
        $_SESSION['status']="User Deleted Successfully!";
        $_SESSION['status_code'] ="danger";
        header("Location: ../admin/my.php");
        exit;
    }else{
        $_SESSION['status'] = "Data not Updated!";
        $_SESSION['status_code'] = "error";
        header("Location: ../admin/userDetail.php?id=$delete_id");
        exit;
    }
}


//FOR LOGIN
if(isset($_POST['login'])){
    $username = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    
    // Prepare SQL statement
    $query = "SELECT * FROM register WHERE email = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameters and execute query
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    // Get query result
    $result = mysqli_stmt_get_result($stmt);

    // Check if user exists
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password_from_db = $row['password'];

        // Verify the provided password against the hashed password from the database
        if(password_verify($password, $hashed_password_from_db)) {
            // Passwords match, login successful
            $_SESSION["user"] = $username;
            header("location: ../admin/index.php");
            exit; 
        } else {
            // Passwords don't match
            $_SESSION['status'] = "Incorrect email or password.";
            $_SESSION['status_code'] = "error";
            header("location: ../client/login.php");
            exit;
        }
    } else {
        // No user with the provided email exists
        $_SESSION['status'] = "User not found.";
        $_SESSION['status_code'] = "error";
        header("location: ../client/login.php");
        exit;
    }
}


?>
<?php mysqli_close($conn);?>


