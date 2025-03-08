<?php
include("includes/config.php");
@session_start();
if(isset($_POST['submit']))
{
//Insert Records
$qryin = mysqli_query($d,"INSERT INTO quizzes(QuizName, AssignedDate, DueDate, Course_ID) VALUES ('".$_POST['QuizName']."','".$_POST['AssignedDate']."','".$_POST['DueDate']."','".$_GET['vquiz']."') ");

if($qryin)
{
echo '<script>
alert("Quiz has been created successfully!");
window.location.href = "view_quiz.php";
</script>';
}
else
{
echo '<script>
alert("Something went wrong, try again later!");
window.location.href = "add_quiz.php?vquiz=' . $_GET['vquiz'] . '";
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
              <h6 class="text-white text-capitalize ps-3">Add Quiz</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="card card-plain">
              <div class="card-body">
                <form role="form" action="add_quiz.php?vquiz=<?php echo $_GET['vquiz'];?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class=" col-md-6">
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="QuizName" required>
                      </div>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Assigned Date</label>
                        <input type="text" class="form-control" name="AssignedDate">
                      </div>
					  <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Due Date</label>
                        <input type="text" class="form-control" name="DueDate">
                      </div>
                    </div>
                    <div class=" col-md-6"> </div>
                    <div class="col-md-12">
                        <button type="submit" name="submit" value="submit" class="btn btn-lg bg-gradient-dark btn-lg mt-4 mb-0">Submit</button>
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
