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
    <link href="css/car_wash.css" rel="stylesheet">
 
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

  

      <!-- Page Header Start -->
      <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">WATERLESS CARWASH</h1>
        <h3 class="text-uppercase text-white mb-3">IT ALL STARTS WITH A DREAM</h3>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="#">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Service</h6>
        </div>
        
    </div>
    <!-- Page Header End -->

    <!-- Main Content -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="display-4 text-uppercase text-primary custom-title">About Car Wash</h2>
        </div> 
        <div class="container">
            <!-- Hero Section start-->
            <div class="testimonial-section">
                <div class="testimonial-content">
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <p>"Our waterless car wash service provides an eco-friendly solution to keep your car sparkling clean without wasting water. We use advanced formulas that lift dirt and grime, allowing it to be wiped away effortlessly."</p>
                    </div>    
                </div>
                <div class="col-lg-6 text-center">
                    <img src="img/waterlesswash.webp" alt="Waterless Car Wash" class="img-fluid rounded">
                </div>
            </div>
            <!--Hero section end-->
        </div>
    </div>
    <!-- Main Section End -->


    <!--Waterless Car service start-->
    <div class="text-center mb-4">
        <h2 class="display-4 text-uppercase text-primary custom-title">Waterless Car Services</h2>
    </div> 

    <section class="car-wash-section">
        <div class="image">
            <img src="img/exteriorcleaning.jpg" alt="Exterior Car Washing">
        </div>
        <div class="content">
            <h1>Exterior Cleaning</h1>
            <p>Keep your car looking great with our waterless exterior cleaning service! Our eco-friendly formula removes dirt and grime without using water, making it perfect for the environment.

                Our team uses special cleaning solutions to safely clean your car while leaving a shiny finish. Enjoy a spotless car anytime with our convenient waterless cleaning!</p>
        </div>
    </section>

    <section class="car-wash-section">
        <div class="image">
            <img src="img/interiorcleaning.webp" alt="Interior Car Cleaning">
        </div>
        <div class="content">
            <h1>Interior Cleaning</h1>
            <p>Give your car's interior a fresh look with our waterless cleaning service! We use eco-friendly products to clean and sanitize all surfaces without water.

                Our team will wipe down your dashboard, seats, and consoles, removing dust and odors for a clean and inviting space. Enjoy a spotless interior that feels like new, all while being kind to the environment.
                
                Choose our waterless interior cleaning for a quick and effective way to keep your car comfortable!</p>
        </div>
    </section>

    <section class="car-wash-section">
        <div class="image">
            <img src="img/microcleaning.jpg" alt="Micro Cleaning">
        </div>
        <div class="content">
            <h1>Micro Cleaning</h1>
            <p>Experience the ultimate in car care with our micro cleaning service! We focus on every detail, ensuring that every nook and cranny of your vehicle is thoroughly cleaned.

                Our specialized techniques and eco-friendly products remove even the smallest particles of dirt and grime, leaving your car looking pristine. Perfect for those who want a deep clean without water!</p>
        </div>
    </section>

    <!--Waterless Car service end-->



        <!--Wash and Shine Without the Rinse!  -->
    <div class="text-center mb-4">
        <h2 class="display-4 text-uppercase text-primary custom-title">Wash and Shine Without the Rinse!</h2>
    </div>

    <div class="container py-5">
        <div class="row text-center">
            <!-- Eco-Friendly Cleaning -->
            <div class="col-md-4 mb-4">
                <div class="service-box bg-light p-4 rounded">
                    <div class="service-icon mb-3">
                        <i class="fas fa-leaf fa-2x text-primary"></i>
                    </div>
                    <h5 class="text-uppercase">Eco-Friendly Cleaning</h5>
                    <p>"Conserve water and protect the environment with GoWaterless' innovative car wash services."</p>
                </div>
            </div>

        <!-- Superior Shine -->
        <div class="col-md-4 mb-4">
            <div class="service-box bg-light p-4 rounded">
                <div class="service-icon mb-3">
                    <i class="fas fa-star fa-2x text-primary"></i>
                </div>
                <h5 class="text-uppercase">Superior Shine</h5>
                <p>"GoWaterless products gently lift away dirt and grime, leaving behind a flawless finish."</p>
            </div>
        </div>

        <!-- Always Time-Saving -->
        <div class="col-md-4 mb-4">
            <div class="service-box bg-light p-4 rounded">
                <div class="service-icon mb-3">
                    <i class="fas fa-clock fa-2x text-primary"></i>
                </div>
                <h5 class="text-uppercase">Always Time-Saving</h5>
                <p>"Wash your car anytime. Our convenient car wash website is perfect for busy lifestyles, making your routine shiny."</p>
            </div>
        </div>

        <!-- Protects Your Paint -->
        <div class="col-md-4 mb-4">
            <div class="service-box bg-light p-4 rounded">
                <div class="service-icon mb-3">
                    <i class="fas fa-shield-alt fa-2x text-primary"></i>
                </div>
                <h5 class="text-uppercase">Protects Your Paint</h5>
                <p>"GoWaterless products are formulated with special lubricants that gently clean and protect your car's delicate paintwork."</p>
            </div>
        </div>

        <!-- Customer Satisfaction -->
        <div class="col-md-4 mb-4">
            <div class="service-box bg-light p-4 rounded">
                <div class="service-icon mb-3">
                    <i class="fas fa-water fa-2x text-primary"></i>
                </div>
                <h5 class="text-uppercase">Customer Satisfaction</h5>
                <p>"Our aim is to deliver great service that makes every customer happy during each visit"</p>
            </div>
        </div>

