<!DOCTYPE html>
<html lang="en">

<?php 
include '../includes/dbConnect.php';?> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="propertyShow.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>propertyShow</title>
</head>

<body>
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
</body>

</html>
