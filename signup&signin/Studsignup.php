<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/Studsignup.css">
    <link rel="icon" href="../images/logo.png" type="image/png">
</head>
<body>
    <div class="container">
        <div class="one">
            <img src="../images/logo.png" alt="">
            <p><a href="../home/index.php" class="homepage">Homepage</a></p>
        </div>
        <h2>Student signup form</h2>
        <form id="myForm" action="../authorisation/signupval.php" method="POST">
            <div class="form-group">
                <input type="text" id="fullname" placeholder="Enter Full Name here" name="fullname" required>
            </div>
            <div class="form-group">
                <input type="text" id="username" placeholder="Enter username here" name="username" required>
            </div>
            <div class="form-group">
                <input type="text" id="batch" placeholder="Enter batch or class here" name="batch" required>
            </div>
            <div class="form-group">
                <input type="text" id="gender" placeholder="Gender" name="gender" required>
            </div>
            <div class="form-group">
                <input type="email" id="email" placeholder="Enter Email Address" name="email" required>
            </div><br>
            <div class="form-group">
                <input type="password" id="password" placeholder="Enter Password" name="password" required>
                
        
            <br><span class="password-hint">Must include at least one uppercase letter, lowercase letter, and number.</span>
            </div>
           
            <button type="submit">Submit</button>
            <p>Already have an account? 
                <a href="Signin.php">Sign in</a>
            </p>
        </form>
        <script>
        
    </div>
</body>
</html>