<!-- Doorstep Convenience -->
            <div class="col-md-4 mb-4">
                <div class="service-box bg-light p-4 rounded">
                    <div class="service-icon mb-3">
                        <i class="fas fa-car fa-2x text-primary"></i>
                    </div>
                    <h5 class="text-uppercase">Doorstep Convenience</h5>
                    <p>""Experience the convenience of our doorstep car wash! ,providing professional cleaning.and keep your car shine "</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Wash and Shine Without the Rinse! End -->


<!-- Service Plans Section Start -->
<div class="text-center mb-4">
<h2 class="display-4 text-uppercase text-primary custom-title">Service Plan</h2>
</div> 

<div class="pricing-card">
    <!-- Micro Cleaning Plan -->
    <div class="card">
        <div class="card-header">
            <h3>1h 15min</h3>
            <h2>Micro Cleaning</h2>
            <h1>₹600</h1>
        </div>
        <ul>
            <li>Detailed Dust & Dirt Removal</li>
            <li>Spot Cleaning of Small Areas</li>
            <li>Waterless Surface Wipe</li>
        </ul>
        <a href="wash_booking.html"><button>Book Now</button></a>
    </div>

    <!-- Interior Cleaning Plan -->
    <div class="card">
        <div class="card-header">
            <h3>2h</h3>
            <h2>Interior Cleaning</h2>
            <h1>₹900</h1>
        </div>
        <ul>
            <li>Vacuuming Seats & Carpets</li>
            <li>Dashboard & Console Cleaning</li>
            <li>AC Vent Dusting</li>
        </ul>
        <a href="wash_booking.html"><button>Book Now</button></a>
    </div>

    <!-- Exterior Cleaning Plan -->
    <div class="card">
        <div class="card-header">
            <h3>2h 30min</h3>
            <h2>Exterior Cleaning</h2>
            <h1>₹1200</h1>
        </div>
        <ul>
            <li>Waterless Surface Wash</li>
            <li>Wax & Shine Polish</li>
            <li>Tyre Shine & Detailing</li>
            <li>Specialist Glass Treatment</li>
        </ul>
        <a href="wash_booking.html"><button>Book Now</button></a>
    </div>

    <!-- Premier Combo Pack -->
    <div class="card">
        <div class="card-header">
            <h3>5h</h3>
            <h2>Premier Combo Pack</h2>
            <h1>₹3000</h1>
        </div>
        <ul>
            <li><strong>Includes Micro, Interior & Exterior Cleaning</strong></li>
            <li>Waterless Complete Car Wash (Body, Glass, Tyres)</li>
            <li>Engine Bay Dusting</li>
            <li>Advanced Wax Coating for Long-lasting Shine</li>
            <li>Complete Glass Protection Treatment</li>
            <li>Complimentary Air Freshener</li>
        </ul>
        <a href="wash_booking.html"><button>Book Now</button></a>
    </div>
