
<?php
  include '/xampp/htdocs/graduation_project/Connections/bis.php';

if ((isset($_POST["save"]))) {

if (!isset($_SESSION)) {
  session_start();
}


if ((!isset($_SESSION['empCode'])) or ($_SESSION['empCode'] == ""))

{
    echo ' 
       <script type="text/javascript"> 
        window.location = "../index.php" 
       </script>';
 }
 
 else 
  $prog = $_SESSION['prog'];

if($prog == 'BIS')
require_once('../Connections/bis.php'); 
else
if($prog == 'FMI')
require_once('../Connections/FMI.php'); 

$query_currentsem = "SELECT * FROM curentsemester";
$currentsem = mysqli_query($bis, $query_currentsem) or die(mysqli_error($bis));
$row_currentsem = mysqli_fetch_assoc($currentsem);
$totalRows_currentsem = mysqli_num_rows($currentsem);
$sem=$row_currentsem['SemesterCode'];
$year=$row_currentsem['semesterYear'];

$day=$_POST['day'];
$courseName=$_POST['course'];
$date=$_POST['datee'];
$interval=$_POST['interval'];
$self=$_POST['selfe'];
$sQL= 'SET NAMES utf8'; 
$examtype = $_POST['examtype'];

$qu="select CourseCode from courses where CourseArbName='$courseName'";
$quer=mysqli_query($bis, $qu)or die("Error: ".mysqli_error($bis));
$q=mysqli_fetch_assoc($quer);
$courseCode=$q['CourseCode'];

 
$q="select CourseCode from degree where CourseCode='$courseCode' and Semester='$sem' and Year='$year'";
$que=mysqli_query($bis, $q )or die("Error: ". mysqli_error($bis));
$qm=mysqli_fetch_assoc($que);
$rows=mysqli_num_rows($que);
$sem=$row_currentsem['SemesterCode'];
$year=$row_currentsem['semesterYear'];
$ins= "INSERT INTO exam_schedule (CourseCode,day,exam_date,period,total_no, is_self,sem, year, examtypes)
VALUES ('$courseCode','$day','$date','$interval','$rows','$self','$sem','$year', '$examtype' )";
if(!mysqli_query($bis, $ins)){die('Error:'. mysqli_error($bis));}
else {
echo ' 
       <script type="text/javascript"> 
        window.location = "index.php?page=addexamSch" 
       </script>';
}
}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Student Affairs Profile</title>

<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><script type="text/javascript" src="stmenu.js"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style12 {
	font-family: Calibri;
	font-weight: bold;
}
.style13 {font-family: Calibri}
-->
</style>
</head>

<body topmargin="0" leftmargin="0" bottommargin="0" rightmargin="0">

<p class="title"><u></u></p>

<p class="title style12"><u>ادخال لجان الامتحانات</u> </p> 
<br>

<form action="addExamSchedule.php" method="POST" name="form1">
    <table width="600" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#CCCCCC" >
<tr align="right">
<tr><td width="450" colspan="5" align="right" valign="middle">
  <span class="style13">
  <select name="course" >
    <?php 
$sSQL= 'SET CHARACTER SET utf8'; 
mysqli_query($bis, $sSQL) or die ('Can\'t charset in DataBase'); 
$sem=$row_currentsem['SemesterCode'];
$year=$row_currentsem['semesterYear'];
$query="select courseenable.CourseCode,courses.CourseArbName from courseenable,courses where courses.CourseCode = courseenable.CourseCode and courseenable.sem='$sem' and courseenable.year='$year'";
$query1=mysqli_query($bis, $query) or die(mysqli_error($bis));
$que=mysqli_fetch_array($query1);
do{
?>
    <option value="<?php echo $que['CourseArbName'];?>"> 
    <?php echo $que['CourseArbName'];?> </option>
    <?php }while($que=mysqli_fetch_array($query1)); ?>
  </select>
  </span> </td>
<td width="150" align="center" valign="middle"><span class="style12">
  <label> المادة</label> 
  <br>
</span></td>
</tr>
<tr>
<td width="450" colspan="5" align="right" valign="middle">
  <span class="style13">
  <select name="day" >
    <option value="Saturday"> Saturday </option>
    <option value="Sunday"> Sunday </option>
    <option value="Monday"> Monday </option>
    <option value="Tuesday"> Tuesday </option>
    <option value="Wednesday"> Wednesday </option>
    <option value="Thursday"> Thursday </option>
  </select>
  </span> </td>
