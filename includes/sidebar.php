<?php
@session_start();
?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
  <div class="sidenav-header"> <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i> <a class="navbar-brand px-4 py-3 m-0" href="javascript:;"> <img src="assets/img/fav.png" class="navbar-brand-img" width="26" height="26" alt="main_logo"> <span class="ms-1 text-sm text-dark">Learn Hub</span> </a> </div>
  <hr class="horizontal dark mt-0 mb-2">
  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
	
	<li class="nav-item"> <a class="nav-link bg-gradient-dark text-white" href="profile.php"> <i class="material-symbols-rounded opacity-5">person</i> <span class="nav-link-text ms-1">My Profile</span> </a> </li>
      <li class="nav-item"> <a class="nav-link text-dark" href="password.php"> <i class="material-symbols-rounded opacity-5">login</i> <span class="nav-link-text ms-1">Change Password</span> </a> </li>
	
	
	
	<?php
	if($_SESSION['srole']=='admin')
	{
	?>
	
     
      <li class="nav-item"> <a class="nav-link text-dark" href="view_user.php"> <i class="material-symbols-rounded opacity-5">table_view</i> <span class="nav-link-text ms-1">Users</span> </a> </li>
	  
	  
	  <li class="nav-item"> <a class="nav-link text-dark" href="view_courses.php"> <i class="material-symbols-rounded opacity-5">receipt_long</i> <span class="nav-link-text ms-1">Courses</span> </a> </li>
	  
	  
	 
	  <?php
	  }
	  else if($_SESSION['srole']=='teacher')
	  {
	  ?>
	  <li class="nav-item"> <a class="nav-link text-dark" href="view_courses.php"> <i class="material-symbols-rounded opacity-5">receipt_long</i> <span class="nav-link-text ms-1">Courses</span> </a> </li>
	  <li class="nav-item"> <a class="nav-link text-dark" href="view_quiz.php"> <i class="material-symbols-rounded opacity-5">view_in_ar</i> <span class="nav-link-text ms-1">Quizzes</span> </a> </li>
	  
	  <li class="nav-item"> <a class="nav-link text-dark" href="view_result.php"> <i class="material-symbols-rounded opacity-5">format_textdirection_r_to_l</i> <span class="nav-link-text ms-1">Results</span> </a> </li>
	 
	  <?php
	  }
	  else if($_SESSION['srole']=='student')
	  {
	  ?>
	  <li class="nav-item"> <a class="nav-link text-dark" href="dashboard.php"> <i class="material-symbols-rounded opacity-5">dashboard</i> <span class="nav-link-text ms-1">My Courses</span> </a> </li>
	  
	  <li class="nav-item"> <a class="nav-link text-dark" href="submission.php"> <i class="material-symbols-rounded opacity-5">view_in_ar</i> <span class="nav-link-text ms-1">Submissions</span> </a> </li>
	  
	  <?php
	  }
	  ?>
	  
    </ul>
  </div>
  <div class="sidenav-footer position-absolute w-100 bottom-0 ">
  <?php
  if($_SESSION['srole']=='student')
  {
  ?>
  <div class="mx-3">  <a class="btn bg-gradient-dark w-100" href="enroll_course.php" type="button">Enroll</a> </div>
  <?php
  }
  else if($_SESSION['srole']=='teacher')
  {
  ?>
  <div class="mx-3"> <a class="btn btn-outline-dark mt-4 w-100" href="add_course.php" type="button">Create Course</a> <a class="btn bg-gradient-dark w-100" href="view_quiz.php" type="button">Manage Questions</a> </div>
  <?php
  }
  else
  {
  ?>
  <div class="mx-3"> <a class="btn btn-outline-dark mt-4 w-100" href="view_user.php?type=teacher" type="button">Teachers</a> <a class="btn bg-gradient-dark w-100" href="view_user.php?type=student" type="button">Students</a> </div>
  <?php
  }
  ?>
  
    
  </div>
</aside>