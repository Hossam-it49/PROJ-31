<?php
     include '/xampp/htdocs/project31/Connections/bis.php';
     include '/xampp/htdocs/project31/admin/auth.php';
     include '/xampp/htdocs/project31/admin_dashboard/adminDash/pages/aside.php';
   

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

$observer=$_POST['observer'] ;  
  

$update= "UPDATE `p31_observers` SET `lagna_no`=$code WHERE `code`='$observer'";
$update1=mysqli_query($bis, $update) or die(mysqli_error($bis));
if(isset($_POST['observer2'])){
$observer2=$_POST['observer2'] ;  
  

$update2= "UPDATE `p31_observers` SET `lagna_no`=$code WHERE `code`='$observer2'";
$update3=mysqli_query($bis, $update2) or die(mysqli_error($bis));};

if(isset($_POST['observer3'])){
$observer3=$_POST['observer3'] ;  
  

$update3= "UPDATE `p31_observers` SET `lagna_no`=$code WHERE `code`='$observer3'";
$update4=mysqli_query($bis, $update3) or die(mysqli_error($bis));};

if(isset($_POST['observer4'])){
$observer4=$_POST['observer4'] ;  
  

$update4= "UPDATE `p31_observers` SET `lagna_no`=$code WHERE `code`='$observer4'";
$update5=mysqli_query($bis, $update4) or die(mysqli_error($bis));}

if(isset($_POST['observer5'])){
$observer5=$_POST['observer5'] ;  
  

$update5= "UPDATE `p31_observers` SET `lagna_no`=$code WHERE `code`='$observer5'";
$update6=mysqli_query($bis, $update5) or die(mysqli_error($bis));}


if(isset($_POST['observer6'])){
$observer6=$_POST['observer6'] ;  
  

$update6= "UPDATE `p31_observers` SET `lagna_no`=$code WHERE `code`='$observer6'";
$update7=mysqli_query($bis, $update6) or die(mysqli_error($bis));}

if(isset($_POST['observer7'])){

$observer7=$_POST['observer7'] ;  
  

$update7= "UPDATE `p31_observers` SET `lagna_no`=$code WHERE `code`='$observer7'";
$update8=mysqli_query($bis, $update7) or die(mysqli_error($bis));}

};

  
  
 
?>

<!DOCTYPE html>
 
<html>
    <head>
    <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Graduation Project 31
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <link rel="stylesheet" href="/admin_dashboard/adminDash/assets/css/all.min.css">
  <script src="https://kit.fontawesome.com/d941f7cd74.js" crossorigin="anonymous"></script>
  <script src="/admin_dashboard/adminDash/assets/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body  class="g-sidenav-show  bg-gray-100">


 

 
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Assign Observers</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Assign Observers</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="/admin_dashboard/" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <button  class="btn btn-primary "  >LogOut</button>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            
                      
    </nav>
    <!-- End Navbar -->

   


    <form id="myForm" style="width: 60%; margin:auto; background-color:#D1D9DF;" action="assign_observers.php?lagna=<?php echo $code?>" method="post" class=" mt-5 rounded align-items-center border border-danger-subtle border-3  p-1 text-center">
    <?php
         $getData= "SELECT * FROM `p31_observers` WHERE lagna_no IS NULL"; 
         $observers=mysqli_query($bis, $getData) or die(mysqli_error($bis));
        $getData1=mysqli_fetch_array($observers);
      ?>
     <div > 
        <label for="in">Select Number of observer</label><br>
    <select style="text-align: center; color: black;" name='number' class='form-select' aria-label='Default select example'>
    <option value="1" > 1</option>
       <option value="2" > 2</option>
       <option value="3" > 3</option>
       <option value="4" > 4</option>
       <option value="5" > 5</option>
       <option value="6" > 6</option>
       <option value="7" > 7</option>
       
    </select>
