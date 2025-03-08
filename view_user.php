<?php
include("includes/config.php");
@session_start();
if(!empty($_GET['del']))
{

$qrydel = mysqli_query($d,"delete from users where User_ID='".$_GET['del']."' ");

if($qrydel)
{
echo '<script>
alert("Record has been deleted successfully!");
window.location.href="view_user.php";
</script>';
}
else
{
echo '<script>
alert("Something went wrong, try again later!");
window.location.href="view_user.php";
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
.cards .card
{
min-height:100px;
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
              <h6 class="text-white text-capitalize ps-3">View Users</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <!--<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Joined On</th>-->
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				if(!empty($_GET['type']))
				{
				$query = mysqli_query($d,"select User_ID, Name, Email, Role, Major, Status from users where Role='".$_GET['type']."' ");
				}
				else
				{
				$query = mysqli_query($d,"select User_ID, Name, Email, Role, Major, Status from users ");
				}
				$i=0;
				while($row = mysqli_fetch_array($query))
				{
				if($row['User_ID']!='1')
				{
				?>
                  <tr>
                    <td><div class="d-flex px-2 py-1">
                        <div>
                          <?php
						if(!empty($row['Picture']))
						{
						$pic = $row['Picture'];
						}
						else
						{
						$pic = 'uploads/no-img.jpg';
						}
						?>
                          <img src="<?php echo $pic;?>" class="avatar avatar-sm me-3 border-radius-lg" alt="<?php echo $row['Name'];?>" width="120" height="120">
                          <?php
						
						?>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?php echo $row['Name'];?></h6>
                          <p class="text-xs text-secondary mb-0"><?php echo $row['Email'];?></p>
                        </div>
                      </div></td>
                    <td><p class="text-xs font-weight-bold mb-0"><?php echo $row['Role'];?></p>
                      <p class="text-xs text-secondary mb-0"><?php echo $row['Major'];?></p></td>
                    <td class="align-middle text-center text-sm"><?php
					if($row['Status']=='Active')
					{
					?>
                      <span class="badge badge-sm bg-gradient-success"><?php echo $row['Status'];?></span>
                      <?php
					}
					else
					{
					?>
                      <span class="badge badge-sm bg-gradient-secondary"><?php echo $row['Status'];?></span>
                      <?php
					}
					?>
                    </td>
                    <!--<td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">23/04/18</span> </td>-->
                    <td class="align-middle"><a href="edit_user.php?edit=<?php echo $row['User_ID'];?>" class="btn btn-secondary btn-sm mb-0" data-toggle="tooltip" data-original-title="Edit user"> Edit </a> <!--&nbsp;&nbsp; <a href="view_user.php?del=<?php echo $row['User_ID'];?>" class="btn btn-danger btn-sm mb-0" data-toggle="tooltip" data-original-title="Delete user" onClick="return confirm('Are you sure? ');"> Delete </a>-->
                      <?php
					if($_SESSION['srole']=='admin' && $row['Role']=='student')
					{
					?>
                      &nbsp;&nbsp; <a href="javascript:;" class="btn btn-primary btn-sm mb-0" data-toggle="tooltip" data-original-title="Calculate" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $i;?>"> Calculate </a>
                      <?php
					}
					?>
                    </td>
                  </tr>
                  <!-- Modal -->
				  
				  <?php
				  $qryaggre = mysqli_query($d,"SELECT COUNT(*) AS TotalSubmissions,
								   SUM(ScoreCounter) AS TotalScore,
								   AVG(ScoreCounter) AS AverageScore,
								   MIN(ScoreCounter) AS MinimumScore,
								   MAX(ScoreCounter) AS MaximumScore,
								   AVG(Score_Percentage) AS AveragePercentage,
								   MIN(Score_Percentage) AS MinimumPercentage,
								   MAX(Score_Percentage) AS MaximumPercentage
							FROM submissions
							JOIN results ON submissions.User_ID = results.User_ID
							WHERE submissions.User_ID = '".$row['User_ID']."' ");
				  $rowaggre = mysqli_fetch_array($qryaggre);
				  
				  
				  $qrynestedaggre = mysqli_query($d,"SELECT AVG(AverageScore) AS OverallAverageScore
															FROM (
																SELECT User_ID,
																	   AVG(ScoreCounter) AS AverageScore
																FROM submissions
																where User_ID='".$row['User_ID']."'
																GROUP BY User_ID
															) AS StudentScores  
				  ");
				  $rownestedaggre = mysqli_fetch_array($qrynestedaggre);
				  
				  ?>
				  
                <div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Calculation</h5>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                      </div>
                      <div class="modal-body">
                        <div class="row cards">
                          <div class="col-xl-6 col-sm-6 mb-4">
                            <div class="card">
                              <div class="card-header p-2 ps-3">
                                <div class="d-flex justify-content-between">
                                  <div>
                                    <p class="text-sm mb-0 text-capitalize">Quizzes Attempted</p>
                                    <h4 class="mb-0"><?php echo $rowaggre['TotalSubmissions'];?></h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-6 col-sm-6 mb-4">
                            <div class="card">
                              <div class="card-header p-2 ps-3">
                                <div class="d-flex justify-content-between">
                                  <div>
                                    <p class="text-sm mb-0 text-capitalize">Total Scores</p>
                                    <h4 class="mb-0"><?php echo $rowaggre['TotalScore'];?></h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-6 col-sm-6  mb-4">
                            <div class="card">
                              <div class="card-header p-2 ps-3">
                                <div class="d-flex justify-content-between">
                                  <div>
                                    <p class="text-sm mb-0 text-capitalize">Average Score</p>
                                    <h4 class="mb-0"><?php echo $rowaggre['AverageScore'];?></h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-6 col-sm-6">
                            <div class="card">
                              <div class="card-header p-2 ps-3">
                                <div class="d-flex justify-content-between">
                                  <div>
                                    <p class="text-sm mb-0 text-capitalize">Minimum Score</p>
                                    <h4 class="mb-0"><?php echo $rowaggre['MinimumScore'];?></h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-6 col-sm-6 ">
                            <div class="card">
                              <div class="card-header p-2 ps-3">
                                <div class="d-flex justify-content-between">
                                  <div>
                                    <p class="text-sm mb-0 text-capitalize">Maximum Score</p>
                                    <h4 class="mb-0"><?php echo $rowaggre['MaximumScore'];?></h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
						  
						  
						  <div class="col-xl-6 col-sm-6 ">
                            <div class="card bg-secondary">
                              <div class="card-header p-2 ps-3" style="background:#eee;">
                                <div class="d-flex justify-content-between">
                                  <div>
                                    <p class="text-sm mb-0 text-capitalize">Overall Average Score</p>
                                    <h4 class="mb-0"><?php echo $rownestedaggre['OverallAverageScore'];?></h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <?php
				  }
				  $i++;
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
