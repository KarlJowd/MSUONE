<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "final";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fac_email = $_POST["email"]; 
    $fac_password = $_POST["password"]; 
    
    $sql = "SELECT fac_email, fac_password FROM faculty_login WHERE fac_email='$fac_email'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['fac_password'] == $fac_password) {
            header("Location: fac_dashboard.php");
            exit();
        } else {
            header("Location: login.php?error=password");
            exit();
        }
    } else {
        header("Location: login.php?error=email");
        exit();
    }
}
else {
    header("Location: hero.php");
    exit();
}

mysqli_close($conn);
?>
