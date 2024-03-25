<!DOCTYPE html>
<html lang="en">
<?php 
include '../includes/dbConnect.php';?> 


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RooMix</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>

    <!--Form-->

    <div id="form-box">
        <div id="form-container-r">
            <form action="../includes/user.php" method="POST" class="n-form" id="register"><a href="javascript:history.back()"><i class="fas fa-times" id="cross"></i></a>
                <h2>Register</h2>
                <div class="input-group">
                    <div class="form-label">
                        <div class="form-name">
                            <div class="name b-name">
                                <label for="fname">First Name </label>
                                <input type="text" id="fname" name="fname" placeholder="First Name" required>
                            </div>
                            <div class="name b-name">
                                <label for="lname">Last Name </label>
                                <input type="text" id="lname" name="lname" placeholder="Last Name" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-label">
                    <label for="email">Email</label>
                    <input type="email" id="r-email" name="email" placeholder="Enter your email" required>
                </div> 
                <div class="form-label">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" placeholder="Enter your phone number" required>
                </div> 
                <div class="form-label">
                    <label for="password">Password</label>
                    <input type="password" id="r-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-label">
                    <label for="c-password">Confirm password</label>
                    <input type="password" id="c-password" name="c-password" placeholder="Confirm password" required>
                </div>


                <!-- Move checklist here -->
                <section id="password-checklist" style="display: none;">
                    <ul>
                        <li id="uppercase-check">At least one uppercase letter</li>
                        <li id="lowercase-check">At least one lowercase letter</li>
                        <li id="number-check">At least one number</li>
                        <li id="symbol-check">At least one symbol ($@$!%*?&)</li>
                        <li id="length-check">Minimum length of 6 characters</li>
                    </ul>
                </section>

                <div class="form-btn">
                    <button onclick="validateForm()" name="register_btn">Register</button>
                </div>
                <div class="option-field">
                    <label for="check">Already I have an account?</label>
                    <a href="login.php" id="login">Login</a>
                </div>
            </form>
        </div>


    </div>
    <script src="script.js" defer></script>
    <?php include('../includes/footer.php');?>
</body>

</html>