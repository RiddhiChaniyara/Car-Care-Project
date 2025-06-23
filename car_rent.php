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
    <div class="row mx-n2">
        <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            <select id="pickup-location" class="custom-select px-4 mb-3" style="height: 50px;">
                <option selected>Pickup Location</option>
                <option value="Rajkot">Rajkot</option>
                <option value="Porbandar">Porbandar</option>
                <option value="Surat">Surat</option>
                <option value="Vadodara">Vadodara</option>
            </select>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            <select id="drop-location" class="custom-select px-4 mb-3" style="height: 50px;">
                <option selected>Drop Location</option>
                <option value="Rajkot">Rajkot</option>
                <option value="Porbandar">Porbandar</option>
                <option value="Surat">Surat</option>
                <option value="Vadodara">Vadodara</option>
            </select>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            <div class="date mb-3" id="date" data-target-input="nearest">
                <input id="pickup-date" type="text" class="form-control p-4 datetimepicker-input" placeholder="Pickup Date"
                    data-target="#date" data-toggle="datetimepicker" />
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            <div class="time mb-3" id="time" data-target-input="nearest">
                <input id="pickup-time" type="text" class="form-control p-4 datetimepicker-input" placeholder="Pickup Time"
                    data-target="#time" data-toggle="datetimepicker" />
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 px-2">
            <select id="car" class="custom-select px-4 mb-3" style="height: 50px;">
                <option selected>Select A Car</option>
                <option value="Maruti Baleno">Maruti Baleno</option>
                <option value="Maruti Brezza">Maruti Brezza</option>
                <option value="Maruti XL6">Maruti XL6</option>
                <option value="Hyundai Aura">Hyundai Aura</option>
                <option value="Tata Safari">Tata Safari</option>
                <option value="Toyota Qualis">Toyota Qualis</option>
            </select>
            
        </div>
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
    <h1 class="display-3 text-uppercase text-white mb-3">Car Rent Booking</h1>
    <h3 class="text-uppercase text-white mb-3">JOIN THE JOURNEY WITH US..!!!</h3> <!-- Changed from h2 to h3 -->
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">Rent Service</h6>
    </div>
</div>
<!-- Page Header End -->   

<!-- Selected Details Section -->
<div id="selected-details" class="alert alert-info shadow-sm rounded p-4">
    <h5 class="font-weight-bold">Selected Details:</h5>
    <p><strong>Pickup Location:</strong> <span id="pickup-location-value"></span></p>
    <p><strong>Drop Location:</strong> <span id="drop-location-value"></span></p>
    <p><strong>Pickup Date:</strong> <span id="pickup-date-value"></span></p>
    <p><strong>Pickup Time:</strong> <span id="pickup-time-value"></span></p>
    <p><strong>Selected Car:</strong> <span id="selected-car"></span></p>
