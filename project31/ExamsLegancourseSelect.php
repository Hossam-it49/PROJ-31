
<?php
include '/xampp/htdocs/graduation_project/Connections/bis.php';

// if (!function_exists("GetSQLValueString")) {
// function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
// {
//   $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

//   $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

//   switch ($theType) {
//     case "text":
//       $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
//       break;    
//     case "long":
//     case "int":
//       $theValue = ($theValue != "") ? intval($theValue) : "NULL";
//       break;
//     case "double":
//       $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
//       break;
//     case "date":
//       $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
//       break;
//     case "defined":
//       $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
//       break;
//   }
//   return $theValue;
// }
// }

 
$query_coursedata = "SELECT courses.CourseName, courses.CourseArbName, courses.CourseCode FROM courses WHERE courses.CourseCode = '$code'";
$coursedata = mysqli_query($bis, $query_coursedata) or die(mysqli_error());
$row_coursedata = mysqli_fetch_assoc($coursedata);
$totalRows_coursedata = mysqli_num_rows($coursedata);


mysqli_select_db($bis, $database_bis);
$query_currentSemester = "SELECT curentsemester.semesterYear, curentsemester.SemesterCode FROM curentsemester ";
$currentSemester = mysqli_query($bis, $query_currentSemester) or die(mysqli_error());
$row_currentSemester = mysqli_fetch_assoc($currentSemester);
$totalRows_currentSemester = mysqli_num_rows($currentSemester);

$sem = $row_currentSemester['SemesterCode'];
$year = $row_currentSemester['semesterYear'];

mysqli_select_db($bis, $database_bis);
$query_CurrentCourses = "SELECT distinct doctorscourse.CourseCode, courses.CourseArbName, doctorscourse.SemesterCode FROM doctorscourse, courses WHERE doctorscourse.CourseCode = courses.CourseCode AND doctorscourse.SemesterCode = $sem AND doctorscourse.semesterYear = $year";
$CurrentCourses = mysqli_query($bis, $query_CurrentCourses) or die(mysqli_error());
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
    <th width="776" align="center" valign="top" scope="row"><p class="style3"><u>اسم المقرر&nbsp; :&nbsp; <span class="style1"><?php echo $row_coursedata['CourseArbName']; ?></span></u></p>
      <p class="style3">&nbsp;</p>
      <table width="300" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="251" height="40" align="right" valign="middle"><a href="index.php?page=stcourselist&amp;code=<?php echo $row_coursedata['CourseCode']; ?>">عرض اسماء الطلاب</a></td>
          <td width="49" height="40" align="right" valign="middle">1</td>
        </tr>
        <tr>
          <td height="40" align="right" valign="middle"><a href="Students_Subjects_names_all_excel.php?code=<?php echo $row_coursedata['CourseCode']; ?>">حفظ اسماء الطلاب</a></td>
          <td height="40" align="right" valign="middle">2</td>
        </tr>
        <tr>
          <td height="40" align="right" valign="middle"><a href="index.php?page=leganmidTerm&amp;code=<?php echo $row_coursedata['CourseCode']; ?>">عمل وطباعه لجان الامتحان - ميدتيرم</a></td>
          <td height="40" align="right" valign="middle">3</td>
        </tr>
        <tr>
          <td height="40" align="right" valign="middle"><a href="index.php?page=leganFinal&amp;code=<?php echo $row_coursedata['CourseCode']; ?>">عمل وطباعه لجان الامتحان - النهائى</a></td>
          <td height="40" align="right" valign="middle">4</td>
        </tr>
      </table>
      <p class="style3"><u><br />
      </u></p>
    </th>
  </tr>
</table>
</body>
</html>

