<?php
    include '/xampp/htdocs/graduation_project/Connections/bis.php';
    include '/xampp/htdocs/graduation_project/admin/auth.php';

 if(isset($_POST['save']))  { 

 $nameen=$_POST['NameEn'] ;  
 $namear=$_POST['NameAr'] ;
 $nid=$_POST['nid'] ;
 $phone=$_POST['phone'] ;

 
 
$observer = "INSERT INTO p31_observers (name_en, name_ar, nid, phone)
VALUES ('$nameen', '$namear', '$nid' , '$phone')";
 $query1=mysqli_query($bis, $observer) or die(mysqli_error($bis));

 };

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<title>Add Observers</title>
</head>
<body class="container" style="background-color: #092147;" >

<form style="width: 60%; margin:auto; background-color:#D1D9DF;" action="addobservers.php" method="post" class="rounded mt-5 align-items-center border border-danger-subtle border-3  p-1 text-center">
<div  class=" p-2">
 <label>  Name in English </label>
<input name="NameEn" class="form-control" type="text" placeholder="Enter Name in English" aria-label="default input example">
</div>

<div  class=" p-2">
 <label> Name in Arabic </label>
<input name="NameAr" class="form-control" type="text" placeholder="Enter Name in Arabic" aria-label="default input example">
</div>

<div  class=" p-2">
 <label> National ID </label>
<input name="nid" class="form-control" type="number" placeholder="Enter national id" aria-label="default input example">
</div>
<div  class=" p-2">
 <label> Phone </label>
<input name="phone" class="form-control" type="number" placeholder="Enter phone" aria-label="default input example">
</div>


<button name="save" class="btn btn-primary m-2" type="submit">Save</button>

</form>

<!-- Select From database -->
<table class="table m-3 rounded text-white" style="background-color: #2A384C";>
  <thead>
    <tr>
      <th scope="col">code</th>
      <th scope="col"> Name in English</th>
      <th scope="col">National ID</th>
      <th scope="col">phone</th>
    </tr>
  </thead>
  <?php
  $getData= "SELECT * FROM  p31_observers"; 
 $observers=mysqli_query($bis, $getData) or die(mysqli_error($bis));
$getData1=mysqli_fetch_array($observers);
foreach($observers as $observer){
?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $observer['code']?></th>
      <th scope="row"><?php echo $observer['name_en']?></th>
      <th scope="row"><?php echo $observer['nid']?></th>
      <th scope="row"><?php echo $observer['phone']?></th>
       
    </tr>
<?php
}
  ?>
 
  </tbody>
</table>



</body>
</html>