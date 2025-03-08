<?php
include("includes/config.php");
@session_start();
if(!empty($_POST['submit_feedback']))
{

$qryin = mysqli_query($d,"insert into submissiondetails (Comment,Submission_ID) values ('".$_POST['Comment']."','".$_POST['Submission_ID']."') ")or die(mysqli_error($d));

if($qryin)
{
echo '<script>
alert("Feedback has been submitted successfully!");
window.location.href="view_result.php?squiz=' . $_GET['squiz'] . '";
</script>';
}
else
{
echo '<script>
alert("Something went wrong, try again later!");
window.location.href="view_result.php?squiz=' . $_GET['squiz'] . '";
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
                  <h6 class="text-white text-capitalize ps-3">View Submissions</h6>
                </div>
                <div class="col-6"> </div>
              </div>
            </div>
          </div>
          <div class="card card-plain px-0 pb-2">
            <div class="card-body">
              <form role="form" action="view_result.php" method="get">
                <div class="row">
                  <div class=" col-md-6">
                    <div class="input-group input-group-static mb-3">
                      <label for="exampleFormControlSelect1" class="ms-0">Quiz</label>
                      <select class="form-control" name="squiz">
                        <option value="">--Select--</option>
                        <?php
		  $qryse = mysqli_query($d,"SELECT * 
										FROM quizzes 
										WHERE Quiz_ID IN (
											SELECT Quiz_ID 
											FROM submissions 
											GROUP BY Quiz_ID
										) 
										AND Course_ID IN (
											SELECT Course_ID 
											FROM courses 
											WHERE User_ID = '".$_SESSION['sid']."'
										)");
		  while($rowse = mysqli_fetch_array($qryse))
		  {
		  ?>
                        <option value="<?php echo $rowse['Quiz_ID'];?>" <?php if(!empty($_GET['squiz']) && $_GET['squiz']==$rowse['Quiz_ID']) { ?> selected="selected" <?php }?>><?php echo $rowse['QuizName'];?></option>
                        <?php
		  }
		  ?>
                      </select>
                    </div>
                  </div>
                  <div class=" col-md-6">
                    <div class="text-center">
                      <button type="submit" value="submit" class="btn btn-lg bg-gradient-dark btn-lg w-100 mt-4 mb-0">Find</button>
                    </div>
                  </div>
                </div>
              </form>
			  <?php
			  if(!empty($_GET['squiz']))
			  {
			  ?>
              <div class="table-responsive p-0 mt-3">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Scores</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Score %</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Submitted On</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
				
				
				$query = mysqli_query($d,"SELECT 
											Sub.Submission_ID, 
											Sub.User_ID AS Student_ID, 
											Sub.Quiz_ID, 
											Sub.SubmissionDate, 
											Sub.ScoreCounter, 
											Sub.TotalCounter, 
											Res.Result_ID, 
											Res.Score_Percentage, 
											Res.Date AS ResultDate,
											Usr.name as Student_Name
										FROM 
											submissions Sub, 
											results Res,
											users Usr
										WHERE 
											Sub.Quiz_ID = '".$_GET['squiz']."'
											AND Sub.User_ID = Usr.User_ID
											AND Sub.Submission_ID = Res.Submission_ID
										");
				
				
				while($row = mysqli_fetch_array($query))
				{
				?>
                    <tr>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['Student_Name'];?></span> </td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['ScoreCounter'].'/'.$row['TotalCounter'];?></span> </td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['Score_Percentage'];?></span> </td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['SubmissionDate'];?></span> </td>
                      <td class="align-middle text-center">
					  
					  <?php
					  $qrydetails = mysqli_query($d,"select * from submissiondetails where Submission_ID='".$row['Submission_ID']."' ");
					  if(mysqli_num_rows($qrydetails)>0)
					  {
					  $rowdetails = mysqli_fetch_array($qrydetails);
					  echo $rowdetails['Comment'];
					  }
					  else
					  {
					  ?>
					  <a data-sub-id="<?php echo $row['Submission_ID'];?>" href="javascript:;" class="btn btn-sm btn-secondary open-feedback">Feedback</a>
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
			  
			  
			  <h4>Top 3 Students by Average Score</h4>
			  <div class="table-responsive p-0 mt-3">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Scores</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Score %</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Submitted On</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
				
				
				$query = mysqli_query($d,"SELECT 
											Sub.Submission_ID, 
											Sub.User_ID AS Student_ID, 
											Sub.Quiz_ID, 
											Sub.SubmissionDate, 
											Sub.ScoreCounter, 
											Sub.TotalCounter, 
											Res.Result_ID, 
											Res.Score_Percentage, 
											Res.Date AS ResultDate,
											Usr.name as Student_Name
										FROM 
											submissions Sub, 
											results Res,
											users Usr
										WHERE 
											Sub.Quiz_ID = '".$_GET['squiz']."'
											AND Sub.User_ID = Usr.User_ID
											AND Sub.Submission_ID = Res.Submission_ID
										");
				
				
				while($row = mysqli_fetch_array($query))
				{
				?>
                    <tr>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['Student_Name'];?></span> </td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['ScoreCounter'].'/'.$row['TotalCounter'];?></span> </td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['Score_Percentage'];?></span> </td>
                      <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['SubmissionDate'];?></span> </td>
                      <td class="align-middle text-center">
					  
					  <?php
					  $qrydetails = mysqli_query($d,"select * from submissiondetails where Submission_ID='".$row['Submission_ID']."' ");
					  if(mysqli_num_rows($qrydetails)>0)
					  {
					  $rowdetails = mysqli_fetch_array($qrydetails);
					  echo $rowdetails['Comment'];
					  }
					  else
					  {
					  ?>
					  <a data-sub-id="<?php echo $row['Submission_ID'];?>" href="javascript:;" class="btn btn-sm btn-secondary open-feedback">Feedback</a>
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
			  <?php
			  }
			  ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Feedback</h5>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          </div>
          <div class="modal-body">
            <form role="form" action="view_result.php?squiz=<?php echo $_GET['squiz'];?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="Submission_ID" value="" id="Submission_ID">
              <div class="row">
                <div class=" col-md-12">
                  <label class="form-label">Comments</label>
                  <div class="input-group input-group-outline mb-3">
                    <textarea type="text" class="form-control" name="Comment" required></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" name="submit_feedback" value="submit" class="btn btn-lg bg-gradient-dark btn-lg mt-4 mb-0">Submit</button>
                </div>
              </div>
            </form>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function()
{
$(document).on('click','.open-feedback',function()
{

$('#Submission_ID').val($(this).attr('data-sub-id'));
$('#feedbackModal').modal('show');
});
});
</script>
</body>
</html>
