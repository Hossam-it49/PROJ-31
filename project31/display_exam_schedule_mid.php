<?php
 
 
 include '/xampp/htdocs/graduation_project/Connections/bis.php';
 include '/xampp/htdocs/graduation_project/style.php';
 include '/xampp/htdocs/graduation_project/admin/auth.php';


 
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


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
 
</style>
</head>

<body>
<table class="scale-in-tr" width="1000" border="0" align="center" cellpadding="0" cellspacing="1">
 
  <tr>
    <th colspan="2" align="center" valign="top" scope="row"><p class="style21   style23"><u>جدول امتحان الميدتيرم الفصل الدراسي <span class="tracking-in-expand" > 
          <?php if($row_currentSemester['Sem'] == 1 ) echo "الاول"; else if($row_currentSemester['Sem'] == 2 ) echo "الثانى"; else if($row_currentSemester['Sem'] == 3 ) echo "الصيفى"; ?>
          &nbsp; </span>لعام&nbsp; <span class="style238 "><?php echo $row_currentSemester['Year']; ?>
          
          </span></u></p>

      <p><span class="style21 style23"><u>تاربخ الطباعة  <?php echo date('Y-m-d');?></u></span>      </p>
      <table width="90%" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#333333">
        <tr bgcolor="#ffff00">
          <th width="450" scope="col"><span class="style23">الفترة الرابعه</span></th>
          <th width="450" scope="col"><span class="style23">الفترة الثالثه</span></th>
        
        <th width="450" height="30" scope="col"><span class="style23">الفترة الثانية</span></th>
          <th width="450" height="30" scope="col"><span class="style23">الفترة الأولي</span></th>
          <th width="300" height="30" scope="col"><span class="style23">  اليوم-التاريخ</span></th>
          <th width="50" height="30" scope="col"><span class="style23">مسلسل</span></th>
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
          <th width="900" valign="top" scope="row">
          
          
          <table width="90%" border="0"> 
              <?php 

       do{      
			  ?>

<?php 


if( $row_exam_course4['period']==4 ){
  ?>
<tr><td align="center" class="style23" border="1"> <span style="color:red; font-weight: bold;"><?php echo $row_exam_course4['total_no']; ?></span></td><td border="1" width="300" align="center"> <a href="legan_by_course.php?code=<?php echo $row_exam_course4['CourseCode'];?>&amp;schid=<?php echo $row_exam_course4['SchID'];?>"> <?php echo $row_exam_course4['CourseName'];?></a><a href="legan_by_course_mid.php?code=<?php echo $row_exam_course4['CourseCode'];?>"> </a>  <?php if($row_exam_course4['is_self']==1){echo '<span style="color:red;">(SS)</span>';}?></td>
</tr>
<tr>
  <td colspan="2" align="center" class="style23" border="1"><hr /></td>
  </tr>

<?php } else echo ' --------' ;

}while ($row_exam_course4 = mysqli_fetch_assoc($exam_course4)); ?>
   </table></th>
          <th width="900" valign="top" scope="row"><table width="90%" border="0"> 
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
   </table></th>

          <th width="900" height="30" valign="top" scope="row"> <table width="90%" border="0"> 
              <?php 

       do{      
			  ?>

<?php 


if($row_exam_course2['period']==2) {


  ?>
<tr><td align="center" class="style23" border="1"> <span style="color:red; font-weight: bold;"><?php echo $row_exam_course2['total_no']; ?></span></td><td border="1" width="300" align="center"> <a href="legan_by_course.php?code=<?php echo $row_exam_course2['CourseCode'];?>&amp;schid=<?php echo $row_exam_course2['SchID'];?>"> <?php echo $row_exam_course2['CourseName'];?></a><a href="legan_by_course_mid.php?code=<?php echo $row_exam_course2['CourseCode'];?>"><?php echo $row_exam_course2['notes'];?></a>  <?php if($row_exam_course2['is_self']==1){echo '<span style="color:red;">(SS)</span>';}?></td>
</tr>
<tr>
  <td colspan="2" align="center" class="style23" border="1"><hr /></td>
  </tr>

<?php }

}while ($row_exam_course2 = mysqli_fetch_assoc($exam_course2)); ?>
   </table>  </th>




         <th width="900" height="30" valign="top" scope="row"> <table width="90%" border="0">
              <?php 



do{
        ?>

<?php 


if($row_exam_course1['period']==1) {


  ?>
<tr><td align="center" class="style23" border="1"> <span style="color:red; font-weight: bold;"><?php echo $row_exam_course1['total_no']; ?></span></td><td border="1" width="300" align="center"> <a href="legan_by_course.php?code=<?php echo $row_exam_course1['CourseCode'];?>&amp;schid=<?php echo $row_exam_course1['SchID'];?>"> <?php echo $row_exam_course1['CourseName'];?><?php echo $row_exam_course1['notes'];?>
  <?php if($row_exam_course1['is_self']==1){echo ' <span style="color:red;">(SS)</span>';}?>
</a></td>  
</tr>
<tr>
  <td colspan="2" align="center" class="style23" border="1"><hr /></td>
  </tr>

<?php }


}while ($row_exam_course1 = mysqli_fetch_assoc($exam_course1)); ?>
   </table>  </th>



 
<td align="center">   <span class="style23">
  <?php if($row_CurrentDay['day']=="Saturday")echo "السبت"; if($row_CurrentDay['day']=="Sunday")echo "الأحد"; if($row_CurrentDay['day']=="Monday")echo "الاثنين"; if($row_CurrentDay['day']=="Tuesday")echo "الثلاثاء"; if($row_CurrentDay['day']=="Wednesday")echo "الأربعاء"; if($row_CurrentDay['day']=="Thursday")echo "الخميس"; ?> 
  <br>
  <?php echo $row_CurrentDay['exam_date']; ?></span></td>

<td align="center"> <span class="style23"><?php echo $x; ?></span></td>
</tr>
<?php $x++;} while($row_CurrentDay = mysqli_fetch_assoc($CurrentDay)); ?>
</table>
<br></th>
</tr>
</table>

</body>
</html>