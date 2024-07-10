<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <style>
        /* Internal CSS for styling */
        h3 {
            background:blue;
            color: white; /* Change color of the heading */
        }
        .notification-title {
            color: black; /* Change color of the notification title */
        }
        .notification-date {
            color: red; /* Change color of the notification date */
        }
        .notification-link {
            color: purple;
            background:yellow;/* Change color of the PDF link */
        }
    </style>
</head>
<body>
    <h3>Latest Notifications</h3>
    <ul>
        <?php
        // Include the database connection script
        include_once "db_connection.php";

        // Fetch notifications from the database
        $sql = "SELECT * FROM notification ORDER BY insert_date DESC LIMIT 5"; // Adjust the query as needed
        $result = $conn->query($sql);

        // Display notifications
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>";
                echo "<p class='notification-title'>" . $row["Title"] . " : ";
                echo "<a class='notification-link' href='" . $row["pdf_file"] . "' target='_blank'>" . $row["description"] . "</a><br>";
                echo "<span class='notification-date'>Date:" . $row["insert_date"] . "</span></p>";
                echo "</li>";
            }
        } else {
            echo "<li>No notifications found</li>";
        }

        // Close connection
        $conn->close();
        ?>
    </ul>
</body>
</html>
