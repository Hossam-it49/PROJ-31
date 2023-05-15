
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
$currentsem = mysqli_query($bis,$query_currentsem) or die(mysqli_error($bis));
$row_currentsem = mysqli_fetch_assoc($currentsem);
$totalRows_currentsem = mysqli_num_rows($currentsem);
$sem=$row_currentsem['SemesterCode'];
$year=$row_currentsem['semesterYear'];


$emp=$_POST['employee'];
$scID=$_POST['course'];
$lagnaID=$_POST['lagna'];
$insertDate= date('Y-m-d');

$ins= "INSERT INTO legan_employees (empID,SchID,lagna_no,insert_date, userID)
VALUES ('$emp','$scID','$lagnaID','$insertDate','1')";
if(!mysqli_query($bis,$ins)){die('Error:'. mysqli_error($bis));}
else {
echo ' 
       <script type="text/javascript"> 
        window.location = "index.php?page=addLagnaEmp" 
       </script>';
}
}

$code=$_GET['course'];
$lagna=$_GET['lagna'];

$query_currentsem = "SELECT * FROM curentsemester";
$currentsem = mysqli_query($bis,$query_currentsem) or die(mysqli_error($bis));
$row_currentsem = mysqli_fetch_assoc($currentsem);
$totalRows_currentsem = mysqli_num_rows($currentsem);
$sem=$row_currentsem['SemesterCode'];
$year=$row_currentsem['semesterYear'];
$query_legandata = "SELECT exam_schedule.CourseCode, exam_schedule.period, exam_schedule.`day`, exam_schedule.exam_date, exam_schedule.total_no, exam_schedule.is_self, exam_schedule.notes, exam_schedule.sem, exam_schedule.`year`, courses.CourseName, courses.CourseArbName FROM exam_schedule, courses WHERE exam_schedule.CourseCode = courses.CourseCode AND exam_schedule.SchID = $code";
$legandata = mysqli_query($bis,$query_legandata) or die(mysqli_error($bis));
$row_legandata = mysqli_fetch_assoc($legandata);
$totalRows_legandata = mysqli_num_rows($legandata);


$query_leganList = "SELECT count(*) FROM students_legan WHERE students_legan.SchID = '$code' AND students_legan.lagna_no='$lagna' ";
$leganList = mysqli_query($bis,$query_leganList) or die(mysqli_error($bis));
$row_leganList = mysqli_fetch_assoc($leganList);
$totalRows_leganList = mysqli_num_rows($leganList);


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Student Affairs Profile</title>

<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><script type="text/javascript" src="stmenu.js"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style11 {font-family: "Traditional Arabic"; font-weight: bold; font-size: 18px; }
-->
</style>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>

<body topmargin="0" leftmargin="0" bottommargin="0" rightmargin="0">

<p class="title"><u></u></p>

<p class="title"><u>اضافة وحذف الملاحظين في اللجان</u></p> 


<table width="90%" border="1" align="center" bordercolor="#666666">
        <tr>
          <td width="33%" height="30" align="center"><span class="style25"><u>
            <?php if($sem == 1){echo "الآول";} elseif($sem == 2){echo "الثانى";}else {echo "الصيفى";}?>
            &nbsp;لعام&nbsp;<?php echo $year-1 ." / ".$year;?></u></span></td>
          <td width="5%" height="30" align="center"><span class="style23">:</span></td>
          <td width="15%" height="30" align="center" bgcolor="#EFEFEF"><span class="style23">الفصل الدراسى</span></td>
          <td width="2%" height="30" align="center" bgcolor="#999999"><span class="style23"></span></td>
          <td width="25%" height="30" align="center"><span class="style23"><span class="style3"><u><span class="r style23 style21"><strong><?php echo $row_legandata['CourseArbName']; ?></strong></span></u></span></span></td>
          <td width="5%" height="30" align="center"><span class="style23">:</span></td>
          <td width="15%" height="30" align="center" bgcolor="#EFEFEF"><span class="style23">اسم الماده</span></td>
        </tr>
        <tr>
          <td width="33%" height="30" align="center"><span class="style25"><?php echo $row_leganList['count(*)'];  ?> </span></td>
          <td width="5%" height="30" align="center"><span class="style23">:</span></td>
          <td width="15%" height="30" align="center" bgcolor="#EFEFEF"><span class="style23">عدد الطلاب</span></td>
          <td width="2%" height="30" align="center" bgcolor="#999999"><span class="style23"></span></td>
          <td width="25%" height="30" align="center"><span class="style25"><u><?php echo 
          $lagna; ?></u></span></td>
          <td width="5%" height="30" align="center"><span class="style23">:</span></td>
          <td width="15%" height="30" align="center" bgcolor="#EFEFEF"><span class="style23">رقم اللجنة</span></td>
        </tr>
        <tr>
          <td width="33%" height="30" align="center"><span class="style27">ميدتيرم - 
            <?php if($row_legandata['period'] == 1) echo " الفتره الاولي من 9.45 إلي 10.15"; else if($row_legandata['period'] == 2) echo " الفتره الثانية من 1.15 إلي 1.45";?>
          </span></td>
          <td width="5%" height="30" rowspan="2" align="center"><span class="style23">:</span></td>
          <td width="15%" height="30" rowspan="2" align="center" bgcolor="#EFEFEF"><span class="style23">الفترة</span></td>
          <td width="2%" height="30" rowspan="2" align="center" bgcolor="#999999"><span class="style23"></span></td>
          <td width="25%" height="30" rowspan="2" align="center"><span class="style25">
            <?php if($row_legandata['day']=="Saturday")echo "السبت"; if($row_legandata['day']=="Sunday")echo "الأحد"; if($row_legandata['day']=="Monday")echo "الاثنين"; if($row_legandata['day']=="Tuesday")echo "الثلاثاء"; if($row_legandata['day']=="Wednesday")echo "الأربعاء"; if($row_legandata['day']=="Thursday")echo "الخميس"; ?>
            -&nbsp; <?php echo $row_legandata['exam_date']; ?></span></td>
          <td width="5%" height="30" rowspan="2" align="center"><span class="style23">:</span></td>
          <td width="15%" height="30" rowspan="2" align="center" bgcolor="#EFEFEF"><span class="style23">تاريخ الامتحان</span></td>
        </tr>
        <tr>
          <td width="33%" height="30" align="center"><span class="style27">فاينال -
            <?php if($row_legandata['period'] == 1) echo " الفتره الاولي من 10.30 إلي 12.30"; else if($row_legandata['period'] == 2) echo " الفتره الثانية من 2.00 إلي 4.00";?>
          </span></td>
        </tr>
      </table>


      <br> <br>
    <table width="500" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#CCCCCC" >