<td width="150" align="center" valign="middle"><span class="style12">
  <label> اليوم </label>
  <br>
</span></td>
</tr>
<tr>
<td width="450" colspan="5" align="right" valign="middle">
<input name="date" type="date"> </td>
<td width="150" align="center" valign="middle"><span class="style12">
  <label> التاريخ </label>
  <br> 
  </span></td>
</tr>

<tr>
<td width="80" align="center" valign="middle"><span class="style13">
  <input type="radio" name="interval" value="5" />
  <label> </label>
  <label>الخامسة</label>
</span></td>
<td width="80" align="center" valign="middle"><span class="style13">
  <input type="radio" name="interval" value="4" />
  <label> </label>
  <label>الرابعة</label>
</span></td>
<td width="80" align="center" valign="middle"><span class="style13">
  <input type="radio" name="interval" value="3" />
  <label> </label>
  <label>الثالثة</label>
</span></td>
<td width="80" align="center" valign="middle"><span class="style13">
  <input type="radio" name="interval" value="2" />
  <label> </label>
  <label>الثانية</label>
</span></td>
<td width="80" align="center" valign="middle"><span class="style13">
  <label>
  <input type="radio" name="interval" value="1" />
  الاولي </label>
  <label> </label>
</span></td>
<td width="150" align="center" valign="middle">  <span class="style12">
  <lable > الفترة</lable>
</span></td>
</tr>
<tr>
<td width="450" colspan="5" align="right" valign="middle"><span class="style13">
  <label> Yes</label>
  <input type="radio" name="self" value="1" />
  <label> No</label>
  <input type="radio" name="self" value="0" checked="checked" />
  <br>
</span></td>
<td width="150" align="center" valign="middle">  <span class="style12">
  <lable> Self-Study</lable>
</span></td>
</tr>
<tr>
  <td width="450" colspan="5" align="right" valign="middle"><span class="style13">
    <label>Final</label>
    <input type="radio" name="examtype" value="Final" />
    <label> MidTerm</label>
    <input type="radio" name="examtype" value="mid" checked="checked" />
  </span></td>
  <td width="150" align="center" valign="middle"><span class="style12">نوع الامتحان</span></td>
</tr>
<tr><td colspan="6" align="center" valign="middle">
<input type="submit" value="حفظ" name="save" />
</td></tr>
</table>
    <span class="style13"><br>
    </span>
</form>
<br>
<br>

<table table width="900" border="2" align="center" cellpadding="0" cellspacing="1" bordercolor="#CCCCCC">
<tr><td colspan="9" align="center" bgcolor="#CCCCCC"><span class="style12"> المواد التي تم ادخالها</span></td>
</tr>
<tr>
  <th>نوع الامتحان</th>
  <th>كود الماده</th>
  <th>كود الجدول</th>
<th> العدد</th>
<th> المادة</th>
<th>الفترة </th>
<th> التاريخ</th>
<th>اليوم </th>
<th> م</th>
</tr>
<?php 
$x=1;
$sSQL= 'SET CHARACTER SET utf8'; 
mysqli_query($bis, $sSQL) or die ('Can\'t charset in DataBase'); 
$course_query="select * from exam_schedule,courses where courses.CourseCode = exam_schedule.CourseCode and exam_schedule.sem='$sem' and exam_schedule.year='$year' ORDER BY SchID, exam_date ASC";
$course_query1=mysqli_query($bis, $course_query) or die(mysqli_error($bis));
$course_que=mysqli_fetch_array($course_query1);
do{
?>
<tr>
  <td align="center"><?php echo $course_que['examtypes']; ?></td>
  <td align="center"><?php echo $course_que['CourseCode']; ?></td>
  <td align="center"><?php echo $course_que['SchID']; ?></td>

<td align="center"> <?php echo $course_que['total_no']; ?></td>
<td align="center"> <?php echo $course_que['CourseName']; ?> <?php echo $course_que['notes']; ?></td>
<td align="center"> <?php echo $course_que['period']; ?></td>
<td align="center"> <?php echo $course_que['exam_date']; ?></td>
<td align="center"> <?php echo $course_que['day']; ?></td>
<td align="center"> <?php echo $x; ?></td>
</tr>
<?php $x++;} while($course_que=mysqli_fetch_array($course_query1)); ?>
</table>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
//-->
</script>
</body>
</html>
