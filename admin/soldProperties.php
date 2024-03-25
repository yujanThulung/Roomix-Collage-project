<!DOCTYPE html>
<html lang="en">

<?php 
include '../includes/dbConnect.php';?> 

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RooMix</title>
  
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha384-az4eP1yp2CL6GvPUE0HHRj4kSg6p8FfbzjrIBVfoQYO0+nWr4EaXlZfC/0o+bB9r" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link rel="stylesheet" href="style.css">
</head>

<body>

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
            <p><b>Yujan</b></p>
            <p>Admin</p>
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
        <a href="soldProperties.php" class="active">
          <i class="fa-solid fa-house-circle-check"></i>
          <h3>Sold Properties</h3>
        </a>
        <a href="userDetail.php">
          <i class="fa-solid fa-user-tie"></i>
          <h3>User Detail</h3>
        </a>
        
        </a>
        <a href="addProperties.php">
          <i class="fa-solid fa-plus"></i>
          <h3>Add Properties</h3>
        </a>
        <a href="logout.html">
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
      <h1 class="dashboard-heading">Dashbord</h1>



      <!-----Table start----->
      <div class="p-table">
        <h2>Properties</h2>
        <table>
          <thead>
            <tr>
              <th>S.N.</th>
              <th>ID</th>
              <th>Image</th>
              <th>Type</th>
              <th>Price</th>
              <th>Added Date</th>
              <th>Featured</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>#1234</td>
              <td>
                <img src="images/room1.jpg" alt="Product Image">
              </td>
              <td>Type A</td>
              <td>$50.00</td>
              <td>2024-03-16</td>
              <td>Yes</td>
              <td>
                <div class="action-icons">
                  <a href="#" class="custom-link" style="background-color: red; "><i
                      class="fas fa-trash-alt  text-white"></i></a>
                  
                </div>
              </td>
            </tr>
            <!-- Additional rows can be added here -->
          </tbody>
        </table>
        <a href="#">Show All</a>
      </div>
      <!-----Table end----->
    </main>
    <!------------------
         end main
        ------------------->




  </div>



  <script src="script.js"defer></script>
    <?php include('../includes/footer.php');?>
</body>

</html>