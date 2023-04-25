<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/landing.css">
    <link rel="stylesheet" href="css/drop.css">
    <script src="https://kit.fontawesome.com/f0315fce63.js" crossorigin="anonymous"></script>
    <title>Nav</title>
</head>

<body>
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/traffic.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/traffic.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/traffic.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <nav>
            <img class="logo" src="images/logo.png">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#service_contain">Service</a></li>
                <li><a href="#aboutUs">About Us</a></li>
                <li><a href="#main_footer">Contact Us</a></li>
                <li><a href="#">Notices</a></li>
            </ul>
            <?php
                                session_start();
                                if (isset($_SESSION['username'])) {
                                    echo '<div class="dropdown">';
                                   echo' <img src="images/profile.png" alt="Profile Icon" class="dropbtn">
                                    <div class="dropdown-content">
                                    <a href="#">Profile</a>
                                    <a href="#">Settings</a>
                                    <a href="logout.php">Logout</a>
                                    </div>';
                                    echo '<p class ="username">' . $_SESSION['name'] . '</p>';
                                  echo '</div>';
                                    
                                
                                } else {
                                    echo '<a href="login.php" class="btn">Login</a>';
                                }
                                
                                ?>
            
        </nav>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div id="service_contain" class="service_contain">
        <div class="title">
            <span class="Service-title">Our Service</span>
        </div>
        <h5 class="our_dec">All you need to know about our services</h5>
    </div>

    <div class="services">
        <div class="box">
            <i class="fa-solid fa-car"></i>
            <h6 class="box-heading"> Vehicles<br>Regestration</h6>
        </div>
        <div class="box">
            <i class="fa-solid fa-house"></i>
            <h6 class="box-heading"> Lost Vehicles<br>Application</h6>
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
    <div id="aboutUs" class="aboutUs">
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
                    <img class="about_image" src="images/stopp.jfif" alt="">
                </div>
                <!-- <div class="down-image">
                     <img class="about_image" src="image/stopp.jfif" alt="">
                </div> -->

            </div>
        </div>
    </div>
    <footer id="main_footer" class="main_footer">
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