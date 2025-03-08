<?php
include("includes/config.php");
@session_start();
if(isset($_POST['submit']))
{
//Update Records

if (!empty($_FILES["Picture"]["name"])) 
{
$name = time().'-'.$_FILES["Picture"]["name"];
move_uploaded_file($_FILES["Picture"]["tmp_name"], 'uploads/'.$name);
$Picture = 'uploads/'.$name;
}
else
{
$Picture = 'uploads/no-img.jpg';
}

$qryupt = mysqli_query($d,"UPDATE users SET Name='".$_POST['Name']."',Email='".$_POST['Email']."',Role='".$_POST['Role']."',PhoneNo='".$_POST['PhoneNo']."',Address='".$_POST['Address']."',Picture='".$Picture."',Major='".$_POST['Major']."',Status='".$_POST['Status']."' WHERE User_ID='".$_GET['edit']."' ");

if($qryupt)
{
echo '<script>
alert("User has been updated successfully!");
window.location.href = "view_user.php?edit=' . $_GET['edit'] . '";
</script>';
}
else
{
echo '<script>
alert("Something went wrong, try again later!");
window.location.href = "view_user.php?edit=' . $_GET['edit'] . '";
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
              <h6 class="text-white text-capitalize ps-3">Edit User</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="card card-plain">
              <div class="card-body">
                <form role="form" action="edit_user.php?edit=<?php echo $_GET['edit'];?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class=" col-md-6">
                      <?php
						$qry = mysqli_query($d,"select * from users where User_ID='".$_GET['edit']."' ");
						$row = mysqli_fetch_array($qry);
					  ?>
					  <label class="form-label">Name</label>
                      <div class="input-group input-group-static mb-3">
                        
                        <input type="text" class="form-control" name="Name" value="<?php echo $row['Name'];?>">
                      </div>
					  <label class="form-label">Email</label>
                      <div class="input-group input-group-static mb-3">
                        
                        <input type="email" class="form-control" name="Email" value="<?php echo $row['Email'];?>">
                      </div>
					  <label class="form-label">Phone No.</label>
                      <div class="input-group input-group-static mb-3">
                        
                        <input type="text" class="form-control" name="PhoneNo" value="<?php echo $row['PhoneNo'];?>">
                      </div>
					   <label class="form-label">Address</label>
                      <div class="input-group input-group-static mb-3">
                       
                        <textarea class="form-control" name="Address"><?php echo $row['Address'];?></textarea>
                      </div>
					  <label class="form-label">Picture</label>
                      <div class="input-group input-group-static mb-3">
                        
						<?php
						if(!empty($row['Picture']))
						{
						$user_image = $row['Picture'];
						}
						else
						{
						$user_image = 'uploads/no-img.jpg';
						}
						?>
						<img src="<?php echo $user_image;?>" width="100" height="100"><br>

                        <input type="file" class="form-control" name="Picture">
                      </div>
					  <label class="form-label">Role</label>
                      <div class="input-group input-group-static mb-3">
                        
                        <select class="form-control" name="Role">
                          <option value="">--Select--</option>
                          <option value="teacher" <?php if($row['Role']=='teacher') { ?> selected="selected" <?php } ?>>Teacher</option>
                          <option value="student" <?php if($row['Role']=='student') { ?> selected="selected" <?php } ?>>Student</option>
                        </select>
                      </div>
					  <?php
					  if($row['Role']=='teacher')
					  {
					  ?>
					  <label class="form-label">Major</label>
                      <div class="input-group input-group-static mb-3">
                        
                        <input type="text" class="form-control" name="Major" value="<?php echo $row['Major'];?>">
                      </div>
					  <?php
					  }
					  ?>
					  <label class="form-label">Status</label>
                      <div class="input-group input-group-static mb-3">
                        
                        <select class="form-control" name="Status">
                          <option value="">--Select--</option>
                          <option value="Active" <?php if($row['Status']=='Active') { ?> selected="selected" <?php } ?>>Active</option>
                          <option value="Inactive" <?php if($row['Status']=='Inactive') { ?> selected="selected" <?php } ?>>Inactive</option>
                        </select>
                      </div>
                    </div>
                    <div class=" col-md-6"> </div>
                    <div class="col-md-6">
                      <div class="text-center">
                        <button type="submit" name="submit" value="submit" class="btn btn-lg bg-gradient-dark btn-lg mt-4 mb-0">Submit</button>
                      </div>
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