</div>
<!--Service Plans Section End-->

<!-- Gallery Section -->
       <div class="text-center mb-4">
        <h2 class="display-4 text-uppercase text-primary custom-title">Car Wash Gallery</h2>
    </div> 
       <div class="gallery">
        <div class="gallery-item">
            <img src="img/carwash_gallery_1.webp" alt="Car washing image">
        </div>
        <div class="gallery-item">
            <img src="img/carwash_gallery_6.jpg" alt="Interior cleaning">
        </div>
        <div class="gallery-item">
            <img src="img/gallery_cleanup.jpeg" alt="Dashboard cleaning">
        </div>
        <div class="gallery-item">
            <img src="img/carwash_gallery_7.jpg" alt="SUV car washing image">
        </div>
        <div class="gallery-item">
            <img src="img/gallery_cleanup_1.png" alt="Wheel cleaning">
        </div>
        <div class="gallery-item">
            <img src="img/gallrey_cleanup_2.jpg" alt="Side mirror cleaning">
        </div>
        <div class="gallery-item">
            <img src="img/carwash_gallery_4.jpg" alt="Dashboard polishing">
        </div>
    </div>
<!-- Gallery Section -->



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





<script >document.addEventListener('DOMContentLoaded', () => {
    const priceRange = document.getElementById('priceRange');
    const priceDisplay = document.getElementById('priceDisplay');
    const carListings = document.getElementById('carListings');

    // Update price display when range slider is adjusted
    priceRange.addEventListener('input', () => {
        priceDisplay.textContent = priceRange.value;
        filterCars();
    });

    // Add event listeners for checkboxes
    document.querySelectorAll('.brand-filter, .seating-filter, .type-filter').forEach(checkbox => {
        checkbox.addEventListener('change', filterCars);
    });

    // Add event listener for search input
    const searchByName = document.getElementById('searchByName');
    searchByName.addEventListener('input', filterCars);

    function filterCars() {
        const maxPrice = parseInt(priceRange.value);
        const selectedBrands = Array.from(document.querySelectorAll('.brand-filter:checked')).map(cb => cb.value);
        const selectedSeatings = Array.from(document.querySelectorAll('.seating-filter:checked')).map(cb => cb.value);
        const selectedTypes = Array.from(document.querySelectorAll('.type-filter:checked')).map(cb => cb.value);
        const searchName = searchByName.value.toLowerCase();

        document.querySelectorAll('.car-item').forEach(carItem => {
            const carPrice = parseInt(carItem.getAttribute('data-price'));
            const carBrand = carItem.getAttribute('data-brand');
            const carSeating = carItem.getAttribute('data-seating');
            const carType = carItem.getAttribute('data-type');
            const carTitle = carItem.querySelector('.card-title').textContent.toLowerCase();

            const matchesBrand = selectedBrands.length === 0 || selectedBrands.includes(carBrand);
            const matchesSeating = selectedSeatings.length === 0 || selectedSeatings.includes(carSeating);
            const matchesType = selectedTypes.length === 0 || selectedTypes.includes(carType);
            const matchesName = searchName === '' || carTitle.includes(searchName);

            const matchesPrice = carPrice <= maxPrice;

            if (matchesBrand && matchesSeating && matchesType && matchesPrice && matchesName) {
                carItem.style.display = '';
            } else {
                carItem.style.display = 'none';
            }
        });
    }
    });
    </script>
    </body>


</html> 