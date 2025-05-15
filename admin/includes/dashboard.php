<?php
session_start();
include('config.php');

// Total Vehicles
$qry = "select id from tblvehicles";
$run = mysqli_query($con, $qry);
$total_vehicles = mysqli_num_rows($run);

// Total Bookings
$qry2 = "select id from tblbooking";
$run = mysqli_query($con, $qry2);
$total_bookings = mysqli_num_rows($run);

// Total Queries
$qry3 = "select id from tblcontactus";
$run = mysqli_query($con, $qry3);
$total_queries = mysqli_num_rows($run);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Horizon_Rentals/admin/assets/css/dashboard_style.css" />
    <title>Horizon Rentals | Admin Panel</title>
</head>

<body>
    <!-- Top Navigation -->
    <nav class="top-nav">
        <h1>Horizon Rental | Admin Panel</h1>
        <a href="logout.php" class="logout-btn">Logout</a>
    </nav>

    <div class="container">
        <!-- Sidebar Navigation -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h3>MAIN</h3>
            </div>
            <ul class="nav-links">
                <li class="active"><a href="dashboard.php">Dashboard</a></li>
                <li class="dropdown">
                    <a href="#">Vehicles</a>
                    <div class="dropdown-content">
                        <a href="add_vehicle.php">Add Vehicle</a>
                        <a href="manage_vehicle.php">Manage Vehicles</a>
                    </div>
                </li>
                <li><a href="bookings.php">Manage Booking</a></li>
                <li><a href="contactUs.php">Queries</a></li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <!-- Dashboard Content -->
            <div class="dashboard">
                <h2>Dashboard</h2>

                <div class="stats-grid">
                    <!-- <div class="stat-card blue">
                        <div class="stat-value">4</div>
                        <div class="stat-label">REG USERS</div>
                        <a href="reg_users.php" class="detail-link">FULL DETAIL →</a>
                    </div> -->

                    <div class="stat-card green">
                        <div class="stat-value"><?php echo $total_vehicles; ?></div>
                        <div class="stat-label">LISTED VEHICLES</div>
                        <a href="manage_vehicle.php" class="detail-link">FULL DETAIL →</a>
                    </div>

                    <div class="stat-card cyan">
                        <div class="stat-value"><?php echo $total_bookings; ?></div>
                        <div class="stat-label">TOTAL BOOKINGS</div>
                        <a href="bookings.php" class="detail-link">FULL DETAIL →</a>
                    </div>

                    <div class="stat-card orange">
                        <div class="stat-value"><?php echo $total_queries; ?></div>
                        <div class="stat-label">QUERIES</div>
                        <a href="contactUs.php" class="detail-link">FULL DETAIL →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>