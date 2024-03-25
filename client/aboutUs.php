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

    <!-- Navigation -->
    <nav>
        <a href="index.php" class="active"><img src="image/logo.png" alt="logo"></a>
        <div class="navigation">
            <ul>
                <li><a href="properties.php">Buy</a></li>
                <li><a href="#">Sell</a></li>
            </ul>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutUs.php" class="active">About us</a></li>
                <li><a href="properties.php">Properties</a></li>
                <li><a href="contact.php">Contact</a></li>
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
    <section id="aboutUs" class="tagLine">

        <h2>About RooMix</h2>
    </section>

    <section id="about-container">

        <!-- Who we are -->
        <div class="about-img">
            <img src="image/room5.jpg" alt="kitchen">
        </div>
        <div class="about-content">
            <h2>Who We Are?</h2>
            In our country, finding the perfect room or flat can be a real challenge. Landlords often struggle to
            find suitable tenants, and tenants waste countless hours searching for listings that don't meet their
            needs.
            At Roomix, we believe that there's a better way.

            That's why we created Roomix, a web-based platform that connects landlords and roomseekers efficiently
            and
            transparently. Our platform makes it easy for landlords to list their properties and for tenants to find
            the
            perfect place to live.
        </div>

        <!-- Our mission -->
        <div class="about-content">
            <h2>Our Mission</h2>
            Our mission is to make room and flat rental easier for everyone. We believe that everyone deserves to live
            in a comfortable and affordable home, and we are committed to making that happen.
        </div>
        <div class="about-img">
            <img src="image/room3.jpg" alt="kitchen">
        </div>




        <!-- What make us different -->
        <div class="about-img">
            <img src="image/room6.jpg" alt="kitchen">
        </div>
        <div class="about-content">
            <h2>Who We Are?</h2>
            <ul>
                <li><i class="fas fa-hand-holding-usd"></i>
                    <p>We have a wide selection of listings for all types of rooms and flats, from budget-friendly
                        studios to luxurious apartments.</p>
                </li>
                <li><i class="fas fa-list-alt"></i>
                    <p>Our user-friendly interface makes it easy to search for listings, compare prices, and contact
                        landlords.</p>
                </li>
                <li><i class="fas fa-grin-alt"></i>
                    <p>Our innovative matching system helps landlords find tenants who are a good fit for their
                        property.</p>
                </li>
                <li><i class="fas fa-key"></i>
                    <p>We are committed to providing a safe and secure platform for both landlords and tenants.</p>
                </li>
            </ul>
        </div>
    </section>



    <!-- Our services -->
    <section id="O-service">
        <h1>How we help people?</h1>

        <div class="ser-base">


            <div class="ser-box">
                <img src="image/icon/house-search.png" alt="icon">
                <h3>
                    Transparent Choices
                </h3>
                <p>Roomix empowers you with transparent property details. High-quality images and genuine reviews
                    facilitate confident decision-making that aligns with your preferences.</p>
            </div>

            <div class="ser-box">
                <img src="image/icon/property.png" alt="icon">
                <h3>
                    Effortless Discovery
                </h3>
                <p>Find your perfect room or flat effortlessly on Roomix. Our user-friendly platform, smart filters, and
                    interactive maps make searching a breeze.</p>
            </div>
            <div class="ser-box">
                <img src="image/icon/booking.png" alt="icon">
                <h3>
                    Seamless Booking
                </h3>
                <p>Book stress-free on Roomix. Enjoy instant confirmation and real-time updates, ensuring a swift and
                    satisfying renting journey.
                </p>
            </div>
        </div>
    </section>



    <!--Meet our team-->
    <section id="about-o-team">
        <h1>Meet the team!</h1>
        <div class="card-details">
            <div class="card-container">
                <img src="image/yujan.jpg" alt="photo">
                <div class="card-detail">
                    <h3>Yujan Thulung</h3>
                    <p>BCA 4th Semester</p>
                </div>
            </div>
            <div class="card-container">
                <img src="image/ronak.jpg" alt="photo">
                <div class="card-detail">
                    <h3>Ronak Thapa Magar</h3>
                    <p>BCA 4th Semester</p>
                </div>
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