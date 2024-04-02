<!DOCTYPE html>
<html lang="en" style="height: 0;>

<?php
include '../includes/dbConnect.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RooMix</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../admin/propertyShow.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <style>
        html,
        body {
            height: 0;
        }
    </style>
</head>

<body class="p-0 m-0">

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




    <section style="padding-top: 18vh; padding-bottom:8vh;">
    <div class="container">
        <div class="content-wrapper">
            <div>
                <h1>ID <p class="id">#23543</p>
                </h1>
            </div>
            <div class="grid">
                <div>
                    <p class="label">Location</p>
                    <p>Kalimati, Ktm</p>
                </div>
                <div>
                    <p class="label">Category</p>
                    <p>Flat</p>
                </div>
                <div>
                    <p class="label">Kitchen</p>
                    <p>1</p>
                </div>
                <div>
                    <p class="label">Bed Room</p>
                    <p>3</p>
                </div>
                <div>
                    <p class="label">Sitting Room</p>
                    <p>1</p>
                </div>
                <div>
                    <p class="label">Parking</p>
                    <p>1</p>
                </div>
                <div>
                    <p class="label">Floor</p>
                    <p>First Floor</p>
                </div>
                <div>
                    <p class="label">Rent Price</p>
                    <p>Rs.5000/- per month</p>
                </div>
                <div>
                    <p class="label">Price Negotiable</p>
                    <p>Yes</p>
                </div>
                <div>
                    <p class="label">Posted On</p>
                    <p>2023/08/08</p>
                </div>
                <div>
                    <p class="label">Expire On</p>
                    <p>2024/05/09</p>
                </div>

                <div class="gallery-section">
                    <h2>Gallery</h2>
                    <div class="gallery">
                        <div class="gallery-item">
                            <img src="images/room1.jpg" alt="Image 1" onclick="showFullScreen('images/room1.jpg')">
                        </div>
                        <div class="gallery-item">
                            <img src="images/room2.jpg" alt="Image 2" onclick="showFullScreen('images/room2.jpg')">
                        </div>
                        <div class="gallery-item">
                            <img src="images/room1.jpg" alt="Image 3" onclick="showFullScreen('images/room1.jpg')">
                        </div>
                        <div class="gallery-item">
                            <img src="images/room2.jpg" alt="Image 4" onclick="showFullScreen('images/room2.jpg')">
                        </div>
                        <div class="gallery-item">
                            <img src="images/room1.jpg" alt="Image 4" onclick="showFullScreen('images/room2.jpg')">
                        </div>
                    </div>
                </div>
            </div>

            <div class="button-container">
                <button onclick="window.history.back()">Back</button>
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

<script src="script.js" defer></script>
<?php include('../includes/footer.php'); ?>


<script>
    function showFullScreen(imageSrc) {
        const modalContainer = document.createElement('div');
        modalContainer.classList.add('fullscreen-modal');

        const modalImage = document.createElement('img');
        modalImage.src = imageSrc;
        modalImage.alt = 'Full Screen Image';
        modalImage.classList.add('fullscreen-image');

        modalContainer.appendChild(modalImage);

        modalContainer.addEventListener('click', () => {
            modalContainer.remove();
        });

        document.body.appendChild(modalContainer);
    }
</script>
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