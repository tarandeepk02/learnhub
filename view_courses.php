<?php
include("includes/config.php");
@session_start();
if(!empty($_GET['del']))
{

$qrydel = mysqli_query($d,"delete from courses where Course_ID='".$_GET['del']."' ");

if($qrydel)
{
echo '<script>
alert("Record has been deleted successfully!");
window.location.href="view_courses.php";
</script>';
}
else
{
echo '<script>
alert("Something went wrong, try again later!");
window.location.href="view_courses.php";
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
			<h6 class="text-white text-capitalize ps-3">View Courses <?php //echo $_SESSION['srole'];?></h6>
			</div>
			<div class="col-6">
			<?php
			if($_SESSION['srole']=='teacher')
			{
			?>
			<a href="add_course.php" class="btn btn-success float-end me-3">Add Course</a>
			<?php
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
				  <?php
				  if($_SESSION['srole']=='admin')
				  {
				  ?>
				   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Teacher</th>
				   <?php
				   }
				   ?>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Course</th>
                    
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deadline</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
				<?php
				if($_SESSION['srole']=='teacher')
				  {
				$query = mysqli_query($d,"select * from courses where User_ID='".$_SESSION['sid']."' ");
				}
				else
				{
				
				$query = mysqli_query($d, "
							SELECT 
								C.*, 
								U.Name 
							FROM 
								courses C, 
								users U 
							WHERE 
								C.User_ID = U.User_ID 
								
						");
				
				
				}
				while($row = mysqli_fetch_array($query))
				{
				/*print_r($row);*/
				?>
                  <tr>
				  
				  
				  <?php
				  if($_SESSION['srole']=='admin')
				  {
				  ?>
				   <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">
				   <?php echo $row['Name'];?></span></td>
				   <?php
				   }
				   ?>
				  
				  
				  
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
						<img src="<?php echo $pic;?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1" width="100" height="100"> </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?php echo $row['Title'];?></h6>
                        
                        </div>
                      </div></td>
                    
                    
                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['Deadline'];?></span> </td>
                    <td class="align-middle">
					
					<?php
					if($_SESSION['srole']=='teacher')
				  {
					?>
					<a href="view_quiz.php?vcourses=<?php echo $row['Course_ID'];?>" class="btn btn-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user"> Quizzes </a> 
					
					
					
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
		
		
		<?php
			if($_SESSION['srole']=='admin')
			{
			?><br>
			
			
			
			
			

		<div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
			<div class="row">
			<div class="col-6">
			<h6 class="text-white text-capitalize ps-3">Students Enrolled in all Courses</h6>
			</div>
			<div class="col-6">
			
			</div>
			</div>
              
			  
            </div>
          </div>
          <div class="card-body pb-2">
		  
		  <div class=" col-md-12">
		  <form role="form" action="view_courses.php" method="get">
                  <div class="row">
                    <div class=" col-md-6">
                      <div class="input-group input-group-static mb-3">
                        <label for="exampleFormControlSelect1" class="ms-0">Would you like to see students list who enrolled in all courses? </label>
                        <select class="form-control" name="show">
							<option value="Show" <?php if(!empty($_GET['show']) && $_GET['show']=='Show') { ?>selected="selected" <?php } ?>>Show</option>
							<option value="Hide" <?php if(!empty($_GET['show']) && $_GET['show']=='Hide') { ?>selected="selected" <?php } ?>>Hide</option>
							</select>
                      </div>
                    </div>
                    <div class=" col-md-6">
                      <div class="text-center">
                        <button type="submit" value="submit" class="btn btn-lg bg-gradient-dark btn-lg w-100 mt-4 mb-0">Submit</button>
                      </div>
                    </div>
                  </div>
                </form>
		  </div>
		  
		  
		  
            <div class="table-responsive p-0">
			
			
			<?php
			if(!empty($_GET['show']) && $_GET['show']=='Show')
			{
			?>
			
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
				  
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                    <th class="text-secondary opacity-7">Phone</th>
                  </tr>
                </thead>
                <tbody>
				<?php
				/*Find student S such that
				There is no course C
				Which is not enrolled by S*/
				
				$query = mysqli_query($d, "
							SELECT s.Name,s.Email,s.PhoneNo
								FROM users s
								WHERE NOT EXISTS (
									SELECT c.Course_ID
									FROM courses c
									WHERE NOT EXISTS (
										SELECT e.User_ID
										FROM enrollments e
										WHERE s.User_ID = e.User_ID AND c.Course_ID = e.Course_ID
									)
								)								
						");
				
				
				
				while($row = mysqli_fetch_array($query))
				{
				/*print_r($row);*/
				?>
                  <tr>
				  
				  
				  
				  
				  
				  
                    <td><div class="d-flex px-2 py-1">
                        
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?php echo $row['Name'];?></h6>
                        
                        </div>
                      </div></td>
                    
                    
                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['Email'];?></span> </td>
					<td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['PhoneNo'];?></span> </td>
                  </tr>
				  <?php
				  }
				  ?>
                  
                </tbody>
              </table>
			  <?php
			  }
			  ?>
            </div>
          </div>
        </div>
		<?php
		}
		?>
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
