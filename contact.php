<?php
include("connection/connect.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Basic validation
    if ($name == "" || $email == "" || $message == "") {
        echo "<script>alert('All fields are required.');</script>";
    } else {
        // Save contact message in the database
        $sql = "INSERT INTO contact_messages(name, email, message) VALUES('$name', '$email', '$message')";
        mysqli_query($db, $sql);
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

    <!-- CSS links -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
                            <div class="widget">
                                <div class="widget-body">
                                    <!-- Contact Form -->
                                    <form id="contactForm" method="post">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="name">Your Name</label>
                                                <input class="form-control" type="text" name="name" id="name" required>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="email">Your Email</label>
                                                <input class="form-control" type="email" name="email" id="email" required>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="message">Your Message</label>
                                                <textarea class="form-control" name="message" id="message" rows="5" required></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <input type="submit" value="Send Message" name="submit" class="btn theme-btn">
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End Contact Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="text-muted">© 2024 Your Website. All rights reserved.</p>
            </div>
        </footer>

        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>

</html>
