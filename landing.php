<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/landing.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/drop.css">
    <script src="https://kit.fontawesome.com/f0315fce63.js" crossorigin="anonymous"></script>
    <title>landing</title>
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
                <img src="images/traffic.jpg" class="d-block w-100" alt="..." style="max-height: 600px;">
                <div class="caption">
                    <h5>ट्राफिक नियम मिचेकोमा गर्व होइन लाज मान्ने गरौं ।</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images\mapase.jpg" class="d-block w-100" alt="..." style="max-height: 600px;">
                <div class="caption">
                    <h5>मादक पदार्थ सेवन गरी सवारी साधन नचलाऔं ।</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/traffic1.jpg" class="d-block w-100" alt="..." style="max-height: 600px;">
                <div class="caption">
                    <h5>विस्तारै गए अवश्य पुगिन्छ, छिटो गए भन्न सकिन्न ।</h5>
                </div>
            </div>
        </div>
        <nav>
            <img class="logo" src="images/logo.png">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#service_contain">Service</a></li>
                <li><a href="#aboutUs">About Us</a></li>
                <li><a href="#main_footer">Contact Us</a></li>
                <li><a href="notice.php">Notices</a></li>
            </ul>

            <?php
            session_start();



            if (isset($_SESSION['name'])) {
                echo '<div class="account">';
                echo '<span><img class="img" src="images/profile.png" alt="Profile Icon"></span>';
                echo '<span class ="name">' . $_SESSION['name'] . '</span>';
                echo '<i class="fa-solid fa-caret-down"></i>
                <div class="dropdown-content">
                 <a href="#"><i class="fa-solid fa-user"></i> Profile</a>
                 <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                 </div>';
                echo '</div>';

            } else {
                echo '<a href="login.php" class="btn">Login</a>';
            }
            // session_destroy();
            
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
            <span class="Service-title">Our</span> Services
        </div>
        <h5 class="our_dec">All you need to know about our services</h5>
    </div>

    <div class="services">

        <a href="<?php echo isset($_SESSION['username']) ? 'regestration.php' : 'login.php'; ?>" class="box">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <h6 class="box-heading"> Vehicles<br>Regestration</h6>
        </a>
        <a href="<?php echo isset($_SESSION['username']) ? 'lostvehicle.php' : 'login.php'; ?>" class="box">
            <i class="nav-icon fas fa-car"></i>
            <h6 class="box-heading"> Lost Vehicles<br>Application</h6>
        </a>
        <a href="<?php echo isset($_SESSION['username']) ? 'LostDocument.php' : 'login.php'; ?>" class="box">
            <i class="nav-icon fas fa-file-alt"></i>
            <h6 class="box-heading"> Lost Document<br>Application</h6>
        </a>
        <a href="<?php echo isset($_SESSION['username']) ? 'pay.php' : 'login.php'; ?>" class="box">
            <i class="nav-icon fas fa-traffic-light"></i>
            <h6 class="box-heading"> View Offense<br> Records</h6>
        </a>
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
    <?php include('footer.php'); ?>


</body>
<!-- <script>
const account = document.querySelector('.account');
const dropdown = document.querySelector('.dropdown');

account.addEventListener('click', function() {
  dropdown.classList.toggle('active');
});
</script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>