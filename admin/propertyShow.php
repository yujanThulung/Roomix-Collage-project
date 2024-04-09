<!DOCTYPE html>
<html lang="en">

<?php
require '../includes/dbConnect.php'; ?>
<?php require('../includes/loginSession.php'); ?>

<?php
$id = $_GET['id'];
$showPro_query = "SELECT * FROM property WHERE id = '$id'";
$result = mysqli_query($conn, $showPro_query);

if (!$result) {
    echo '<script>alert("data not fetch");</script>';
}


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="propertyShow.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .label {
            margin: 0.2rem 0;
        }
        span {
            color: #072448;
        }

        span i {
            color: #072448;
        }
    </style>
    <title>propertyShow</title>
</head>

<body>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
    ?>

            <div class="container">
                <div class="content-wrapper">
                    <div>
                        <h2>ID <p class="id">#<?php echo $row['id'] ?></p>
                        </h2>
                    </div>
                    <div class="grid">
                        <div>
                            <h3 class="label">Property Name: &nbsp; &nbsp;</h3><span class="name"><?php echo $row['property_title'] ?></span>
                        </div>
                        <div>
                            <p class="label">Location</p>
                            <p><?php echo $row['location'] ?></p>
                        </div>
                        <div>
                            <p class="label">Category</p>
                            <p><?php echo $row['property_type'] ?></p>
                        </div>
                        <div>
                            <p class="label">Kitchen</p>
                            <p><?php echo $row['kitchen'] ?></p>
                        </div>
                        <div>
                            <p class="label">Bed Room</p>
                            <p><?php echo $row['bedroom'] ?></p>
                        </div>
                        <div>
                            <p class="label">Living Room</p>
                            <p><?php echo $row['living_room'] ?></p>
                        </div>
                        <div>
                            <p class="label">Parking</p>
                            <p><?php echo $row['parking'] ?></p>
                        </div>
                        <div>
                            <p class="label">Area</p>
                            <p><?php echo $row['area'] ?> m<sup>2</sup></p>
                        </div>
                        <div>
                            <p class="label">Floor</p>
                            <p><?php echo $row['floor'] ?> Floor</p>
                        </div>
                        <div>
                            <p class="label">Rent Price</p>
                            <p>Rs.<?php echo $row['total_price'] ?>/- per month</p>
                        </div>
                        <div>
                            <p class="label">Posted On</p>
                            <p><?php echo $row['added_date'] ?></p>
                        </div>
                        <div>
                            <p class="label">Expire On</p>
                            <p><?php echo $row['expiry_date'] ?></p>
                        </div>
                    </div>
                    <div>
                        <p class="label" style="margin-top:1.5rem">Description</p>
                        <p style="margin-top:.2rem"><?php echo $row['description'] ?></p>
                    </div>
                    
                    <div class="gallery-section">
                        <h2>Gallery</h2>
                        <div class="gallery">
                            <?php
                            // Check if image URLs exist in the database
                            if (!empty($row['media'])) {
                                // Split the image URLs string into an array (split after comma)
                                $image_urls = explode(',', $row['media']);

                                // Iterate over each image URL and display it
                                foreach ($image_urls as $image_url) {
                            ?>
                                    <div class="gallery-item">
                                        <img src="<?php echo $image_url; ?>" alt="Property Image" onclick="showFullScreen('<?php echo $image_url; ?>')">
                                    </div>
                                <?php
                                }
                            } else {
                                // If no image URL is found, display a placeholder image or text
                                ?>
                                <span>No Image Available</span>
                            <?php
                            }
                            ?>
                        </div>
                    </div>


                </div>

                <div class="button-container">
                    <a href="myProerty.php"><button>Back</button></a>
                </div>
            </div>
            </div>
    <?php
        }
    } else {
        echo "No Data Found";
    };
    ?>
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
<?php mysqli_close($conn);?>
</html>