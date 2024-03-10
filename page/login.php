<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/login_register.css">
</head>

<body>
    <h1 class="header">HospiLite - Hospital Management System</h1>
    <div class="container">
        <h1 class="header">Login</h1>
    <form>
        <div class="text_field">
            <input type="email" required>
            <span></span>
            <label>E-mail</label>
        </div>
        <div class="text_field">
            <input type="password" required>
            <span></span>
            <label>Password</label>
        </div>
        <div class="forgot_pass">
            <a href="#">Forgot Password?</a>
        </div>
        <button class="submit-btn">Login</button>
        <div class="signup_link">
            Not a member? <a href="./register.php">Register</a>
        </div>
    </form>
</div>
</body>

</html>
