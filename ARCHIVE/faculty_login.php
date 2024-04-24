<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "final";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fac_email = $_POST["email"]; // Change from fac_email to email
    $fac_password = $_POST["password"]; // Change from fac_password to password
    
    $sql = "SELECT fac_email, fac_password FROM faculty_login WHERE fac_email='$fac_email'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        // Email exists in the database
        $row = mysqli_fetch_assoc($result);
        if ($row['fac_password'] == $fac_password) {
            // Password matches, redirect to dashboard
            header("Location: fac_dashboard.php");
            exit();
        } else {
            // Password is incorrect
            header("Location: login.php?error=password");
            exit();
        }
    } else {
        // Email doesn't exist in the database
        header("Location: login.php?error=email");
        exit();
    }
}
else {
    // Redirect to hero.php if accessed directly without POST request
    header("Location: hero.php");
    exit();
}

mysqli_close($conn);
?>
