<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aFEED</title>
    <link rel="stylesheet" href="../css/choice.css">
    <link rel="icon" href="../images/logo1.png" type="image/png">

</head>
<body>
    
    <div class="container">
        <h1>
            <a href="../home/index.php">Homepage</a>
        </h1>
        <div class="logo">
            <img src="../images/logo.png" alt="logo">
        </div>
        <h1>Join as a Student or an Admin</h1>

        <div class="role-options">
            <div class="option client">
                <div class="icon">
                    <img src="../images/1.jpg" alt="Client Icon">
                </div>
                <p>I'm a Student</p>
            </div>
            <div class="option freelancer active">
                <div class="icon">
                    <img src="../images/2.jpg" alt="Freelancer Icon">
                </div>
                <p>I'm an Administrator</p>
            </div>
        </div>

        <button class="button" id="applyButton">Sign in</button>

    </div>

    <script>
        const clientOption = document.querySelector('.option.client');
const freelancerOption = document.querySelector('.option.freelancer');
const applyButton = document.getElementById('applyButton');

// Add event listeners for role selection
clientOption.addEventListener('click', () => {
    clientOption.classList.add('active');
    freelancerOption.classList.remove('active');
    applyButton.textContent = 'I am a Student';
});

freelancerOption.addEventListener('click', () => {
    freelancerOption.classList.add('active');
    clientOption.classList.remove('active');
    applyButton.textContent = 'I am an Admin';
});

// Add event listener for the apply button
applyButton.addEventListener('click', () => {
    // Redirect to the appropriate signup page based on the selected role
    if (freelancerOption.classList.contains('active')) {
        window.location.href = 'Signin.php';
    } else {

        window.location.href = 'Studsignup.php';
    }
});

    </script>
</body>
</html>
