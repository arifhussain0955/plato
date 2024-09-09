<?php
// Database connection settings
$hostname = "localhost";
$username = "root";
$password = "";
$database = "cafe";

// Create a connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $people = $_POST["people"];

    // Sanitize and validate data (you can implement your own validation logic)
    $name = mysqli_real_escape_string($conn, $name);
    $date = mysqli_real_escape_string($conn, $date);
    $time = mysqli_real_escape_string($conn, $time);
    $people = mysqli_real_escape_string($conn, $people);

    // Insert data into the database
    $sql = "INSERT INTO reservation (name, date, time, people) VALUES ('$name', '$date', '$time', '$people')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
