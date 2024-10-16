<html>

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


<header id="header" class="header-scroll top-header headrom">
    <nav class="navbar navbar-dark">
        <div class="container">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
            <a class="navbar-brand" href="index.php">
                <img width="80%" height="auto"  class="img-rounded" src="images/YummyPicklogo2.png" alt="">
            </a>
            <div class="collapse navbar-toggleable-md float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="restaurants.php">Restaurants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.php">About Us</a>
                    </li>
                    <?php
                        if(empty($_SESSION["user_id"])) {
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
<body>

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

