<!DOCTYPE html>
<html lang="en">

<?php
require '../includes/dbConnect.php'; ?>
<?php
require '../includes/loginSession.php'; ?>


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
    <!-- <style>
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

        .delete-icon {
            background-color: red;
            cursor: pointer;
            padding: 5px 26px;
        }

        .search-sort {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-bottom: 20px;
            /* Adjust margin as needed */
        }

        #searchInput {
            padding: 8px;
            margin-right: 10px;
            /* Adjust margin as needed */
            border: 1px solid #7380ec;
            border-radius: 5px;
        }

        #sortSelect {
            padding: 8px;
            border: 1px solid #7380ec;
            border-radius: 5px;
        }

        #sortSelect:hover {
            background-color: #ccc;
        }

        #applyButton {
            padding: 8px 16px;
            background-color: #7380ec;
            /* Button background color */
            color: white;
            /* Button text color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #applyButton:hover {
            background-color: #0056b3;
            /* Button background color on hover */
        }


        .pagination {
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        .pagination a {
            color: #7380ec;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #7380ec;
            border-radius: 5px;
            margin: 0 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination a:hover {
            background-color: #7380ec;
            color: white;
        }

        .pagination .active {
            background-color: #7380ec;
            color: white;
            pointer-events: none;
        }
    </style> -->
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
                <!-- logout section here  -->
                <a href="../control/logout.php" name="submit">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <h3>logout</h3>
                </a>
            </div>
        </aside>


         <main>
        <h1 class="dashboard-heading">User Details</h1>

        <div class="search-sort">
            <form action="" method="POST">
                <input type="text" id="searchInput" name="search" placeholder="Search...">
                <select id="sortSelect" name="sort_alphabet">
                    <option value="">Sort by...</option>
                    <option value="asc">A-Z</option>
                    <option value="desc">Z-A</option>
                </select>
                <button type="submit" id="applyButton">Sort</button>
            </form>
        </div>

        <?php
        // Define the number of records per page
        $records_per_page = 5;

        // Determine the current page number
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1; // Default to page 1
        }

        // Calculate the offset for the query based on the current page number
        $offset = ($page - 1) * $records_per_page;

        // Default sorting order
        $sort_order = 'ASC';

        // Check if sorting option is selected
        if (isset($_POST['sort_alphabet'])) {
            $sort_option = $_POST['sort_alphabet'];
            if ($sort_option == 'asc') {
                $sort_order = 'ASC';
            } elseif ($sort_option == 'desc') {
                $sort_order = 'DESC';
            }
        }

        // Build the SQL query
        $register_query = "SELECT * FROM register";

        // Check if search query is provided
        if (isset($_POST['search']) && !empty(trim($_POST['search']))) {
            $search_query = $_POST['search'];
            $register_query .= " WHERE email LIKE '%$search_query%'";
        }

        // Apply sorting and pagination
        $register_query .= " ORDER BY fname $sort_order LIMIT $offset, $records_per_page";

        $register_run = mysqli_query($conn, $register_query);
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
                        <td>Phone Number</td>
                        <td>User Type</td>
                        <td class="text-center">EDIT</td>
                        <td class="text-center">DELETE</td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $serial_number = ($page - 1) * $records_per_page + 1; // Calculate serial number for the current page
                    while ($reg_row = mysqli_fetch_array($register_run)) {
                    ?>
                        <tr>
                            <td><?php echo $serial_number++; ?></td>
                            <td><?php echo $reg_row['id']; ?></td>
                            <td><?php echo $reg_row['fname']; ?></td>
                            <td><?php echo $reg_row['lname']; ?></td>
                            <td><?php echo $reg_row['email']; ?></td>
                            <td><?php echo $reg_row['phone']; ?></td>
                            <td>Admin</td>
                            <td class="text-center">
                                <a href="editProfile.php?id=<?php echo $reg_row['id']; ?>" class="custom-link edit-icon" style="background-color: #ffcc00;"><i class="fas fa-edit"></i></a>
                            </td>
                            <td class="text-center">
                                <form action="../control/user.php" method="POST">
                                    <input type="hidden" name="delete_id" value="<?php echo $reg_row['id'] ?>" />
                                    <button type="submit" name="register_delete_btn" class="custom-link delete-icon"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

<!-- Pagination links -->
<div class="pagination">
    <?php
    // Calculate total number of records
    $total_records_query = "SELECT COUNT(*) AS total FROM register";
    $total_records_result = mysqli_query($conn, $total_records_query);
    $total_records = mysqli_fetch_assoc($total_records_result)['total'];

    // Calculate total number of pages
    $total_pages = ceil($total_records / $records_per_page);

    // Display "First" button
    echo "<a href='userDetail.php?page=1'>&laquo;&laquo; First</a>";

    // Display "Previous" button
    if ($page > 1) {
        echo "<a href='userDetail.php?page=" . ($page - 1) . "'>&laquo; Previous</a>";
    }

    // Display pagination links
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a " . ($i == $page ? "class='active'" : "") . " href='userDetail.php?page=$i'>$i</a>";
    }

    // Display "Next" button
    if ($page < $total_pages) {
        echo "<a href='userDetail.php?page=" . ($page + 1) . "'>Next &raquo;</a>";
    }

    // Display "Last" button
    echo "<a href='userDetail.php?page=$total_pages'>Last &raquo;&raquo;</a>";
    ?>
</div>




    </main>

    <?php include('../includes/footer.php'); ?>
</body>
<?php mysqli_close($conn);?>
</html>