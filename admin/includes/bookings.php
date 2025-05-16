<?php
session_start();
include('config.php');

// Fetching data from database
$qry = "select id, fullName, userEmail, fromDate, toDate, description, updationDate from tblbooking";
$run = mysqli_query($con, $qry);
$bookings = [];
if (mysqli_num_rows($run) > 0) {
    while ($row = mysqli_fetch_assoc($run)) {
        $bookings[] = $row;
    }
} else {
    echo "<script>alert('No Records Found');</script>";
}

// Removing Bookings from database
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $qry2 = "DELETE FROM tblbooking WHERE id = '$delete_id'";
    $delete_run = mysqli_query($con, $qry2) or die("Error deleting vehicle: " . mysqli_error($con));
    if ($delete_run) {
        echo "<script>alert('Booking deleted successfully');</script>";
        echo "<script>window.location.href = 'bookings.php';</script>";
    } else {
        echo "<script>alert('Error deleting booking from database: " . mysqli_error($con) . "');</script>";
    }
}

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
                <li><a href="dashboard.php">Dashboard</a></li>
                <li class="dropdown">
                    <a href="#">Vehicles</a>
                    <div class="dropdown-content">
                        <a href="add_vehicle.php">Add Vehicle</a>
                        <a href="manage_vehicle.php">Manage Bookings</a>
                    </div>
                </li>
                <li class="active"><a href="bookings.php">Manage Booking</a></li>
                <li><a href="contactUs.php">Queries</a></li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <h2>Manage Bookings</h2>

            <div class="vehicle-table-container">

                <table class="vehicle-table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Full Name</th>
                            <th>userEmail</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Description</th>
                            <th>Updatation Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bookings as $booking) {
                            echo "
                            <tr>
                                <td>{$booking['id']}</td>
                                <td>{$booking['fullName']}</td>
                                <td>{$booking['userEmail']}</td>
                                <td>{$booking['fromDate']}</td>
                                <td>{$booking['toDate']}</td>
                                <td>{$booking['description']}</td>
                                <td>{$booking['updationDate']}</td>
                                <td>
                                    <a href='?delete_id={$booking['id']}' class='delete-btn'>Cancel Booking</a>   
                                </td>
                            </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>