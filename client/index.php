<?php
include '../includes/dbConnect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RooMix</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <style>
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

<body>


    <!-- Navigation -->
    <nav style="justify-content: center;">
        <a href="index.php" class="active"><img src="image/logo.png" alt="logo"></a>
        <div class="navigation">
            <ul>
                <li><a href="login.php" class="">Buy</a></li>
                <li><a href="login.php">Sell</a></li>
            </ul>

            <ul>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="aboutUs.php">About us</a></li>
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

    <!-- Home  -->
    <section id="home" class="tagLine">
            <h2><b>Explore, Compare, and Discover Your Perfect Space with RooMix </b></h2>
            <p>We find, you delight. Effortless rentals, connecting seekers with landlords. Your perfect home, our
                commitment.</p>
        

        <div id="search-container">
            <input type="text" id="search-input" placeholder="Search...">

            <!-- Filter options for location -->
            <select id="location-filter">
                <option value="all">&#x1F30E; All Locations</option>
                <option value="kalanki">Kalanki</option>
                <option value="chabel">Chabel</option>
                <option value="kirtipur">Kirtipur</option>
                <option value="location4">Location 4</option>
                <option value="location5">Location 5</option>
                <option value="location6">Location 6</option>
                <option value="location7">Location 7</option>
                <option value="location8">Location 8</option>
                <option value="location9">Location 9</option>
            </select>

            <!-- Filter options for cost -->
            <select id="cost-filter">
                <option value="all">&#x1F4B3; All Costs</option>
                <option value="4500-7000">Rs. 4500 - Rs. 7000</option>
                <option value="7001-10000">Rs. 7001 - Rs. 10000</option>
                <option value="10001-13000">Rs. 10001 - Rs. 13000</option>
                <option value="13001-16000">Rs. 13001 - Rs. 16000</option>
                <option value="16001-19000">Rs. 16001 - Rs. 19000</option>
                <option value="19001-20000">Rs. 19001 - Rs. 20000</option>
            </select>

            <!-- Filter options for category -->
            <select id="category-filter">
                <option value="all">&#x1F3E0; All Categories</option>
                <option value="room">Room</option>
                <option value="flat">Flat</option>
                <option value="house">House</option>
                <option value="office">Office</option>
            </select>

            <button id="search-btn" onclick="search()">Search</button>
        </div>


    </section>


    <?php

    $card_count = 8;
    $filtered_property_query = "SELECT * FROM property WHERE sold_status = 1 ORDER BY added_date DESC LIMIT $card_count";

    // execute query
    $query_run = mysqli_query($conn, $filtered_property_query);

    ?>


    <!--Latest  Property start-->
    <div class="container my-5 mb-3">
        <div class="text-center">
            <h1>Display Latest Properties</h1>
            <p>Discover top-notch properties with our latest and featured listings. Your dream home or investment awaits</p>
        </div>

        <div class="row row-cols-1 row-cols-md-4 mt-2 g-4">


            <?php
            while ($row = mysqli_fetch_array($query_run)) { ?>

                <!-- card start -->
                <div class="col mb-3">
                    <div class="card h-100 rounded-5 position-relative">
                        <!-- Card content -->
                        <div class="image-container" style="height: 200px; overflow: hidden;"> <!-- Set a fixed height for the image container -->
                            <?php
                            if (!empty($row['media'])) {
                                $image_urls = explode(',', $row['media']);

                                // To get the first image only
                                $first_image = trim($image_urls[0]);
                            }
                            ?>
                            <img src="<?php echo $first_image; ?>" class="card-img-top rounded-top-5" style="background-position: center; background-size: cover;" alt="image">
                        </div>
                        <!-- for image end -->

                        <span class="position-absolute top-0 end-0 mt-3 me-3 text-white py-1 px-2 rounded-pill" style="background-color: #072448;"><?php echo $row['property_type'] ?></span>
                        <div class="card-body">
                            <div style=" display:flex; justify-content: space-between;">
                                <span style="color: #072448;"><i class="fas fa-map-marker-alt mr-1"></i> <?php echo $row['location'] ?></span>
                                <span style="color: #072448;"><i class="fas fa-money-bill-alt mr-1"></i> Rs.<?php echo $row['total_price'] ?></span>
                            </div>
                            <div class="description" style="max-height: 2.6em; overflow: hidden;">
                                <h6 class="card-text text-left">
                                    <b><?php echo $row['property_title'] ?></b>
                                </h6>
                            </div>
                            <div>
                                <div style=" display:flex; justify-content: space-between;">
                                    <span style="color: #072448;"><i class="fas fa-parking mr-1"></i> <?php echo $row['parking'] ?></span>
                                    <span style="color: #072448;"><i class="fas fa-layer-group mr-1"></i> <?php echo $row['floor'] ?> floor</span>
                                    <span style="color: #072448;"><i class="fas fa-ruler-combined mr-1"></i> <?php echo $row['area'] ?> sq.ft</span>
                                </div>
                            </div>
                            <!-- card end -->

                            <!-- button start-->
                            <div class="d-flex justify-content-end mt-2 position-relative">
                                <a href="p-detail.php?id=<?php echo $row['id'] ?>" class="btn custom-btn-color rounded-5">More Details <i class="arrow fas fa-chevron-right"></i></a>
                            </div>
                            <!-- button end -->
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
    <!--Latest  Property end-->

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












    <!--View  Property start-->
    <?php

    $card_count = 8;
    $filtered_property_query = "SELECT * FROM property WHERE sold_status = 1 ORDER BY added_date ASC LIMIT $card_count";

    // execute query
    $query_run = mysqli_query($conn, $filtered_property_query);

    ?>


    <!--Latest  Property start-->
    <div class="container my-5 mb-3">
        <div class="text-center">
            <h1>Property Listing</h1>
            <p>Discover the epitome of luxury living and investment potential with our latest and featured listings. Your dream home or lucrative investment awaits in these top-notch properties.</p>
        </div>

        <div class="row row-cols-1 row-cols-md-4 mt-2 g-4">


            <?php
            while ($row = mysqli_fetch_array($query_run)) { ?>

                <!-- card start -->
                <div class="col mb-3">
                    <div class="card h-100 rounded-5 position-relative">
                        <!-- Card content -->
                        <div class="image-container" style="height: 200px; overflow: hidden;"> <!-- Set a fixed height for the image container -->
                            <?php
                            if (!empty($row['media'])) {
                                $image_urls = explode(',', $row['media']);

                                // To get the first image only
                                $first_image = trim($image_urls[0]);
                            }
                            ?>
                            <img src="<?php echo $first_image; ?>" class="card-img-top rounded-top-5" style="background-position: center; background-size: cover;" alt="image">
                        </div>
                        <!-- for image end -->

                        <span class="position-absolute top-0 end-0 mt-3 me-3 text-white py-1 px-2 rounded-pill" style="background-color: #072448;"><?php echo $row['property_type'] ?></span>
                        <div class="card-body">
                            <div style=" display:flex; justify-content: space-between;">
                                <span style="color: #072448;"><i class="fas fa-map-marker-alt mr-1"></i> <?php echo $row['location'] ?></span>
                                <span style="color: #072448;"><i class="fas fa-money-bill-alt mr-1"></i> Rs.<?php echo $row['total_price'] ?></span>
                            </div>
                            <div class="description" style="max-height: 2.6em; overflow: hidden;">
                                <h6 class="card-text text-left">
                                    <b><?php echo $row['property_title'] ?></b>
                                </h6>
                            </div>
                            <div>
                                <div style=" display:flex; justify-content: space-between;">
                                    <span style="color: #072448;"><i class="fas fa-parking mr-1"></i> <?php echo $row['parking'] ?></span>
                                    <span style="color: #072448;"><i class="fas fa-layer-group mr-1"></i> <?php echo $row['floor'] ?> floor</span>
                                    <span style="color: #072448;"><i class="fas fa-ruler-combined mr-1"></i> <?php echo $row['area'] ?> sq.ft</span>
                                </div>
                            </div>
                            <!-- card end -->

                            <!-- button start-->
                            <div class="d-flex justify-content-end mt-2 position-relative">
                                <a href="p-detail.php?id=<?php echo $row['id'] ?>" class="btn custom-btn-color rounded-5">More Details <i class="arrow fas fa-chevron-right"></i></a>
                            </div>
                            <!-- button end -->
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
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
</body>

<script src="script.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php include('../includes/footer.php'); ?>

</html>