<?php
// Database connection details
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Your database username
$password = "root"; // Your database password
$database = "msuone"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check which form was submitted and process accordingly
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if it's a student login
    if (isset($_POST['student_login'])) {
        $email = sanitize_input($_POST['email']);
        $password = sanitize_input($_POST['password']);
        
        // SQL query to check if student credentials are valid
        $sql = "SELECT * FROM students WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Student login successful
            // Redirect or perform any other action here
            echo "Student login successful";
        } else {
            // Student login failed
            // Redirect back to login page or display error message
            echo "Invalid student credentials";
        }
    }
    // Check if it's an organization login
    elseif (isset($_POST['organization_login'])) {
        $email = sanitize_input($_POST['email']);
        $password = sanitize_input($_POST['password']);
        
        // SQL query to check if organization credentials are valid
        $sql = "SELECT * FROM organizations WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Organization login successful
            // Redirect or perform any other action here
            echo "Organization login successful";
        } else {
            // Organization login failed
            // Redirect back to login page or display error message
            echo "Invalid organization credentials";
        }
    }
    // Check if it's a faculty login
    elseif (isset($_POST['faculty_login'])) {
        $email = sanitize_input($_POST['email']);
        $password = sanitize_input($_POST['password']);
        
        // SQL query to check if faculty credentials are valid
        $sql = "SELECT * FROM faculty WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Faculty login successful
            // Redirect or perform any other action here
            echo "Faculty login successful";
        } else {
            // Faculty login failed
            // Redirect back to login page or display error message
            echo "Invalid faculty credentials";
        }
    }
}

// Close database connection
$conn->close();
?>
