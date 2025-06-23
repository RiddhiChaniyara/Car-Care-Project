<?php
include 'session_manager.php'; // Include the session management
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Car Care</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

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
    <link href="css/car_buy.css" rel="stylesheet">
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <?= htmlspecialchars($username) ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="update_profile.php">Update Profile</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            <?php endif; ?>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
 

<!-- Search Start -->
<div class="container-fluid bg-white pt-3 px-lg-5">
    <div class="row justify-content-center mx-n2">
        <!-- Select City -->
        <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            <select id="city" class="custom-select px-4 mb-3" style="height: 50px;">
                <option selected>Select City</option>
                <option value="Rajkot">Rajkot</option>
                <option value="Porbandar">Porbandar</option>
                <option value="Surat">Surat</option>
                <option value="Vadodara">Vadodara</option>
            </select>
        </div>
        <!-- Select Budget -->
        <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            <select id="budget" class="custom-select px-4 mb-3" style="height: 50px;">
                <option selected>Select Budget</option>
                <option value="50,000 - 70,000">50,000 - 70,000</option>
                <option value="70,000 - 90,000">70,000 - 90,000</option>
                <option value="90,000 - 1 Lakh">90,000 - 1 Lakh</option>
                <option value="1 Lakh - 3 lakh">1 Lakh - 3 Lakh</option>
                <option value="3 Lakh - 6 lakh">3 Lakh - 6 Lakh</option>
                <option value="8 Lakh - 15 lakh">8 Lakh - 15 Lakh</option>
                <option value="15 Lakh - 25 lakh">15 Lakh - 25 Lakh</option>
                <option value="25 Lakh - 35 lakh">25 Lakh - 35 Lakh</option>
                <option value="35 Lakh - 65 lakh">35 Lakh - 65 Lakh</option>
                <option value="65 Lakh - 85 lakh">65 Lakh - 85 Lakh</option>
            </select>
        </div>
        <!-- Select Car -->
        <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            <select id="car" class="custom-select px-4 mb-3" style="height: 50px;">
                <option selected>Select A Car</option>
                <option value="Maruti Brezza">Maruti Brezza</option>
                <option value="Audi A3">Audi A3</option>
                <option value="Honda City">Honda City</option>
                <option value="Toyota Innova">Toyota Innova</option>
                <option value="Skoda Octavia">Skoda Octavia</option>
                <option value="toyota qualis">Toyota Qualis</option>
            </select>
        </div>
        <!-- Search and Reset Buttons -->
        <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            <div class="btn-group mb-3" style="width: 100%;">
                <button class="btn btn-primary" type="button" id="search-btn" style="height: 50px;">Search</button>
                <button id="reset-button" class="btn btn-secondary" style="height: 50px;">Reset</button>
            </div>
        </div>
    </div>
