<!-- <!DOCTYPE html>
<html lang="en">

<?php
require '../includes/dbConnect.php'; ?>
<?php require('../includes/loginSession.php'); 
$id = $_SESSION['id'];?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RooMix</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-az4eP1yp2CL6GvPUE0HHRj4kSg6p8FfbzjrIBVfoQYO0+nWr4EaXlZfC/0o+bB9r" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <style>
    .form-container {
      max-width: 50%;
      margin: 20px auto;
      padding: 40px;
      border: 0.5px solid #ccc;
      border-radius: 10px;
      background-color: whitesmoke;
      box-shadow: 2px 1px 1px #ccc;
      
    }

    .form-field {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
      font-size: 16px;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 18px;
    }

    .button-container {
      text-align: right;
    }

    .button {
      font-size: 0.9rem;
      padding: 13px 25px;
      background: var(--c-btn, #007BFF);
      border-radius: 5px;
      outline: none;
      border: none;
      font-weight: 600;
      cursor: pointer;
      color: white;
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
          <span class="material-symbols-sharp">close</span>
        </div>
      </div>
      <div class="sidebar">
        <a href="index.php">
          <span class="material-symbols-sharp">grid_view</span>
          <h3>Dashboard</h3>
        </a>
        <a href="myProerty.php">
          <i class="fa-solid fa-house-flag"></i>
          <h3>My Properties</h3>
        </a>
        <a href="rentRequest.php">
          <i class="fa-solid fa-arrow-alt-circle-up"></i>
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
        <a href="messages.php" class="active">
          <i class="fa-solid fa-envelope"></i>
          <h3>Messages</h3>
        </a>
        <a href="addProperties.php">
          <i class="fa-solid fa-plus"></i>
          <h3>Add Properties</h3>
        </a>
        <a href="../client/index.php" name="submit">
          <i class="fa-solid fa-right-from-bracket"></i>
          <h3>Log Out</h3>
        </a>
      </div>
    </aside>

    <main>
      <h1 class="dashboard-heading">Send a Message</h1>
      <div class="form-container">
        <form action="../control/message.php" method="post">
          <div class="form-field">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" required>
          </div>
          <div class="form-field">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="6" required></textarea>
          </div>
          <div class="button-container">
            <button type="submit" class="button">Send</button>
          </div>
          <input type="hidden" name="user_id" value="<?php $id;?>
        </form>
      </div>
    </main>
  </div>

  <script src="script.js" defer></script>
  <?php include('../includes/footer.php'); ?>
</body>
<?php mysqli_close($conn); ?>
</html> -->
