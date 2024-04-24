<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="LoginAs">
            <h2>LOGIN AS:</h2>
            <button onclick="showLoginForm('student')">STUDENT</button>
            <button onclick="showLoginForm('organization')">ORGANIZATION</button>
            <button onclick="showLoginForm('faculty')">FACULTY</button>
            <div class="back">
                <a href="hero.php">Back</a>
            </div>
        </div>
        <div class="page">
            <form id="studentLoginForm" class="login-form" action="student_login.php" method="POST">
                <h3>STUDENT LOGIN</h3>
                <p class="login">INSTITUTIONAL EMAIL ADDRESS</p>
                <input type="email" name="email" placeholder="Institutional Email" required>
                <p class="login">PASSWORD</p>
                <input type="password" name="password" placeholder="Password" required>
                <div class="cb-cont">
                    <input type="checkbox" name="remember" id="remember"> <label for="remember">Remember me</label><br>
                </div>
                <input type="submit" value="Log In">
            </form>

            <form id="organizationLoginForm" class="login-form" action="organization_login.php" method="POST">
                <h3>ORGANIZATION LOGIN</h3>
                <p class="login">INSTITUTIONAL EMAIL ADDRESS</p>
                <input type="email" name="email" placeholder="Institutional Email" required>
                <p class="login">PASSWORD</p>
                <input type="password" name="password" placeholder="Password" required>
                <div class="cb-cont">
                    <input type="checkbox" name="remember" id="remember"> <label for="remember">Remember me</label><br>
                </div>
                <input type="submit" value="Log In">
            </form>

            <form id="facultyLoginForm" class="login-form" action="faculty_login.php" method="POST">
                <h3>FACULTY LOGIN</h3>
                <p class="login">INSTITUTIONAL EMAIL ADDRESS</p>
                <input type="email" name="email" placeholder="Institutional Email" required>
                <p class="login">PASSWORD</p>
                <input type="password" name="password" placeholder="Password" required>
                <div class="cb-cont">
                    <input type="checkbox" name="remember" id="remember"> <label for="remember">Remember me</label><br>
                </div>
                <div class="login">
                    <input type="submit" value="Log In">
                    <div class="forgotpass">
                        <a href="#" class="forgot">FORGOT PASSWORD</a>
                        <p class="small">CANT LOG IN?</p>
                        <p class="small2">Contact us at help-desk@msugensan.edi.ph or visit the ICT Office</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="login.js"></script>
</body>
</html>

