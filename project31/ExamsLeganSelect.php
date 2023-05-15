

<?php
include '/xampp/htdocs/graduation_project/Connections/bis.php';
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
 
$query_currentSemester = "SELECT curentsemester.Year, curentsemester.Sem FROM curentsemester ";
$currentSemester = mysqli_query($bis,$query_currentSemester) or die(mysqli_error($bis));
$row_currentSemester = mysqli_fetch_assoc($currentSemester);
$totalRows_currentSemester = mysqli_num_rows($currentSemester);

$sem = $row_currentSemester['Sem'];
$year = $row_currentSemester['Year'];

$query_CurrentCourses = "SELECT distinct doctorscourse.CourseCode , courses.CourseArbName, doctorscourse.SemesterCode FROM doctorscourse, courses WHERE doctorscourse.CourseCode = courses.CourseCode AND doctorscourse.SemesterCode = $sem AND doctorscourse.Year = $year";
$CurrentCourses = mysqli_query($bis,$query_CurrentCourses) or die(mysqli_error($bis));
$row_CurrentCourses = mysqli_fetch_assoc($CurrentCourses);
$totalRows_CurrentCourses = mysqli_num_rows($CurrentCourses);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>

<body>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <th height="41" align="left" valign="middle" scope="row"><span class="style136">عمل لجان الامتحانات</span></th>
  </tr>
  <tr>
    <th width="776" align="center" valign="top" scope="row"><p class="style3"><u><br />
      المقررات الدراسيه للفصل الدراسى<br />
    </u></p>
        <table width="668" border="0" align="center" cellpadding="0" cellspacing="1" bordercolor="#D0D0D0">
          <tr>
            <th width="150" scope="col"><span class="style1">اختر</span></th>
            <th width="150" height="30" scope="col"><span class="style1">عدد الطلبه المسجلين</span></th>
            <th width="200" height="30" scope="col"><span class="style1">إســـم الماده</span></th>
            <th width="100" height="30" scope="col"><span class="style1">كود الماده</span></th>
            <th width="50" height="30" scope="col"><span class="style1">مسلسل</span></th>
          </tr>
          <?php  $x = 1; do { 

	$CourseCode2 = $row_CurrentCourses['CourseCode'];
		 
$query_studentNumber = "SELECT degree.StudentCode FROM degree WHERE degree.Semester = $sem  AND degree.`Year` = $year AND degree.coursecode = '$CourseCode2' ";
$studentNumber = mysqli_query($bis,$query_studentNumber) or die(mysqli_error($bis));
$row_studentNumber = mysqli_fetch_assoc($studentNumber);
$totalRows_studentNumber = mysqli_num_rows($studentNumber);

		?>
          <tr align="center" valign="middle">
            <th width="150" scope="row"><a href="index.php?page=ExLeganCourse&amp;code=<?php echo $row_CurrentCourses['CourseCode']; ?>">اختر</a></th>
            <th width="150" height="30" scope="row">&nbsp;<?php echo $totalRows_studentNumber ?> </th>
            <td width="200" height="30"><?php echo $row_CurrentCourses['CourseArbName']; ?></td>
            <td width="100" height="30"><?php echo $row_CurrentCourses['CourseCode']; ?></td>
            <td width="50" height="30"><span class="style19"> <?php echo $x++;?> </span></td>
          </tr>
          <tr align="center" valign="middle">
            <th height="10" colspan="5" scope="row"><hr align="center" width="100%" noshade /></th>
          </tr>
          <?php } while ($row_CurrentCourses = mysqli_fetch_assoc($CurrentCourses)); ?>
        </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p></th>
  </tr>
</table>
</body>
</html>
