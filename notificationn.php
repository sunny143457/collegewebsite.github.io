<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from smartclass.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Aug 2021 15:48:25 GMT -->
<head>
<title> GOVT DEGREE COLLEGE BHADERWAH</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		.notification-container {
  position: static;
  display:flex;
  top: 6px;
  
   z-index: 1000;
}

.notificationn {
  background-color: #c6c9bb;
  color: black;
  border: 3px solid black;
  border-radius: 5px;
  padding: 10px 20px;
  margin-bottom: 15px;
  box-shadow: 12px 6px 6px rgba(0, 0, 0, 0.1);
 width: 100%;
  justify-content: space-evenly;







}
	</style>
	

</head>


<?php
 include 'top.php'; 
 ?>
<?php
 include 'banner.php'; 
 ?>
 <?php
 include 'navbar.php'; 
 ?>
 <?php
 include 'notificationslideshow.php'; 
?>

<div class="notification-container">
    <div class="notificationn">
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
	</div>
  </div>
  <?php
include 'footer.php'; 
?>

</body>
</html>