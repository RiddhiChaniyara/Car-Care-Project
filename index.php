<?php
session_start(); // Start the session

// Include database configuration
include 'config.php'; 

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['car care']);
$username = '';

if (!$isLoggedIn) {
    // If the user is not logged in, show the login popup
    echo "<script>
        alert('Login is required to access this page!');
        window.location.href = 'login.php';
    </script>";
    exit(); // Stop further execution
}

// If the user is logged in, get the username from the database
if ($isLoggedIn) {
    $user_id = $_SESSION['car care']; // Use the ID stored in the session
    // Query to select the user's name
    $select = mysqli_query($conn, "SELECT name FROM `login` WHERE id = '$user_id'") or die('Query failed');
    if ($row = mysqli_fetch_assoc($select)) {
        $username = $row['name']; // Store the user's name
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Car Care</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/login.css" rel="login">
    

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
 
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i>+91 6359073328</a>
                    <span class="text-body">|</span>
                    <a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i>2203031247006@paruluniversity.ac.in.</a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    
                    
                    <a class="text-body px-3" href="https://twitter.com/Online_Car_Care">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-body px-3" href="https://in.linkedin.com/in/riddhi-chaniyara-07812527b">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-body px-3" href="https://www.instagram.com/online_car_care_/">
                        <i class="fab fa-instagram"></i>
                    </a>
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0">
    <div class="position-relative px-lg-5" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="index.php" class="navbar-brand">
                <h1 class="text-uppercase text-primary mb-1">Car Care</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="car_buy.php" class="dropdown-item">Car Buy</a>
                            <a href="car_sell.php" class="dropdown-item">Car Sell</a>
                            <a href="car_rent.php" class="dropdown-item">Car Rent</a>
                            <a href="car_wash.php" class="dropdown-item">Car Wash</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Reviews</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="rating.php" class="dropdown-item">Rating</a>
                        </div>
                    </div>

                    <?php if ($isLoggedIn): ?>
                        <!-- Show Username and Dropdown if logged in -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?= htmlspecialchars($username) ?></a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="update_profile.php" class="dropdown-item">Update Profile</a>
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Show Login if not logged in -->
                        <a href="login.php" class="nav-item nav-link">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
 
 <!-- Carousel Start -->
 <div class="container-fluid p-0" style="margin-bottom: 90px;">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <!-- Adjusted font size for the welcome text -->
                        <h1 class="text-white mb-md-4" style="text-align: justify; font-size: 3.5rem;">WELCOME TO CAR CARE ..!</h1>
                    </div>
                </div>
            </div>
            
            <div class="carousel-item">
                <img class="w-100" src="img/mustang.webp" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <!-- Adjusted font size for the journey text -->
                        <h1 class="text-white mb-md-4" style="font-size: 3.5rem;">Your Journey, Your Car, Your Way</h1>
                    </div>
                </div>
            </div>
            
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>
</div>
<!-- Carousel End -->


  <!-- About Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <h1 class="display-1 text-primary text-center">01</h1>
        <h1 class="display-4 text-uppercase text-center mb-5">Welcome To <span class="text-primary">Car Care</span></h1>
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <img class="w-75 mb-4" src="img/about.png" alt="">
                <p style="text-align: justify;">
                   <p>
                    Our online car care platform provides a convenient place where you can handle everything for your vehicle—buying, selling, renting, and booking services.It functions like a smart, eco-friendly car wash that saves time and resources.These websites make tasks easier, help you save time, keep organized records, and build trust with users. For a car wash business, having a website is important because it enhances credibility and simplifies essential tasks, such as finding locations using GPS, ensuring a smooth and reliable experience.
                </p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4 mb-2">
                <div class="d-flex align-items-center bg-light p-4 mb-4" style="height: 150px;">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4" style="width: 100px; height: 100px;">
                        <i class="fa fa-2x fa-headset text-secondary"></i>
                    </div>
                    <h4 class="text-uppercase m-0">24/7 Customer support</h4>
                </div>
            </div>
            <div class="col-lg-4 mb-2">
                <div class="d-flex align-items-center bg-secondary p-4 mb-4" style="height: 150px;">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4" style="width: 100px; height: 100px;">
                        <i class="fa fa-2x fa-car text-secondary"></i>
                    </div>
                    <h4 class="text-light text-uppercase m-0">Car Reservation Anytime</h4>
                </div>
            </div>
            <div class="col-lg-4 mb-2">
                <div class="d-flex align-items-center bg-light p-4 mb-4" style="height: 150px;">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4" style="width: 100px; height: 100px;">
                        <i class="fa fa-2x fa-map-marker-alt text-secondary"></i>
                    </div>
                    <h4 class="text-uppercase m-0">Lots Of Pickup Locations</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

  <!-- Services Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <h1 class="display-1 text-primary text-center">02</h1>
        <h1 class="display-4 text-uppercase text-center mb-5">Our Services</h1>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-3 col-md-6 mb-2">
                <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                            <i class="fa fa-2x fa-shopping-cart text-secondary"></i>
                        </div>
                        <h1 class="display-2 text-white mt-n2 m-0">01</h1>
                    </div>
                    <h4 class="text-uppercase mb-3">Car Buy</h4>
                    <p class="m-0">"Find your perfect car, buy with ease."</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-2">
                <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                            <i class="fa fa-2x fa-hand-holding-usd text-secondary"></i>
                        </div>
                        <h1 class="display-2 text-white mt-n2 m-0">02</h1>
                    </div>
                    <h4 class="text-uppercase mb-3">Car Sell</h4>
                    <p class="m-0">"Sell your car with confidence."</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-2">
                <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                            <i class="fa fa-2x fa-car text-secondary"></i>
                        </div>
                        <h1 class="display-2 text-white mt-n2 m-0">03</h4>
                    </div>
                    <h4 class="text-uppercase mb-3">Car Rent</h4>
                    <p class="m-0">"Drive away with ease—rent a car today."</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-2">
                <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                            <i class="fa fa-2x fa-shower text-secondary"></i>
                        </div>
                        <h1 class="display-2 text-white mt-n2 m-0">04</h1>
                    </div>
                    <h4 class="text-uppercase mb-3">Car Wash</h4>
                    <p class="m-0">"Keep your car sparkling clean."</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->



    <!-- Banner Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="bg-banner py-5 px-4 text-center">
                <div class="py-5">
                    <h1 class="display-1 text-uppercase text-primary mb-4">50% OFF</h1>
                    <h1 class="text-uppercase text-light mb-4">Join our website to get free services on the</h1>
                    <p class="mb-4">Only for Sunday from 1st Jan to 30th Jan 2045</p>
                    <a class="btn btn-primary mt-2 py-3 px-5" href="login.html">Register Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->


  <!-- Rent A Car Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <h1 class="display-1 text-primary text-center">03</h1>
        <h1 class="display-4 text-uppercase text-center mb-5">Find Your Car</h1>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-2">
                <div class="rent-item mb-4">
                    <img class="img-fluid mb-4" src="img/car-sell_1.png" alt="BMW M4 Competition">
                    <h4 class="text-uppercase mb-4">BMW M4 Competition</h4>
                    <div class="d-flex justify-content-center mb-4">
                        <div class="px-2">
                            <i class="fa fa-car text-primary mr-1"></i>
                            <span>2024</span>
                        </div>
                        <div class="px-2 border-left border-right">
                            <i class="fa fa-cogs text-primary mr-1"></i>
                            <span>AUTO</span>
                        </div>
                        <div class="px-2">
                            <i class="fa fa-road text-primary mr-1"></i>
                            <span>25KM</span>
                        </div>
                    </div>
                    <a class="btn btn-primary px-3" href="">Rs : 70.00/Per KM</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-2">
                <div class="rent-item active mb-4">
                    <img class="img-fluid mb-4" src="img/car-rent-2.png" alt="BMW XM5">
                    <h4 class="text-uppercase mb-4">BMW XM5</h4>
                    <div class="d-flex justify-content-center mb-4">
                        <div class="px-2">
                            <i class="fa fa-car text-primary mr-1"></i>
                            <span>2019</span>
                        </div>
                        <div class="px-2 border-left border-right">
                            <i class="fa fa-cogs text-primary mr-1"></i>
                            <span>AUTO</span>
                        </div>
                        <div class="px-2">
                            <i class="fa fa-road text-primary mr-1"></i>
                            <span>11KM</span>
                        </div>
                    </div>
                    <a class="btn btn-primary px-3" href="">Rs : 25.00/Per KM</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-2">
                <div class="rent-item mb-4">
                    <img class="img-fluid mb-4" src="img/car-rent-3.png" alt="Tata Safari">
                    <h4 class="text-uppercase mb-4">Tata Safari</h4>
                    <div class="d-flex justify-content-center mb-4">
                        <div class="px-2">
                            <i class="fa fa-car text-primary mr-1"></i>
                            <span>2024</span>
                        </div>
                        <div class="px-2 border-left border-right">
                            <i class="fa fa-cogs text-primary mr-1"></i>
                            <span>Manual</span>
                        </div>
                        <div class="px-2">
                            <i class="fa fa-road text-primary mr-1"></i>
                            <span>25K</span>
                        </div>
                    </div>
                    <a class="btn btn-primary px-3" href="">Rs : 25.00/Per Km</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-2">
                <div class="rent-item mb-4">
                    <img class="img-fluid mb-4" src="img/car-rent-4.png" alt="Audi Q5">
                    <h4 class="text-uppercase mb-4">Audi Q5</h4>
                    <div class="d-flex justify-content-center mb-4">
                        <div class="px-2">
                            <i class="fa fa-car text-primary mr-1"></i>
                            <span>2017</span>
                        </div>
                        <div class="px-2 border-left border-right">
                            <i class="fa fa-cogs text-primary mr-1"></i>
                            <span>Manual</span>
                        </div>
                        <div class="px-2">
                            <i class="fa fa-road text-primary mr-1"></i>
                            <span>25KM</span>
                        </div>
                    </div>
                    <a class="btn btn-primary px-3" href="">Rs : 15.00/Per Km</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-2">
                <div class="rent-item mb-4">
                    <img class="img-fluid mb-4" src="img/car-rent-5.png" alt="Mercedes CLE">
                    <h4 class="text-uppercase mb-4">Mercedes CLE</h4>
                    <div class="d-flex justify-content-center mb-4">
                        <div class="px-2">
                            <i class="fa fa-car text-primary mr-1"></i>
                            <span>2018</span>
                        </div>
                        <div class="px-2 border-left border-right">
                            <i class="fa fa-cogs text-primary mr-1"></i>
                            <span>AUTO</span>
                        </div>
                        <div class="px-2">
                            <i class="fa fa-road text-primary mr-1"></i>
                            <span>25KM</span>
                        </div>
                    </div>
                    <a class="btn btn-primary px-3" href="">Rs : 50.00/Per Km</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-2">
                <div class="rent-item mb-4">
                    <img class="img-fluid mb-4" src="img/car-rent-7.png" alt="Kia Sonet">
                    <h4 class="text-uppercase mb-4">Kia Sonet</h4>
                    <div class="d-flex justify-content-center mb-4">
                        <div class="px-2">
                            <i class="fa fa-car text-primary mr-1"></i>
                            <span>2024</span>
                        </div>
                        <div class="px-2 border-left border-right">
                            <i class="fa fa-cogs text-primary mr-1"></i>
                            <span>AUTO</span>
                        </div>
                        <div class="px-2">
                            <i class="fa fa-road text-primary mr-1"></i>
                            <span>05KM</span>
                        </div>
                    </div>
                    <a class="btn btn-primary px-3" href="">Rs : 10.00/Per KM</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Rent A Car End -->



    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="display-1 text-primary text-center">04</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Meet Our Team</h1>
            <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
                <div class="team-item">
                    <img class="img-fluid w-100" src="img/Maru Anish.png" alt="">
                    <div class="position-relative py-4">
                        <h4 class="text-uppercase">Maru Anish</h4>
                        <p class="m-0">Developer</p>
                        <div class="team-social position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <img class="img-fluid w-100" src="img/Chaniyara Riddhi.jpg" alt="Chaniyara Riddhi">
                    <div class="position-relative py-4">
                        <h4 class="text-uppercase">Chaniyara Riddhi</h4>
                        <p class="m-0">Developer</p>
                        <div class="team-social position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
              
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Banner Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row mx-0">
                <div class="col-lg-6 px-0">
                    <div class="px-5 bg-secondary d-flex align-items-center justify-content-between" style="height: 350px;">
                        <img class="img-fluid flex-shrink-0 ml-n5 w-50 mr-4" src="img/banner-left.png" alt="">
                        <div class="text-right">
                            <h3 class="text-uppercase text-light mb-3">Ready to hit the road with us?</h3>
                            <p class="mb-4">Discover a rewarding driving career with flexible hours, great pay, and full support. Apply today and drive your future forward!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 px-0">
                    <div class="px-5 bg-dark d-flex align-items-center justify-content-between" style="height: 350px;">
                        <div class="text-left">
                            <h3 class="text-uppercase text-light mb-3">Looking for a car?</h3>
                            <p class="mb-4">Find the perfect vehicle for your needs. Browse our wide selection and drive away with a great deal. Explore our inventory today!</p>
                        </div>
                        <img class="img-fluid flex-shrink-0 mr-n5 w-50 ml-4" src="img/banner-right.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->


<!-- Testimonial Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="display-1 text-primary text-center">05</h1>
        <h1 class="display-4 text-uppercase text-center mb-5">Our Client's Say</h1>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item d-flex flex-column justify-content-center px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <img class="img-fluid ml-n4" src="img/testimonial-1.jpg" alt="">
                    <h1 class="display-2 text-white m-0 fa fa-quote-right"></h1>
                </div>
                <h4 class="text-uppercase mb-2">Client Name</h4>
                <i class="mb-2">Smith Shah</i>
                <p class="m-0">I had my car serviced here recently, and the experience was top-notch. The team was professional, and the quality of work was excellent.I appreciate the timely updates and attention to detail.</p>
            </div>
            <div class="testimonial-item d-flex flex-column justify-content-center px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <img class="img-fluid ml-n4" src="img/testimonial-2.jpg" alt="">
                    <h1 class="display-2 text-white m-0 fa fa-quote-right"></h1>
                </div>
                <h4 class="text-uppercase mb-2">Client Name</h4>
                <i class="mb-2"> Luca Rossi</i>
                <p class="m-0">I used Car Care for my vehicle while I was traveling. The online booking system was straightforward, and the service team did a fantastic job. The convenience and professionalism were top-notch. Definitely worth it!</p>
            </div>
            <div class="testimonial-item d-flex flex-column justify-content-center px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <img class="img-fluid ml-n4" src="img/testimonial-3.jpg" alt="">
                    <h1 class="display-2 text-white m-0 fa fa-quote-right"></h1>
                </div>
                <h4 class="text-uppercase mb-2">Client Name</h4>
                <i class="mb-2">John Smith</i>
                <p class="m-0"> I was very pleased with the Car Care service. Even from another country, I could manage my car maintenance online effortlessly.The team was professional, and the results were fantastic. A great experience overall!</p>
            </div>
            <div class="testimonial-item d-flex flex-column justify-content-center px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <img class="img-fluid ml-n4" src="img/testimonial-4.jpg" alt="">
                    <h1 class="display-2 text-white m-0 fa fa-quote-right"></h1>
                </div>
                <h4 class="text-uppercase mb-2">Client Name</h4>
                <i class="mb-2">Emma Williams</i>
                <p class="m-0">I had an amazing experience with Car Care! The team was highly professional, and the service was prompt. I sold my car quickly, hassle-free. Highly recommended.</p>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->


<!-- Contact Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <h1 class="display-1 text-primary text-center">06</h1>
        <h1 class="display-4 text-uppercase text-center mb-5">Contact Us</h1>
        <div class="row">
            <!-- Contact Form Section -->
            <div class="col-lg-7 mb-2">
                <div class="contact-form bg-light mb-4" style="padding: 30px;">
                    <form method="POST" action="contacts.php">
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="text" name="name" class="form-control p-4" placeholder="Your Name" required="required">
                            </div>
                            <div class="col-6 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+91</span>
                                    </div>
                                    <input type="text" name="mobile" class="form-control p-4" placeholder="Your Mobile Number" required="required" pattern="^\d{10}$" title="Please enter a valid mobile number (10 digits without +91)">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control p-4" placeholder="Subject" required="required">
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control py-3 px-4" rows="5" placeholder="Message" required="required"></textarea>
                        </div>
                        <div>
                            <button class="btn btn-primary py-3 px-5" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Google Map Section -->
            <div class="col-lg-5 mb-2">
                <div class="bg-secondary d-flex flex-column justify-content-center px-0 mb-4" style="height: 435px; border: 5px solid navy;">
                    <!-- Google Map Integration -->
                    <div class="w-100 h-100">
                        <iframe 
                            class="w-100 h-100" 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.3040130709734!2d73.20619421449817!3d22.33470658522773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396f6f7e4cfe9bc5%3A0x12519c5b6be7f20d!2sParul%20University%2C%20Vadodara%2C%20Gujarat%2C%20India!5e0!3m2!1sen!2sus!4v1696740792430!5m2!1sen!2sus"
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                    <!-- End Google Map Integration -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="owl-carousel vendor-carousel">
                <div class="bg-light p-4">
                    <img src="img/vendor-1.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-2.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-3.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-4.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-5.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-6.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-7.png" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-8.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-white mr-3"></i>Parul University , Vadodara(391760) , Gujarat , India </p>
                <p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i>+91 6359073328</p>
                <p><i class="fa fa-envelope text-white mr-3"></i>2203031247006@paruluniversity.ac.in </p>
                <h6 class="text-uppercase text-white py-2">Follow Us</h6>
                <div class="col-md-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-body px-3" href="https://twitter.com/Online_Car_Care">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-body px-3" href="https://in.linkedin.com/in/riddhi-chaniyara-07812527b">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-body px-3" href="https://www.instagram.com/online_car_care_/">
                            <i class="fab fa-instagram"></i>
                        </a>   
                    </div>  
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Usefull Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-body mb-2" href="privacypolicy.html"><i class="fa fa-angle-right text-white mr-2"></i>Privacy Policy</a>
                    <a class="text-body mb-2" href="terms&conditions.html"><i class="fa fa-angle-right text-white mr-2"></i>Term & Conditions</a>
                    <a class="text-body mb-2" href="About-us.html".html"><i class="fa fa-angle-right text-white mr-2"></i>About-us</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Car Gallery</h4>
                <div class="row mx-n1">
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-2.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-3.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-4.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-5.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-6.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
    <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">Car Care</a>. All Rights Reserved 2024</p>
		
							
        <p class="m-0 text-center text-body">Developed by @ Anish Maru , Riddhi Chaniyara </a></p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>