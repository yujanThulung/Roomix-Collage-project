<?php
// Connect to MySQL server
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS property_management";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Switch to the created database
$conn->select_db("property_management");

// Create property table
$sql = "CREATE TABLE IF NOT EXISTS property (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    status INT NOT NULL,
    buyer_id INT
)";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert sample data only if the table is empty
$sql = "SELECT COUNT(*) as count FROM property";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($row['count'] == 0) {
    $sql = "INSERT INTO property (name, price, status) VALUES ('House 1', 200000, 0)";
    $conn->query($sql);
    $sql = "INSERT INTO property (name, price, status) VALUES ('Apartment 2', 150000, 0)";
    $conn->query($sql);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Buy and Sell</title>
</head>
<body>
    <h1>Property Buy and Sell</h1>

    <h2>Buy Property</h2>
    <form method="POST" action="">
        Property ID: <input type="text" name="buy_property_id"><br><br>
        Buyer ID: <input type="text" name="buyer_id"><br><br>
        <input type="submit" name="buy_submit" value="Buy Property">
    </form>

    <h2>Sell Property</h2>
    <form method="POST" action="">
        Property ID: <input type="text" name="sell_property_id"><br><br>
        <input type="submit" name="sell_submit" value="Sell Property">
    </form>

    <?php
    // Connect to your database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "property_management";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle buy request
    if (isset($_POST['buy_submit'])) {
        $buyer_id = $_POST['buyer_id'];
        $property_id = $_POST['buy_property_id'];
        handleBuyRequest($buyer_id, $property_id);
    }

    // Handle sell request
    if (isset($_POST['sell_submit'])) {
        $property_id = $_POST['sell_property_id'];
        sellProperty($property_id);
    }

    // Function to handle buy request
    function handleBuyRequest($buyer_id, $property_id) {
        global $conn;

        // Check if the property is available (status 0 represents available)
        $result = $conn->query("SELECT * FROM property WHERE id = $property_id AND status = 0");

        if ($result->num_rows > 0) {
            // Property is available, mark it as sold (status 1) and assign buyer
            $conn->query("UPDATE property SET status = 1, buyer_id = $buyer_id WHERE id = $property_id");
            echo "Property purchased successfully!";
        } else {
            echo "Sorry, the property is no longer available.";
        }
    }

    // Function to handle selling a property
    function sellProperty($property_id) {
        global $conn;

        // Mark the property as sold (status 1)
        $conn->query("UPDATE property SET status = 1 WHERE id = $property_id");
        echo "Property marked as sold!";
    }
    ?>
</body>
</html>
