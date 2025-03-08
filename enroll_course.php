<?php
include("includes/config.php");
@session_start();
if(!empty($_GET['venroll']))
{
$qry = mysqli_query($d,"insert into enrollments (User_ID,Course_ID,Enrolled_At) values ('".$_SESSION['sid']."','".$_GET['venroll']."','".date('Y-m-d')."') ");
if($qry)
{
echo '<script>
alert("You are enrolled successfully!");
window.location.href="enroll_course.php?vteacher=' . $_GET['vteacher'] . '";
</script>';
}
else
{
echo '<script>
alert("Something went wrong, try again later!");
window.location.href="enroll_course.php?vteacher=' . $_GET['vteacher'] . '";
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
              <h6 class="text-white text-capitalize ps-3">Enroll Course</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="card card-plain">
              <div class="card-body">
                <form role="form" action="enroll_course.php" method="get">
                  <div class="row">
                    <div class=" col-md-6">
                      <div class="input-group input-group-static mb-3">
                        <label for="exampleFormControlSelect1" class="ms-0">Teacher</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="vteacher">
                          <option value="All" <?php if(!empty($_GET['vteacher']) && $_GET['vteacher']=="All") { ?> selected="selected" <?php } ?>>All</option>
                          <?php
						  $qry = mysqli_query($d,"select * from users where Role='teacher' ");
						  while($row = mysqli_fetch_array($qry))
						  {
						  ?>
                          <option value="<?php echo $row['User_ID'];?>" <?php if(!empty($_GET['vteacher']) && $_GET['vteacher']==$row['User_ID']) { ?> selected="selected" <?php } ?>><?php echo $row['Name'];?></option>
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
				if(!empty($_GET['vteacher']))
				{
				?>
                <h5 class="mt-3">Courses List</h5>
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Course</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deadline</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
				if($_GET['vteacher'] == 'All') {
					$query = mysqli_query($d, "
						SELECT courses.*, 
							   (SELECT COUNT(*) FROM enrollments WHERE enrollments.User_ID = '".$_SESSION['sid']."' AND enrollments.Course_ID = courses.Course_ID) AS counter 
						FROM courses
					");
				} else {
					$query = mysqli_query($d, "
						SELECT courses.*, 
							   (SELECT COUNT(*) FROM enrollments WHERE enrollments.User_ID = '".$_SESSION['sid']."' AND enrollments.Course_ID = courses.Course_ID) AS counter 
						FROM courses 
						WHERE courses.User_ID = '".$_GET['vteacher']."'
					");
				}
				
				while($row = mysqli_fetch_array($query))
				{
				?>
                      <tr>
                        <td><div class="d-flex px-2 py-1">
                            
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm"><?php echo $row['Title'];?></h6>
                            </div>
                          </div></td>
                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $row['Deadline'];?></span> </td>
                        <td class="align-middle">
						<?php
						if($row['counter']>0)
						{
						?>
						<a href="javascript:;" class="btn btn-sm btn-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Enroll" style="margin-top:10px;"> Enrolled </a>
						<?php
						}
						else
						{
						?>
						<a href="enroll_course.php?vteacher=<?php echo $_GET['vteacher'];?>&venroll=<?php echo $row['Course_ID'];?>" class="btn btn-sm btn-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Enroll" style="margin-top:10px;"> Enroll </a>
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
