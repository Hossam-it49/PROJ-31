<?php
    include '/xampp/htdocs/project31/admin_dashboard/adminDash/pages/aside.php';
    include '/xampp/htdocs/project31/Connections/bis.php';
    include '/xampp/htdocs/project31/admin_dashboard/adminDash/pages/color.php';
 


    
   $query_currentSemester = "SELECT curentsemester.Year, curentsemester.Sem FROM curentsemester ";
   $currentSemester = mysqli_query($bis, $query_currentSemester) or die(mysqli_error($bis));
   $row_currentSemester = mysqli_fetch_assoc($currentSemester);
   $totalRows_currentSemester = mysqli_num_rows($currentSemester);
   
   $sem = $row_currentSemester['Sem'];
   $year = $row_currentSemester['Year'];
   
   $query_CurrentDay = "SELECT distinct exam_schedule.exam_date, exam_schedule.day, exam_schedule.sem, exam_schedule.year FROM exam_schedule WHERE exam_schedule.sem = '$sem' AND exam_schedule.year= $year and examtypes = 'mid'";
   $CurrentDay = mysqli_query($bis, $query_CurrentDay) or die(mysqli_error($bis));
   $row_CurrentDay = mysqli_fetch_assoc($CurrentDay);
   $totalRows_CurrentDay = mysqli_num_rows($CurrentDay);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Graduation Project 31
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <link rel="stylesheet" href="/admin_dashboard/adminDash/assets/css/all.min.css">
  <script src="https://kit.fontawesome.com/d941f7cd74.js" crossorigin="anonymous"></script>
  <script src="/admin_dashboard/adminDash/assets/js/all.min.js" crossorigin="anonymous"></script>
  <style type="text/css">
 
