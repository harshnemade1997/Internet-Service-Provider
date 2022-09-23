<?php 
   //connection file
   require_once('connect.php');
   
//session checking
   if(!isset($_SESSION['crm']['admin_id']))
   {
     header("location:index.php");
     exit();
   }
   ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>addemployee</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="css/crm.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <script src="main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--form class for modification-->
        <style type="">
  .vk
  {
    border-color: transparent !important;
    -webkit-box-shadow:none !important;
    box-shadow: none !important;
    border-bottom: 1px solid black !important;
    border-radius: 0px !important;
  }

</style>
 <!-- close-->
    </head>
    <body>
      <!-- For top header menu include externally-->
        <section>
            <?php
                 include('header.php');
            ?>
        </section>
        <!--header close-->
         <!--Middel page for forms nd side menu bar-->
        <div class="container-fluid">
    
         <section>
           <!-- for left side menu bar start-->
          <div class="row ">
            <div class="col-md-2 left text-center leftheight" style="height: 700px;">
               
               <?php
                  include('vertical.php');
                  ?>
            <!--left menu bar close here-->
             <!--Form code start-->
            <div class="col-md-10 right" style="min-height: 700px;" >
               <?php

                  //validate plans
                  if(isset($_POST['add']))  
                  {
                    $errors=array();
                    $errors= validate_employee();
                       //print_r($errors);exit;
                    if(!count($errors))
                    {
                        $query="insert into employee set name='".$_POST['ename']."',contact='".$_POST['ecnt']."',email='".$_POST['eemail']."',region='".$_POST['region']."',created=now(),modified=now()";
                        //print_r($query);
                        if(mysqli_query($con,$query))
                        {
                          echo "<div class='alert alert-success'>data inserted successfully</div>";
                        }
                        else
                        {
                          echo "<div class='alert alert-danger'>data not inserted</div>";
                        }
                    }
                  }
                ?>

                 <div class="container col-md-9 col-md-offset-1">
                  <h1>Add Employee</h1>
                    <form action="" method="POST">
                <div class="form-group">
                  <label for="speed"><h5><b>Employee Name:</b></h5></label>
                  <input type="text" class="form-control vk" id="ename" placeholder="Enter Employee Name" name="ename"value="<?php echo isset($_POST['ename'])?$_POST['ename']:''; ?>">
                  <?php if(isset($errors['n'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['n']?></div>
                  <?php }?>
                </div>
                <div class="form-group">
                  <label for="cost"><h5><b>Employee Contact:</b></h5></label>
                  <input type="text" class="form-control vk" id="ecnt" placeholder="Enter Contact Number" name="ecnt" value="<?php echo isset($_POST['ecnt'])?$_POST['ecnt']:''; ?>">
                  <?php if(isset($errors['c'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['c']?></div>
                  <?php }?>
                </div>
                <div class="form-group">
                  <label for="cost"><h5><b>Employee E-mail Id:</b></h5></label>
                  <input type="text" class="form-control vk" id="eemail" placeholder="Enter E-mail" name="eemail"
                  value="<?php echo isset($_POST['eemail'])?$_POST['eemail']:''; ?>">
                  <?php if(isset($errors['e'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['e']?></div>
                  <?php }?>
                </div>
                <div class="form-group">
                  <label for="cost"><h5><b>Region:</b></h5></label>
                  <input type="text" class="form-control vk" id="region" placeholder="Region" name="region"
                  value="<?php echo isset($_POST['region'])?$_POST['region']:''; ?>">
                  <?php if(isset($errors['r'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['r']?></div>
                  <?php }?>
                </div>
                <button type="submit" class="btn btn-success center" name="add">ADD</button>
                  </form>
              </div>   
             </div>  
          
              <!--form close here--> 
        </section>
      </div>
       <!--middel page code end here-->
        <!--for footer [include externally]-->
    <section>
      <?php
                 include('footer.php');
            ?>
    </section>
     <!--footer close-->
    </body>
    </html>
