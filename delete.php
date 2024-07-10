<?php
// Database configuration
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "gdc"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the record ID from the form submission
    $record_id = $_POST['record_id'];

    // Perform the delete operation
    $sql = "DELETE FROM notification WHERE ID = $record_id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // Redirect or display an error message if the form is not submitted
    echo "Form submission error";
}

// Close connection
$conn->close();
?>
