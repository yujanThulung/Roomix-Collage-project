<!DOCTYPE html>
<html lang="en">

<?php
require '../includes/dbConnect.php'; ?>
<?php require('../includes/loginSession.php'); ?>

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
            <p><?php echo $_SESSION[ "userType"]?></p>
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
        <a href="rentRequest.php" class="active">
        <i class="fa-solid fa-arrow-alt-circle-up"></i>
          <h3>Rent Request</h3>
        </a>
        <a href="rentRequest.php">
        <i class="fas fa-list-alt"></i>
          <h3>My Request</h3>
        </a>
        <a href="soldProperties.php">
          <i class="fa-solid fa-house-circle-check"></i>
          <h3>Sold Properties</h3>
        </a>
        
        <a href="userDetail.php">
          <i class="fa-solid fa-user-tie"></i>
          <h3>My Detail</h3>
        </a>

        </a>
        <a href="addProperties.php">
          <i class="fa-solid fa-plus"></i>
          <h3>Add Properties</h3>
        </a>
        <!-- logout section here  -->
        <a href="../control/logout.php" name="submit">
          <i class="fa-solid fa-right-from-bracket"></i>
          <h3>logout</h3>
        </a>



      </div>

    </aside class="asidebar">
    <!-- --------------
        aside class="asidebar" end 
      -------------------- -->

    <!-- --------------
        start main part
      --------------- -->

    <main>
      <h1 class="dashboard-heading">My Properties</h1>

      <div class="search-sort">
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
      </div>

      <?php
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

      // here  initializing sorting order
      $sort_order = 'DESC';

      //here  initializing search query
      $search_query = '';

      // Check if search query is provided
      if (isset($_POST['search']) && !empty(trim($_POST['search']))) {
        $search_query = "AND location LIKE '%" . mysqli_real_escape_string($conn, $_POST['search']) . "%'";
      }

      // Construct filtered property query here
      $filtered_property_query = "SELECT * FROM property WHERE sold_status = 1";

      // Check if sorting option is selected
      if (isset($_POST['sort_alphabet'])) {
        $sort_option = $_POST['sort_alphabet'];

        // Here we reset $filtered_property_query
        $filtered_property_query = "SELECT * FROM property WHERE sold_status = 1";

        // Add sorting condition
        if ($sort_option == 'room') {
          $filtered_property_query .= " AND property_type = 'room'";
        } elseif ($sort_option == 'flat') {
          $filtered_property_query .= " AND property_type = 'flat'";
        }
      }

      // Constructing  final SQL query here
      $property_query = $filtered_property_query . " $search_query ORDER BY added_date $sort_order LIMIT $offset, $records_per_page";

      // Execute query
      $query_run = mysqli_query($conn, $property_query);
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
              <th>Added Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $serial_number = ($page - 1) * $records_per_page + 1;
            while ($row = mysqli_fetch_assoc($query_run)) {
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
                    <img src="<?php echo $first_image; ?>" alt="Property Image" style="object-position: center;
                      object-fit: contain;">
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
                <td><?php echo $row['added_date']; ?></td>
                <td>
                  <div class="action-icons">
                    <a href="editProperty.php?id=<?php echo $row['id'] ?>" class="custom-link" style="background-color: #ffcc00;"><i class="fas fa-edit text-white"></i></a>
                    <a href="propertyShow.php?id=<?php echo $row['id'] ?>" class="custom-link" style="background-color: rgb(37, 37, 252);"><i class="fas fa-eye text-white"></i></a>

                    <!-- <form action="../control/soldProperty.php" method="POST">
                      <input type="hidden" name="sold_id" value="<?php echo $row['id'] ?>" />
                      <button type="submit" name="property_sold_btn" class="custom-link delete-icon" style="background-color: #5cb85c;"><i class="fas fa-house-circle-check text-white"></i></button>
                    </form> -->

                    <form action="../control/deleteProperty.php" method="POST">
                      <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>" />
                      <button type="submit" name="property_delete_btn" class="custom-link delete-icon"><i class="fas fa-trash-alt"></i></button>
                    </form>
                  </div>
                </td>
              </tr>

            <?php }
            ?>

          </tbody>
        </table>
      </div>
      <!-----Table end----->


      <!-- Pagination -->
<div class="pagination">
    <?php
    // Calculate total number of records
    $total_records_query = "SELECT COUNT(*) AS total FROM  property WHERE  sold_status= 1";
    $total_records_result = mysqli_query($conn, $total_records_query);
    $total_records = mysqli_fetch_assoc($total_records_result)['total'];

    // Calculate total number of pages
    $total_pages = ceil($total_records / $records_per_page);

    // Display "Previous" button
    if ($page > 1) {
        echo "<a href='myProerty.php?page=" . ($page - 1) . "'>&laquo; Previous</a>";
    }

    // Display pagination links
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a " . ($i == $page ? "class='active'" : "") . " href='myProerty.php?page=$i'>$i</a>";
    }

    // Display "Next" button
    if ($page < $total_pages) {
        echo "<a href='myProerty.php?page=" . ($page + 1) . "'>Next &raquo;</a>";
    }

    // Display "Last" button
    echo "<a href='myProerty.php?page=$total_pages'>Last &raquo;&raquo;</a>";
    ?>
</div>

</div>

  </div>

  </main>
  <!------------------
         end main
        ------------------->




  </div>



  <script src="script.js" defer></script>
  <?php include('../includes/footer.php'); ?>
</body>
<?php mysqli_close($conn); ?>

</html>