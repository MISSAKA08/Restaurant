<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .footer {
            background-image: url('images/footer-background.jpg'); /* Change to your image path */
            background-size: cover; /* Cover the entire footer area */
            background-position: center; /* Center the image */
            color: #f8f9fa; /* Text color */
            padding: 20px 0; /* Padding for spacing */
        }
        .footer h5 {
            color: #ffffff; /* Heading color */
            font-size: 20px; /* Heading font size */
            margin-bottom: 10px; /* Spacing below heading */
        }
        .footer .color-gray {
            color: #d3d3d3; /* Lighter text color for other text */
        }
        .footer .payment-options ul {
            padding: 0;
            list-style: none; /* Remove bullet points */
            display: flex; /* Flexbox for payment options */
            justify-content: center; /* Center items */
            flex-wrap: wrap; /* Allow wrapping on small screens */
            margin: 10px 0; /* Spacing above and below */
        }
        .footer .payment-options li {
            margin: 0 10px; /* Spacing between payment icons */
        }
        .footer .payment-options img {
            width: 50px; /* Fixed width for payment icons */
            height: auto; /* Auto height for aspect ratio */
        }
        .footer p {
            font-size: 14px; /* Font size for paragraphs */
            margin: 0 0 10px; /* Spacing below paragraphs */
        }
        .footer .address, .footer .additional-info {
            margin-top: 20px; /* Margin above address and info sections */
        }
        .footer .bottom-footer {
            border-top: 1px solid #adb5bd; /* Top border for separation */
            padding-top: 20px; /* Padding above */
            margin-top: 30px; /* Margin above */
        }
        @media (max-width: 576px) {
            .footer h5 {
                font-size: 18px; /* Reduce font size on small screens */
            }
            .footer .payment-options img {
                width: 40px; /* Smaller icons on small screens */
            }
        }
    </style>
</head>

<body>
    <footer class="footer">
        <div class="container">
            <div class="bottom-footer text-center"> <!-- Center content -->
                <div class="row">
                    <div class="col-xs-12 col-sm-3 payment-options">
                        <h5>Payment Options</h5>
                        <ul>
                            <li><a href="#"><img src="images/paypal.png" alt="Paypal"></a></li>
                            <li><a href="#"><img src="images/mastercard.png" alt="Mastercard"></a></li>
                            <li><a href="#"><img src="images/maestro.png" alt="Maestro"></a></li>
                            <li><a href="#"><img src="images/stripe.png" alt="Stripe"></a></li>
                            <li><a href="#"><img src="images/bitcoin.png" alt="Bitcoin"></a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4 address">
                        <h5>Address</h5>
                        <p>213, Raheja Chambers, Free Press Journal Road, Nariman Point, Mumbai, Maharashtra 400021, India</p>
                        <p><strong>Phone:</strong> +91 8093424562</p>
                    </div>
                    <div class="col-xs-12 col-sm-5 additional-info">
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
