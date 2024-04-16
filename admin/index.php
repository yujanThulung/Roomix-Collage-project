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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-az4eP1yp2CL6GvPUE0HHRj4kSg6p8FfbzjrIBVfoQYO0+nWr4EaXlZfC/0o+bB9r" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link rel="stylesheet" href="style.css">
</head>

<body style="margin-top:-1.5rem">

<?php 
$query = "SELECT * FROM user";
$query_run = mysqli_query($conn, $query);

if($query_run) {
  $row = mysqli_fetch_array($query_run);
}
?>
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
            <p><?php echo $_SESSION["userType"]?></p>
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

        <a href="index.php" class="active">
          <span class="material-symbols-sharp">grid_view </span>
          <h3>Dashbord</h3>
        </a>
        <a href="myProerty.php">
          <i class="fa-solid fa-house-flag"></i>
          <h3>Listed Properties</h3>
        </a>
        <!-- <a href="rentRequest.php">
        <i class="fa-solid fa-arrow-alt-circle-up"></i>
          <h3>Rent Request</h3>
        </a> -->
        <a href="soldProperties.php">
          <i class="fa-solid fa-house-circle-check"></i>
          <h3>Sold Properties</h3>
        </a>
        <a href="userDetail.php">
          <i class="fa-solid fa-user-tie"></i>
          <h3>User Detail</h3>
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

    </aside>
    <!-- --------------
        Aside end 
      -------------------- -->

    <!-- --------------
        start main part
      --------------- -->

    <main>
      <h1 class="dashboard-heading">Dashbord</h1>

      <!-- <div class="date">
             <input type="date" >
           </div> -->
      <!-- If some want to  add a date they can do it from here. for future -->

      <div class="insights">

        <!-- start user -->
        <div class="user">
          <span class="material-symbols-sharp">person</span>
          <div class="middle">

            <div class="left">
              <h3>User</h3>
              <?php
              $count_user = "SELECT * FROM user";
              $result_user = mysqli_query($conn, $count_user);
              $total_user = mysqli_num_rows($result_user);
              if ($total_user) {
                echo '<h1>' . $total_user . '</h1>';
              } else {
                echo '<h1>User Not Found!</h1>';
              }
              ?>
            </div>
          </div>
        </div>


        <!--------Property start------->
        <div class="property">
          <span class="material-symbols-outlined">location_city</span>
          <div class="middle">

            <div class="left">
              <h3>Listed property</h3>
              <?php
              $count_property = "SELECT * FROM property";
              $count_property = mysqli_query($conn, $count_property);
              $total_property = mysqli_num_rows($count_property); ?>
              <h1><?php echo $total_property ?></h1>
            </div>
          </div>
        </div>
        <!--------Property end------->

        <!-------Flat start----->
        <div class="flat">
          <span class="material-symbols-outlined">apartment</span>
          <div class="middle">
            <div class="left">
              <?php
              $count_property = "SELECT * FROM property WHERE property_type = 'Flat'";
              $count_property = mysqli_query($conn, $count_property);
              $total_property = mysqli_num_rows($count_property); ?>
              <h3>Flat</h3>
              <h1><?php echo $total_property ?></h1>
            </div>
          </div>
        </div>
        <!--Flat end-->

        <!-------Room start----->
        <div class="room">
          <span class="material-symbols-outlined">bedroom_parent</span>
          <div class="middle">
            <div class="left">
              <?php
              $count_property = "SELECT * FROM property WHERE property_type = 'Room'";
              $count_property = mysqli_query($conn, $count_property);
              $total_property = mysqli_num_rows($count_property); ?>
              <h3>Room</h3>
              <h1><?php echo $total_property ?></h1>
            </div>
          </div>
        </div>
        <!--Room end-->

        <!--------Requested Property start------->
        <!-- <div class="request">
        <span class="material-symbols-outlined">wifi_home</span>
          <div class="middle">

            <div class="left">
              <h3>Requested Property</h3>
              <?php
              $count_property = "SELECT * FROM rent_requests WHERE sold_status = 2";
              $count_property = mysqli_query($conn, $count_property);
              $total_property = mysqli_num_rows($count_property); ?>
              <h1><?php echo $total_property ?></h1>
            </div>
          </div>
        </div> -->
        <!--------Requested Property end------->

        <!-------Sold start----->
        <div class="sold">
          <span class="material-symbols-outlined">in_home_mode</span>
          <div class="middle">
            <div class="left">
              <?php
              $count_property = "SELECT * FROM property WHERE sold_status = 0";
              $count_property = mysqli_query($conn, $count_property);
              $total_property = mysqli_num_rows($count_property); ?>
              <h3>Sold Out</h3>
              <h1><?php echo $total_property ?></h1>
            </div>
          </div>
        </div>
        <!-------Sold end----->
      </div>
      <!-------Featured start----->


      <!-- end insights -->
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