</div>
<!-- Search End -->

     <!-- Page Header Start -->
     <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Welcome to Car Buy</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Service</h6>
        </div>
    </div>
    <!-- Page Header End -->

    
    <!-- Main Content -->
        <!-- Car Listings Section -->
    <div class="col-md-9">
        <h1 class="heading">Popular Cars</h1>
        <div class="row" id="carListings">
            <!-- Car Item 1 -->
            <div class="col-md-4 mb-4 car-item" data-price="2000" data-brand="BMW" data-seating="2" data-type="SUV">
                <div class="card h-100">
                    <div class="image-container">
                        <img src="img/car sell_3.jpg" class="card-img-top" alt="Maruti Brezza">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Maruti Brezza</h5>
                        <p class="card-text">5 Seater Car</p>
                        <p class="text-danger fw-bold">Rs : 8.34 lakh</p>
                        <ul class="car-details">
                            <li><strong>Engine:</strong> 1.5L</li>
                            <li><strong>Fuel Type:</strong>Petrol</li>
                            <li><strong>Transmission:</strong> Automatic</li>
                            <li><strong>Year:</strong> 2021</li>
                        </ul>
                        <a href="buy_booking.html" class="btn btn-custom w-100">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Car Item 2 -->
            <div class="col-md-4 mb-4 car-item" data-price="1800" data-brand="Audi" data-seating="5" data-type="Sedan">
                <div class="card h-100">
                    <div class="image-container">
                        <img src="img/audia3.png" class="card-img-top" alt="Audi A3">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Audi A3</h5>
                        <p class="card-text">5 Seater Car</p>
                        <p class="text-danger fw-bold">Rs : 30.00 lakh</p>
                        <ul class="car-details">
                            <li><strong>Engine:</strong> 2.0L</li>
                            <li><strong>Fuel Type:</strong> Petrol</li>
                            <li><strong>Transmission:</strong> Automatic</li>

                            <li><strong>Year:</strong> 2020</li>
                        </ul>
                        <a href="buy_booking.html" class="btn btn-custom w-100">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Car Item 3 -->
            <div class="col-md-4 mb-4 car-item" data-price="1600" data-brand="Honda" data-seating="5" data-type="Sedan">
                <div class="card h-100">
                    <div class="image-container">
                        <img src="img/honda city.jpg" class="card-img-top" alt="Honda City">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Honda City</h5>
                        <p class="card-text">5 Seater Car</p>
                        <p class="text-danger fw-bold">Rs : 14.00 lakh</p>
                        <ul class="car-details">
                            <li><strong>Engine:</strong> 1.8L</li>
                            <li><strong>Fuel Type:</strong> Petrol</li>
                            <li><strong>Transmission:</strong> Manual</li>
                            <li><strong>Year:</strong> 2021</li>
                        </ul>
                        <a href="buy_booking.html" class="btn btn-custom w-100">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Car Item 4 -->
            <div class="col-md-4 mb-4 car-item" data-price="2200" data-brand="Mercedes" data-seating="4" data-type="Convertible">
                <div class="card h-100">
                    <div class="image-container">
                        <img src="img/MERCEDAS-S-CLASS.jpg" class="card-img-top" alt="Mercedes S-Class">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Mercedes S-Class</h5>
                        <p class="card-text">4 Seater Car</p>
                        <p class="text-danger fw-bold">Rs : 1.50 Crore</p>
                        <ul class="car-details">
                            <li><strong>Engine:</strong> 4.0L</li>
                            <li><strong>Fuel Type:</strong> Petrol</li>
                            <li><strong>Transmission:</strong> Automatic</li>
                            <li><strong>Year:</strong> 2021</li>
                        </ul>
                        <a href="buy_booking.html" class="btn btn-custom w-100">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Car Item 5 -->
            <div class="col-md-4 mb-4 car-item" data-price="1800" data-brand="Hyundai" data-seating="5" data-type="SUV">
                <div class="card h-100">
                    <div class="image-container">
                        <img src="img/creta.png" class="card-img-top" alt="Hyundai Creta">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Hyundai Creta</h5>
                        <p class="card-text">5 Seater Car</p>
                        <p class="text-danger fw-bold">Rs : 12.00 lakh</p>
                        <ul class="car-details">
                            <li><strong>Engine:</strong> 1.5L</li>
                            <li><strong>Fuel Type:</strong> Diesel</li>
                            <li><strong>Transmission:</strong> Automatic</li>
                            <li><strong>Year:</strong> 2021</li>
                        </ul>
                        <a href="buy_booking.html" class="btn btn-custom w-100">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Car Item 6 -->
            <div class="col-md-4 mb-4 car-item" data-price="1500" data-brand="Ford" data-seating="5" data-type="SUV">
                <div class="card h-100">
                    <div class="image-container">
                        <img src="img/fordecosport.png" class="card-img-top" alt="Ford EcoSport">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Ford EcoSport</h5>
                        <p class="card-text">5 Seater Car</p>
                        <p class="text-danger fw-bold">Rs : 11.00 lakh</p>
                        <ul class="car-details">
                            <li><strong>Engine:</strong> 1.5L</li>
                            <li><strong>Fuel Type:</strong> Diesel</li>
                            <li><strong>Transmission:</strong> Manual</li>
                            <li><strong>Year:</strong> 2020</li>
                        </ul>
                        <a href="buy_booking.html" class="btn btn-custom w-100">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Car Item 7 -->
            <div class="col-md-4 mb-4 car-item" data-price="1900" data-brand="Toyota" data-seating="7" data-type="MUV">
                <div class="card h-100">
                    <div class="image-container">
                        <img src="img/toyotahycorss.png" class="card-img-top" alt="Toyota Innova">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Toyota Innova Hycross</h5>
                        <p class="card-text">7 Seater Car</p>
                        <p class="text-danger fw-bold">Rs : 18.00 lakh</p>
                        <ul class="car-details">
                            <li><strong>Engine:</strong> 2.4L</li>
                            <li><strong>Fuel Type:</strong> Diesel</li>
                            <li><strong>Transmission:</strong> Automatic</li>
                            <li><strong>Year:</strong> 2020</li>
                        </ul>
                        <a href="buy_booking.html" class="btn btn-custom w-100">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Car Item 8 -->
            <div class="col-md-4 mb-4 car-item" data-price="1700" data-brand="Kia" data-seating="7" data-type="SUV">
                <div class="card h-100">
                    <div class="image-container">
                        <img src="img/seltos.png" class="card-img-top" alt="Kia Seltos">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Kia Seltos</h5>
                        <p class="card-text">7 Seater Car</p>
                        <p class="text-danger fw-bold">Rs : 14.00 lakh</p>
                        <ul class="car-details">
                            <li><strong>Engine:</strong> 1.4L</li>
                            <li><strong>Fuel Type:</strong> Petrol</li>
                            <li><strong>Transmission:</strong> Automatic</li>
                            <li><strong>Year:</strong> 2020</li>
                        </ul>
                        <a href="buy_booking.html" class="btn btn-custom w-100">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Car Item 9 -->
            <div class="col-md-4 mb-4 car-item" data-price="1300" data-brand="MG" data-seating="5" data-type="SUV">
                <div class="card h-100">
                    <div class="image-container">
                        <img src="img/mghector.png" class="card-img-top" alt="MG Hector">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">MG Hector</h5>
                        <p class="card-text">5 Seater Car</p>
                        <p class="text-danger fw-bold">Rs : 16.00 lakh</p>
                        <ul class="car-details">
                            <li><strong>Engine:</strong> 1.5L</li>
                            <li><strong>Fuel Type:</strong> Petrol</li>
                            <li><strong>Transmission:</strong> Automatic</li>
                            <li><strong>Year:</strong> 2020</li>
                        </ul>
                        <a href="buy_booking.html" class="btn btn-custom w-100">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Car Item 10 -->
            <div class="col-md-4 mb-4 car-item" data-price="1500" data-brand="Jeep" data-seating="5" data-type="SUV">
                <div class="card h-100">
                    <div class="image-container">
                        <img src="img/jeepcompass.png" class="card-img-top" alt="Jeep Compass">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Jeep Compass</h5>
                        <p class="card-text">5 Seater Car</p>
                        <p class="text-danger fw-bold">Rs : 50,000 lakh</p>
                        <ul class="car-details">
                            <li><strong>Engine:</strong> 2.0L</li>
                            <li><strong>Fuel Type:</strong> Diesel</li>
                            <li><strong>Transmission:</strong> Automatic</li>
                            <li><strong>Year:</strong> 2021</li>
                        </ul>
                        <a href="buy_booking.html" class="btn btn-custom w-100">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Car Item 11 -->
            <div class="col-md-4 mb-4 car-item" data-price="1600" data-brand="Skoda" data-seating="5" data-type="Sedan">
                <div class="card h-100">
                    <div class="image-container">
                        <img src="img/octvia.png" class="card-img-top" alt="Skoda Octavia">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Skoda Octavia</h5>
                        <p class="card-text">5 Seater Car</p>
                        <p class="text-danger fw-bold">Rs : 1 lakh</p>
                        <ul class="car-details">
                            <li><strong>Engine:</strong> 2.0L</li>
                            <li><strong>Fuel Type:</strong> Petrol</li>
                            <li><strong>Transmission:</strong> Automatic</li>
                            <li><strong>Year:</strong> 2021</li>
                        </ul>
                        <a href="buy_booking.html" class="btn btn-custom w-100">Book Now</a>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- All Cars Brand Logo-->
   <!-- Brand Start -->
   <div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="heading">All Car Brands</h1>
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
<!-- Brand End -->

     <!-- Frequently Asked Questions-->
     <div class="faq-container">
        <h1 class="heading">Frequently Asked Questions</h1>
        
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                What should I consider before buying a used car?
                <span class="icon">+</span>
            </div>
            <div class="faq-answer">
                <p>Before buying a used car, consider factors like the car's condition, mileage, service history, and whether it has been in any accidents. It’s also important to check the vehicle’s registration and documentation.</p>
            </div>
        </div>
    
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                How can I check if a car has a clean title?
                <span class="icon">+</span>
            </div>
            <div class="faq-answer">
                <p>You can check if a car has a clean title by obtaining a vehicle history report using the car's VIN (Vehicle Identification Number). Services like Carfax or AutoCheck can provide this information.</p>
            </div>
        </div>
    
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                What are the steps to take after buying a car?
                <span class="icon">+</span>
            </div>
            <div class="faq-answer">
                <p>After buying a car, ensure to complete the registration and title transfer, get insurance coverage, and familiarize yourself with the vehicle’s maintenance schedule. It’s also a good idea to have the car inspected by a mechanic.</p>
            </div>
        </div>
    
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                Can I negotiate the price of a used car?
                <span class="icon">+</span>
            </div>
            <div class="faq-answer">
                <p>No, negotiating the price of a used car is common. Research similar vehicles in your area to understand the market value and use this information as leverage during negotiations.</p>
            </div>
        </div>
    
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                What financing options are available for purchasing a car?
                <span class="icon">+</span>
            </div>
            <div class="faq-answer">
                <p>Financing options typically include bank loans, credit union loans, dealership financing, and leasing. Compare interest rates and terms to find the best option for your budget.</p>
            </div>
        </div>
    
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                Should I get a mechanic's inspection before buying?
                <span class="icon">+</span>
            </div>
            <div class="faq-answer">
                <p>Yes, getting a mechanic's inspection before buying a used car is highly recommended. It can help identify any hidden issues that could lead to costly repairs later on.</p>
            </div>
        </div>
    
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                What documentation do I need when buying a car?
                <span class="icon">+</span>
            </div>
            <div class="faq-answer">
                <p>When buying a car, you typically need the vehicle title, bill of sale, proof of insurance, identification, and any financing documents if applicable. Ensure all paperwork is completed properly.</p>
            </div>
        </div>
    
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                How do I test drive a car before buying?
                <span class="icon">+</span>
            </div>
            <div class="faq-answer">
                <p>To test drive a car, contact the seller or dealership to schedule an appointment. Bring your driver's license, and be sure to check the car's performance, comfort, and features during the drive.</p>
            </div>
        </div>
    
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                Are there additional fees when buying a car?
                <span class="icon">+</span>
            </div>
            <div class="faq-answer">
                <p>Yes, additional fees may include sales tax, registration fees, title transfer fees, and dealer fees. Be sure to ask about all potential costs before finalizing your purchase.</p>
            </div>
        </div>
    </div>
    



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
<script src="js/main.js" ></script>



