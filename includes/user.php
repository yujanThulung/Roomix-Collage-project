<?php 
include 'dbConnect.php';?> // Include the file that establishes the database connection


<?php
//session start
session_start();

if (isset($_POST['register_btn'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone']; // Corrected variable name
    $password = $_POST['password'];
    $c_password = $_POST['c-password'];

    //checking the password and confirm password are same?
    if ($password === $c_password){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //Insert data into db
        $query ="INSERT INTO register (fname, lname, email, phone, password) VALUES ('$fname', '$lname', '$email', '$phone', '$hashed_password')";

        //executing query
        $insert = mysqli_query($conn, $query);

        //Checking whether the query is executed  or not
        if ($insert){
            $_SESSION['email']= $email;
            $_SESSION['status'] = "Registered Successfully!";
            $_SESSION['status_code'] = "success";
            header("Location: ../client/index.php");
            exit; // Added exit to prevent further execution
        } else {
            $_SESSION['email']= $email;
            $_SESSION['status'] = "Data not Registered!";
            $_SESSION['status_code'] = "error";
            header("Location: ../client/registration.php");" . mysqli_error($conn) ";
        }
    } else {
        $_SESSION['email']= $email;
        $_SESSION['status'] = "Data not Registered!";
        $_SESSION['status_code'] = "error";
        header("Location: ../client/registration.php");" . mysqli_error($conn) ";
    }




    //FOR 
}

?>
