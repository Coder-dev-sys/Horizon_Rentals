<?php
session_start();
include('config.php');

// Fetching vehicle data for editing
$vehicle = [];
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $qry = "SELECT id, vehicleName, seatingCapacity, pricePerDay, vehicleCC, vehicleType FROM tblvehicles WHERE id = '$edit_id'";
    $run = mysqli_query($con, $qry);
    if (mysqli_num_rows($run) > 0) {
        $vehicle = mysqli_fetch_assoc($run);
    } else {
        echo "<script>alert('No Vehicle Found'); window.location.href='manage_vehicle.php';</script>";
    }
}

// Updating the Database
if (isset($_POST['update_vehicle'])) {
    $edit_id = $_POST['edit_id'];
    $vehicle_name = $_POST['vehicle-name'];
    $seating_capacity = $_POST['seating'];
    $price_per_day = $_POST['price'];
    $vehicle_cc = $_POST['cc'];
    $vehicle_type = $_POST['vehicle-type'];
    $update_query = "update tblvehicles set vehicleName = '$vehicle_name',seatingCapacity = '$seating_capacity',pricePerDay = '$price_per_day',vehicleCC = '$vehicle_cc',vehicleType = '$vehicle_type' where id = '$edit_id'";
    $update_run = mysqli_query($con, $update_query) or die("Can't update data: " . mysqli_error($con));
    if ($update_run) {
        echo "<script>alert('Vehicle Updated Successfully'); window.location.href='manage_vehicle.php';</script>";
    } else {
        echo "<script>alert('Vehicle Not Updated');</script>";
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
            <h2 style="margin: 20px">Edit Vehicle</h2>

            <form class="add-vehicle-form" method="post" action="edit_vehicle.php" enctype="multipart/form-data">
                <input type="hidden" name="edit_id" value="<?php echo isset($vehicle['id']) ? $vehicle['id'] : ''; ?>">
                <div class="form-section">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="vehicle-name">Vehicle Name</label>
                            <input type="text" id="vehicle-name" name="vehicle-name" value="<?php echo isset($vehicle['vehicleName']) ? $vehicle['vehicleName'] : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="seating">Seating Capacity*</label>
                            <input type="number" id="seating" name="seating" min="1" value="<?php echo isset($vehicle['seatingCapacity']) ? $vehicle['seatingCapacity'] : ''; ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="price">Price Per Day (In RS)*</label>
                            <input type="text" id="price" name="price" pattern="[0-9]+" value="<?php echo isset($vehicle['pricePerDay']) ? $vehicle['pricePerDay'] : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cc">Vehicle's CC*</label>
                            <input type="text" id="cc" name="cc" pattern="[0-9]+" value="<?php echo isset($vehicle['vehicleCC']) ? $vehicle['vehicleCC'] : ''; ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="vehicle-type">Vehicle Type</label>
                            <select id="vehicle-type" name="vehicle-type" required>
                                <option value="Auto" <?php echo (isset($vehicle['vehicleType']) && $vehicle['vehicleType'] == 'Auto') ? 'selected' : ''; ?>>Auto</option>
                                <option value="Manual" <?php echo (isset($vehicle['vehicleType']) && $vehicle['vehicleType'] == 'Manual') ? 'selected' : ''; ?>>Manual</option>
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
                    <button type="submit" class="btn btn-submit" name="update_vehicle">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>