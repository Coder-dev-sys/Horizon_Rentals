<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/Horizon_Rentals/assets/Logo/Bike.png" />
    <link rel="stylesheet" href="/Horizon_Rentals/assets/css/style.css" />
    <link rel="stylesheet" href="/Horizon_Rentals/assets/css/responsive.css" />
    <title>Horizon Rentals</title>
    <style>
        body {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            align-content: center;
            justify-content: center;
        }

        h1 {
            font-weight: bold;
            margin: 0;
        }

        .form-container h1 {
            color: #212121;
        }

        h2 {
            text-align: center;
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        button {
            border-radius: 20px;
            border: 1px solid #FF4B2B;
            background-color: #FF4B2B;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }

        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        .container {
            background-color: #FFFFFF;
            border-radius: 50px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
            margin: 100px 0 50px;
            box-shadow: 0 0 5px 5px rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body>
    <!-- Page Loader -->
    <div class="page-loader">
        <div class="loader-content">
            <img src="/Horizon_Rentals/assets/Logo/Bike.png" alt="Horizon Rentals" class="loader-logo">
            <div class="dots"></div>
        </div>
    </div>

    <!-- Navbar Section -->
    <header>
        <a href="#" class="header-logo"><img src="/Horizon_Rentals/assets/Logo/final-removedbg.png" alt="Horizon Rentals logo" /></a>
        <div id="menu-icon">
            <label class="bar" for="check">
                <input type="checkbox" id="check" />
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
            </label>
        </div>
        <ul class="navbar">
            <li><a href="/Horizon_Rentals/#">Home</a></li>
            <li><a href="/Horizon_Rentals/#vehicles">Vehicles</a></li>
            <li><a href="/Horizon_Rentals/#about">About Us</a></li>
            <li><a href="/Horizon_Rentals/includes/contact_faq.php#faq">FAQ's</a></li>
        </ul>
    </header>

    <!-- Sign In Section -->
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Create Account</h1>
                <input type="text" placeholder="Username" />
                <input type="text" placeholder="Mobile No." />
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <button>Register</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Login</h1>
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <button>Login</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>Already have an account ?</p>
                    <button class="ghost" id="signIn">Login</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Don't have an account ?</p>
                    <button class="ghost" id="signUp">Register</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/Horizon_Rentals/assets/js/script.js"></script>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>

</html>