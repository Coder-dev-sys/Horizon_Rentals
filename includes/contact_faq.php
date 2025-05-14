<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/demo-web-1/assets/Logo/Bike.png" />
    <link rel="stylesheet" href="/demo-web-1/assets/css/style.css" />
    <link rel="stylesheet" href="/demo-web-1/assets/css/responsive.css" />
    <title>Horizon Rentals</title>
</head>

<body>
    <!-- Page Loader -->
    <div class="page-loader">
        <div class="loader-content">
            <img src="/demo-web-1/assets/Logo/Bike.png" alt="Horizon Rentals" class="loader-logo">
            <div class="dots"></div>
        </div>
    </div>

    <!-- Navbar Section -->
    <header>
        <a href="#" class="header-logo"><img src="/demo-web-1/assets/Logo/final-removedbg.png" alt="Horizon Rentals logo" /></a>
        <div id="menu-icon">
            <label class="bar" for="check">
                <input type="checkbox" id="check" />
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
            </label>
        </div>
        <ul class="navbar">
            <li><a href="/demo-web-1/#">Home</a></li>
            <li><a href="/demo-web-1/#vehicles">Vehicles</a></li>
            <li><a href="/demo-web-1/#about">About Us</a></li>
            <li><a href="#faq">FAQ's</a></li>
        </ul>
    </header>

    <!-- Contact Us Section -->
    <section class="nz-contact" id="contact_us">
        <div class="nz-contact-container">
            <div class="nz-contact-card">
                <div class="nz-contact-form-container">
                    <h2 class="nz-contact-title">Contact Us</h2>
                    <form id="contactForm" class="nz-contact-form">
                        <div class="nz-form-row">
                            <div class="nz-form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" id="firstName" class="nz-form-control" placeholder="First Name">
                            </div>
                            <div class="nz-form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" id="lastName" class="nz-form-control" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="nz-form-row">
                            <div class="nz-form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="nz-form-control"
                                    placeholder="example@company.com">
                            </div>
                            <div class="nz-form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" class="nz-form-control" placeholder="+1 (XXX) XXX-XXXX">
                            </div>
                        </div>
                        <div class="nz-form-group nz-textarea-group">
                            <label for="message">What's your reason for contacting us?</label>
                            <textarea id="message" class="nz-form-control" placeholder="Type your message here..."
                                rows="5"></textarea>
                        </div>
                        <button type="submit" class="nz-submit-btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="nz-faq" id="faq">
        <div class="nz-faq-container">
            <h2 class="nz-faq-title">FAQ's</h2>
            <div class="nz-faq-list">
                <details class="nz-faq-item">
                    <summary class="nz-faq-question">
                        What documents are required to rent a vehicle?
                    </summary>
                    <div class="nz-faq-answer">
                        You'll need a valid driving license and one government-issued ID (like Aadhar or PAN card).
                    </div>
                </details>

                <details class="nz-faq-item">
                    <summary class="nz-faq-question">
                        Is there a security deposit?
                    </summary>
                    <div class="nz-faq-answer">
                        Yes, we charge a small refundable security deposit depending on the vehicle type.
                    </div>
                </details>

                <details class="nz-faq-item">
                    <summary class="nz-faq-question">
                        Can I rent a vehicle without a helmet?
                    </summary>
                    <div class="nz-faq-answer">
                        No. Helmets are mandatory by law and we provide one with every rental for your safety.
                    </div>
                </details>

                <details class="nz-faq-item">
                    <summary class="nz-faq-question">
                        Is fuel included in the rental price?
                    </summary>
                    <div class="nz-faq-answer">
                        No, fuel costs are to be borne by the rider. Vehicles come with minimal fuel to reach the
                        nearest station.
                    </div>
                </details>
            </div>
        </div>
    </section>

    </section>

    <script src="/demo-web-1/assets/js/script.js"></script>
</body>

</html>