<form action="add_legan_employee.php" method="POST" name="save" name="form1">
<tr>
<td colspan="2" align="center" valign="middle" bgcolor="yellow">
تسكين الملاحظ في اللجنة</td>

<tr><td align="center" valign="middle">
<select name="employee" >
<?php 
$sSQL= 'SET CHARACTER SET utf8'; 
mysqli_query($bis,$sSQL) or die ('Can\'t charset in DataBase'); 
$sem=$row_currentsem['SemesterCode'];
$year=$row_currentsem['semesterYear'];
$query="select * from exam_employees";
$query1=mysqli_query($bis,$query) or die(mysqli_error($bis));
$que=mysqli_fetch_array($query1);
do{
?>
<option value="<?php echo $que['empID'];?>"> 
<?php echo $que['emp_name'];?> </option>
<?php }while($que=mysqli_fetch_array($query1)); ?>
</select> </td>
<td align="center" valign="middle"><label> اسم الملاحظ</label> 
<br>
</td></tr>

<tr><td colspan="2" align="center" valign="middle">

  <input type="hidden" id="course" name="course" value="<?php echo $code;?>">
  <input type="hidden" id="lagna" name="lagna" value="<?php echo $lagna;?>">    
  <input type="submit" value="حفظ" name="save" />
</td></tr>
</form>
</table>
<br>
<br>

<table table width="900" border="2" align="center" cellpadding="0" cellspacing="1" bordercolor="#CCCCCC">
<tr><td colspan="6" align="center" bgcolor="#CCCCCC"> الملاحظين الذين تم تسكينهم في اللجنة</td></tr>
<tr>
<th> حذف</th>
<th>اسم الملاحظ</th>
<th> م</th>
</tr>
<?php 
$x=1;
$sSQL= 'SET CHARACTER SET utf8'; 
mysqli_query($bis,$sSQL) or die ('Can\'t charset in DataBase'); 
mysqli_select_db($bis,$database_bis);
$query_legan_employees = "SELECT * FROM exam_employees, legan_employees, exam_schedule WHERE exam_schedule.SchID=legan_employees.SchID AND legan_employees.empID=exam_employees.empID AND exam_schedule.SchID= $code AND legan_employees.lagna_no = $lagna";
$legan_employees = mysqli_query($bis,$query_legan_employees) or die(mysqli_error($bis));
$row_legan_employees = mysqli_fetch_assoc($legan_employees);
$totalRows_legan_employees = mysqli_num_rows($legan_employees);
do{
?>
<tr>

<td align="center"> 

<form action="" method ="POST">
<input type="submit" value="مسح" name="delete"/>

</form>


</td>
<td align="center"> <?php echo $row_legan_employees['emp_name']; ?></td>
<td align="center"> <?php echo $x; ?></td>
</tr>
<?php $x++;} while($course_que=mysqli_fetch_array($course_query1)); ?>
</table>
<script type="text/javascript">
/* <!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
//--> */
</script>
</body>
</html>
