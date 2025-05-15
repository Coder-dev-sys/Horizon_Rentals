<?php
session_start();
include('config.php');
if (isset($_POST['submit'])) {
    $vehicle_name = $_POST['vehicle-name'];
    $seating_capacity = $_POST['seating'];
    $price_per_day = $_POST['price'];
    $vehicle_cc = $_POST['cc'];
    $vehicle_type = $_POST['vehicle-type'];
    $vehicle_img = $_FILES['vehicle-image']['name'];
    $query = "insert into tblvehicles(vehicleName,seatingCapacity,pricePerDay,vehicleCC,vehicleType,vehicleImg) values('$vehicle_name','$seating_capacity','$price_per_day','$vehicle_cc','$vehicle_type','$vehicle_img')";
    $file_name = $_FILES['vehicle-image']['name'];
    $folder = "images/" . $file_name;
    move_uploaded_file($_FILES['vehicle-image']['tmp_name'], $folder);
    $run = mysqli_query($con, $query) or die("Can't insert data into database" . mysqli_error($con));
    if ($run) {
        echo "<script>alert('Vehicle Added Successfully');</script>";
    } else {
        echo "<script>alert('Vehicle Not Added');</script>";
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
            <h2 style="margin: 20px">Add Vehicle</h2>

            <form class="add-vehicle-form" method="post" action="add_vehicle.php" enctype="multipart/form-data">
                <div class="form-section">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="vehicle-name">Vehicle Name</label>
                            <input type="text" id="vehicle-name" name="vehicle-name" required>
                        </div>
                        <div class="form-group">
                            <label for="seating">Seating Capacity*</label>
                            <input type="number" id="seating" name="seating" min="1" max="3" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="price">Price Per Day (In RS)*</label>
                            <input type="text" id="price" name="price" patttern="[0-9]" required>
                        </div>
                        <div class="form-group">
                            <label for="cc">Vehicle's CC*</label>
                            <input type="text" id="cc" name="cc" patttern="[0-9]" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="vehicle-type">Vehicle Type</label>
                            <select id="vehicle-type" name="vehicle-type" required>
                                <option value="Auto">Auto</option>
                                <option value="Manual">Manual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="up_date">Upload Date (Optional)</label>
                            <input type="text" id="up_date">
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3>Upload Vehicle Image*</h3>
                    <div class="image-upload">
                        <input type="file" id="vehicle-image" accept="image/*" name="vehicle-image" required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="reset" class="btn btn-cancel">Cancel</button>
                    <button type="submit" class="btn btn-submit" name="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>