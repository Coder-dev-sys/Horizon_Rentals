<?php
// Establish database connection.
$con = mysqli_connect("localhost", "root", "", "horizonrental");

// Checking connection
if ($con === false) {
?>
    <script>
        alert("<?php echo "ERROR: Could not connect. " . mysqli_connect_error(); ?>");
    </script>
<?php
}

?>