</div>



    <!-- Detail Start -->
    <div class="container-fluid pt-5">
        <div class="container pt-5 pb-3">
            <!-- Car 1: Maruti Baleno -->
            <div id="car-1" class="car-detail">
                <h1 class="display-4 text-uppercase mb-5">Maruti Baleno</h1>
                <div class="row align-items-center pb-2">
                    <div class="col-lg-6 mb-4">
                        <img class="img-fluid" src="img/bg-banner.jpg" alt="Maruti Baleno">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <h4 class="mb-2">$99.00/Day</h4>
                        <div class="d-flex mb-3">
                            <h6 class="mr-2">Rating:</h6>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                <small>(250)</small>
                            </div>
                        </div>
                        <p>The Maruti Baleno is a stylish and fuel-efficient hatchback, perfect for city driving and long trips. With its sleek design and comfortable interior, it offers a smooth ride while maintaining a budget-friendly price.</p>
                    </div>
                </div>
            </div>

            <!-- Car 2: Maruti Brezza -->
            <div id="car-2" class="car-detail">
                <h1 class="display-4 text-uppercase mb-5">Maruti Brezza</h1>
                <div class="row align-items-center pb-2">
                    <div class="col-lg-6 mb-4">
                        <img class="img-fluid" src="img/bg-banner.jpg" alt="Maruti Brezza">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <h4 class="mb-2">$105.00/Day</h4>
                        <div class="d-flex mb-3">
                            <h6 class="mr-2">Rating:</h6>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                <small>(200)</small>
                            </div>
                        </div>
                        <p>The Maruti Brezza is a compact SUV designed for both urban and off-road adventures. With a robust build, modern features, and impressive fuel efficiency, it’s a versatile option for all your travel needs.</p>
                    </div>
                </div>
            </div>

            <!-- Car 3: Maruti XL6 -->
            <div id="car-3" class="car-detail">
                <h1 class="display-4 text-uppercase mb-5">Maruti XL6</h1>
                <div class="row align-items-center pb-2">
                    <div class="col-lg-6 mb-4">
                        <img class="img-fluid" src="img/bg-banner.jpg" alt="Maruti XL6">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <h4 class="mb-2">$120.00/Day</h4>
                        <div class="d-flex mb-3">
                            <h6 class="mr-2">Rating:</h6>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(300)</small>
                            </div>
                        </div>
                        <p>The Maruti XL6 is a premium MPV that combines space and luxury. It offers spacious seating, modern technology, and a powerful engine, making it the ideal vehicle for large families or group travels.</p>
                    </div>
                </div>
            </div>

            <!-- Car 4: Hyundai Aura -->
            <div id="car-4" class="car-detail">
                <h1 class="display-4 text-uppercase mb-5">Hyundai Aura</h1>
                <div class="row align-items-center pb-2">
                    <div class="col-lg-6 mb-4">
                        <img class="img-fluid" src="img/bg-banner.jpg" alt="Hyundai Aura">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <h4 class="mb-2">$95.00/Day</h4>
                        <div class="d-flex mb-3">
                            <h6 class="mr-2">Rating:</h6>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                <small>(180)</small>
                            </div>
                        </div>
                        <p>The Hyundai Aura is a compact sedan known for its smooth handling, comfortable interiors, and advanced safety features. Its efficient performance makes it a great choice for both daily commutes and long drives.</p>
                    </div>
                </div>
            </div>

            <!-- Car 5: Tata Safari -->
            <div id="car-5" class="car-detail">
                <h1 class="display-4 text-uppercase mb-5">Tata Safari</h1>
                <div class="row align-items-center pb-2">
                    <div class="col-lg-6 mb-4">
                        <img class="img-fluid" src="img/bg-banner.jpg" alt="Tata Safari">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <h4 class="mb-2">$130.00/Day</h4>
                        <div class="d-flex mb-3">
                            <h6 class="mr-2">Rating:</h6>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                <small>(320)</small>
                            </div>
                        </div>
                        <p>The Tata Safari is a rugged, high-performance SUV built for adventure. With its powerful engine and spacious cabin, it’s designed for off-road capabilities while providing the comfort and luxury of a premium vehicle.</p>
                    </div>
                </div>
            </div>

            <!-- Car 6: Toyota Qualis -->
            <div id="car-6" class="car-detail">
                <h1 class="display-4 text-uppercase mb-5">Toyota Qualis</h1>
                <div class="row align-items-center pb-2">
                    <div class="col-lg-6 mb-4">
                        <img class="img-fluid" src="img/bg-banner.jpg" alt="Toyota Qualis">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <h4 class="mb-2">$110.00/Day</h4>
                        <div class="d-flex mb-3">
                            <h6 class="mr-2">Rating:</h6>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                <small>(240)</small>
                            </div>
                        </div>
                        <p>The Toyota Qualis is a dependable and spacious MPV that has been a favorite for long-distance travel. Known for its durability and comfort, it’s a reliable choice for families and large groups looking for a sturdy vehicle.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->





<!-- Car Booking Start -->
<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="container" style="max-width: 800px; background-color: #f7f7f7; padding: 40px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mb-4">Personal & Booking Details</h2>
                <form method="POST" action="rent_booking.php" >
                    <!-- Personal Detail Section -->
                    <div class="mb-5">
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="text" name="first_name" class="form-control p-4" placeholder="First Name" required="required">
                            </div>
                            <div class="col-6 form-group">
                                <input type="text" name="last_name" class="form-control p-4" placeholder="Last Name" required="required">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="email" name="email" class="form-control p-4" placeholder="Your Email" required="required">
                            </div>
                            <div class="col-6 form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+91</span>
                                    </div>
                                    <input type="text" name="mobile_number" class="form-control p-4" placeholder="Mobile Number" maxlength="10" pattern="\d{10}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Detail Section -->
                    <div class="mb-5">
                        <div class="row">
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" name="pickup_location" style="height: 50px;" required>
                                    <option selected disabled>Pickup Location</option>
                                    <option value="Location 1">Location 1</option>
                                    <option value="Location 2">Location 2</option>
                                    <option value="Location 3">Location 3</option>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" name="drop_location" style="height: 50px;" required>
                                    <option selected disabled>Drop Location</option>
                                    <option value="Location 1">Location 1</option>
                                    <option value="Location 2">Location 2</option>
                                    <option value="Location 3">Location 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="date" name="pickup_date" class="form-control p-4" placeholder="Pickup Date" required="required">
                            </div>
                            <div class="col-6 form-group">
                                <input type="time" name="pickup_time" class="form-control p-4" placeholder="Pickup Time" required="required">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" name="adults" style="height: 50px;">
                                    <option selected>Select Adult</option>
                                    <option value="1">Adult 1</option>
                                    <option value="2">Adult 2</option>
                                    <option value="3">Adult 3</option>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" name="children" style="height: 50px;">
                                    <option selected>Select Child</option>
                                    <option value="1">Child 1</option>
                                    <option value="2">Child 2</option>
                                    <option value="3">Child 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control py-3 px-4" name="special_request" rows="3" placeholder="Special Request" required="required"></textarea>
                        </div>
                        <input type="hidden" name="booking_id" value="<!-- PHP code to echo booking ID -->">
                        <button class="btn btn-primary py-3" name="book_now" type="submit">Book Now</button>
                        <button class="btn btn-secondary py-3" name="update_booking" type="submit">Update Booking</button>
                        <button class="btn btn-danger py-3" name="cancel_booking" type="submit">Cancel Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Car Booking End -->



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
            <p class="mb-2"><i class="fa fa-map-marker-alt text-white mr-3"></i>Parul University, Vadodara (391760), Gujarat, India</p>
            <p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i>+91 6359073328</p>
            <p><i class="fa fa-envelope text-white mr-3"></i>2203031247006@paruluniversity.ac.in</p>
            <h6 class="text-uppercase text-white py-2">Follow Us</h6>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body px-3" href="https://twitter.com/Online_Car_Care"><i class="fab fa-twitter"></i></a>
                    <a class="text-body px-3" href="https://in.linkedin.com/in/riddhi-chaniyara-07812527b"><i class="fab fa-linkedin-in"></i></a>
                    <a class="text-body px-3" href="https://www.instagram.com/online_car_care_/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="text-uppercase text-light mb-4">Useful Links</h4>
            <div class="d-flex flex-column justify-content-start">
                <a class="text-body mb-2" href="privacypolicy.html"><i class="fa fa-angle-right text-white mr-2"></i>Privacy Policy</a>
                <a class="text-body mb-2" href="terms&conditions.html"><i class="fa fa-angle-right text-white mr-2"></i>Term & Conditions</a>
                <a class="text-body mb-2" href="About-us.html"><i class="fa fa-angle-right text-white mr-2"></i>About-us</a>
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
    <p class="m-0 text-center text-body">Developed by @ Anish Maru, Riddhi Chaniyara</p>
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



