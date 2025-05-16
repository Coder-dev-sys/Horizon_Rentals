<?php
session_start();
include('includes/config.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $run = mysqli_query($con, $sql);
    $rows = mysqli_affected_rows($con);
    if ($rows > 0) {
        $_SESSION['alogin'] = $username;
        echo "<script type='text/javascript'> document.location = 'includes/dashboard.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/Horizon_Rentals/assets/Logo/Bike.png" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Horizon Rentals | Admin Panel</title>
</head>

<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="#" method="post">
            <label for="username">Username</label>
            <input type="text" id="text" name="username" placeholder="Your Username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>

</html>