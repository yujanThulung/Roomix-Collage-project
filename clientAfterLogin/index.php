<?php
require '../includes/dbConnect.php'; ?>
<?php require('../includes/loginSession.php'); ?>
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="searchStyle.css">
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
            animation: fadeInUp 1s ease-out;
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


        form {
            width: 60%;
            max-width: 60%;
            color: black;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            height: 15%;
            justify-content: space-evenly;
            gap: 5px;
            margin: 5vh 0;
            padding: 3vh 2vw;
            background-color: var(--c-primary);
            border-radius: 10vh;
            border: none;
            color: var(--c-light);
        }

        #search-input,
        #category-filter,
        #search-btn {
            padding: 1.5vh;
            border: 0.01rem solid var(--c-secondary);
            border-radius: 10vh;
            width: 25%;
            background-color: transparent;
            color: var(--c-light);
        }

        #search-input {
            width: 48%;
        }

        #search-input::placeholder {
            color: var(--c-light);
        }

        #search-btn {
            cursor: pointer;
            font-size: var(--btn-font);
            font-weight: 600;
            background-color: var(--c-btn);
            width: 8vw;
            margin-left: 1vh;
        }

        #search-btn:hover {
            background-color: var(--c-dark);
            color: var(--c-light);
            font-size: 20px;
            transition: 0.2s ease;
            box-sizing: border-box;
        }

        .userData {
            display: flex;
            flex-direction: column;
            align-items: end;
            text-align: right;
            display: inline-block;
        }
    </style>

</head>

<body>
    <!-- Navigation -->
    <nav style="justify-content: space-between;align-items: center;">
        <a href="index.php" class="active"><img src="image/logo.png" alt="logo"></a>
        <div class="navigation">
            <ul>
                <li>
                    <a href="..\userAdmin\index.php">My Dashboard</a>
                </li>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="aboutUs.php">About us</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>

            <ul>
                <li class="userData">
                    <h6 style="color: white;"><?php echo $_SESSION["user"] ?></h6>
                    <h6 style="color: white;"><?php echo $_SESSION["userType"] ?></h6>
                </li>
                <li><a href="../control/logout.php"><button class="btn">Log Out</button></a></li>
            </ul>
            <i id="menu-close" class="fas fa-times"></i><!--this is use to make resposive bar-->
        </div>
    </nav>

    <!-- Home  -->
    <section id="home" class="tagLine">
        <h2><b>Explore, Compare, and Discover Your Perfect Space with RooMix </b></h2>
        <p>We find, you delight. Effortless rentals, connecting seekers with landlords. Your perfect home, our
            commitment.</p>




        <form action="properties.php" method="GET">
            <!-- Search input for location -->
            <input type="text" id="search-input" name="search" placeholder="Search by location..." />

            <!-- Filter options for category -->
            <select id="category-filter" name="category">
                <option value="all">&#x1F3E0; All Categories</option>
                <option value="room">Room</option>
                <option value="flat">Flat</option>
            </select>

            <button id="search-btn" type="submit">Search</button>
        </form>




    </section>


    <?php

    $card_count = 8;
    $filtered_property_query = "
    SELECT property.*, facility.*
    FROM property
    LEFT JOIN facility ON property.id = facility.property_id
    WHERE property.sold_status = 1
    ORDER BY property.added_date DESC
    LIMIT $card_count";

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
                                <a href="p-detail.php?id=<?php echo $row['property_id'] ?>" class="btn custom-btn-color rounded-5">More Details <i class="arrow fas fa-chevron-right"></i></a>
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
    $filtered_property_query = "SELECT property.*, facility.*
    FROM property
    LEFT JOIN facility ON property.id = facility.property_id
    WHERE property.sold_status = 1 ORDER BY RAND() LIMIT $card_count";

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