</div>
 
      <div  class=' p-2'>
      
      <?php
  if(isset($_POST['add'])){
 
  $num=$_POST['number'];
// the first
  if($num=='1'){
    ?>
      <select style="text-align: center;" name='observer' class='form-select' aria-label='Default select example'>
     
    <?php
      foreach  ($observers as $observer){  
    ?>       
  
  <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
  <?php
      }
  ?>
</select><br>
<?php
   }

// the second
        elseif($num=='2'){?>
          <select style="text-align: center;" name='observer' class='form-select' aria-label='Default select example'>
        
        <?php
          foreach  ($observers as $observer){  
        ?>       

      <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
      <?php
          }
      ?>
      </select><br>
      <select style="text-align: center;" name='observer2' class='form-select' aria-label='Default select example'>
        
        <?php
          foreach  ($observers as $observer){  
        ?>       

      <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
      <?php
          }
      ?>
      </select><br>
      <?php
      }

      // the third
              elseif($num=='3'){
                ?>
                <select style="text-align: center;" name='observer' class='form-select' aria-label='Default select example'>
              
              <?php
                foreach  ($observers as $observer){  
              ?>       

            <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
            <?php
                }
            ?>
            </select><br>

            <select style="text-align: center;" name='observer2' class='form-select' aria-label='Default select example'>
              
              <?php
                foreach  ($observers as $observer){  
              ?>       

            <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
            <?php
                }
            ?>
            </select><br>

            <select style="text-align: center;" name='observer3' class='form-select' aria-label='Default select example'>
              
              <?php
                foreach  ($observers as $observer){  
              ?>       

            <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
            <?php
                }
            ?>
            </select><br>
            <?php
            }

            // the fourth
                      else if($num=='4'){
                        ?>
                        <select style="text-align: center;" name='observer' class='form-select' aria-label='Default select example'>
                      
                      <?php
                        foreach  ($observers as $observer){  
                      ?>       

                    <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                    <?php
                        }
                    ?>
                    </select><br>

                    <select style="text-align: center;" name='observer2' class='form-select' aria-label='Default select example'>
                      
                      <?php
                        foreach  ($observers as $observer){  
                      ?>       

                    <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                    <?php
                        }
                    ?>
                    </select><br>

                    <select style="text-align: center;" name='observer3' class='form-select' aria-label='Default select example'>
                      
                      <?php
                        foreach  ($observers as $observer){  
                      ?>       

                    <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                    <?php
                        }
                    ?>
                    </select><br>
                    <select style="text-align: center;" name='observer4' class='form-select' aria-label='Default select example'>
                      
                      <?php
                        foreach  ($observers as $observer){  
                      ?>       

                    <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                    <?php
                        }
                    ?>
                    </select><br>
                    <?php
                    }

                   // the fifth
                              else if($num=='5'){
                                ?>
                                <select style="text-align: center;" name='observer' class='form-select' aria-label='Default select example'>
                              
                              <?php
                                foreach  ($observers as $observer){  
                              ?>       

                            <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                            <?php
                                }
                            ?>
                            </select><br>

                            <select style="text-align: center;" name='observer2' class='form-select' aria-label='Default select example'>
                              
                              <?php
                                foreach  ($observers as $observer){  
                              ?>       

                            <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                            <?php
                                }
                            ?>
                            </select><br>

                            <select style="text-align: center;" name='observer3' class='form-select' aria-label='Default select example'>
                              
                              <?php
                                foreach  ($observers as $observer){  
                              ?>       

                            <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                            <?php
                                }
                            ?>
                            </select><br>
                            <select style="text-align: center;" name='observer4' class='form-select' aria-label='Default select example'>
                              
                              <?php
                                foreach  ($observers as $observer){  
                              ?>       

                            <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                            <?php
                                }
                            ?>
                            </select><br>

                            <select style="text-align: center;" name='observer5' class='form-select' aria-label='Default select example'>
                              
                              <?php
                                foreach  ($observers as $observer){  
                              ?>       

                            <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                            <?php
                                }
                            ?>
                            </select><br>
                            <?php
                            }

                                  // the sixth
                                   else if($num=='6'){
                                    ?>
                                    <select style="text-align: center;" name='observer' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($observers as $observer){  
                                  ?>       

                                <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='observer2' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($observers as $observer){  
                                  ?>       

                                <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='observer3' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($observers as $observer){  
                                  ?>       

                                <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>
                                <select style="text-align: center;" name='observer4' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($observers as $observer){  
                                  ?>       

                                <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='observer5' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($observers as $observer){  
                                  ?>       

                                <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='observer6' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($observers as $observer){  
                                  ?>       

                                <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>
                                <?php
                                }

                                
                                  // the seventh
                                 else if($num=='7'){
                                    ?>
                                    <select style="text-align: center;" name='observer' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($observers as $observer){  
                                  ?>       

                                <option value="<?php  echo $observer['code'];?>"> <?php echo $observer['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='observer2' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($observers as $observer){  
                                  ?>       

                                <option value="<?php  echo $observer['code'];?>"> <?php echo $observer['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='observer3' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($observers as $observer){  
                                  ?>       

                                <option value="<?php  echo $observer['code'];?>"> <?php echo $observer['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>
                                <select style="text-align: center;" name='observer4' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($observers as $observer){  
                                  ?>       

                                <option value="<?php  echo $observer['code'];?>"> <?php echo $observer['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='observer5' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($observers as $observer){  
                                  ?>       

                                <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='observer6' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($observers as $observer){  
                                  ?>       

                                <option value="<?php  echo $observer['code'];?>" > <?php echo $observer['name_en'];?> </option>
                                <?php
                                    };
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='observer7' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($observers as $observer){  
                                  ?>       

                                <option value="<?php  echo $observer['code'];?>" > <?php echo $staff['name_en'];?> </option>
                                <?php
                                    };
                                ?>
                                </select>
                                <br>

                                <?php
                                };

                                


  }  ;

?>
<button class="btn btn-primary m-2" name="add" type="submit">Select</button>
<button name='save' class="btn btn-primary m-2" type="submit">Save</button>
  </div>


</form>

   

<br>
<br>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
           <Center>  <h5>Observers In lagna_no<?php
                  echo "( $code)";
              ?></h5> </Center>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">code</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name_en</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name_ar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nid</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">phone</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">attendance</th>
                       
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
$x=1;
 $observer="SELECT * FROM p31_observers WHERE lagna_no ='$code'";
 $observers=mysqli_query( $bis,$observer);
 foreach($observers as $observer)
{
?>
<tr>
<td class="border  "align="center"> <?php echo $observer['code']; ?></td>
<td class="border  " align="center"> <?php echo $observer['name_en']; ?></td>
<td class="border  " align="center"> <?php echo $observer['name_ar']; ?></td>
<td class="border  " align="center"> <?php echo $observer['nid']; ?></td>
<td class="border  " align="center"> <?php echo $observer['phone']; ?></td>
<td class="border  " align="center"> <?php echo $observer['attendance']; ?></td>
 
</tr>
                    <?php }; ?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
 

<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
 

  
    </body>
</html>




