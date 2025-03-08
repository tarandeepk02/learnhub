<?php
include("includes/config.php");
@session_start();
if(isset($_POST['submit']))
{
$qry = mysqli_query($d,"select User_ID, Name, Email, Role from users where Email='".$_POST['email']."' and Password='".$_POST['password']."' and Status='Active' ");
$num = mysqli_num_rows($qry);

if($num>0)
{
$row = mysqli_fetch_array($qry);
$_SESSION['sid'] = $row['User_ID'];
$_SESSION['sname'] = $row['Name'];
$_SESSION['semail'] = $row['Email'];
$_SESSION['srole'] = $row['Role'];

if($row['Role']=='teacher')
{
echo '<script>
window.location.href="profile.php";
</script>';
}
else if($row['Role']=='admin')
{
echo '<script>
window.location.href="profile.php";
</script>';
}
else
{
echo '<script>
window.location.href="dashboard.php";
</script>';
}



}
else
{
echo '<script>
alert("Email/Password is incorrect");
window.location.href="index.php";
</script>';
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/fav.png">
<link rel="icon" type="image/png" href="assets/img/fav.png">
<title>Learn Hub :: Unlock Knowledge!</title>
<!--Fonts and icons-->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
<!-- Nucleo Icons -->
<link href="assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- Material Icons -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
<!-- CSS Files -->
<link id="pagestyle" href="assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
</head>
<body class="bg-gray-200">
<main class="main-content  mt-0">
  <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');"> <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-2 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-1"><img src="assets/img/logo.png" width="250"></h4>
                
              </div>
            </div>
            <div class="card-body">
              <form role="form" class="text-start" action="index.php" method="post">
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" name="email">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <div class="form-check form-switch d-flex align-items-center mb-3">
                  <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                  <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                </div>
                <div class="text-center">
                  <button type="submit" name="submit" value="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign in</button>
                </div>
                <p class="mt-4 text-sm text-center"> Don't have an account? <a href="sign-up.php" class="text-primary text-gradient font-weight-bold">Sign up</a> </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!--   Core JS Files   -->
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.min.js?v=3.2.0"></script>
</body>
</html>
