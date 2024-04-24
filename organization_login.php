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
    $org_email = $_POST["email"]; 
    $org_password = $_POST["password"]; 
    
    $sql = "SELECT org_email, org_password FROM organization_login WHERE org_email='$org_email'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['org_password'] == $org_password) {
            header("Location: TBC.php");
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
