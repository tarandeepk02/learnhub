<?php
@session_start();
if($_SESSION['sid']=="" || $_SESSION['sname']=="" || $_SESSION['semail']=="" || $_SESSION['srole']=="")
{
echo '<script>
alert("Session invalid, login again.");
window.location.href="index.php";
</script>'; 
}
?>
<style>
.card
{
min-height: 500px;
}
</style>
<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      
	  
	  <h6>Welcome <?php echo $_SESSION['sname'];?> to Learn Hub!</h6>
	  
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        
      </div>
      <ul class="navbar-nav d-flex align-items-center  justify-content-end">
        <li class="nav-item d-flex align-items-center"> <a class="btn btn-outline-primary btn-sm mb-0 me-3" href="profile.php">My Profile</a> </li>
        
        <li class="nav-item d-xl-none ps-3 d-flex align-items-center"> <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
          <div class="sidenav-toggler-inner"> <i class="sidenav-toggler-line"></i> <i class="sidenav-toggler-line"></i> <i class="sidenav-toggler-line"></i> </div>
          </a> </li>       
        
        <li class="nav-item d-flex align-items-center"> <a href="logout.php" class="nav-link text-body font-weight-bold px-0"> <i class="material-symbols-rounded">logout</i> </a> </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
