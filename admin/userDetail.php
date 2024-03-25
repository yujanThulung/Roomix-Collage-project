<!DOCTYPE html>
<html lang="en">

<?php 
require '../includes/dbConnect.php';?> 


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
        .custom-link {
            display: inline-block;
            padding: 5px 2px;
            /* Adjust padding as needed */
            border-radius: 5px;
            /* Adjust border radius as needed */
        }

        .custom-link i {
            color: white;
            transition: color 0.3s ease;
        }

        .custom-link:hover i {
            transform: scale(1.2);
            /* Scale the icon on hover */
            transition: transform 0.3s ease;
            /* Add smooth transition */
        }
    </style>
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
                </a>
                <a href="userDetail.php" class="active">
                    <i class="fa-solid fa-user-tie"></i>
                    <h3>User Detail</h3>
                </a>

                <!-- this is for individual  edit profile section-->
                <!-- <a href="editProfile.php">
                    <i class="fa-solid fa-user-pen"></i></i>
                    <h3>Edit Profile</h3>
                </a> -->


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
        <main>
            <h1 class="dashboard-heading">User Details</h1>



            
<?php
//error_reporting(0);
$register =  "SELECT * FROM register";
$register_run = mysqli_query($conn, $register);
if(mysqli_num_rows($register_run)>0){
    // echo "Table has records";\
    $serial_number = 1; // i wrote this for S.N.
    ?> 
    
            <div class="p-table">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <td>S.N</td>
                            <td>ID</td>
                            <td>First</td>
                            <td>Last</td>
                            <td>Email</td>
                            <!-- <td>Password</td> -->
                            <td>Phone Number</td>
                            <td>User Type</td>
                            <td class="text-center">EDIT</td>
                            <td class="text-center">DELETE</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($reg_row = mysqli_fetch_array($register_run)){
                        ?>
                        <tr>
                            <td><?php echo $serial_number++; ?></td>
                            <td><?php echo $reg_row['id']; ?></td>
                            <td><?php echo $reg_row['fname']; ?></td>
                            <td><?php echo $reg_row['lname']; ?></td>
                            <td><?php echo $reg_row['email']; ?></td>
                            <!-- <td>********</td> -->
                            <td><?php echo $reg_row['phone']; ?></td>
                            <td>Admin</td>
                            <td class="text-center">
                                <a href="editProfile.php?id=<?php echo $reg_row['id']; ?>" class="custom-link edit-icon" style="background-color: #ffcc00;"><i class="fas fa-edit"></i></a> <!--to sent the id -->
                            </td>
                            <td class="text-center">
                                <a href="#" class="custom-link delete-icon" style="background-color: red;"><i class="fas fa-trash-alt"></i></a>
                            </td>

                        </tr>
                        <?php } ?>

                        <!-- Additional rows can be added here -->
                    </tbody>
                </table>
                <a href="#">Show All</a>
            </div>
            <?php
}else{
    echo"No record found";
}
?>
        </main>
    </div>
    <script src="script.js"defer></script>
    <?php include('../includes/footer.php');?>
</body>

</html>