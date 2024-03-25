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


    <!-- properties -->
    <section id="properties">
        <h2>Find your dream home!</h2>
    </section>



    <!--New property-->
    <section id="property">
        <h1>Display Latest & Featured Properties</h1>
        <p>Discover top-notch properties with our latest and featured listings. Your dream home or investment awaits</p>

        <div class="property-box">
            <div class="properties card">
                <img src="image/room3.jpg" alt="photo" loading="eager">

                <span class="status">Sell</span>
                <div class="details">
                    <div class="detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="caption">
                        <h6 class="type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="properties card">
                <img src="image/room5.jpg" alt="photo" loading="eager">

                <span class="status">Rent</span>
                <div class="details">
                    <div class="detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="caption">
                        <h6 class="type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="properties card">
                <img src="image/room8.jpg" alt="photo" loading="eager">

                <span class="status">Sell</span>
                <div class="details">
                    <div class="detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="caption">
                        <h6 class="type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="properties card">
                <img src="image/room1.jpg" alt="photo" loading="eager">

                <span class="status">Rent</span>
                <div class="details">
                    <div class="detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="caption">
                        <h6 class="type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="property-box">
            <div class="properties card">
                <img src="image/room3.jpg" alt="photo" loading="eager">

                <span class="status">Sell</span>
                <div class="details">
                    <div class="detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="caption">
                        <h6 class="type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="properties card">
                <img src="image/room5.jpg" alt="photo" loading="eager">

                <span class="status">Rent</span>
                <div class="details">
                    <div class="detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="caption">
                        <h6 class="type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="properties card">
                <img src="image/room8.jpg" alt="photo" loading="eager">

                <span class="status">Sell</span>
                <div class="details">
                    <div class="detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="caption">
                        <h6 class="type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="properties card">
                <img src="image/room1.jpg" alt="photo" loading="eager">

                <span class="status">Rent</span>
                <div class="details">
                    <div class="detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="caption">
                        <h6 class="type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>

    </section>


    <!--View  Property-->
    <section id="v-property">
        <h1>Property Listing</h1>
        <p>Discover the epitome of luxury living and investment potential with our latest and featured listings. Your
            dream home or lucrative investment awaits in these top-notch properties.</p>

        <div class="v-property-box">

            <div class="v-properties card">
                <img src="image/room2.jpg" alt="photo" loading="eager">

                <span class="status">Rent</span>
                <div class="v-details">
                    <div class="v-detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="v-caption">
                        <h6 class="v-type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="v-facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="v-properties card">
                <img src="image/kitchen.jpg" alt="photo" loading="eager">

                <span class="status">Sell</span>
                <div class="v-details">
                    <div class="v-detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="v-caption">
                        <h6 class="v-type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="v-facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="v-properties card">
                <img src="image/room4.jpg" alt="photo" loading="eager">

                <span class="status">Rent</span>
                <div class="v-details">
                    <div class="v-detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="v-caption">
                        <h6 class="v-type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="v-facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="v-properties card">
                <img src="image/room7.jpg" alt="photo" loading="eager">

                <span class="status">Sell</span>
                <div class="v-details">
                    <div class="v-detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="v-caption">
                        <h6 class="v-type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="v-facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="v-properties card">
                <img src="image/room8.jpg" alt="photo" loading="eager">

                <span class="status">Rent</span>
                <div class="v-details">
                    <div class="v-detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Sundhara, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="v-caption">
                        <h6 class="v-type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="v-facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="v-properties card">
                <img src="image/room1.jpg" alt="photo" loading="eager">

                <span class="status">Sell</span>
                <div class="v-details">
                    <div class="v-detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="v-caption">
                        <h6 class="v-type">ROOM AVAILABLE (KIRTIPUR, KATHMANDU)</h6>
                    </div>

                    <div class="v-facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="v-properties card">
                <img src="image/room6.jpg" alt="photo" loading="eager">

                <span class="status">Rent</span>
                <div class="v-details">
                    <div class="v-detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="v-caption">
                        <h6 class="v-type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="v-facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="v-properties card">
                <img src="image/room5.jpg" alt="photo" loading="eager">

                <span class="status">Rent</span>
                <div class="v-details">
                    <div class="v-detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="v-caption">
                        <h6 class="v-type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="v-facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="v-properties card">
                <img src="image/room2.jpg" alt="photo" loading="eager">

                <span class="status">Rent</span>
                <div class="v-details">
                    <div class="v-detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="v-caption">
                        <h6 class="v-type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="v-facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="v-properties card">
                <img src="image/kitchen.jpg" alt="photo" loading="eager">

                <span class="status">Sell</span>
                <div class="v-details">
                    <div class="v-detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="v-caption">
                        <h6 class="v-type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="v-facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="v-properties card">
                <img src="image/room4.jpg" alt="photo" loading="eager">

                <span class="status">Rent</span>
                <div class="v-details">
                    <div class="v-detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="v-caption">
                        <h6 class="v-type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="v-facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="v-properties card">
                <img src="image/room7.jpg" alt="photo" loading="eager">

                <span class="status">Sell</span>
                <div class="v-details">
                    <div class="v-detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="v-caption">
                        <h6 class="v-type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="v-facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="v-properties card">
                <img src="image/room8.jpg" alt="photo" loading="eager">

                <span class="status">Rent</span>
                <div class="v-details">
                    <div class="v-detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Sundhara, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="v-caption">
                        <h6 class="v-type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="v-facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="v-properties card">
                <img src="image/room1.jpg" alt="photo" loading="eager">

                <span class="status">Sell</span>
                <div class="v-details">
                    <div class="v-detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="v-caption">
                        <h6 class="v-type">ROOM AVAILABLE (KIRTIPUR, KATHMANDU)</h6>
                    </div>

                    <div class="v-facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="v-properties card">
                <img src="image/room6.jpg" alt="photo" loading="eager">

                <span class="status">Rent</span>
                <div class="v-details">
                    <div class="v-detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="v-caption">
                        <h6 class="v-type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="v-facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="v-properties card">
                <img src="image/room5.jpg" alt="photo" loading="eager">

                <span class="status">Rent</span>
                <div class="v-details">
                    <div class="v-detail">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Kapan, Kathmandu</span>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="price"> Rs. 8,000</span>
                        </div>
                    </div>
                    <div class="v-caption">
                        <h6 class="v-type">Flat For Rent in Kalanki ( Family with 4 members preferred )</h6>
                    </div>

                    <div class="v-facility">
                        <div class="i-bath">
                            <i class="fas fa-shower"></i>
                            <span>(1)</span>
                        </div>
                        <div class="i-bed">
                            <i class="fas fa-bed"></i>
                            <span>(2BHK)</span>
                        </div>
                        <div class="i-building">
                            <i class="fas fa-building"></i>
                            <span>(100 Sq. ft)</span>
                        </div>
                    </div>
                </div>
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

<script src="script.js "defer></script>
    <?php include('../includes/footer.php');?>

</html>