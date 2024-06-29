<!DOCTYPE html>
<html lang="en">

<?php 
require '../includes/dbConnect.php';?> 
<?php require('../includes/loginSession.php');?>

<?php 
$id = $_GET['id'];
$register_query =  "SELECT * FROM user  WHERE id='$id' "; //to get the data through the id
$result = mysqli_query($conn, $register_query); //to store the data which is came from id
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
  <style>
    #r-phone{
      width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
    }
  </style>
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
            <p><b><?php echo $_SESSION["user"]?></b></p>
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

         <!-- Back to home page section here  -->
         <a href="../control/logout.php" name="submit">
          <i class="fa-solid fa-right-from-bracket"></i>
          <h3>Log Out</h3>
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

<?php  
if(mysqli_num_rows($result) > 0){
  while ($row = mysqli_fetch_array($result)) { 

    ?>

  <div id="form-box">
    <div id="form-container-r">
      <form action="../includes/LandloardUser.php" method = "POST" class="n-form" id="register">

      <!--to send the id of edit-->
      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
        <a href="javascript:history.back()"><i class="fas fa-times" id="cross"></i></a>
        <h2>Register</h2>
        <div class="input-group">
          <div class="form-label">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" required value="<?php echo $row['fname'];?>">
          </div>
          <div class="form-label">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lname"value="<?php echo $row['lname'];?>" required>
          </div>
        </div>
        <div class="form-label">
          <label for="email">Email</label>
          <input type="email" id="r-email" name="email" value="<?php echo $row['email'];?>" required>
        </div>
        <div class="form-label">
          <label for="phone">Phone</label>
          <input type="tel" id="r-phone" name="phone" value="<?php echo $row['phone'];?>" required>
        </div>
        <div class="form-label">
          <label for="password">Password</label>
          <input type="password" id="r-password" name="password" value="<?php echo $row['password'];?>" required>
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
          <button name="register_update_btn" onclick="validateForm()">Update Data</button>
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

        <?php
  }
}else{
  echo "No Data Found";
  exit;
}
?>


  </div>



  <script src="../client/script.js"defer></script>
    <?php include('../includes/footer.php');?>
  <script src="form.js"></script>
  <!-- <script>
  function hideRegisterForm() {
    var formBox = document.getElementById("form-box");
    formBox.style.display = "none";
  }
</script> -->
</body>
<?php mysqli_close($conn);?>
</html>