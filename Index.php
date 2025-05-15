<?php
session_start();

// Database Connection
$con = mysqli_connect("localhost", "root", "", "horizonrental");
if ($con === false) {
?>
    <script>
        alert("<?php echo "ERROR: Could not connect. " . mysqli_connect_error(); ?>");
    </script>
<?php
}

// Fetching data of vehicles from database
$qry = "SELECT id, vehicleName, vehicleCC, seatingCapacity, vehicleType, pricePerDay, vehicleImg FROM tblvehicles";
$run = mysqli_query($con, $qry);
$vehicles = [];
if (mysqli_num_rows($run) > 0) {
    while ($row = mysqli_fetch_assoc($run)) {
        $vehicles[] = $row;
    }
} else {
    echo "<script>alert('No Vehicles Found');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="assets/Logo/Bike.png" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <title>Horizon Rentals</title>
</head>

<body>
    <!-- Page Loader -->
    <div class="page-loader">
        <div class="loader-content">
            <img src="assets/Logo/Bike.png" alt="Horizon Rentals" class="loader-logo">
            <div class="dots"></div>
        </div>
    </div>

    <!-- Navbar Section -->
    <header>
        <a href="#" class="header-logo"><img src="assets/Logo/final-removedbg.png" alt="Horizon Rentals logo" /></a>
        <div id="menu-icon">
            <label class="bar" for="check">
                <input type="checkbox" id="check" />
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
            </label>
        </div>
        <ul class="navbar">
            <li><a href="#">Home</a></li>
            <li><a href="#vehicles">Vehicles</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="includes/contact_faq.php#faq">FAQ's</a></li>
        </ul>
        <a href="includes/sign-in-page.php" class="header-btn">
            <button class="sign-in-btn">Sign In</button>
        </a>
    </header>

    <!-- Home Section -->
    <section class="home" id="home">
        <div class="title-text">
            <h4>Two - Wheelers Rentals</h4>
            <p>Unleash Your Journey !</p>
            <h4>Your Horizon Awaits , Rent Your Ride Today.</h4>
        </div>
        <div class="date-container">
            <form action="" class="search-form">
                <div class="input-box">
                    <span>Location</span>
                    <input type="search" name="city" id="city" placeholder="Search by City" />
                    <div class="city-autocomplete">
                        <div class="city-item"></div>
                    </div>
                </div>
                <div class="input-box">
                    <span>Pick Up Date</span>
                    <input type="date" name="pickup-date" id="pickup-date" />
                </div>
                <div class="input-box">
                    <span>Drop Off Date</span>
                    <input type="date" name="dropoff-date" id="dropoff-date" />
                </div>
                <a href="#vehicles"><div class="search-icon">
                    <div class="search_circle"></div>
                    <div class="search_rectangle"></div>
                </div></a>
            </form>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="features-content">
            <div class="card">
                <div class="card-details">
                    <p class="features-title">💰 Affordable Prices</p>
                    <p class="text-body">Guaranteed Genuine Prices.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-details">
                    <p class="features-title">🌍 Multiple Locations</p>
                    <p class="text-body">Choose a Vehicle Conveniently Located Near You.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-details">
                    <p class="features-title">🔒 Instant & Secure Payments</p>
                    <p class="text-body">Our Payment Partners are Industry Leaders.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-details">
                    <p class="features-title">🏍️ Govt. Compliant Vehicles</p>
                    <p class="text-body">Choose from the Wide Range of Self Drive Vehicles.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-details">
                    <p class="features-title">🔧 24/7 Roadside Assistance</p>
                    <p class="text-body">Never worry about breakdowns with our support team.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Review Section -->
    <section class="review" id="review">
        <div class="review-container">
            <div class="review-title">
                <h2>What Our Customers Says</h2>
            </div>
            <div class="review-content">
                <div class="review-card">
                    <div class="review-card-details">
                        <div class="reviewer-info">
                            <div class="reviewer-img">
                                <img src="assets/Images/person-3.jpg" alt="Sarah J." />
                            </div>
                            <div class="reviewer-name">
                                <p class="review-card-title">Sarah J.</p>
                                <div class="rating">★★★★★</div>
                            </div>
                        </div>
                        <p class="review-card-text">"The service was exceptional! The motorcycle was in perfect
                            condition and the pickup process was smooth. Will definitely rent again on my next trip."
                        </p>
                        <p class="review-location">Mumbai</p>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-details">
                        <div class="reviewer-info">
                            <div class="reviewer-img">
                                <img src="assets/Images/person-2.jpg" alt="Rahul M." />
                            </div>
                            <div class="reviewer-name">
                                <p class="review-card-title">Rahul M.</p>
                                <div class="rating">★★★★☆</div>
                            </div>
                        </div>
                        <p class="review-card-text">"Great experience overall. The scooty was fuel-efficient and perfect
                            for city navigation. Customer support was responsive when I needed help."</p>
                        <p class="review-location">Bangalore</p>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-details">
                        <div class="reviewer-info">
                            <div class="reviewer-img">
                                <img src="assets/Images/person-4.jpg" alt="Priya S." />
                            </div>
                            <div class="reviewer-name">
                                <p class="review-card-title">Priya S.</p>
                                <div class="rating">★★★★★</div>
                            </div>
                        </div>
                        <p class="review-card-text">"The booking process was incredibly simple, and the rental rates
                            were very affordable. The vehicle was clean and well-maintained. Highly recommend!"</p>
                        <p class="review-location">Delhi</p>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card-details">
                        <div class="reviewer-info">
                            <div class="reviewer-img">
                                <img src="assets/Images/person-1.jpg" alt="Aditya K." />
                            </div>
                            <div class="reviewer-name">
                                <p class="review-card-title">Aditya K.</p>
                                <div class="rating">★★★★☆</div>
                            </div>
                        </div>
                        <p class="review-card-text">"Their roadside assistance saved my day when I had a flat tire. They
                            arrived quickly and helped me get back on the road. Really impressed!"</p>
                        <p class="review-location">Pune</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vehicles Section -->
    <section class="vehicles" id="vehicles">
        <div class="vehicles-container">
            <div class="section-title">
                <h2>Our Vehicle Fleet</h2>
                <p>Find the best vehicle for you</p>
            </div>
            <div class="filter-container">
                <div class="filter-btns">
                    <button class="filter-btn active" data-filter="all">All Vehicles</button>
                    <button class="filter-btn" data-filter="motorcycle">Motorcycles</button>
                    <button class="filter-btn" data-filter="scooty">Scooters</button>
                </div>
            </div>
            <div class="vehicles-grid">
                <?php
                foreach ($vehicles as $vehicle) {
                    $dataCategory = ($vehicle['vehicleType'] == 'Auto') ? 'scooty' : 'motorcycle';
                    echo " <div class='vehicle-card' data-category={$dataCategory}>
                                <div class='vehicle-img'>
                                    <img src='admin/includes/images/" . $vehicle['vehicleImg'] . "' alt='Vehicle Image'>
                                </div>
                                <div class='vehicle-info'>
                                    <h3>{$vehicle['vehicleName']}</h3>
                                    <div class='vehicle-specs'>
                                        <span><i class='spec-icon'>🛢️</i> {$vehicle['vehicleCC']} cc</span>
                                        <span><i class='spec-icon'>⚙️</i> {$vehicle['vehicleType']} </span>
                                        <span><i class='spec-icon'>💼</i> {$vehicle['seatingCapacity']} People</span>
                                    </div>
                                    <div class='vehicle-price'>
                                        <span class='price'>₹ {$vehicle['pricePerDay']}</span>/day
                                    </div>
                                    <a href='includes/booking-page.php' class='book-btn'>Book Now</a>
                                </div>
                            </div>
                    ";
                }
                ?>
            </div>
            <div class="show-more-container">
                <button id="show-more-btn" class="show-more-btn">
                    Show More
                </button>
            </div>
        </div>
    </section>

    <!-- Rental Growth Section -->
    <section class="rental-growth" id="rental-growth">
        <div class="rental-growth-container">
            <div class="section-title">
                <h2>Rental Growth</h2>
                <p>Our achievements in numbers</p>
            </div>
            <div class="rental-growth-stats">
                <div class="stat-box">
                    <div class="stat-number" data-target="5490">0</div>
                    <div class="stat-title">Two-Wheelers</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number" data-target="46982">0</div>
                    <div class="stat-title">Happy Customers</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number" data-target="2500000">0</div>
                    <div class="stat-title">KM's Driven</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number" data-target="53">0</div>
                    <div class="stat-title">Total Locations</div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="about" id="about">
        <div class="about-container">
            <div class="about-logo">
                <img src="assets/Logo/final-removedbg.png" alt="Horizon Rentals Logo">
            </div>
            <div class="about-content">
                <div class="section-title about-title">
                    <h2>About Us</h2>
                    <p>Your journey is our passion.</p>
                </div>
                <div class="about-text">
                    <p>Welcome to Horizon Rentals, where we make your travel dreams come true on two wheels. Established
                        in
                        2020, we've grown from a small businness to one of India's most trusted two-wheeler rental
                        service provider.
                    </p>
                    <p>Our mission is simple: provide high-quality, well-maintained vehicles at affordable prices,
                        making exploration accessible to everyone. Whether you're navigating busy city streets or
                        embarking on a cross-country adventure, our diverse fleet has the perfect rides for you.</p>
                </div>
                <div class="show-more-container">
                    <a href="includes/about.php">
                        <button id="show-more-btn" class="show-more-btn">
                            Read More
                        </button>
                    </a>
                </div>
            </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer" id="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <a href="#"><img src="assets/Logo/final-removedbg.png" alt="Horizon Rentals logo" /></a>
            </div>
            <div class="footer-content">
                <div class="footer-box">
                    <h2>Company</h2>
                    <ul>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="includes/contact_faq.php#faq">FAQ's</a></li>
                        <li><a href="includes/contact_faq.php">Contact Us</a></li>
                        <li><a href="#rental-growth">Rental Growth</a></li>
                    </ul>
                </div>
                <div class="footer-box">
                    <h2>Legal</h2>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Use</a></li>
                    </ul>
                </div>
                <div class="footer-box">
                    <h2>Follow Us</h2>
                    <ul>
                        <li><a href="#">X</a></li>
                        <li><a href="#">Youtube</a></li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Instagram</a></li>
                    </ul>
                </div>
                <div class="footer-suggestion">
                    <h2>Suggestions</h2>
                    <form class="suggestion-form">
                        <input type="email" placeholder="Enter your email here" required />
                        <input type="text" placeholder="Any Suggestions ?" required />
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Horizon Rentals. All rights reserved.</p>
                <p>🛠️ Designed & Developed by <span>coder-dev-sys</span>.</p>
                <p></p>
            </div>
        </div>
    </footer>
    <script src="assets/js/script.js"></script>
</body>

</html>