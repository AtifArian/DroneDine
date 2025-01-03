<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Finder</title>
</head>
<body>
    <h1>Search Restaurants by Location</h1>
    <form method="post" action="search.php">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
        <input type="submit" value="Search">
    </form>
</body>
</html>

<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the location from the form
$location = $_POST['location'];

// Fetch the restaurants based on location
$sql = "SELECT name, address, cuisine FROM restaurants WHERE location='$location'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Name</th><th>Address</th><th>Cuisine</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["address"]. "</td><td>" . $row["cuisine"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
