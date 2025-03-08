<?php
include("includes/config.php");
@session_start();
$qryse = mysqli_query($d,"select * from users where User_ID='".$_SESSION['sid']."' ");
$rowse = mysqli_fetch_array($qryse);
if(isset($_POST['submit']))
{
if($_POST['newPassword']!=$_POST['confirmNewPassword'])
{
echo '<script>
alert("Password and confirm password does not match!");
window.location.href = "password.php";
</script>';
}
else if($_POST['oldPassword']!=$rowse['Password'])
{
echo '<script>
alert("Old Password does not match!");
window.location.href = "password.php";
</script>';
}
else
{
}
$qryupt = mysqli_query($d,"update users set Password='".$_POST['newPassword']."' where User_ID = '".$_SESSION['sid']."' ");

if($qryupt)
{
echo '<script>
alert("Your password has been updated successfully!");
window.location.href = "password.php";
</script>';
}
else
{
echo '<script>
alert("Something went wrong, try again later!");
window.location.href = "password.php";
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
<link id="pagestyle" href="assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
<style>
hr
{
border-top:1px solid!important;
}
</style>
</head>
<body class="g-sidenav-show  bg-gray-100">
<?php
include('includes/sidebar.php');
?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <?php
include('includes/header.php');
?>
  <div class="container-fluid py-2">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Change Password</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="card card-plain">
              <div class="card-body">
                <form role="form" action="password.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class=" col-md-6">
					<label class="form-label">Old Password</label>
                      <div class="input-group input-group-static mb-3">
                        
                        <input type="password" class="form-control" name="oldPassword" required>
                      </div>
					  <label class="form-label">New Password</label>
                      <div class="input-group input-group-static mb-3">
                        
                        <input type="password" class="form-control" name="newPassword" required>
                      </div>
					  <label class="form-label">Confirm New Password</label>
                      <div class="input-group input-group-static mb-3">
                        
                        <input type="password" class="form-control" name="confirmNewPassword" required>
                      </div>                      
                    </div>
                    <div class=" col-md-6"> </div>
                    <div class="col-md-12">
                      <button type="submit" name="submit" value="submit" class="btn btn-lg bg-gradient-dark btn-lg mt-4 mb-0">Update Password</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
include('includes/footer.php');
?>
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
