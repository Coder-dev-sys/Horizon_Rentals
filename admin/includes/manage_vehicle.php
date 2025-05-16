<?php
session_start();
include('config.php');

// Function to safely delete a file
function deleteFile($filePath)
{
    if (file_exists($filePath) && is_file($filePath)) {
        unlink($filePath);
        return true;
    }
    return false;
}

// Fetching data from database
$qry = "select id, vehicleName, vehicleCC, vehicleType, pricePerDay from tblvehicles";
$run = mysqli_query($con, $qry);
$vehicles = [];
if (mysqli_num_rows($run) > 0) {
    while ($row = mysqli_fetch_assoc($run)) {
        $vehicles[] = $row;
    }
} else {
    echo "<script>alert('No Vehicles Found');</script>";
}

// Delete data from database
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // First, get the image filename from the database
    $img_qry = "SELECT vehicleImg FROM tblvehicles WHERE id = '$delete_id'";
    $img_run = mysqli_query($con, $img_qry);
    if ($img_row = mysqli_fetch_assoc($img_run)) {
        $image_filename = $img_row['vehicleImg'];
        $image_path = "images/" . $image_filename;

        // Now, delete the database record
        $qry2 = "DELETE FROM tblvehicles WHERE id = '$delete_id'";
        $delete_run = mysqli_query($con, $qry2) or die("Error deleting vehicle: " . mysqli_error($con));

        if ($delete_run) {
            if (deleteFile($image_path)) {
                echo "<script>alert('Vehicle and associated image deleted successfully');</script>";
            } else {
                echo "<script>alert('Vehicle deleted from database, but error deleting image');</script>";
            }
            echo "<script>window.location.href = 'manage_vehicle.php';</script>";
        } else {
            echo "<script>alert('Error deleting vehicle from database: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('Vehicle not found!'); window.location.href = 'manage_vehicle.php';</script>";
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
                <li class="dropdown active">
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
            <h2>Manage Vehicles</h2>

            <div class="vehicle-table-container">

                <table class="vehicle-table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle's CC</th>
                            <th>Vehicle Type</th>
                            <th>Price Per Day</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vehicles as $vehicle) {
                            echo "
                            <tr>
                                <td>{$vehicle['id']}</td>
                                <td>{$vehicle['vehicleName']}</td>
                                <td>{$vehicle['vehicleCC']}</td>
                                <td>{$vehicle['vehicleType']}</td>
                                <td>{$vehicle['pricePerDay']}</td>
                                <td>
                                    <a href='edit_vehicle.php?edit_id={$vehicle['id']}' class='edit-button'>Edit</a>
                                    <a href='?delete_id={$vehicle['id']}' class='delete-btn'>Delete</a>   
                                </td>
                            </tr>
                            ";
                        }
                        ?>
                    </tbody>
                    <style>
                        .edit-button {
                            padding: 6px 12px;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                            font-weight: 500;
                            margin-right: 5px;
                            text-decoration: none;
                            background-color: #3498db;
                            color: white;
                        }

                        .edit-button:hover {
                            background-color: #2980b9;
                        }
                    </style>
                </table>
            </div>
        </div>
    </div>
</body>

</html>