<script>
    $(document).ready(function () {
        // Initialize date and time pickers (if applicable)
        $('#pickup-date').datetimepicker({
            format: 'L'
        });
        $('#pickup-time').datetimepicker({
            format: 'LT'
        });

        // Search button functionality
        $('#search-btn').on('click', function () {
            // Get selected values
            var selectedCity = $('#Select\\ City').val();
            var selectedBudget = $('#Select\\ Budget').val();
            var selectedCarModel = $('#car').val();

            // Convert budget string to numeric range
            if (selectedBudget) {
                var budgetRange = selectedBudget.split(" - ");
                var minBudget = parseInt(budgetRange[0].replace(/[^0-9]/g, ""));
                var maxBudget = budgetRange[1] ? parseInt(budgetRange[1].replace(/[^0-9]/g, "")) : Number.MAX_VALUE;
            }

            // Reset visibility: Hide all car listings initially
            var carsFound = false;  // Track if any cars match
            $('.car-item').hide();

            // Iterate through each car item and apply filtering conditions
            $('.car-item').each(function () {
                var carTitle = $(this).find('.card-title').text().trim().toLowerCase();
                var carPrice = parseFloat($(this).find('.text-danger.fw-bold').text().replace(/[^\d.]/g, '')); // Extract numeric value from price
                var carModel = $(this).data('brand').toLowerCase();

                // Match model and budget (if a budget is selected)
                var matchModel = selectedCarModel === "" || carTitle.includes(selectedCarModel.toLowerCase());
                var matchBudget = !selectedBudget || (carPrice >= minBudget && carPrice <= maxBudget);

                // Show the car if it matches the conditions
                if (matchModel && matchBudget) {
                    $(this).show();
                    carsFound = true; // At least one car is found
                }
            });

            // If no cars are found, show an alert
            if (!carsFound) {
                alert("No cars found for the selected criteria.");
            }
        });

        // Reset button functionality
        $('#reset-button').on('click', function () {
            // Show all car listings again
            $('.car-item').show();

            // Reset the selections
            $('#Select\\ City').prop('selectedIndex', 0);
            $('#Select\\ Budget').prop('selectedIndex', 0);
            $('#car').prop('selectedIndex', 0);
        });
    });
</script>


<!--Frequently Asked Questions Query -->
  <script>
    function toggleAnswer(element) {
        const answer = element.nextElementSibling;
        const icon = element.querySelector(".icon");
        if (answer.style.display === "block") {
            answer.style.display = "none";
            icon.textContent = "+";
        } else {
            answer.style.display = "block";
            icon.textContent = "-";
        }
    }
</script>
</body>
</html>
