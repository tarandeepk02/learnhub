<?php
include("includes/config.php");
@session_start();
if(isset($_POST['submit']))
{
$questions = $_POST['questions']; 
$answers = $_POST['answers'];

$result = array();
$i=0;
foreach($questions as $k=>$question)
{
$result[$i]['q'] = $question;
/*Answers*/
foreach($answers as $answer)
{
$ans = explode('_',$answer);

if($ans[0]==$question)
{
$result[$i]['a'] = $ans[1];
break;
}
else
{
$result[$i]['a'] = '';
}
}
$i++;
}
//Calculation
$count = 0;
if(!empty($result))
{
foreach($result as $res)
{
$q = $res['q'];
$a = $res['a'];

$qryQ = mysqli_query($d,"select * from questions where Question_ID='".$q."' ");
$rowQ = mysqli_fetch_array($qryQ);

$qryA = mysqli_query($d,"select * from answers where Answer_ID='".$a."' ");
$rowA = mysqli_fetch_array($qryA);
//echo $rowA['AnswerText'];
if($rowA['AnswerText']==$rowQ['CorrectAnswer'])
{
$count++;
}
}
}


$qryn = mysqli_query($d,"select * from questions where Quiz_ID='".$_GET['vquiz']."' ");
$num = mysqli_num_rows($qryn);

$percentage = round($count/$num*100,2);


//Update Records
$qryin = mysqli_query($d,"insert into submissions (User_ID,Quiz_ID,SubmissionDate,ScoreCounter,TotalCounter) values ('".$_SESSION['sid']."','".$_GET['vquiz']."','".date('Y-m-d')."','".$count."','".$num."') ");
$Submission_ID = mysqli_insert_id($d);
$qryins = mysqli_query($d,"insert into results (User_ID,Submission_ID,Score_Percentage,Date) values ('".$_SESSION['sid']."','".$Submission_ID."','".$percentage."','".date('Y-m-d')."') ");  



if($qryin)
{
echo '<script>
alert("Quiz has been submitted successfully!");
window.location.href = "quiz_results.php?vresult=' . $Submission_ID . '";
</script>';
}
else
{
echo '<script>
alert("Something went wrong, try again later!");
window.location.href="quiz_results.php";
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
              <h6 class="text-white text-capitalize ps-3">Attempt Quiz</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="card card-plain">
              <div class="card-body">
                <form role="form" action="attempt_quiz.php?vquiz=<?php echo $_GET['vquiz'];?>" method="post">
                  <div class="row">
                    <div class=" col-md-6">
                      <?php
					  $k=1;
					$qry = mysqli_query($d,"select * from questions where Quiz_ID='".$_GET['vquiz']."' ");
					while($row = mysqli_fetch_array($qry))
					{
					?>
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="ms-0 mb-2">#<?php echo $k;?> - <?php echo $row['QuestionText'];?></label>
						<input type="hidden" name="questions[]" value="<?php echo $row['Question_ID'];?>">
						<!--<div class="clearfix"><br></div>-->
                        <?php
						$qrya = mysqli_query($d,"select * from answers where Question_ID ='".$row['Question_ID']."' ");
						$i=0;
						while($rowa = mysqli_fetch_array($qrya))
						{
						?>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="answers[<?php echo $row['Question_ID'];?>]" id="customRadio<?php echo $k.$i; ?>" value="<?php echo $row['Question_ID'].'_'.$rowa['Answer_ID'];?>">
                          <label class="custom-control-label" for="customRadio<?php echo $k.$i; ?>"><?php echo $rowa['AnswerText'];?></label>
                        </div>
                        
                        <?php
						$i++;
						}
						?>
						<hr>
                      </div>
					  
                      <?php
					  $k++;
					  }
					  ?>
                    </div>
                    <div class=" col-md-6"> </div>
                    <div class="col-md-12">
                      <div class="text-center">
                        <button type="submit" name="submit" value="submit" class="btn btn-lg bg-gradient-dark btn-lg w-100 mt-4 mb-0">Submit</button>
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
