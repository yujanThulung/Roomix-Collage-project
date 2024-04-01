<?php
// Establish connection to MySQL server
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql_create_db = "CREATE DATABASE IF NOT EXISTS practice";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the database
$conn->select_db("practice");

// Create table if it doesn't exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS properties (
    property_id INT AUTO_INCREMENT PRIMARY KEY,
    property_details TEXT,
    status BOOLEAN
)";
if ($conn->query($sql_create_table) === TRUE) {
    echo "Table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Add some initial data to the table
$sql_insert_data = "INSERT INTO properties (property_details, status) VALUES 
('Spacious apartment in downtown', 0),
('Cozy studio with a view', 1)";
if ($conn->query($sql_insert_data) === TRUE) {
    echo "Initial data inserted successfully<br>";
} else {
    echo "Error inserting data: " . $conn->error;
}

// Check if the form is submitted
if(isset($_POST['sold'])) {
    // Get the property ID from the form
    $property_id = $_POST['property_id'];

    // Fetch the current status of the property
    $sql_fetch_status = "SELECT status FROM properties WHERE property_id = $property_id";
    $result = $conn->query($sql_fetch_status);
    $row = $result->fetch_assoc();
    $current_status = $row["status"];

    // Toggle the status of the property
    $new_status = $current_status ? 0 : 1;

    // Update the status of the property
    $sql = "UPDATE properties SET status = $new_status WHERE property_id = $property_id";

    if ($conn->query($sql) === TRUE) {
        echo "Property status toggled successfully<br>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!-- Button to toggle status -->
<form method="post">
    <label for="property_id">Property ID:</label>
    <input type="text" id="property_id" name="property_id" required>
    <input type="submit" name="sold" value="Toggle Status">
</form>
