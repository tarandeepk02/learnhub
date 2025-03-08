<?php
include("includes/config.php");
@session_start();
if(isset($_POST['submit']))
{
$qryin = mysqli_query($d,"INSERT INTO users(Name, Email, Password, Role, PhoneNo, Address, Major,Status) VALUES ('".$_POST['Name']."','".$_POST['Email']."','".$_POST['Password']."','".$_POST['Role']."','".$_POST['PhoneNo']."','".$_POST['Address']."','".$_POST['Major']."','Inactive')");

if($qryin)
{
echo '<script>
alert("Your account has been created. Please contact administration to activate your profile.");
window.location.href="index.php";
</script>';
}
else
{
echo '<script>
alert("Something went wrong. Please try again later.");
window.location.href="sign-up.php";
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
<!-- Extra details for Live View on GitHub Pages -->
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
<!-- Nucleo Icons -->
<link href="assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- Material Icons -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
<!-- CSS Files -->
<link id="pagestyle" href="assets/css/material-dashboard.min.css?v=3.2.0" rel="stylesheet" />
<!-- Anti-flicker snippet (recommended)  -->
<style>
    .async-hide {
      opacity: 0 !important
    }
  </style>
</head>
<body class="">
<main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('assets/img/illustrations/illustration-signup.jpg'); background-size: cover;"> </div>
          </div>
          <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
            <div class="card card-plain">
              <div class="card-header">
                <h4 class="font-weight-bolder">Sign Up</h4>
                <p class="mb-0">Enter your email and password to register</p>
              </div>
              <div class="card-body">
                <form role="form" method="post" action="sign-up.php">
                  <label class="form-label">I am</label>
                  <div class="input-group input-group-outline mb-3">
                    <select class="form-control Role-s" name="Role">
                      <option value="student">Student</option>
                      <option value="teacher">Teacher</option>
                    </select>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="Name" required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="Email" required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="Password" required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Phone No</label>
                    <input type="text" class="form-control" name="PhoneNo">
                  </div>
				  <label class="form-label">Address</label>
                  <div class="input-group input-group-outline mb-3">
                    
                    <textarea class="form-control" name="Address"></textarea>
                  </div>
				  <div class="major-div" style="display:none;">
				  <label class="form-label">Major</label>
                  <div class="input-group input-group-outline mb-3">
                    
                    <select class="form-control" name="Major">
                      <option value="">--Select--</option>
                      <option value="HTML">HTML</option>
                      <option value="CSS">CSS</option>
                      <option value="Bootstrap">Bootstrap</option>
                      <option value="jQuery">jQuery</option>
                      <option value="PHP">PHP</option>
                      <option value=".NET">.NET</option>
                      <option value="Java">Java</option>
                      <option value="C++">C++</option>
                      <option value="Python">Python</option>
                      <option value="Woman">Woman Studies </option>
					  <option value="Wordpress">Wordpress</option>
                    </select>
                  </div>
				  </div>
                  <div class="text-center">
                    <button type="submit" name="submit" value="submit" class="btn btn-lg bg-gradient-dark btn-lg w-100 mt-4 mb-0">Sign Up</button>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-2 text-sm mx-auto"> Already have an account? <a href="index.php" class="text-primary text-gradient font-weight-bold">Sign in</a> </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
<script src="assets/js/material-dashboard.min.js?v=3.2.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function()
{
$(document).on('change','.Role-s',function()
{
var val = $(this).val();
if(val=='teacher')
{
$('.major-div').css('display','block');
}
else
{
$('.major-div').css('display','none');
}
});
});
</script>
</body>
</html>
