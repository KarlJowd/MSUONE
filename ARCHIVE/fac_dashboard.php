<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fac_dashb.css">
    <title>Faculty Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<body>
    <div class="container">
        <h2>List of Accounts</h2>
        <div class="btn-group">
            <a href="create_acc.php" class="btn btn-primary" role="button">Add New Account</a>
            <a href='login.php' class='btn btn-danger' role="button">Log Out</a>
        </div>
        <table class="List table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
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
                $sql = "SELECT s.stud_id as student_id, s.stud_fname as student_fname, s.stud_lname as student_lname, s.stud_email as student_email, s.Type as student_Type, 'Student' as Type 
                FROM student_login s 
                UNION ALL
                SELECT o.org_id as organization_id, o.org_fname as organization_fname, o.org_lname as organization_lname, o.org_email as organization_email, o.Type as organization_type, 'Organization' as Type 
                FROM organization_login o 
                UNION ALL
                SELECT f.fac_id as faculty_id, f.fac_fname as faculty_fname, f.fac_lname as faculty_lname, f.fac_email as faculty_email, f.type as student_type, 'Faculty' as Type 
                FROM faculty_login f";

                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die("Invalid Query: " . mysqli_error($conn));
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                        <td>{$row['student_id']}</td>
                        <td>{$row['student_fname']}</td>
                        <td>{$row['student_lname']}</td>
                        <td>{$row['student_email']}</td>
                        <td>{$row['Type']}</td>
                        <td> 
                            <a href='create_acc.php' class='btn btn-primary btn-sm'>Edit</a> 
                            <a href='delete_acc.php' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>
                    ";
                }                

                mysqli_close($conn); // Close the connection
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>