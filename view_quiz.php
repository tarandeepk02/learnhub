<?php
include("includes/config.php");
@session_start();

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
                  <h6 class="text-white text-capitalize ps-3">View Quizzes</h6>
                </div>
                <div class="col-6">
				<?php
				if($_SESSION['srole'] == 'teacher')
				{
				if(!empty($_GET['vcourses']))
				{
				?>
                  <a href="add_quiz.php?vquiz=<?php echo $_GET['vcourses'];?>" class="btn btn-success float-end me-3">Create Quiz</a>
				  <?php
				  }
				  }
				  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
				  
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                    
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Assigned Date</th>
					<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Due Date</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
				<?php
				if(!empty($_GET['vcourses']))
				{
				$query = mysqli_query($d,"select * from quizzes where Course_ID='".$_GET['vcourses']."' ");
				}
				else
				{
				$query = mysqli_query($d,"select * from quizzes where Course_ID in (select Course_ID from courses where User_ID='".$_SESSION['sid']."' ) ");
				}
				while($row = mysqli_fetch_array($query))
				{
				?>
                  <tr>
				  
				  
				  
				  
				  
				  
                    <td><div class="d-flex px-2 py-1">
                        
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?php echo $row['QuizName'];?></h6>
                        
                        </div>
                      </div></td>
                    
                    
                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['AssignedDate'];?></span> </td>
					<td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['DueDate'];?></span> </td>
                    <td class="align-middle">			
					<?php
					if($_SESSION['srole']=='student')
					{
					$qryS = mysqli_query($d,"select * from submissions where Quiz_ID='".$row['Quiz_ID']."' and User_ID='".$_SESSION['sid']."' order by  Submission_ID desc limit 1 ");
					$numS = mysqli_num_rows($qryS);
					if($numS>0)
					{
					$rowS = mysqli_fetch_array($qryS);
					?>
					<a href="quiz_results.php?vresult=<?php echo $rowS['Submission_ID'];?>" class="btn btn-sm btn-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Attempted" style="margin-top:10px;"> Attempted </a>
					<?php
					}
					else
					{
					?>
					<a href="attempt_quiz.php?vquiz=<?php echo $row['Quiz_ID'];?>" class="btn btn-sm btn-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user" style="margin-top:10px;"> Attempt </a>
					<?php
					}
					}
					else
					{
					?>
					
					
					<a href="view_question.php?vquiz=<?php echo $row['Quiz_ID'];?>" class="btn btn-sm btn-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user"> Questions </a>
					<?php
					}
					?>
					
					</td>
                  </tr>
				  <?php
				  }
				  ?>
                  
                </tbody>
              </table>
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