<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Event handler for the Search button
        document.getElementById('search-btn').addEventListener('click', function () {
            // Get selected values
            var pickupLocation = document.getElementById('pickup-location').value;
            var dropLocation = document.getElementById('drop-location').value;
            var carModel = document.getElementById('car').value;
            var pickupDate = document.getElementById('pickup-date').value;
            var pickupTime = document.getElementById('pickup-time').value;

            // Debugging: Check if the button is clicked
            console.log('Search button clicked');

            // Check if a car model is selected
            if (carModel) {
                // Hide all car details initially
                var carDetails = document.getElementsByClassName('car-detail');
                for (var i = 0; i < carDetails.length; i++) {
                    carDetails[i].style.display = 'none';
                }

                // Show the selected car details based on conditions
                switch (carModel.toLowerCase()) {
                    case 'maruti baleno':
                        document.getElementById('car-1').style.display = 'block';
                        break;
                    case 'maruti brezza':
                        document.getElementById('car-2').style.display = 'block';
                        break;
                    case 'maruti xl6':
                        document.getElementById('car-3').style.display = 'block';
                        break;
                    case 'hyundai aura':
                        document.getElementById('car-4').style.display = 'block';
                        break;
                    case 'tata safari':
                        document.getElementById('car-5').style.display = 'block';
                        break;
                    case 'toyota qualis':
                        document.getElementById('car-6').style.display = 'block';
                        break;
                    default:
                        alert('Please select a valid car.');
                        return;
                }

                // Update the displayed details
                document.getElementById('pickup-location-value').textContent = pickupLocation || 'N/A';
                document.getElementById('drop-location-value').textContent = dropLocation || 'N/A';
                document.getElementById('pickup-date-value').textContent = pickupDate || 'N/A';
                document.getElementById('pickup-time-value').textContent = pickupTime || 'N/A';

                // Show the selected details section
                document.getElementById('selected-details').style.display = 'block';

            } else {
                alert("Please select a car model to view details.");
            }
        });

        // Reset button functionality
        document.getElementById('reset-button').addEventListener('click', function () {
            // Debugging: Check if reset button is clicked
            console.log('Reset button clicked');

            // Hide all car details
            var carDetails = document.getElementsByClassName('car-detail');
            for (var i = 0; i < carDetails.length; i++) {
                carDetails[i].style.display = 'none';
            }

            // Reset the selections
            document.getElementById('pickup-location').selectedIndex = 0;
            document.getElementById('drop-location').selectedIndex = 0;
            document.getElementById('car').selectedIndex = 0;
            document.getElementById('pickup-date').value = '';
            document.getElementById('pickup-time').value = '';

            // Clear displayed details
            document.getElementById('pickup-location-value').textContent = '';
            document.getElementById('drop-location-value').textContent = '';
            document.getElementById('pickup-date-value').textContent = '';
            document.getElementById('pickup-time-value').textContent = '';

            // Hide the selected details section
            document.getElementById('selected-details').style.display = 'none';
        });
    });
</script>



</body>
</html>

