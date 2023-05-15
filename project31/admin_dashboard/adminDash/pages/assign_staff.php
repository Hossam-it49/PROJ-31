<?php
     include '/xampp/htdocs/project31/Connections/bis.php';
     include '/xampp/htdocs/project31/admin/auth.php';
     include '/xampp/htdocs/project31/admin_dashboard/adminDash/pages/aside.php';
     include '/xampp/htdocs/project31/admin_dashboard/adminDash/pages/color.php';
   

 ?>
 


 
<?php


$query_currentSemester = "SELECT curentsemester.Year, curentsemester.Sem FROM curentsemester ";
$currentSemester = mysqli_query($bis,$query_currentSemester) or die(mysqli_error($bis));
$row_currentSemester = mysqli_fetch_assoc($currentSemester);
$totalRows_currentSemester = mysqli_num_rows($currentSemester);

$sem = $row_currentSemester['Sem'];
$year = $row_currentSemester['Year'];

$staff= "SELECT * FROM `p31_staff` WHERE floor IS NULL AND block=0"; 
         $staffs=mysqli_query($bis, $staff) or die(mysqli_error($bis));
        $getData1=mysqli_fetch_array($staffs);
if(isset($_POST['save']))  { 

  $staff=$_POST['staff'] ;  
  $building=$_POST['building'] ;  
  $floor=$_POST['floor'] ;  
  
  $update= "UPDATE `p31_staff` SET `floor`='$floor' ,`building_no`='$building' WHERE `code`='$staff'";
  $update1=mysqli_query($bis, $update) or die(mysqli_error($bis));
  if(isset($_POST['staff2'])){
  $staff2=$_POST['staff2'] ;  
  $building=$_POST['building'] ;  
  $floor=$_POST['floor'] ;  
  
  $update2= "UPDATE `p31_staff` SET `floor`='$floor' ,`building_no`='$building' WHERE `code`='$staff2'";
  $update3=mysqli_query($bis, $update2) or die(mysqli_error($bis));};

  if(isset($_POST['staff3'])){
  $staff3=$_POST['staff3'] ;  
  $building=$_POST['building'] ;  
  $floor=$_POST['floor'] ;  
  
  $update3= "UPDATE `p31_staff` SET `floor`='$floor' ,`building_no`='$building' WHERE `code`='$staff3'";
  $update4=mysqli_query($bis, $update3) or die(mysqli_error($bis));};

  if(isset($_POST['staff4'])){
  $staff4=$_POST['staff4'] ;  
  $building=$_POST['building'] ;  
  $floor=$_POST['floor'] ;  
  
  $update4= "UPDATE `p31_staff` SET `floor`='$floor' ,`building_no`='$building' WHERE `code`='$staff4'";
  $update5=mysqli_query($bis, $update4) or die(mysqli_error($bis));}
  
  if(isset($_POST['staff5'])){
  $staff5=$_POST['staff5'] ;  
  $building=$_POST['building'] ;  
  $floor=$_POST['floor'] ;  
  
  $update5= "UPDATE `p31_staff` SET `floor`='$floor' ,`building_no`='$building' WHERE `code`='$staff5'";
  $update6=mysqli_query($bis, $update5) or die(mysqli_error($bis));}


  if(isset($_POST['staff6'])){
  $staff6=$_POST['staff6'] ;  
  $building=$_POST['building'] ;  
  $floor=$_POST['floor'] ;  
  
  $update6= "UPDATE `p31_staff` SET `floor`='$floor' ,`building_no`='$building' WHERE `code`='$staff6'";
  $update7=mysqli_query($bis, $update6) or die(mysqli_error($bis));}

  if(isset($_POST['staff7'])){

  $staff7=$_POST['staff7'] ;  
  $building=$_POST['building'] ;  
  $floor=$_POST['floor'] ;  
  
  $update7= "UPDATE `p31_staff` SET `floor`='$floor' ,`building_no`='$building' WHERE `code`='$staff7'";
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Assign Staff</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Assign Staff</h6>
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
  
   


    <form id="myForm" style="width: 60%; margin:auto; background-color:#D1D9DF;" action="assign_staff.php" method="post" class=" mt-5 rounded align-items-center border border-danger-subtle border-3  p-1 text-center">
    

<div > 
<div class="form-floating">
  <input name="building" type="number" class="form-control" id="floatingPassword" placeholder="building number">
  <label for="floatingPassword">Building Number</label>
</div>
      <br>

      <div class="form-floating">
  <input name="floor" type="number" class="form-control" id="floatingPassword" placeholder="floor number">
  <label for="floatingPassword">Floor Number</label>
</div> <br>
       
   
</div>
 
    <div > 
        <label for="in">Select Number of Staff</label><br>
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
      <select style="text-align: center;" name='staff' class='form-select' aria-label='Default select example'>
     
    <?php
      foreach  ($staffs as $staff){  
    ?>       
  
  <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
  <?php
      }
  ?>
</select><br>
<?php
   }

// the second
        elseif($num=='2'){?>
          <select style="text-align: center;" name='staff' class='form-select' aria-label='Default select example'>
        
        <?php
          foreach  ($staffs as $staff){  
        ?>       

      <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
      <?php
          }
      ?>
      </select><br>
      <select style="text-align: center;" name='staff2' class='form-select' aria-label='Default select example'>
        
        <?php
          foreach  ($staffs as $staff){  
        ?>       

      <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
      <?php
          }
      ?>
      </select><br>
      <?php
      }

      // the third
              elseif($num=='3'){
                ?>
                <select style="text-align: center;" name='staff' class='form-select' aria-label='Default select example'>
              
              <?php
                foreach  ($staffs as $staff){  
              ?>       

            <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
            <?php
                }
            ?>
            </select><br>

            <select style="text-align: center;" name='staff2' class='form-select' aria-label='Default select example'>
              
              <?php
                foreach  ($staffs as $staff){  
              ?>       

            <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
            <?php
                }
            ?>
            </select><br>

            <select style="text-align: center;" name='staff3' class='form-select' aria-label='Default select example'>
              
              <?php
                foreach  ($staffs as $staff){  
              ?>       

            <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
            <?php
                }
            ?>
            </select><br>
            <?php
            }

            // the fourth
                      else if($num=='4'){
                        ?>
                        <select style="text-align: center;" name='staff' class='form-select' aria-label='Default select example'>
                      
                      <?php
                        foreach  ($staffs as $staff){  
                      ?>       

                    <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                    <?php
                        }
                    ?>
                    </select><br>

                    <select style="text-align: center;" name='staff2' class='form-select' aria-label='Default select example'>
                      
                      <?php
                        foreach  ($staffs as $staff){  
                      ?>       

                    <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                    <?php
                        }
                    ?>
                    </select><br>

                    <select style="text-align: center;" name='staff3' class='form-select' aria-label='Default select example'>
                      
                      <?php
                        foreach  ($staffs as $staff){  
                      ?>       

                    <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                    <?php
                        }
                    ?>
                    </select><br>
                    <select style="text-align: center;" name='staff4' class='form-select' aria-label='Default select example'>
                      
                      <?php
                        foreach  ($staffs as $staff){  
                      ?>       

                    <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                    <?php
                        }
                    ?>
                    </select><br>
                    <?php
                    }

                   // the fifth
                              else if($num=='5'){
                                ?>
                                <select style="text-align: center;" name='staff' class='form-select' aria-label='Default select example'>
                              
                              <?php
                                foreach  ($staffs as $staff){  
                              ?>       

                            <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                            <?php
                                }
                            ?>
                            </select><br>

                            <select style="text-align: center;" name='staff2' class='form-select' aria-label='Default select example'>
                              
                              <?php
                                foreach  ($staffs as $staff){  
                              ?>       

                            <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                            <?php
                                }
                            ?>
                            </select><br>

                            <select style="text-align: center;" name='staff3' class='form-select' aria-label='Default select example'>
                              
                              <?php
                                foreach  ($staffs as $staff){  
                              ?>       

                            <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                            <?php
                                }
                            ?>
                            </select><br>
                            <select style="text-align: center;" name='staff4' class='form-select' aria-label='Default select example'>
                              
                              <?php
                                foreach  ($staffs as $staff){  
                              ?>       

                            <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                            <?php
                                }
                            ?>
                            </select><br>

                            <select style="text-align: center;" name='staff5' class='form-select' aria-label='Default select example'>
                              
                              <?php
                                foreach  ($staffs as $staff){  
                              ?>       

                            <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                            <?php
                                }
                            ?>
                            </select><br>
                            <?php
                            }

                                  // the sixth
                                   else if($num=='6'){
                                    ?>
                                    <select style="text-align: center;" name='staff' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($staffs as $staff){  
                                  ?>       

                                <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='staff2' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($staffs as $staff){  
                                  ?>       

                                <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='staff3' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($staffs as $staff){  
                                  ?>       

                                <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>
                                <select style="text-align: center;" name='staff4' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($staffs as $staff){  
                                  ?>       

                                <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='staff5' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($staffs as $staff){  
                                  ?>       

                                <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='staff6' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($staffs as $staff){  
                                  ?>       

                                <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>
                                <?php
                                }

                                
                                  // the seventh
                                 else if($num=='7'){
                                    ?>
                                    <select style="text-align: center;" name='staff' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($staffs as $staff){  
                                  ?>       

                                <option value="<?php  echo $staff['code'];?>"> <?php echo $staff['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='staff2' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($staffs as $staff){  
                                  ?>       

                                <option value="<?php  echo $staff['code'];?>"> <?php echo $staff['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='staff3' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($staffs as $staff){  
                                  ?>       

                                <option value="<?php  echo $staff['code'];?>"> <?php echo $staff['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>
                                <select style="text-align: center;" name='staff4' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($staffs as $staff){  
                                  ?>       

                                <option value="<?php  echo $staff['code'];?>"> <?php echo $staff['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='staff5' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($staffs as $staff){  
                                  ?>       

                                <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                                <?php
                                    }
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='staff6' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($staffs as $staff){  
                                  ?>       

                                <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                                <?php
                                    };
                                ?>
                                </select><br>

                                <select style="text-align: center;" name='staff7' class='form-select' aria-label='Default select example'>
                                  
                                  <?php
                                    foreach  ($staffs as $staff){  
                                  ?>       

                                <option value="<?php  echo $staff['code'];?>" > <?php echo $staff['name_en'];?> </option>
                                <?php
                                    };
                                ?>
                                </select>
                                <br>

                                <?php
                                };

                                


  }  ;

?>
<button class="btn btn-info m-2" name="add" type="submit">Select</button>
<button name='save' class="btn btn-info m-2" type="submit">Save</button>
  </div>
  



</form>

   

<br>
<br>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
           <Center>  <h5>Assign Staff </h5> </Center>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">count</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">code</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name_en</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name_ar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nid</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">phone</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">attendance</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Floor</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Buildimg</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
$x=1;
 $staff="SELECT * FROM p31_staff WHERE floor IS NOT NULL ";
 $staffs=mysqli_query( $bis,$staff);
 foreach($staffs as $staff)
{
?>
<tr>
<td class="border  " align="center"> <?php echo $x; ?></td>
<td class="border  "align="center"> <?php echo $staff['code']; ?></td>
<td class="border  " align="center"> <?php echo $staff['name_en']; ?></td>
<td class="border  " align="center"> <?php echo $staff['name_ar']; ?></td>
<td class="border  " align="center"> <?php echo $staff['nid']; ?></td>
<td class="border  " align="center"> <?php echo $staff['phone']; ?></td>
<td class="border  " align="center"> <?php echo $staff['attendance']; ?></td>
<td class="border  " align="center"> <?php echo $staff['floor']; ?></td>
<td class="border  " align="center"> <?php echo $staff['building_no']; ?></td>
 
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




