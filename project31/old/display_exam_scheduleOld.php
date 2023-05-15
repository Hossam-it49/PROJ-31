<?php
if (!isset($_SESSION)) {
  session_start();
}
if ((!isset($_SESSION['empCode'])) or ($_SESSION['empCode'] == ""))

{
	  echo ' 
		   <script type="text/javascript"> 
			  window.location = "loginnew.php" 
		   </script>';
 }
 
 else 
  $prog = $_SESSION['prog'];
?>
<?php
if($prog == 'BIS')
require_once('../Connections/bis.php'); 
else
if($prog == 'FMI')
require_once('../Connections/FMI.php'); 
 
 ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysqli_select_db($bis, $database_bis);
$query_currentSemester = "SELECT curentsemester.semesterYear, curentsemester.SemesterCode FROM curentsemester ";
$currentSemester = mysqli_query($bis, $query_currentSemester) or die(mysqli_error($bis));
$row_currentSemester = mysqli_fetch_assoc($currentSemester);
$totalRows_currentSemester = mysqli_num_rows($currentSemester);

$sem = $row_currentSemester['SemesterCode'];
$year = $row_currentSemester['semesterYear'];

$query_CurrentDay = "SELECT distinct exam_schedule.exam_date, exam_schedule.day, exam_schedule.sem, exam_schedule.year FROM exam_schedule WHERE exam_schedule.sem = '$sem' AND exam_schedule.year= $year and examtypes = 'Final' order by exam_schedule.exam_date ";
$CurrentDay = mysqli_query($bis, $query_CurrentDay) or die(mysqli_error($bis));
$row_CurrentDay = mysqli_fetch_assoc($CurrentDay);
$totalRows_CurrentDay = mysqli_num_rows($CurrentDay);


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
<!--
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
.style3 {font-size: 18px}
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
.style21 {font-size: 22px}
.style22 {color: #FF0000}
.style238 {color: #FF0000}
.style23 {font-family: Calibri}
-->
</style></head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="1">
 <!-- <tr>
    <th width="374" height="120" align="left" valign="middle" scope="col"> <p class="style11">&nbsp;</p></th>
    <th width="720" height="120" align="center" valign="middle" scope="col"><span class="style22"><font color="#FFFFFF">.............</font></span>
      <?php
        if($prog == 'BIS')
		{
		?>
      <img src="../images/logo/logo2.png" width="155" height="73" />
      <?php
		}
		else if($prog == 'FMI')
		{
		?>
      <img src="../images/logo/fmi.jpg" width="70" height="70" />
      <?php
		 }
		 ?>
      <img src="../images/Helwan_univercity_logo.png" alt="" width="100" height="100" />&nbsp;&nbsp;<br /></th>
  </tr>
  -->
  <tr>
    <th colspan="2" align="center" valign="top" scope="row"><p class="style21 style23"><u>جدول امتحان النهائى الفصل الدراسي <span class="style238"> 
          <?php if($row_currentSemester['SemesterCode'] == 1 ) echo "الاول"; else if($row_currentSemester['SemesterCode'] == 2 ) echo "الثانى"; else if($row_currentSemester['SemesterCode'] == 3 ) echo "الصيفى"; ?>
          &nbsp; </span>لعام&nbsp; <span class="style238"><?php echo $row_currentSemester['semesterYear']; ?>
          
          </span></u></p>

      <p><span class="style21 style23"><u>تاربخ الطباعة  <?php echo date('Y-m-d');?></u></span>      </p>
      <table width="90%" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#333333">
        <tr bgcolor="#ffff00">
          <th width="25%" scope="col"><span class="style23">الفترة الثالثه</span></th>
        
        <th width="25%" height="30" scope="col"><span class="style23">الفترة الثانية</span></th>
          <th width="25%" height="30" scope="col"><span class="style23">الفترة الأولي</span></th>
          <th width="20%" height="30" scope="col"><span class="style23">  اليوم-التاريخ</span></th>
          <th width="5%" height="30" scope="col"><span class="style23">مسلسل</span></th>
        </tr>


        <?php $x = 1; do {
		  
		  $date = $row_CurrentDay['exam_date'];
		  mysqli_select_db($bis, $database_bis);
$query_exam_course = "SELECT * FROM exam_schedule,courses WHERE courses.CourseCode = exam_schedule.CourseCode and exam_schedule.sem='$sem' and exam_schedule.year='$year' and exam_schedule.exam_date='$date' and examtypes = 'Final'  ";
$exam_course = mysqli_query($bis, $query_exam_course) or die(mysqli_error($bis));
$row_exam_course = mysqli_fetch_assoc($exam_course);
$totalRows_exam_course = mysqli_num_rows($exam_course); 


		?>
        <tr align="center" valign="middle">
          <th width="25%" valign="top" scope="row"><table width="90%" border="0">
            <?php 
   
      $date = $row_CurrentDay['exam_date'];
      mysqli_select_db($bis, $database_bis);
$query_exam_course = "SELECT * FROM exam_schedule,courses WHERE courses.CourseCode = exam_schedule.CourseCode and exam_schedule.sem='$sem' and exam_schedule.year='$year' and exam_schedule.exam_date='$date' ";
$exam_course = mysqli_query($bis, $query_exam_course) or die(mysqli_error($bis));
$row_exam_course = mysqli_fetch_assoc($exam_course);
$totalRows_exam_course = mysqli_num_rows($exam_course); 

       do{      
			  ?>
            <?php 


if($row_exam_course['period']==3) {


  ?>
            <tr>
              <td align="center" class="style23" border="1"><span style="color:red; font-weight: bold;"><?php echo $row_exam_course['total_no']; ?></span></td>
              <td border="1" width="300" align="center"><a href="legan_by_course.php?code=<?php echo $row_exam_course['CourseCode'];?>&amp;schid=<?php echo $row_exam_course['SchID'];?>"> <?php echo $row_exam_course['CourseName'];?></a><a href="legan_by_course.php?code=<?php echo $row_exam_course['CourseCode'];?>"><?php echo $row_exam_course['notes'];?></a>
                  <?php if($row_exam_course['is_self']==1){echo '<span style="color:red;">(SS)</span>';}?></td>
            </tr>
            <tr>
              <td colspan="2" align="center" class="style23" border="1"><hr /></td>
            </tr>
            <?php }

}while ($row_exam_course = mysqli_fetch_assoc($exam_course)); ?>
          </table></th>

          <th width="25%" height="30" valign="top" scope="row"> <table width="90%" border="0"> 
              <?php 
      $date = $row_CurrentDay['exam_date'];
      mysqli_select_db($bis, $database_bis);
$query_exam_course = "SELECT * FROM exam_schedule,courses WHERE courses.CourseCode = exam_schedule.CourseCode and exam_schedule.sem='$sem' and exam_schedule.year='$year' and exam_schedule.exam_date='$date' ";
$exam_course = mysqli_query($bis, $query_exam_course) or die(mysqli_error($bis));
$row_exam_course = mysqli_fetch_assoc($exam_course);
$totalRows_exam_course = mysqli_num_rows($exam_course); 

       do{      
			  ?>

<?php 


if($row_exam_course['period']==2) {


  ?>
<tr><td align="center" class="style23" border="1"> <span style="color:red; font-weight: bold;"><?php echo $row_exam_course['total_no']; ?></span></td><td border="1" width="300" align="center"> <a href="legan_by_course.php?code=<?php echo $row_exam_course['CourseCode'];?>&amp;schid=<?php echo $row_exam_course['SchID'];?>"> <?php echo $row_exam_course['CourseName'];?></a><a href="legan_by_course.php?code=<?php echo $row_exam_course['CourseCode'];?>"><?php echo $row_exam_course['notes'];?></a>  <?php if($row_exam_course['is_self']==1){echo '<span style="color:red;">(SS)</span>';}?></td>
</tr>
<tr>
  <td colspan="2" align="center" class="style23" border="1"><hr /></td>
  </tr>

<?php }

}while ($row_exam_course = mysqli_fetch_assoc($exam_course)); ?>
   </table>  </th>




         <th width="25%" height="30" valign="top" scope="row"> <table width="90%" border="0">
              <?php 

      $date = $row_CurrentDay['exam_date'];
      mysqli_select_db($bis, $database_bis);
$query_exam_course = "SELECT * FROM exam_schedule,courses WHERE courses.CourseCode = exam_schedule.CourseCode and exam_schedule.sem='$sem' and exam_schedule.year='$year' and exam_schedule.exam_date='$date' ";
$exam_course = mysqli_query($bis, $query_exam_course) or die(mysqli_error($bis));
$row_exam_course = mysqli_fetch_assoc($exam_course);
$totalRows_exam_course = mysqli_num_rows($exam_course); 


do{
        ?>

<?php 


if($row_exam_course['period']==1) {


  ?>
<tr><td align="center" class="style23" border="1"> <span style="color:red; font-weight: bold;"><?php echo $row_exam_course['total_no']; ?></span></td><td border="1" width="300" align="center"> <a href="legan_by_course.php?code=<?php echo $row_exam_course['CourseCode'];?>&amp;schid=<?php echo $row_exam_course['SchID'];?>"> <?php echo $row_exam_course['CourseName'];?><?php echo $row_exam_course['notes'];?>
  <?php if($row_exam_course['is_self']==1){echo ' <span style="color:red;">(SS)</span>';}?>
</a></td>  

</tr>
<tr>
  <td colspan="2" align="center" class="style23" border="1"><hr /></td>
  </tr>

<?php }


}while ($row_exam_course = mysqli_fetch_assoc($exam_course)); ?>
   </table>  </th>



 
<td width="20%" align="center">   <span class="style23">
  <?php if($row_CurrentDay['day']=="Saturday")echo "السبت"; if($row_CurrentDay['day']=="Sunday")echo "الأحد"; if($row_CurrentDay['day']=="Monday")echo "الاثنين"; if($row_CurrentDay['day']=="Tuesday")echo "الثلاثاء"; if($row_CurrentDay['day']=="Wednesday")echo "الأربعاء"; if($row_CurrentDay['day']=="Thursday")echo "الخميس"; ?> 
  <br>
  <?php echo $row_CurrentDay['exam_date']; ?></span></td>

<td width="5%" align="center"> <span class="style23"><?php echo $x; ?></span></td>
</tr>
<?php $x++;} while($row_CurrentDay = mysqli_fetch_assoc($CurrentDay)); ?>
</table>
<br></th>
</tr>
</table>

</body>
</html>

