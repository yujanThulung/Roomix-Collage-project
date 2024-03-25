<!DOCTYPE html>
<html lang="en">

<?php 
include '../includes/dbConnect.php';?> 

<?php 
$id = $_GET['id'];
$register_query =  "SELECT * FROM register  WHERE id='$id' "; //to get the data through the id
$result = mysqli_query($conn, $register_query); //to store the data which is came from id


if(mysqli_num_rows($result) > 0){
  while ($row = mysqli_fetch_array($result)) { 
    echo $row['fname'];
  }
}else{
  echo "No Data Found";
}
?>

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
  <link rel="stylesheet" href="form.css">
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
        <a href="soldProperties.php">
          <i class="fa-solid fa-house-circle-check"></i>
          <h3>Sold Properties</h3>
        </a><a href="userDetail.php">
          <i class="fa-solid fa-user-tie"></i>
          <h3>User Detail</h3>
        </a>
        <a href="editProfile.php" class="active">
          <i class="fa-solid fa-user-pen"></i></i>
          <h3>Edit Profile</h3>
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

    </aside>
    <!-- --------------
        Aside end 
      -------------------- -->

    <!-- --------------
        start main part
      --------------- -->

    <main>
      <h1 class="dashboard-heading">Edit Profile</h1>
        
  <!--Form-->
  <div id="form-box">
    <div id="form-container-r">
      <form action="" class="n-form" id="register">
        <a href="javascript:history.back()"><i class="fas fa-times" id="cross"></i></a>
        <h2>Register</h2>
        <div class="input-group">
          <div class="form-label">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" placeholder="First Name" required value="">
          </div>
          <div class="form-label">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lname" placeholder="Last Name" required>
          </div>
        </div>
        <div class="form-label">
          <label for="email">Email</label>
          <input type="email" id="r-email" name="email" placeholder="roomix13@gmail.com" required>
        </div>
        <div class="form-label">
          <label for="password">Password</label>
          <input type="password" id="r-password" name="password" placeholder="Password" required>
        </div>
        <div class="form-label">
          <label for="c-password">Confirm Password</label>
          <input type="password" id="c-password" name="c-password" placeholder="Confirm Password" required>
        </div>
        <!-- Move checklist here -->
        <section id="password-checklist" style="display: none;">
          <ul>
            <li id="uppercase-check">At least one uppercase letter</li>
            <li id="lowercase-check">At least one lowercase letter</li>
            <li id="number-check">At least one number</li>
            <li id="symbol-check">At least one symbol ($@$!%*?&)</li>
            <li id="length-check">Minimum length of 6 characters</li>
          </ul>
        </section>
        <div class="form-btn">
          <button onclick="validateForm()">update</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>


    </main>
    <!------------------
         end main
        ------------------->




  </div>



  <script src="script.js"defer></script>
    <?php include('../includes/footer.php');?>
  <script src="form.js"></script>
  <!-- <script>
  function hideRegisterForm() {
    var formBox = document.getElementById("form-box");
    formBox.style.display = "none";
  }
</script> -->
</body>

</html>