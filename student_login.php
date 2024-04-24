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
    $stud_email = $_POST["email"]; 
    $stud_password = $_POST["password"]; 
    
    $sql = "SELECT stud_email, stud_password FROM student_login WHERE stud_email='$stud_email'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['stud_password'] == $stud_password) {
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
