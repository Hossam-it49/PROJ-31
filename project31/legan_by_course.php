 <?php
     include '/xampp/htdocs/graduation_project/Connections/bis.php';
     include '/xampp/htdocs/graduation_project/admin/auth.php';

 ?>
 


 
<?php


$code = $_GET['schid'];
$query_currentSemester = "SELECT curentsemester.Year, curentsemester.Sem FROM curentsemester ";
$currentSemester = mysqli_query($bis,$query_currentSemester) or die(mysqli_error($bis));
$row_currentSemester = mysqli_fetch_assoc($currentSemester);
$totalRows_currentSemester = mysqli_num_rows($currentSemester);

$sem = $row_currentSemester['Sem'];
$year = $row_currentSemester['Year'];


$query_legandata = "SELECT exam_schedule.CourseCode, exam_schedule.period, exam_schedule.`day`, exam_schedule.exam_date, exam_schedule.total_no, exam_schedule.is_self, exam_schedule.notes, exam_schedule.sem, exam_schedule.`year`, courses.CourseName, courses.CourseArbName FROM exam_schedule, courses WHERE exam_schedule.CourseCode = courses.CourseCode AND exam_schedule.SchID = $code";
$legandata = mysqli_query($bis,$query_legandata) or die(mysqli_error($bis));
$row_legandata = mysqli_fetch_assoc($legandata);
$totalRows_legandata = mysqli_num_rows($legandata);


$query_leganList = "SELECT students_legan.lagna_no , count(*), legan_list.lagna_name  FROM students_legan, legan_list WHERE students_legan.lagna_no = legan_list.lagna_no AND students_legan.schid = $code  group by students_legan.lagna_no";
$leganList = mysqli_query($bis,$query_leganList) or die(mysqli_error($bis));
$row_leganList = mysqli_fetch_assoc($leganList);
$totalRows_leganList = mysqli_num_rows($leganList);






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
.style23 {font-family: Calibri}
.r {	color: #F00;
}
.style3 {font-size: 18px}
.style25 {font-family: Calibri; font-size: 21px; }
.style27 {font-size: 18px; font-family: Calibri; }
.style28 {font-size: 16px}
.style29 {
	font-size: 24px;
	font-family: Calibri;
}
.style31 {font-family: Calibri; font-size: 20px; }
.style32 {font-size: 20px}
 
