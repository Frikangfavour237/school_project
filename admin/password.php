<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="bg-dark">
<section class="bg-dark py-3 py-md-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <a href="#!" class="logo" style="color: #1e2130; font-size: 3.5rem; text-decoration: none; font-weight: bold;">
                D-cars
              </a>
            </div>
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter your email address and we will send you a link to reset your password</h2>
            <form action="#!">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                    <label for="email" class="form-label">Email</label>
                  </div>
                </div>
                
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button style="background-color:#1e2130; border:1px solid #1e2130;" class="btn btn-secondary btn-lg" type="submit">Reset password</button>
                  </div>
                </div>
                <div class="col-12">
                  <p class="m-0 text-secondary text-center">Don't have an account? <a href="register.php" class="link-primary text-decoration-none">Sign up</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>