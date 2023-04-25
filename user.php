<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/user.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <script src="https://kit.fontawesome.com/f0315fce63.js" crossorigin="anonymous"></script>
    <title>Nav</title>
  
</head>

<body>
    <header>
        <!-- <div class="main">
            <nav>
                <h1>Logo</h1>
                <img class="logo" src="images/logo.png">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">About Us</a></li>
                    <!-- <li><a href="#">Contact Us</a></li> -->
                    <!-- <li><a href="#">News</a></li>
                </ul>
                <div class="dropdown">
                <img src="images/profile.png" alt="Profile Icon" class="dropbtn">
                <div class="dropdown-content">
                <a href="#">Profile</a>
                <a href="#">Settings</a>
                <a href="login.php">Logout</a>
                </div>
                </div>
    -->
  
<!-- </div> -->

            <!-- </nav>
        </div> --> -->
        <?php include('nav.html');?>
    </header>

    <div class="service_contain">
        <div class="title">
            <span class="Service-title">Our Se</span>rvice
        </div>
        <h5 class="our_dec">All you need to know about our services</h5>
    </div>

    <div class="services">
        <div class="box">
            <i class="fa-solid fa-car"></i>
            <a href="vehicleRegistration.php"><h6 class="box-heading"> Vehicles<br>Regestration</h6></a>
        </div>
        <div class="box">
            <i class="fa-solid fa-house"></i>
            <a href="vehicleLost.php"><h6 class="box-heading"> Lost Vehicles<br>Application</h6></a>
        </div>
        <div class="box">
            <i class="fa-solid fa-file"></i>
            <h6 class="box-heading"> Lost Document<br>Application</h6>
        </div>
        <div class="box">
            <i class="fa-solid fa-file"></i>
            <h6 class="box-heading"> Lost Document<br>Application</h6>
        </div>
        <div class="box">
            <i class="fa-solid fa-file"></i>
            <h6 class="box-heading"> Lost Document<br>Application</h6>
        </div>
        <div class="box">
            <i class="fa-solid fa-file"></i>
            <h6 class="box-heading"> Lost Document<br>Application</h6>
        </div>
        <div class="box">
            <i class="fa-solid fa-file"></i>
            <h6 class="box-heading"> Lost Document<br>Application</h6>
        </div>
        <div class="box">
            <i class="fa-solid fa-file"></i>
            <h6 class="box-heading"> Lost Document<br>Application</h6>
        </div>
    </div>
    <div class="aboutUs">
        <div class="service_contain">
            <div class="title">
                <span class="Service-title">About</span> Us
            </div>
            <!-- <h5 class="our_dec">All you need to know about our services</h5> -->
        </div>
        <div class="about_content">
            <div class="text">
                <p>
                    Welcome to Stops, your go-to destination for modern and efficient traffic management solutions. We
                    are a team of passionate individuals dedicated to improving the safety and convenience of
                    transportation for everyone.
                    <br>
                    <br>

                    Our mission is to create innovative technologies and tools that empower transportation authorities,
                    city planners, and individuals to manage traffic effectively. We believe that by leveraging
                    cutting-edge technology and data-driven insights, we can make a meaningful impact on the way people
                    move around our cities.
                </p>
                <div class="more-button">
                    <a href="#" class="more-btn">See more</a>
                </div>


            </div>
            <div class="about_img">
                <div class="up-image">
                    <!-- <img class="about_image" src="images/stopp.jfif" alt=""> -->
                </div>
                <!-- <div class="down-image">
                     <img class="about_image" src="image/stopp.jfif" alt="">
                </div> -->

            </div>
        </div>
    </div>
    <footer class="main_footer">
        <div class="footer_contain">
            <div class="rows">
                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="">About Us</a></li>
                        <li><a href="">Our Services</a></li>
                        <li><a href="">Pricacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get Help</h4>
                    <ul>
                        <li><a href="">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact Us</h4>
                    <div class="footer-contact">
                        <div class="name">
                            <span>Smart Traffic Optimization and Planning System</span>
                        </div>
                        <div class="location">
                            <span class="fa-solid fa-location-dot"></span>
                            <span class="text-fo">Lalitpur, Nepal</span>
                        </div>
                        <div class="Phone">
                            <span class="fa-solid fa-phone"></span>
                            <span class="text-fo">+977 9813132515</span>
                        </div>
                        <div class="email">
                            <span class="fa-solid fa-envelope"></span>
                            <span class="text-fo">stops@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Follow us</h4>
                    <div class="scoial-link">
                        <a href=""><i class="fa-brands fa-facebook-f"></i></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                        <a href=""><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <div class="copy-right">
        <p> STOPS &copy; 2023. All rights reserved.</p>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>