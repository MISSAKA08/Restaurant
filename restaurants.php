<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Restaurants</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        /* Internal CSS for restaurant entries */
        .restaurant-box {
            border-radius: 12px;
            margin-bottom: 30px;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
            background-color: #fff;
            overflow: hidden; /* Hide overflow for nice border-radius effect */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            position: relative;
            text-align: center; /* Centering text */
        }

        .restaurant-box:hover {
            transform: translateY(-5px); /* Lift effect on hover */
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2); /* Darker shadow on hover */
        }

        .entry-logo img {
            border-radius: 12px 12px 0 0; /* Rounded corners for images */
            max-width: 100%; /* Ensure image fits well */
            height: 200px; /* Set fixed height for uniformity */
            object-fit: cover; /* Cover the area without distortion */
        }

        .entry-dscr {
            padding: 15px; /* Padding around the description */
        }

        .entry-dscr h5 {
            margin: 10px 0; /* Space between title and address */
            font-size: 1.4em; /* Increase title size */
            font-weight: bold; /* Bold title for emphasis */
        }

        .entry-dscr span {
            color: #777; /* Lighter color for address */
            font-style: italic; /* Italicize address for distinction */
        }

        .view-menu-btn {
            position: absolute; /* Position button absolutely for better control */
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #28a745; /* Green background for buttons */
            color: white; /* White text */
            padding: 10px 20px; /* Padding for button */
            border: none;
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s; /* Smooth transition for background color */
        }

        .view-menu-btn:hover {
            background-color: #218838; /* Darker green on hover */
        }

        /* Style for hover overlay */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 12px;
            opacity: 0; /* Start invisible */
            transition: opacity 0.3s; /* Fade in effect */
        }

        .restaurant-box:hover .overlay {
            opacity: 1; /* Fade in on hover */
        }
    </style>
</head>

<body>
    <header>
        <?php include('header.php'); ?>
    </header>

    <div class="page-wrapper">
        <div class="top-links">
            <div class="container">
                <ul class="row links">
                    <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="#">Choose Restaurant</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Pick Your favorite food</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay</a></li>
                </ul>
            </div>
        </div>
        <div class="inner-page-hero bg-image" data-image-src="images/img/res.jpeg">
            <div class="container"></div>
        </div>
        <div class="result-show">
            <div class="row">
                <?php
                $ress = mysqli_query($db, "select * from restaurant");
                while ($rows = mysqli_fetch_array($ress)) {
                    echo '
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3"> <!-- Responsive column for restaurant box -->
                        <div class="restaurant-box">
                            <div class="entry-logo">
                                <img src="admin/Res_img/' . $rows['image'] . '" alt="Food logo">
                                <div class="overlay"></div> <!-- Overlay for hover effect -->
                            </div>
                            <div class="entry-dscr">
                                <h5><a href="dishes.php?res_id=' . $rows['rs_id'] . '">' . $rows['title'] . '</a></h5>
                                <span>' . $rows['address'] . '</span>
                            </div>
                            <a href="dishes.php?res_id=' . $rows['rs_id'] . '" class="view-menu-btn">View Menu</a> <!-- Button styling -->
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="bottom-footer">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 payment-options color-gray">
                        <h5>Payment Options</h5>
                        <ul>
                            <li><a href="#"><img src="images/paypal.png" alt="Paypal"></a></li>
                            <li><a href="#"><img src="images/mastercard.png" alt="Mastercard"></a></li>
                            <li><a href="#"><img src="images/maestro.png" alt="Maestro"></a></li>
                            <li><a href="#"><img src="images/stripe.png" alt="Stripe"></a></li>
                            <li><a href="#"><img src="images/bitcoin.png" alt="Bitcoin"></a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4 address color-gray">
                        <h5>Address</h5>
                        <p>213, Raheja Chambers, Free Press Journal Road, Nariman Point, Mumbai, Maharashtra 400021, India</p>
                        <h5>Phone: +91 8093424562</h5>
                    </div>
                    <div class="col-xs-12 col-sm-5 additional-info color-gray">
                        <h5>Additional Information</h5>
                        <p>Join thousands of other restaurants who benefit from having partnered with us.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

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
