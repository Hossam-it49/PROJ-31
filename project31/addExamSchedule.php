 <?php
   include '/xampp/htdocs/graduation_project/Connections/bis.php';
   include '/xampp/htdocs/graduation_project/style.php';
 include '/xampp/htdocs/graduation_project/admin/auth.php';
 

   $query_currentsem = "SELECT * FROM curentsemester";
   $currentsem = mysqli_query($bis, $query_currentsem) or die(mysqli_error($bis));
   $row_currentsem = mysqli_fetch_assoc($currentsem);
   $totalRows_currentsem = mysqli_num_rows($currentsem);
   $sem=$row_currentsem['Sem'];
   $year=$row_currentsem['Year'];
      

if (isset($_POST["save"])) {

  if (!isset($_SESSION)) {
    session_start();
  }
 
  $day=$_POST['day'];
  $courseName=$_POST['course'];
  $date=$_POST['datee'];
  $interval=$_POST['interval'];
  $self=$_POST['selfe'];
  $sQL= 'SET NAMES utf8'; 
  $examtype = $_POST['examtype'];

  $qu="SELECT CourseCode from courses where CourseArbName='$courseName'";
$quer=mysqli_query($bis, $qu)or die("Error: ".mysqli_error($bis));
$q=mysqli_fetch_assoc($quer);
$courseCode=$q['CourseCode'];
  $ins= "INSERT INTO exam_schedule (CourseCode,day,exam_date,period,total_no, is_self,sem, year, examtypes,notes)
  VALUES ('$courseCode','$day','$date','$interval','$totalRows_currentsem','$self','$sem','2023', '$examtype','Hossam' )";
 $query1=mysqli_query($bis, $ins) or die(mysqli_error($bis));
     
};

?>
  
 <!DOCTYPE html>
 <html lang="en">
 <head>
 
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Student Affairs Profile</title>

</head>
 <body class="container color-change-2x">


    <center> <h4 class="mt-5 tracking-in-expand">ادخال لجان الامتحانات</h4> </center> <br>
    <form class="slide-in-elliptic-top-fwd" action="addExamSchedule.php" method="POST" name="save">
    <table width="600" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#CCCCCC" class="border border-primary">
<tr align="right">
<tr><td width="450" colspan="5" align="right" valign="middle">
  <span class="style13">


  <?php 
  // select code
$sSQL= 'SET CHARACTER SET utf8'; 
mysqli_query($bis, $sSQL) or die ('Can\'t charset in DataBase'); 
$query="SELECT  * FROM courses";
$query1=mysqli_query($bis, $query) or die(mysqli_error($bis));
$que=mysqli_fetch_array($query1);  ?>
  
<select name="course"  size="1">
  
<?php
while($que=mysqli_fetch_array($query1)){
?>
  <option value="<?php  echo $que['CourseArbName'];?>"> <?php  echo $que['CourseArbName'];?> </option>
  <?php }; ?>
  </select>
 

  </span> </td>
<td width="150" align="center" valign="middle">
 <center>
<span class="style12">
  <label> المادة</label> 
  <br>
</span>
</center></td>
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
<input name="datee" type="date"> </td>
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
  <input type="radio" name="selfe" value="1" />
  <label> No</label>
  <input type="radio" name="selfe" value="0" checked="checked" />
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
<input type="hidden" name="cd" value="" checked="checked" />
<input type="submit" value="حفظ" name="save" id="save"/>
</td></tr>
</table>
    <span class="style13"><br>
    </span>
</form>

<br>
<br>

<table class="border border-warning slide-in-elliptic-top-fwd " table width="900" border="2" align="center" cellpadding="0" cellspacing="1" bordercolor="#CCCCCC">
<tr><td colspan="9" align="center" bgcolor="#CCCCCC"><span class="style12"> المواد التي تم ادخالها</span></td>
</tr>
<tr>
<th class="border border-danger">نوع الامتحان</th>
<th class="border border-danger">كود الماده</th>
<th class="border border-danger">كود الجدول</th>
<th class="border border-danger"> العدد</th>
<th class="border border-danger p-2 ms-2"> المادة</th>
<th class="border border-danger">الفترة </th>
<th class="border border-danger"> التاريخ</th>
<th class="border border-danger">اليوم </th>
<th class="border border-danger"> م</th>
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
  <td  class="border  "align="center"><?php echo $course_que['examtypes']; ?></td>
  <td class="border  " align="center"><?php echo $course_que['CourseCode']; ?></td>
  <td class="border  " align="center"><?php echo $course_que['SchID']; ?></td>

<td class="border  " align="center"> <?php echo $course_que['total_no']; ?></td>
<td class="border  " align="center"> <?php echo $course_que['CourseName']; ?> </td>
<td class="border  " align="center"> <?php echo $course_que['period']; ?></td>
<td class="border  " align="center"> <?php echo $course_que['exam_date']; ?></td>
<td class="border  "align="center"> <?php echo $course_que['day']; ?></td>
<td class="border  " align="center"> <?php echo $x; ?></td>
</tr>
<?php $x++;} while($course_que=mysqli_fetch_array($course_query1)); ?>
</table>
<center> 
 <a class="btn btn-outline-primary mt-2" href="/graduation_project/display_exam_schedule.php"> عرض جدول ا متحان الفاينل</a>
 <a class="btn btn-outline-primary mt-2" href="/graduation_project/display_exam_schedule_mid.php"> عرض جدول ا متحان الميد</a>
 
</center>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
 </body>
 </html>