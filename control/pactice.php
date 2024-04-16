<?php
require '../includes/dbConnect.php'; // Include the database connection file
?>

<?php
// Define the SQL query to fetch property details using user_id
$sql = "SELECT *FROM  properties WHERE user_id='".$_SESSION['user']['user_id']."'";

// Execute the query
$result = mysqli_query($conn, $sql); // assuming $conn is the connection object from dbConnect.php

// Check if there are results
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Property ID: " . $row['id'] . "<br>";
        echo "Property Title: " . $row['property_title'] . "<br>";
        echo "Description: " . $row['description'] . "<br>";
        // Output other details from the property table if needed
    }
} else {
    echo "No properties found for the specified user.";
}

// Close the connection (assuming you opened it in dbConnect.php)
mysqli_close($conn);
?>
