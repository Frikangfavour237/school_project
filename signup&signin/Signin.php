<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aFEED</title>
    <link rel="stylesheet" href="../css/Studsignin.css">
    <link rel="icon" href="../images/logo1.png" type="image/png">

</head>
<body>
<img src="../images/logo.png" alt="aFeed logo">

<div class="container">
        <div class="left">
            <h1>aFeed </h1><br>
            <h2 id="one">Login </h2>
            <h3>Attendance and Feedback System</h3>
            <p>Sign into your account using your valid  email address and correct password!</p>
        </div>
        <div class="right">
        <form action="../authorisation/authenticate.php" method="POST">
                <div class="form-group">
                    <label for="matrix-number">Email</label>
                    <input type="text" id="email" name="email" placeholder="Enter your email address">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                </div>
                <button type="submit">Sign in</button>
                <p><a href="#">Forgot password?</a></p>
            </form>
        </div>
    </div>
</body>
</html>
