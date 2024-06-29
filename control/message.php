<?php
include '../includes/dbConnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO message (user_id, subject, message) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars(mysqli_error($conn)));
    }

    mysqli_stmt_bind_param($stmt, "iss", $user_id, $subject, $message);

    if (mysqli_stmt_execute($stmt)) {
        //echo "Message sent successfully.";
        $_SESSION['status'] = "Message sent successfully.!";
        $_SESSION['status_code'] = "success";
        header("Location: ../clientAfterLogin/index.php");
        exit();
    } else {
        $_SESSION['status'] = "Message sent failed!";
        $_SESSION['status_code'] = "error";
        header("Location: ../clientAfterLogin/contact.php");
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
