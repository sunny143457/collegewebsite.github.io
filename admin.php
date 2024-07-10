<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
        }
        table tr td {
            padding: 10px;
        }
        table tr td:first-child {
            width: 30%;
            text-align: right;
            vertical-align: top;
            font-weight: bold;
        }
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php"> HOME </a>
    <h1 style="text-align: center;">Admin Panel</h1>
        <h2 style="text-align:center;">Upload Notification</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Title:</td>
                    <td><input type="text" id="title" name="title" required></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea id="description" name="description" rows="4" required></textarea></td>
                </tr>
                <tr>
                    <td>Upload File:</td>
                    <td><input type="file" id="pdfFile" name="pdfFile" accept=".pdf" required></td>
                </tr>
                <tr>
                    <td>Insert Date:</td>
                    <td><input type="date" id="insertDate" name="insertDate" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>





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
    // Escape user inputs for security
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $insertDate = $conn->real_escape_string($_POST['insertDate']);

    // File upload handling
    $targetDir = "pdf/";
    $targetFile = $targetDir . basename($_FILES["pdfFile"]["name"]);
    $uploadOk = 1;
    $pdfFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is a PDF by MIME type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $_FILES["pdfFile"]["tmp_name"]);
    finfo_close($finfo);
    if ($mimeType != "application/pdf") {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
            // Insert data into database
            $sql = "INSERT INTO notification (Title, description, pdf_file, insert_date) VALUES ('$title', '$description', '$targetFile', '$insertDate')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Close connection
$conn->close();
?>





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

// Fetch records from the database
$records = array();

// Fetch records from the database
$sql = "SELECT * FROM notification";
$result = $conn->query($sql);

// Check if records were fetched successfully
if ($result && $result->num_rows > 0) {
    // Fetch and store each row in $records array
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        /* Your CSS styles for admin panel */
    </style>
</head>
<body>
    <div class="container">
    <h2 style="text-align:center;">Uploaded Notification</h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Upload PDF</th>
                <th>Insert Date</th>
                <th>Action</th>
            </tr>
            <?php
            // Fetch records from database and display them in the table
            // Replace this with your code to fetch records from the database
            // Example: $records = fetch_records_from_database();
            foreach ($records as $record) {
                echo "<tr>";
                echo "<td>" . $record['Title'] . "</td>";
                echo "<td>" . $record['description'] . "</td>";
                echo "<td><a href='" . $record['pdf_file'] . "'>Download</a></td>";
                echo "<td>" . $record['insert_date'] . "</td>";
                echo "<td><form action='delete.php' method='post'>";
                echo "<input type='hidden' name='record_id' value='" . $record['ID'] . "'>";
                echo "<input type='submit' value='Delete'></form></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    
</body>
</html>