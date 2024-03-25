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
        <a href="#home" class="active"><img src="image/logo.png" alt="logo"></a>
        <div class="navigation">
            <ul>
                <li><a href="properties.php" class="">Buy</a></li>
                <li><a href="#">Sell</a></li>
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




    <section id="d-property">
        <div class="f-property">
            <div class="f-details">
                <div class="slider-container" id="slider-container">
                    <i class="fas fa-chevron-left nav-icon prev" onclick="prevSlide()"></i>
                    <div class="slider-wrapper" id="sliderWrapper">
                        <div class="slider-item"><img src="image/kitchen.jpg" alt="Slide 1"></div>
                        <div class="slider-item"><img src="image/room6.jpg" alt="Slide 2"></div>
                        <div class="slider-item"><img src="image/room7.jpg" alt="Slide 3"></div>
                    </div>
                    <i class="fas fa-chevron-right nav-icon next" onclick="nextSlide()"></i>
                </div>

                <div class="f-facility">
                        <h2 class="title">Flat For Rent in Kalanki ( Family with 4 members preferred )</h2>
                        <div class="f-card">
                            <div class="i-no">
                                <h6>ID</h6>
                                <span>#23543</span>
                            </div>
                            <div class="location">
                                <h6>Location</h6>
                                <span>Kalimati,Ktm</span>
                            </div>
                            <div class="category">
                                <h6>Category</h6>
                                <span>Flat</span>
                            </div>
                            <div class="kitchen">
                                <h6>Kitchen</h6>
                                <span>1</span>
                            </div>
                            <div class="bedroom">
                                <h6>Bed Room</h6>
                                <span>3</span>
                            </div>
                            <div class="setting-room">
                                <h6>Sitting Room</h6>
                                <span>1</span>
                            </div>
                            <div class="floor">
                                <h6>Parking</h6>
                                <span>1</span>
                            </div>
                            <div class="floor">
                                <h6>Floor</h6>
                                <span>First Floor</span>
                            </div>
                            <div class="price">
                                <h6>Rent Price</h6>
                                <span>Rs.5000/- per month</span>
                            </div>
                            <div class="p-negotiation">
                                <h6>Price Negotiable</h6>
                                <span>Yes</span>
                            </div>
                            <div class="">
                                <h6>Posted On</h6>
                                <span>2023/08/08</span>
                            </div>
                            <div class="setting-room">
                                <h6>Expire On</h6>
                                <span>2024/05/09</span>
                            </div>
                        </div>
                </div>
            </div>
            <div class="f-msg-l">
                <form action="">
                    <h6>Need Help? Enquire Now.</h6>
                    <label for="f-name">Full Name</label>
                    <input type="text" required>
                    <label for="number" >Mobile</label>
                    <input id="number" name="number" type="tel">
                    <label for="email">Email</label>
                    <input type="email">
                    <label for="message">Massage</label>
                    <textarea id="e-msg" name="msg" rows="8" cols="51"></textarea>
                    <button type="submit">Submit</button>
                </form>
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

<script src="script.js" defer></script>
    <?php include('../includes/footer.php');?>



<script>
    let currentIndex = 0;
    const sliderWrapper = document.getElementById('sliderWrapper');
    const slides = document.querySelectorAll('.slider-item');

    function showSlide(index) {
        slides.forEach((slide) => (slide.style.opacity = 0));
        slides[index].style.opacity = 1;

        const newTransformValue = -index * 100 + '%';
        sliderWrapper.style.transform = 'translateX(' + newTransformValue + ')';
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        showSlide(currentIndex);
    }
</script>

</html>