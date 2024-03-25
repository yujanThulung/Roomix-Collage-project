<!DOCTYPE html>
<html lang="en">

<?php 
include '../includes/dbConnect.php';?> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RooMix</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>
    <div id="form-container-l">
        <form action="" class="n-form" id="logIn"><a href="javascript:history.back()"><i class="fas fa-times" id="cross"></i></a>
            <h2>Log in</h2>
            <div class="form-label">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="roomix13@gmail.com" required>
            </div>
            <div class="form-label">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>

            <div class="form-btn">
                <button onclick="validateForm()">Login</button>
            </div>

            <div class="option-field">
                <a href="registration.php">Create Account</a>
                <a href="#">Forgot your password?</a>
            </div>
        </form>

    </div>
</body>

<script src="script.js"defer></script>
    <?php include('../includes/footer.php');?>

</html>