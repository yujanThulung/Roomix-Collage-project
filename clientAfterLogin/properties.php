<!DOCTYPE html>
<html lang="en">

<?php
include '../includes/dbConnect.php'; ?>

<head>
    <meta charset="UTF-8">
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

        .userData {
            display: flex;
            flex-direction: column;
            align-items: end;
            text-align: right;
            display: inline-block;
        }
    </style>
</head>

<body style="padding-top: 0.25px;">

     <!-- Navigation -->
     <nav style="justify-content: space-between;align-items: center;">
        <a href="index.php" class="active"><img src="image/logo.png" alt="logo"></a>
        <div class="navigation">
            <ul>
                <li>
                    <a href="..\userAdmin\index.php">My Dashboard</a>
                </li>
                <li><a href="index.php" >Home</a></li>
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

    <!-- properties -->
    <section id="properties" style="padding-top:2rem;">
        <h2><b>Find your dream home!</b></h2>
    </section>

    <!--Search  Property start-->
    <div class="container my-5 mb-3">
        <div class="text-center">
            <h1>Your Search Result</h1>
            <p>Explore outstanding properties showcased in our newest and highlighted listings. Find the perfect home or investment opportunity that you've been searching for.</p>
            <?php
            // Place your database connection code here
            // ...

            // Retrieve records per page
            $records_per_page = 5;

            // Initialize page number
            $page = 1;

            // Check if page number is set and numeric
            if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                $page = $_GET['page'];
            }

            // Calculate offset
            $offset = ($page - 1) * $records_per_page;
            // Initialize search query
            $search_query = '';

            // Construct filtered property query here
            $filtered_property_query = "SELECT * FROM property WHERE sold_status = 1";

            // Check if location search query is provided
            if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
                $location_query = " AND location LIKE '%" . mysqli_real_escape_string($conn, $_GET['search']) . "%'";
                $search_query .= $location_query;
            }

            // Check if category search query is provided
            if (isset($_GET['category']) && $_GET['category'] != 'all') {
                $category_query = " AND property_type = '" . mysqli_real_escape_string($conn, $_GET['category']) . "'";
                $search_query .= $category_query;
            }

            // Add combined search query to the main query
            if (!empty($search_query)) {
                $filtered_property_query .= $search_query;
            }

            // Check if sorting option is selected
            if (isset($_POST['sort_alphabet'])) {
                $sort_option = $_POST['sort_alphabet'];

                // Add sorting condition
                if ($sort_option == 'room') {
                    $filtered_property_query .= " AND property_type = 'room'";
                } elseif ($sort_option == 'flat') {
                    $filtered_property_query .= " AND property_type = 'flat'";
                }
            }

            // Construct final SQL query here
            $property_query = $filtered_property_query . " ORDER BY added_date DESC LIMIT $offset, $records_per_page";

            // Execute query
            $query_run = mysqli_query($conn, $property_query);

            // Check if there are no results
            if (mysqli_num_rows($query_run) == 0) {
                echo "<p>Result not found.</p>";
            }
            ?>
            <!-- Display search results here -->
            <div class="container my-5 mb-3">
                <div class="row row-cols-1 row-cols-md-4 mt-2 g-4">
                    <?php
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        // Display property card
                    ?>
                        <div class="col mb-3">
                            <div class="card h-100 rounded-5 position-relative">
                                <!-- Card content -->
                                <div class="image-container" style="height: 200px; overflow: hidden;">
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
                                    <div class="description text-left" style="max-height: 2.6em; overflow: hidden;">
                                        <h6 class="card-text text-left" style="    text-align: left;">
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
                        <!-- card end -->
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--Search  Property end-->

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