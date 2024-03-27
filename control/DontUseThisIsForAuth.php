//FOR LOGIN
if(isset($_POST['login'])){
    $username = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $query = "SELECT * FROM register WHERE email = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameters and execute query
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    // Get query result
    $result = mysqli_stmt_get_result($stmt);

    // Check if user exists
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password_from_db = $row['password'];
        $user_role = $row['role_as']; // Assuming 'role_as' is the column name for user role

        // Verify the provided password against the hashed password from the database
        if(password_verify($password, $hashed_password_from_db)) {
            // Passwords match, login successful
            $_SESSION["user"] = $username;
            if($user_role == 1) { // 1 denotes admin
                header("location: ../admin/index.php");
            } else {
                header("location: ../client/index.php");
            }
            exit; 
        } else {
            // Passwords don't match
            $_SESSION['status'] = "Incorrect email or password.";
            $_SESSION['status_code'] = "error";
            header("location: ../client/login.php");
            exit;
        }
    } else {
        // No user with the provided email exists
        $_SESSION['status'] = "User not found.";
        $_SESSION['status_code'] = "error";
        header("location: ../client/login.php");
        exit;
    }
}