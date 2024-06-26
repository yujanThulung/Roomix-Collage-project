<?php
include '../includes/dbConnect.php';
header('Content-Type: application/json');

// For registering a user
if (isset($_POST['register_btn'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $c_password = $_POST['c-password'];
    $userType = $_POST['userType'];

    // Checking if password and confirm password match
    if ($password === $c_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if email already exists
        $query = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['status'] = "Email already exists";
            $_SESSION['status_code'] = "error";
            header("Location: ../client/registration.php");
            exit();
        }

        // Insert data into the database
        $query = "INSERT INTO user (fname, lname, email, phone, password, userType) VALUES ('$fname', '$lname', '$email', '$phone', '$hashed_password', '$userType')";
        $insert = mysqli_query($conn, $query);

        // Checking if the query was successful
        if ($insert) {
            $_SESSION['email'] = $email;
            $_SESSION['userType'] = $userType;
            $_SESSION['status'] = "Registered Successfully!";
            $_SESSION['status_code'] = "success";
            header("Location: ../client/index.php");
            exit;
        } else {
            $_SESSION['email'] = $email;
            $_SESSION['status'] = "Data not Registered!";
            $_SESSION['status_code'] = "error";
            header("Location: ../client/registration.php");
            exit;
        }
    } else {
        $_SESSION['email'] = $email;
        $_SESSION['status'] = "Passwords do not match!";
        $_SESSION['status_code'] = "error";
        header("Location: ../client/registration.php");
        exit;
    }
}

// For updating a user
if (isset($_POST['register_update_btn'])) {
    $update_id = $_POST['edit_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query_update = "UPDATE user SET fname='$fname', lname='$lname', email='$email', phone='$phone' WHERE id='$update_id'";
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

// For deleting a user
if (isset($_POST['register_delete_btn'])) {
    $delete_id = $_POST['delete_id'];

    $query_delete = "DELETE FROM user WHERE id='$delete_id'";
    $query_delete_run = mysqli_query($conn, $query_delete);

    // Checking if the delete query was successful
    if ($query_delete_run) {
        $_SESSION['status'] = "User deleted Successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: ../admin/userDetail.php");
        exit;
    } else {
        $_SESSION['status'] = "User not deleted!";
        $_SESSION['status_code'] = "error";
        header("Location: ../admin/editProfile.php?id=$delete_id");
        exit;
    }
}

// For login
if (isset($_POST['login'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $query = "SELECT * FROM user WHERE email = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameters and execute query
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    // Get query result
    $result = mysqli_stmt_get_result($stmt);

    // Check if user exists
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password_from_db = $row['password'];

        // Verify the provided password against the hashed password from the database
        $userType = $row['userType']; // storing userType variable  to use it later in session
        $id = $row['id']; // storing userId variable to use it later in

        if (password_verify($password, $hashed_password_from_db)) {
            // Passwords match, login successful

            $_SESSION["user"] = $username;
            $_SESSION["userType"] = $userType;
            $_SESSION["id"] = $id;

            if ($userType == "admin") {
                header("location: ../admin/index.php");
                exit; // Exit to prevent further execution
            } elseif ($userType == "Landlord") {
                $_SESSION["landlord_id"] = $id;
                header("location: ../landlordAdmin/index.php");
                exit;
            } elseif ($userType == "Tenant") {
                $_SESSION["tenant_id"] = $id;
                header("location: ../clientAfterLogin/index.php");
                exit;
            }
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

// For AJAX delete request
if (isset($_POST['delete_btn_set'])) {
    $delete_id = $_POST['delete_id'];

    $query_delete = "DELETE FROM user WHERE id='$delete_id'";
    $query_delete_run = mysqli_query($conn, $query_delete);

    $response = array();
    if ($query_delete_run) {
        $response['success'] = true;
        $response['message'] = "Data Deleted Successfully!!!";
    } else {
        $response['success'] = false;
        $response['message'] = "Data not Deleted!";
    }
    echo json_encode($response);
    exit;
}
?>