body,td,th {
	font-family: Traditional Arabic;
	font-size: 18px;
	font-weight: bold;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
table,td,th{
  border: 1 solid #FF0000;
}
.style3 {font-size: 18px 
 
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
#td1{
 border: 1 solid #333333; 
}
.style21 {font-size: 22px}
.style22 {color: #FF0000}
.style238 {color: #FF0000}
.style23 {font-family: Calibri;
}
 
</style>
</head>

<body class="g-sidenav-show  bg-gray-100">
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add Staff</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Add Staff</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="/admin_dashboard/" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Logout</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            
                      
    </nav>
    <!-- End Navbar -->

    <center><th  colspan="2" align="center" valign="top" scope="row"><p class="style21   style23"><u> MidTerm Exam Schedule <span class="tracking-in-expand" > 
         <?php if($row_currentSemester['Sem'] == 1 ) echo "الاول"; else if($row_currentSemester['Sem'] == 2 ) echo "Second Term"; else if($row_currentSemester['Sem'] == 3 ) echo "الصيفى"; ?>
         &nbsp; </span>Year&nbsp; <span class="style238 "><?php echo $row_currentSemester['Year']; ?>
         
         </span></u></p>

     <p><span class="style21 style23"><u> Print date <?php echo date('Y-m-d');?></u></span>      </p></center>
   
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Staff table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <table class="scale-in-tr" width="1000" border="1" align="center" cellpadding="0" cellspacing="1">
 
 <tr>
  
     <table width="90%" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#333333">
       <tr bgcolor="#ffff00">

       <th  width="50" height="30" scope="col"><span class="style23">No</span></th>
       <th  width="300" height="30" scope="col"><span class="style23">  Date - Time</span></th>
       <th  width="450" height="30" scope="col"><span class="style23">First Period</span></th>
       <th  width="450" height="30" scope="col"><span class="style23">Second Period</span></th>
       <th  width="450" scope="col"><span class="style23">Third Period</span></th>
         <th  width="450" scope="col"><span class="style23">Fourth Period</span></th>
        
       
       
       
        
         
       </tr>


       <?php $x = 1; do {
     
     $date = $row_CurrentDay['exam_date'];
$query_exam_course4 = "SELECT * FROM exam_schedule,courses WHERE courses.CourseCode = exam_schedule.CourseCode and exam_schedule.sem='$sem' and exam_schedule.year='$year' and exam_schedule.exam_date='$date' and examtypes = 'mid' and period=4";
$exam_course4 = mysqli_query($bis, $query_exam_course4) or die(mysqli_error($bis));
$row_exam_course4 = mysqli_fetch_assoc($exam_course4);
$totalRows_exam_course4 = mysqli_num_rows($exam_course4); 

$query_exam_course3 = "SELECT * FROM exam_schedule,courses WHERE courses.CourseCode = exam_schedule.CourseCode and exam_schedule.sem='$sem' and exam_schedule.year='$year' and exam_schedule.exam_date='$date' and examtypes = 'mid' and period=3";
$exam_course3 = mysqli_query($bis, $query_exam_course3) or die(mysqli_error($bis));
$row_exam_course3 = mysqli_fetch_assoc($exam_course3);
$totalRows_exam_course3 = mysqli_num_rows($exam_course3); 

$query_exam_course2 = "SELECT * FROM exam_schedule,courses WHERE courses.CourseCode = exam_schedule.CourseCode and exam_schedule.sem='$sem' and exam_schedule.year='$year' and exam_schedule.exam_date='$date' and examtypes = 'mid' and period=2";
$exam_course2 = mysqli_query($bis, $query_exam_course2) or die(mysqli_error($bis));
$row_exam_course2 = mysqli_fetch_assoc($exam_course2);
$totalRows_exam_course2 = mysqli_num_rows($exam_course2); 

$query_exam_course1 = "SELECT * FROM exam_schedule,courses WHERE courses.CourseCode = exam_schedule.CourseCode and exam_schedule.sem='$sem' and exam_schedule.year='$year' and exam_schedule.exam_date='$date' and examtypes = 'mid' and period=1";
$exam_course1 = mysqli_query($bis, $query_exam_course1) or die(mysqli_error($bis));
$row_exam_course1 = mysqli_fetch_assoc($exam_course1);
$totalRows_exam_course1 = mysqli_num_rows($exam_course1); 

   ?>
 
       <tr align="center" valign="middle">
        
<td border='1' align="center" style="border:1 solid "> <?php echo $x; ?></td>
       <td align="center">   <span class="style23">
 <?php if($row_CurrentDay['day']=="Saturday")echo "Saturday"; if($row_CurrentDay['day']=="Sunday")echo "Sunday"; if($row_CurrentDay['day']=="Monday")echo "Monday"; if($row_CurrentDay['day']=="Tuesday")echo "Tuesday"; if($row_CurrentDay['day']=="Wednesday")echo "Wednesday"; if($row_CurrentDay['day']=="Thursday")echo "Thursday"; ?> 
 <br>
 <?php echo $row_CurrentDay['exam_date']; ?></span></td>
         <th  width="900" valign="top" scope="row">
         
         
         <table width="90%" border="1"> 
             <?php 

      do{      
       ?>

<?php 


if( $row_exam_course1['period']==1 ){
 ?>
  <tr><td id="td1" align="center" class="style23" border="1"> <span style="color:red; font-weight: bold;"><?php echo $row_exam_course1['total_no']; ?></span></td><td border="1" width="300" align="center"> <a href="legan_by_course.php?code=<?php echo $row_exam_course1['CourseCode'];?>&amp;schid=<?php echo $row_exam_course1['SchID'];?>"> <?php echo $row_exam_course1['CourseName'];?></a><a href="legan_by_course_mid.php?code=<?php echo $row_exam_course1['CourseCode'];?>"> </a>  <?php if($row_exam_course1['is_self']==1){echo '<span style="color:red;">(SS)</span>';}?></td>
</tr></span>
<tr>
 <td colspan="2" align="center" class="style23" border="1"><hr /></td>
 </tr>

<?php } else echo ' --------' ;

}while ($row_exam_course1 = mysqli_fetch_assoc($exam_course1)); ?>
  </table></th>
         <th  width="900" valign="top" scope="row"><table width="90%" border="1"> 
             <?php 

      do{      
       ?>

<?php 


if($row_exam_course2['period']==2) {


 ?>
<tr><td align="center" class="style23" border="2"> <span style="color:red; font-weight: bold;"><?php echo $row_exam_course2['total_no']; ?></span></td><td border="1" width="300" align="center"> <a href="legan_by_course.php?code=<?php echo $row_exam_course2['CourseCode'];?>&amp;schid=<?php echo $row_exam_course2['SchID'];?>"> <?php echo $row_exam_course2['CourseName'];?></a><a href="legan_by_course_mid.php?code=<?php echo $row_exam_course2['CourseCode'];?>"><?php echo $row_exam_course2['notes'];?></a>  <?php if($row_exam_course2['is_self']==1){echo '<span style="color:red;">(SS)</span>';}?></td>
</tr>
<tr>
 <td  align="center" class="style23" border="8"><hr /></td>
 </tr>

<?php }

}while ($row_exam_course2 = mysqli_fetch_assoc($exam_course2)); ?>
  </table></th>

         <th  width="900" height="30" valign="top" scope="row"> <table width="90%" border="1"> 
             <?php 

      do{      
       ?>

<?php 


if($row_exam_course3['period']==3) {


 ?>
<tr><td align="center" class="style23" border="1"> <span style="color:red; font-weight: bold;"><?php echo $row_exam_course3['total_no']; ?></span></td><td border="1" width="300" align="center"> <a href="legan_by_course.php?code=<?php echo $row_exam_course3['CourseCode'];?>&amp;schid=<?php echo $row_exam_course3['SchID'];?>"> <?php echo $row_exam_course3['CourseName'];?></a><a href="legan_by_course_mid.php?code=<?php echo $row_exam_course3['CourseCode'];?>"><?php echo $row_exam_course3['notes'];?></a>  <?php if($row_exam_course3['is_self']==1){echo '<span style="color:red;">(SS)</span>';}?></td>
</tr>
<tr>
 <td colspan="2" align="center" class="style23" border="1"><hr /></td>
 </tr>

<?php }

}while ($row_exam_course3 = mysqli_fetch_assoc($exam_course3)); ?>
  </table>  </th>




        <th  width="900" height="30" valign="top" scope="row"> <table width="90%" border="1">
             <?php 



do{
       ?>

<?php 


if($row_exam_course4['period']==4) {


 ?>
<tr><td align="center" class="style23" border="1"> <span style="color:red; font-weight: bold;"><?php echo $row_exam_course4['total_no']; ?></span></td><td border="1" width="300" align="center"> <a href="legan_by_course.php?code=<?php echo $row_exam_course4['CourseCode'];?>&amp;schid=<?php echo $row_exam_course4['SchID'];?>"> <?php echo $row_exam_course4['CourseName'];?> 
</a></td>  
</tr>
<tr>
 <td colspan="2" align="center" class="style23" border="1"><hr /></td>
 </tr>

<?php }


}while ($row_exam_course4 = mysqli_fetch_assoc($exam_course4)); ?>
  </table>  </th>






</tr>
<?php $x++;} while($row_CurrentDay = mysqli_fetch_assoc($CurrentDay)); ?>
</table>
<br></th>
</tr>
</table>
              </div>
            </div>
          </div>
        </div>
      </div>

 
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>