<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Your College Name</title>
    <link rel="stylesheet" href="css/styles3.css">
</head>
<body>
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
    <header>
        <h1>Contact Us</h1>
    </header>
    <main>
        <section class="contact-info">
            <h2>Contact Information</h2>
            <p><strong>Address:</strong><br>
                college link road, Bhaderwah<br>
                Bhaderwah, Jammu and kishmir,182222<br>
               India</p>
            <p><strong>Phone:</strong><br>
                General Enquiries: [9419910916]<br>
                Admissions Office: [914640090]<br>
                
            <p><strong>Email:</strong><br>
                General Enquiries: <a href="mailto:info@yourcollege.edu">info@yourcollege.edu</a><br>
                Admissions Office: <a href="mailto:admissions@yourcollege.edu">admissions@yourcollege.edu</a><br>
                Financial Aid Office: <a href="mailto:financialaid@yourcollege.edu">financialaid@yourcollege.edu</a></p>
        </section>
        <section class="contact-form">
            <h2>Send Us a Message</h2>
            <form action="submit_form.php" method="POST">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="message">Your Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
                
                <button type="submit">Submit</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Your College Name. All rights reserved.</p>
    </footer>
</body>
</html>
