<!DOCTYPE html>
<html lang="en">
<?php
require '../includes/dbConnect.php';
require('../includes/loginSession.php');
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RooMix</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-az4eP1yp2CL6GvPUE0HHRj4kSg6p8FfbzjrIBVfoQYO0+nWr4EaXlZfC/0o+bB9r" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="search&pagination.css">
</head>

<body style="margin-top:-1.5rem">
  <nav>
    <div class="right">
      <div class="top">
        <button id="menu_bar">
          <span class="material-symbols-sharp">menu</span>
        </button>

        <div class="theme-toggler">
          <span class="material-symbols-sharp active">light_mode</span>
          <span class="material-symbols-sharp">dark_mode</span>
        </div>
        <div class="profile">
          <div class="info">
            <p><b><?php echo $_SESSION["user"] ?></b></p>
            <p><?php echo $_SESSION["userType"] ?></p>
            <small class="text-muted"></small>
          </div>
          <div class="profile-photo">
            <img src="./images/yujan.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">
    <aside>

      <div class="top">
        <a href="index.php">
          <div class="logo">
            <h2>Roo<span class="danger">MiX</span> </h2>
          </div>
        </a>
        <div class="close" id="close_btn">
          <span class="material-symbols-sharp">
            close
          </span>
        </div>
      </div>
      <!-- end top -->
      <div class="sidebar">

        <a href="index.php">
          <span class="material-symbols-sharp">grid_view </span>
          <h3>Dashbord</h3>
        </a>
        <a href="myProerty.php">
          <i class="fa-solid fa-house-flag"></i>
          <h3>My Properties</h3>
        </a>
        <a href="rentRequest.php">
          <i class="fa-solid fa-arrow-alt-circle-up"></i>
          <h3>Rent Request</h3>
        </a>
        <a href="soldProperties.php" class="active">
          <i class="fa-solid fa-house-circle-check"></i>
          <h3>Sold Properties</h3>
        </a>

        </a><a href="userDetail.php">
          <i class="fa-solid fa-user-tie"></i>
          <h3>My Detail</h3>
        </a>
        <a href="addProperties.php">
          <i class="fa-solid fa-plus"></i>
          <h3>Add Properties</h3>
        </a>


        <!-- Back to home page section here  -->
        <a href="../client/index.php" name="submit">
          <i class="fa-solid fa-right-from-bracket"></i>
          <h3>Log Out</h3>
        </a>



      </div>

    </aside>

    <main>
      <h1 class="dashboard-heading">Sold Properties</h1>

      <!-- <div class="search-sort">
        <form action="" method="POST">
          <input type="text" id="searchInput" name="search" placeholder="Search by location...">
        </form>
        <form action="" method="POST">
          <select id="sortSelect" name="sort_alphabet">
            <option value="">Sort by...</option>
            <option value="room">Room</option>
            <option value="flat">Flat</option>
          </select>
          <button type="submit" id="applyButton">Sort</button>
        </form>
      </div> -->

      <?php
      // Get the user ID from session
      $user_id = $_SESSION['landlord_id'];

      $property_id_query = "SELECT * FROM rent_requests WHERE landlord_id='$user_id' AND sold_status = 0";
      $property_id_run = mysqli_query($conn, $property_id_query);

      if ($property_id_run) {
      ?>
        <div class="p-table" style="margin-top:-0.5rem">
          <table>
            <thead>
              <tr>
                <th>S.N.</th>
                <th>ID</th>
                <th>Image</th>
                <th>Type</th>
                <th>Location</th>
                <th>Price</th>
                <th>Requested Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $serial_number = 1; // Initialize serial number
              while ($property_data = mysqli_fetch_assoc($property_id_run)) {
                $property_id = $property_data['property_id'];
                $requested_date = $property_data['request_date'];
                $request_id = $property_data['id'];


                // Query to fetch property details based on property ID
                $query = "SELECT * FROM property WHERE id = $property_id";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
              ?>
                  <tr>
                    <td><?php echo $serial_number++; ?></td>
                    <td><?php echo $row['id'] ?></td>
                    <td>
                      <?php
                      // Check if image URLs exist in the database
                      if (!empty($row['media'])) {
                        // Split the image URLs string into an array in this case it split after (,)
                        $image_urls = explode(',', $row['media']);

                        // Get the first image URL (trim to remove extra spaces)
                        $first_image = trim($image_urls[0]);

                        // Display the first image which is inserted by user
                      ?>
                        <img src="<?php echo $first_image; ?>" alt="Property Image" style="object-position: center; object-fit: contain;">
                      <?php
                      } else {
                        // If no image URL is found, display a placeholder image or text
                      ?>
                        <span>No Image Available</span>
                      <?php
                      }
                      ?>
                    </td>
                    <td><?php echo $row['property_type']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td>Rs.<?php echo $row['total_price']; ?></td>
                    <td><?php echo $requested_date; ?></td>
                    <td>
                      <div class="action-icons">
                        <a href="propertyShow.php?id=<?php echo $row['id'] ?>" class="custom-link" style="background-color: rgb(37, 37, 252);">
                          <i class="fas fa-eye text-white"></i>
                        </a>
                        <form action="../control/rentRequest.php" method="POST">
                          <input type="hidden" name="delete_id" value="<?php echo  $property_data['id']; ?>" />
                          <button type="submit" name="property_cancel_btn" class="custom-link delete-icon"><i class="fas fa-times" style="height:25px; width:18px; padding-top:4px;"></i></button>
                        </form>
                      </div>
                    </td>
                  </tr>
                <?php
                } else {
                ?>
                  <tr>
                    <td colspan="8">No properties found.</td>
                  </tr>
              <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      <?php
      } else {
        // Handle query execution failure
        echo "Error: " . mysqli_error($conn);
      }
      ?>
      </tbody>
      </table>
  </div>
  </main>
  </div>

  <script src="script.js" defer></script>
  <?php include('../includes/footer.php'); ?>
</body>

<?php mysqli_close($conn); ?>

</html>