</style></head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
    <th width="374" height="120" align="left" valign="bottom" scope="col"> <p class="style11 style28"><u>تاربخ الطباعة <?php echo date('Y-m-d');?></u></p></th>
    <th width="720" height="120" align="center" valign="middle" scope="col"><span class="style22"><font color="#FFFFFF">.............</font></span>
       
 
      <img src="../images/Helwan_univercity_logo.png" alt="" width="100" height="100" />&nbsp;&nbsp;<br /></th>
  </tr>
  
  <tr>
    <th colspan="2" align="center" valign="top" scope="row"><hr align="center" width="100%" noshade="noshade" />
      <p class="style21 style23"><a href="index.php?page=displayexamSch">لجان امتحان ماده</a></p>
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
          <td width="33%" height="30" align="center"><span class="style25"><?php echo $row_legandata['total_no']; ?> </span></td>
          <td width="5%" height="30" align="center"><span class="style23">:</span></td>
          <td width="15%" height="30" align="center" bgcolor="#EFEFEF"><span class="style23">عدد الطلاب</span></td>
          <td width="2%" height="30" align="center" bgcolor="#999999"><span class="style23"></span></td>
          <td width="25%" height="30" align="center"><span class="style25"><u><?php echo $totalRows_leganList ?></u></span></td>
          <td width="5%" height="30" align="center"><span class="style23">:</span></td>
          <td width="15%" height="30" align="center" bgcolor="#EFEFEF"><span class="style23">عدد اللجان</span></td>
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
      <table width="80%" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#333333">
        <tr bgcolor="#ffff00">
        
        <th width="12%" height="30" scope="col"><span class="style23"> تسكين المراقبين </span></th>
        <th width="12%" height="30" scope="col"><span class="style23">عرض الفاينال</span></th>
          <th width="12%" scope="col"><span class="style23">عرض الميدتيرم</span></th>
          <th width="29%" scope="col"><span class="style23">اسم الدكتور</span></th>
          <th width="12%" height="30" scope="col"><span class="style23">عدد الطلبة بها</span></th>
          <th width="20%" height="30" scope="col"><span class="style23">اسم اللجنه</span></th>
          <th width="5%" height="30" scope="col"><span class="style23">مسلسل</span></th>
        </tr>


        <?php $x=1; $sum=0; do { 
		
		$sum +=$row_leganList['count(*)'];
		$legan_id = $row_leganList['lagna_no'];
 
$query_legan_doctors = "SELECT students_legan.group_id , count(*), doctorscourse.DoctorCode, doctors_account.NameAr FROM students_legan, doctorscourse, doctors_account WHERE students_legan.schid = $code AND students_legan.lagna_no = $legan_id AND doctorscourse.id = students_legan.group_id AND doctors_account.DoctorCode = doctorscourse.DoctorCode GROUP BY doctorscourse.DoctorCode";
$legan_doctors = mysqli_query($bis,$query_legan_doctors) or die(mysqli_error($bis));
$row_legan_doctors = mysqli_fetch_assoc($legan_doctors);
$totalRows_legan_doctors = mysqli_num_rows($legan_doctors);
		
		 ?>
        <tr align="center" valign="middle" <?php if($totalRows_legan_doctors >1 ) { ?>  bgcolor="#99FF99" <?php } ?>>
            
          <th width="12%" height="30" align="center" valign="middle" scope="row"><a href="p31/assign_observers.php?lagna=<?php echo $row_leganList['lagna_no']; ?>"><span class="style23"> تسكسين المراقبين </span></a></th>
          <th width="12%" height="30" align="center" valign="middle" scope="row"><a href="lagna_students_names_final.php?SchID=<?php echo $code;?>&amp;lagna=<?php echo $row_leganList['lagna_no']; ?>"><span class="style23">عرض الفاينال</span></a></th>
            <th width="12%" height="30" align="center" valign="middle" scope="row"><a href="lagna_students_names_mid.php?SchID=<?php echo $code;?>&amp;lagna=<?php echo $row_leganList['lagna_no']; ?>"><span class="style23">عرض الميدتيرم</span></a></th>
            <th width="29%" align="center" valign="middle" scope="row"><?php do { ?>
              <table width="90%" border="0">
                <?php
                    
                ?>
                <tr>
                  <td align="center">د. <?php  echo $row_legan_doctors['NameAr'];  ?> </td>
                </tr>
                                </table>
                <?php } while ($row_legan_doctors = mysqli_fetch_assoc($legan_doctors)); ?></th>
            <th width="12%" height="30" align="center" valign="middle" scope="row"> <table width="90%" border="0">
              </table>  
          <span class="style32"><?php echo $row_leganList['count(*)']; ?> </span></th>
            <td width="20%" align="center" valign="middle"><span class="style31"><?php echo $row_leganList['lagna_name']; ?></span></td>
            <td width="5%" align="center" valign="middle"> <span class="style23"><?php echo $x++; ?></span></td>
          </tr>
          <?php } while ($row_leganList = mysqli_fetch_assoc($leganList)); ?>
          <tr align="center" valign="middle">
            <th width="15%" height="30" valign="top" scope="row">&nbsp;</th>
            <th width="15%" height="30" valign="top" scope="row">&nbsp;</th>
            <th valign="middle" bgcolor="#FFFF00" scope="row">&nbsp;</th>
            <th width="15%" height="30" valign="middle" bgcolor="#FFFF00" scope="row">   <span class="style31">&nbsp;<?php echo $sum; ?> </span></th>
            <td colspan="2" align="center" bgcolor="#CCCCCC"><span class="style21">الاجمالي</span></td>
          </tr>
</table>
</th>
</tr>
</table>

</body>
</html>
<?php
mysqli_free_result($legan_doctors);
?>

