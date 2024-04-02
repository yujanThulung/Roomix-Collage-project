<!DOCTYPE html>
<html lang="en">

<?php
include '../includes/dbConnect.php'; ?>

<head>
    <meta charset=" UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RooMix</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <style>
        html {
            height: 0;

        }

        span {
            color: #072448;
        }

        span i {
            color: #072448;
        }

        .custom-btn-color {
            background-color: #54d2d2;
            border-radius: 3rem;
            border: none;
        }

        .custom-btn-color:hover {
            background-color: #072448;
            color: white;
        }

        .arrow {
            color: white;
        }

        .custom-card {
            border-radius: 2rem;
        }

        .card {
            animation: fadeInUp 0.5s ease-out;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body style="padding-top: 0.25px;">

    <!-- Navigation -->
    <nav style="    justify-content: center;
    align-items: center;">
        <a href="index.php" class="active"><img src="image/logo.png" alt="logo"></a>
        <div class="navigation">
            <ul>
                <li><a href="properties.php" class="">Buy</a></li>
                <li><a href="#">Sell</a></li>
            </ul>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutUs.php">About us</a></li>
                <li><a href="properties.php" class="active">Properties</a></li>
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


    <!--Latest  Property start-->
    <div class="container my-5 mb-3" style="padding-top: 10rem;">
        <div class="text-center">
            <h1>Display Latest & Featured Properties</h1>
            <p>Discover top-notch properties with our latest and featured listings. Your dream home or investment awaits</p>
        </div>
        <div class="row row-cols-1 row-cols-md-4 mt-2 g-4">
            <div class="col mb-3">
                <div class="card h-100 rounded-5 position-relative">
                    <!-- Card content -->
                    <img src="image/room1.jpg" class="card-img-top rounded-top-5" alt="image">
                    <span class="position-absolute top-0 end-0 mt-3 me-3 text-white py-1 px-2 rounded-pill" style="background-color: #072448;">Room</span>
                    <div class="card-body">
                        <div style=" display:flex; justify-content: space-between;">
                            <span style="color: #072448;"><i class="fas fa-map-marker-alt mr-1"></i> Kirtipur</span>
                            <span style="color: #072448;"><i class="fas fa-money-bill-alt mr-1"></i> Rs.10000</span>
                        </div>
                        <h6 class="card-text text-left"><b>Room available for Lorem ipsum dolor sit amet student.</b></h6>
                        <div>
                            <div style=" display:flex; justify-content: space-between;">
                                <span style="color: #072448;"><i class="fas fa-parking mr-1"></i> 2</span>
                                <span style="color: #072448;"><i class="fas fa-layer-group mr-1"></i> 3</span>
                                <span style="color: #072448;"><i class="fas fa-ruler-combined mr-1"></i> 1000 sq.ft</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-2"> <!-- Place button on right side -->
                            <a href="#" class="btn custom-btn-color rounded-5">More Details <i class="arrow fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Latest  Property end-->



    <!--View  Property start-->
    <div class="container my-5 mb-3 pt-5">
        <div class="text-center">
            <h1>Property Listing</h1>
            <p>Discover the epitome of luxury living and investment potential with our latest and featured listings. Your dream home or lucrative investment awaits in these top-notch properties.</p>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4 mt-2">
            <div class="col mb-3">
                <div class="card h-100 rounded-5 position-relative">
                    <!-- Card content -->
                    <img src="image/room1.jpg" class="card-img-top rounded-top-5" alt="image">
                    <span class="position-absolute top-0 end-0 mt-3 me-3 text-white py-1 px-2 rounded-pill" style="background-color: #072448;">Room</span>
                    <div class="card-body">
                        <div style=" display:flex; justify-content: space-between;">
                            <span style="color: #072448;"><i class="fas fa-map-marker-alt mr-1"></i> Kirtipur</span>
                            <span style="color: #072448;"><i class="fas fa-money-bill-alt mr-1"></i> Rs.10000</span>
                        </div>
                        <h6 class="card-text text-left"><b>Room available for Lorem ipsum dolor sit amet student.</b></h6>
                        <div>
                            <div style=" display:flex; justify-content: space-between;">
                                <span style="color: #072448;"><i class="fas fa-parking mr-1"></i> 2</span>
                                <span style="color: #072448;"><i class="fas fa-layer-group mr-1"></i> 3</span>
                                <span style="color: #072448;"><i class="fas fa-ruler-combined mr-1"></i> 1000 sq.ft</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-2"> <!-- Place button on right side -->
                            <a href="#" class="btn custom-btn-color rounded-5">More Details <i class="arrow fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--View  Property end-->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js " defer></script>
    <?php include('../includes/footer.php'); ?>
</body>

</html>