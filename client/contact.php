<!DOCTYPE html>
<html lang="en" style="height: 0;>

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

    <!-- Navigation -->
    <nav>
        <a href="index.php"><img src="image/logo.png" alt="logo"></a>
        <div class="navigation">
            <ul>
                <li><a href="properties.php">Buy</a></li>
                <li><a href="#">Sell</a></li>
            </ul>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutUs.php">About us</a></li>
                <li><a href="properties.php">Properties</a></li>
                <li><a href="contact.php" class="active">Contact</a></li>
            </ul>

            <ul>
                <li><a href="registration.php"><button class="btn register" onclick="showRegisterForm()">Register</button></a></li>
                <li><a href="login.php"><button class="btn" onclick="showLoginForm()">Login</button></a></li>
                </li>
            </ul>
            <i id="menu-close" class="fas fa-times"></i><!--this is use to make resposive bar-->
        </div>
    </nav>



    <!--Form-->


    <!-- Home  -->
    <section id="contactUs">

        <h2>Contact Us</h2>
    </section>


    <!--Home-->
    <section id="contact">
        <div class="getin">
            <h2>Get in touch</h2>
            <p>Here are the ways you can contact us:</p>

            <div class="getin-details">
                <h3>Phone</h3>
                <div>
                    <i class="fas fa-phone get"></i>
                    <p> (+977) 031-23-4465 <br>
                        (+977) 9823434546 </p>
                </div>

                <h3>Headquaters</h3>
                <div>
                    <i class="fas fa-envelope get get"></i>
                    <p>yujanrai07@gmail.com<br>
                        yujanrai07@gmail.com</p>
                </div>
                <h3>Follow Us</h3>
                <div class="pro-links">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-linkedin"></i>
                    <i class="fab fa-github"></i>
                </div>
            </div>
        </div>


        <div class="form">
            <h4>Let's Connect</h4>
            <p>We're happy to help! Share your question and we'll get back to you within 24 hours.</p>
            <div class="form-row">
                <input type="text" placeholder="Your name">
                <input type="text" placeholder="Email">
            </div>
            <div class="form-col">
                <input type="text" placeholder="Subject">
            </div>
            <div class="form-col">
                <textarea name="" id="" cols="30" rows="8" placeholder="How can we help?"></textarea>
            </div>
            <div class="form-col">
                <button> Send Message</button>
            </div>
        </div>
    </section>
    <!-- ..............Footer............. -->

    <footer>
        <div class="f-main">
            <div class="footer-col about" id="about">
                <h3>Get In Touch</h3>
                <li><i class="fas fa-map-marker-alt"></i>Kathmandu, Nepal</li>
                <li><i class="fas fa-envelope"></i>roomixyr1@gmail.com</li>
                <li><i class="fas fa-phone"></i>+977 9853333333</li>
            </div>

            <div class="footer-col links">
                <h3>Useful Links</h3>
                <ul>
                    <li><i class="fas fa-chevron-right"><a href="index.php">Home</a></i></li>
                    <li><i class="fas fa-chevron-right"><a href="aboutUs.php">About Us</a></i></li>
                    <li><i class="fas fa-chevron-right"><a href="contact.php">Contact Us</a></i></li>
                    <li><i class="fas fa-chevron-right"><a href="properties.php">Property</a></i></li>

                </ul>
                </ul>
            </div>

            <div class="form">
                <h3>Quick Contact</h3>
                <div class="form-row">
                    <input type="text" placeholder="Your name">
                    <input type="text" placeholder="Email">
                </div>
                <div class="form-col">
                    <textarea name="" id="" cols="30" rows="6" placeholder="Write here..."></textarea>
                </div>
                <div class="form-col">
                    <button> Send Message</button>
                </div>
            </div>
        </div>


        <div class="social-media"></div>
        <div class="copyright">
            <p>All copyright &#169; 2023 reserved| RooMix</p>

            <div class="<div class=" properties card">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-linkedin"></i>
            </div>
        </div>
    </footer>
</body>

<script src="script.js"defer></script>
    <?php include('../includes/footer.php');?>

</html>