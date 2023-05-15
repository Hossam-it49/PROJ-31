<?php
     include '/xampp/htdocs/graduation_project/Connections/bis.php';
     include '/xampp/htdocs/graduation_project/admin/auth.php';

 ?>
 


 
<?php


$code = $_GET['lagna'];
$query_currentSemester = "SELECT curentsemester.Year, curentsemester.Sem FROM curentsemester ";
$currentSemester = mysqli_query($bis,$query_currentSemester) or die(mysqli_error($bis));
$row_currentSemester = mysqli_fetch_assoc($currentSemester);
$totalRows_currentSemester = mysqli_num_rows($currentSemester);

$sem = $row_currentSemester['Sem'];
$year = $row_currentSemester['Year'];

$getData= "SELECT * FROM `p31_observers` WHERE lagna_no IS NULL"; 
         $observers=mysqli_query($bis, $getData) or die(mysqli_error($bis));
        $getData1=mysqli_fetch_array($observers);
if(isset($_POST['save']))  { 

  $obser=$_POST['obser'] ;  
  
 $observer = "UPDATE `p31_observers` SET `lagna_no`='$code' WHERE code=' $obser'";
  $query1=mysqli_query($bis, $observer) or die(mysqli_error($bis));
  
  };
 
?>

<!DOCTYPE html>
 
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </head>
    <body>

    <form id="myForm" style="width: 60%; margin:auto; background-color:#D1D9DF;" action="assign_observers.php?lagna=<?php echo $code?>" method="post" class=" mt-5 rounded align-items-center border border-danger-subtle border-3  p-1 text-center">
    <?php
         $getData= "SELECT * FROM `p31_observers` WHERE lagna_no IS NULL"; 
         $observers=mysqli_query($bis, $getData) or die(mysqli_error($bis));
        $getData1=mysqli_fetch_array($observers);
      ?>
    <div > 
        <label for="in"> حدد عدد المراقبين</label><br>
    <input name='in' type='number'> 
    <button name='add' class="btn btn-primary m-2" type="submit">add</button>
</div>

      <div  class=' p-2'>
      <label> المراقبين </label>
      <?php
  
  if (isset($_POST['add'])){
   $i= $_POST['in']; 
  for ($x = 0; $x <  $i; $x++) {
  
  

  ?> 
      <select style="text-align: center;" name='obser' class='form-select' aria-label='Default select example'>
        <?php
                foreach  ($observers as $observer){
        ?>
       <option value=" <?php  echo $observer['code'];?>" > <?php echo $observer['name_ar'];?> </option>
       <?php
                };
       ?>
     </select> <br>
     <?php
           };
        };
     ?> </div>
      <button name='save' class="btn btn-primary m-2" type="submit">Save</button>


</form>



        <!-- <script>

// /create a new text input element   
     let myinput=document.getElementById('input')
           function inputCount(){
            
                     

                         for (let i = 0; i < myinput.value; i++) {
               
                // append the new input element to the form element
                var newInput = document.createElement("select");
             
                document.getElementById("myForm").appendChild(newInput);     
                  
                        }
              
                     
                      
             }


        </script> -->
    </body>
</html>




