<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="../css/Studsignup.css">
    <link rel="icon" href="../images/logo1.png" type="image/png">

</head>
<body>
    <div class="container">
    <p>
        </p>
        <h2>Administrator signup form</h2>
        <form id="myForm" action="../authorisation/adminsignupval.php" method="POST">
            <div class="form-group">
                <input type="text" id="fullname" placeholder="Enter Full Name" name="fullname" required>
            </div>
           
            <div class="form-group">
                <input type="email" id="email" placeholder="Enter Email Address" name="email" required>
            </div><br>
            <div class="form-group">
                <button type="button" id="togglePassword" onclick="togglePasswordVisibility()">
                <i class="fas fa-eye" id="eyeIcon"></i>
            </button>
                <input type="password" id="password" placeholder="Enter Password" name="password" required>
                
        
            <br><span class="password-hint">Must include at least one uppercase letter, lowercase letter, and number.</span>
            </div>
           
            <button type="submit">Submit</button>
        
        </form>
        <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
        
    </div>
</body>
</html>
