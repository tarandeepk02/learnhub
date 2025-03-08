<?php
include("includes/config.php");
@session_start();
if(!empty($_POST))
{
$check_list = $_POST['check_list'];
foreach($check_list as $check)
{
//Casecade Delete
$qrydel = mysqli_query($d,"delete from questions where Question_ID='".$check."' ")or die(mysqli_error($d));
}

if($qrydel)
{
echo '<script>
alert("Record has been deleted successfully!");
window.location.href="view_question.php?vquiz=' . $_GET['vquiz'] . '";
</script>';
}
else
{
echo '<script>
alert("Something went wrong, try again later!");
window.location.href="view_question.php?vquiz=' . $_GET['vquiz'] . '";
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
              <div class="row">
                <div class="col-6">
                  <h6 class="text-white text-capitalize ps-3">View Questions</h6>
                </div>
                <div class="col-6">
				
				<!--<a href="view_question.php?del=<?php echo $row['Question_ID'];?>&vquiz=<?php echo $_GET['vquiz'];?>" class="btn btn-sm btn-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user" onClick="return confirm('Are you sure? ');"> Delete Question</a>-->
				
				<a href="javascript:;" class="btn btn-sm btn-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user" onClick="deleteQuestion();"> Delete Question</a>
				
				
				
                  <a href="add_question.php?vquiz=<?php echo $_GET['vquiz'];?>" class="btn btn-success float-end me-3">Add Question</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
			<form method="post" class="my-form" action="view_question.php?vquiz=<?php echo $_GET['vquiz'];?>">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
				  <th class="text-secondary opacity-7"></th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Question</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Correct Answer</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
				
				
				$query = mysqli_query($d,"select * from questions where Quiz_ID='".$_GET['vquiz']."' ");
				
				
				while($row = mysqli_fetch_array($query))
				{
				?>
                  <tr>
				  <td class="align-middle"><input type="checkbox" name="check_list[]" value="<?php echo $row['Question_ID'];?>"></td>
                    <td><div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?php echo $row['QuestionText'];?></h6>
                        </div>
                      </div></td>
                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['CorrectAnswer'];?></span> </td>
                    
                  </tr>
                  <?php
				  }
				  ?>
                </tbody>
              </table>
			  </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
function deleteQuestion()
{
if(confirm('Are you sure? '))
{
$('.my-form').submit();
}
}
</script>
</body>
</html>
