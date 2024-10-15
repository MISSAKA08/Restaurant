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
        mysqli_query($db, $mql);
        echo "<script>alert('Your message has been sent!');</script>";
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
</head>

<body>
    <div style="background-image: url('images/img/background_login.jpg');">
        <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <img class="img-rounded" src="images/food-mania-logo.png" alt="">
                    </a>
                    <div class="collapse navbar-toggleable-md float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link active" href="restaurants.php">Restaurants</a></li>
                            <?php
                            if (empty($_SESSION["user_id"])) {
                                echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a></li>';
                                echo '<li class="nav-item"><a href="registration.php" class="nav-link active">Signup</a></li>';
                            } else {
                                echo '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Your Orders</a></li>';
                                echo '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="page-wrapper">
            <section class="contact-page inner-page">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="classic-contact-box">
                                <!-- Contact Form -->
                                <form id="contactForm" method="post">
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

        <footer class="footer">
            <div class="container">
                <p class="footer-text">© 2024 Classic Brand. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
