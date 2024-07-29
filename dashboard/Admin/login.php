<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BrighterDays Admin Dashboard</title>
    
    
    
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/png">
  <link rel="stylesheet" href="../dist/assets/compiled/css/app.css">
  <link rel="stylesheet" href="../dist/assets/compiled/css/app-dark.css">
  <link rel="stylesheet" href="../dist/assets/compiled/css/auth.css">
</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-8 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.html"><img src="../assets/images/_.jpeg" alt="Logo"></a>
            </div>
            <h1 class="auth-title">Log in.</h1>
            <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

            <form action="php/login.php" method="post">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Username"  name="username" required>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Password"  name="password" required>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
            </form>
           
        </div>
    </div>
    <div class="col-lg-4 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
    <script type="text/javascript">
   <?php if($_GET['msg'] == 'error'):?>
    alert('Login failed, please try again');

    <?php endif;?>

    <?php if($_GET['msg'] == 'login'):?>
    alert('please login to access the dashboard');

    <?php endif;?>
        
    </script>
</body>

</html>