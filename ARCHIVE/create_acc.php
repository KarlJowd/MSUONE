<?php
$fname = "";
$lname = "";
$email = "";
$password = "";
$type = "";
$student_id = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $type = $_POST["type"];
    $student_id = $_POST["student_id"];

    // Validate form data
    if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($type) || ($type == 'student' && empty($student_id))) {
        $errorMessage = "All fields are required";
    } else {
        // Database connection parameters
        $servername = "localhost";
        $username = "root"; // Change to your database username
        $dbpassword = ""; // Change to your database password
        $dbname = "final"; // Change to your database name

        // Create connection
        $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare SQL statement
        $sql = "";
        if ($type == 'student') {
            $sql = "INSERT INTO student_login (stud_id, stud_fname, stud_lname, stud_email, stud_password, type) ";
            $sql .= "VALUES ('$student_id', '$fname', '$lname', '$email', '$password', '$type')";
        } elseif ($type == 'organization') {
            $sql = "INSERT INTO organization_login (org_id, org_fname, org_lname, org_email, org_password, type) ";
            $sql .= "VALUES ('$student_id', '$fname', '$lname', '$email', '$password', '$type')";
        } elseif ($type == 'faculty') {
            $sql = "INSERT INTO faculty_login (fac_id, fac_fname, fac_lname, fac_email, fac_password, type) ";
            $sql .= "VALUES ('$student_id', '$fname', '$lname', '$email', '$password', '$type')";
        }
        // Execute SQL statement
        if (mysqli_query($conn, $sql)) {
            $successMessage = "Record added successfully";
        } else {
            $errorMessage = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>New Account</h2>

        <?php
        if (!empty($errorMessage)){
            echo "<div class='alert alert-danger' role='alert'>$errorMessage</div>";
        }
        ?>

        <form action="" method="post">
            <div class="row mb-3">
                <label for="fname" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?php echo $fname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="lname" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?php echo $lname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Institutional Email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="student_id" class="col-sm-3 col-form-label">Numeric ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Numeric ID" value="<?php echo $student_id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="type" class="col-sm-3 col-form-label">Account Type</label>
                <div class="col-sm-6">
                    <select class="form-select" id="type" name="type">
                        <option value="student">Student</option>
                        <option value="organization">Organization</option>
                        <option value="faculty">Faculty</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                <a href="fac_dashboard.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>
            </div>
        </form>

        <?php
        if (!empty($successMessage)){
            echo "<div class='alert alert-success' role='alert'>$successMessage</div>";
        }
        ?>
    </div>
</body>
</html>
