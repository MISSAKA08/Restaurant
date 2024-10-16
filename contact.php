<?php
include("connection/connect.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Basic validation
    if ($name == "" || $email == "" || $phone == "" || $message == "") {
        echo "<script>alert('All fields are required.');</script>";
    } else {
        // Save contact message in the database
        $mql = "INSERT INTO contact_messages(name, email, phone, message) VALUES('$name', '$email', '$phone', '$message')";
        if (mysqli_query($db, $mql)) {
            echo "<script>alert('Your message has been sent!');</script>";
            
            // Redirect after form submission to avoid resubmission on page refresh
            echo "<script>window.location = 'contact.php';</script>";
        } else {
            echo "<script>alert('Error: Unable to send your message. Please try again later.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Us</title>

    <!-- Original CSS for the main design -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- CSS for the classic contact box -->
    <link href="css/contact.css" rel="stylesheet">

    <style>
        .background-image {
            background-image: url('images/img/background_login.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="background-image">
        <header>
            <?php include('header.php'); ?>
        </header>

        <div class="page-wrapper">
            <section class="contact-page inner-page">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="classic-contact-box">
                                <!-- Contact Form -->
                                <form id="contactForm" method="post" onsubmit="return validateForm()">
                                    <h2 class="form-title">Contact Us</h2>
                                    <div class="form-group">
                                        <label for="name">Your Name</label>
                                        <input class="form-control" type="text" name="name" id="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email</label>
                                        <input class="form-control" type="email" name="email" id="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Your Phone</label>
                                        <input class="form-control" type="text" name="phone" id="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Your Message</label>
                                        <textarea class="form-control" name="message" id="message" rows="5" required></textarea>
                                    </div>

                                    <div class="submit-btn-wrapper">
                                        <input type="submit" value="Send Message" name="submit" class="btn btn-primary">
                                    </div>
                                </form>
                                <!-- End Contact Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer>
        <?php

            include 'footer.php';

            ?>

        </footer>
    </div>

    <!-- JavaScript Validation -->
    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
            var message = document.getElementById('message').value;

            // Check for empty fields
            if (name === "" || email === "" || phone === "" || message === "") {
                alert("All fields must be filled out!");
                return false;
            }

            // Check if email is valid
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            // Check if phone number is valid (10 digits)
            var phonePattern = /^\d{10}$/;
            if (!phonePattern.test(phone)) {
                alert("Please enter a valid 10-digit phone number.");
                return false;
            }

            return true;
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>
</html>
