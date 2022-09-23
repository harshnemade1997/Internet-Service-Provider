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
        <title>addcustomer</title>
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
            <div class="col-md-2 left text-center leftheight" style="height:900px;">
               
               <?php
                  include('vertical.php');
                  ?>
            <!--left menu bar close here-->
             <!--Form code start-->

            <div class="col-md-10 right" style="min-height:700px;" >
              <?php
                 //validate plans
                 if(isset($_POST['add']))  
                  {
                   $errors=array();
                   $errors= validate_customer();
                  //print_r($errors);exit;
                  if(!count($errors))
                  {
                  $n=$_POST['customername'];
                  $c=$_POST['c_id'];
                  $cn=$_POST['contact'];
                  $cid=$_POST['cemail'];
                  $ag=$_POST['age'];
                  $gen=$_POST['gender'];
                  $reg=$_POST['region'];
                  $plan=$_POST['plan'];
                  $exp=$_POST['expirydate'];
                  $rand;
                  $sqlinsert="insert into customer(c_id,name,contact,email
                    ,age,gender,region,plan,expiry_date,created,modified)values('$c','$n','$cn','$cid','$ag','$gen','$reg','$plan','$exp',now(),now())";
                  $result=mysqli_query($con,$sqlinsert);
                  if($result)
                  {
                    echo "<div class='alert alert-success'>data inserted successfully</div>";
                     
                      $to       = $cid;
                      $subject  = 'INTERNET SERVICE ACTIVATED';
                      $message  = 'your username for complaint is '.$c ;
                      $headers  = 'From:ISP';
                      if(mail($to, $subject, $message, $headers))
                          echo "<div class='alert alert-success'>Email sent</div>";
                      else
                          echo "<div class='alert alert-danger'> sending failed</div>";
                  
                  }
                  else
                  {
                     echo"<div class='alert alert-danger'>data not insert</div>".mysqli_error($con);
                  }
                }
                }
            ?>

                 <div class="container col-md-9 col-md-offset-1">
                  <h1>Add Customer</h1>
                    <form action="addcustomer.php" method="POST">
                      <div class="form-group">
                        <input type="hidden" name="c_id" class="form-control vk" id="c_id"  value="<?php
                          $len =5;
                          $rand = substr(str_shuffle(md5(time())),0,$len);
                          echo $rand;
                          ?>">
                      </div>
                <div class="form-group">
                  <label for="name"><h5><b>Customer Name:</b></h5></label>
                  <input type="text" class="form-control vk" id="customernamename" placeholder="Enter Customer Name" name="customername" value="<?php echo isset($_POST['customername'])?$_POST['customername']:''; ?>" >
                  <?php if(isset($errors['n'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['n']?></div>
                  <?php }?>
                </div>
                <div class="form-group">
                  <label for="contact"><h5><b>Customer Contact:</b></h5></label>
                  <input type="text" class="form-control vk" id="contact" placeholder="Enter Contact Number" name="contact"value="<?php echo isset($_POST['contact'])?$_POST['contact']:''; ?>" >
                  <?php if(isset($errors['c'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['c']?></div>
                  <?php }?>
                </div>
                <div class="form-group">
                  <label for="email"><h5><b>Customer E-mail Id:</b></h5></label>
                  <input type="text" class="form-control vk" id="cemail" placeholder="Enter E-mail" name="cemail" value="<?php echo isset($_POST['cemail'])?$_POST['cemail']:''; ?>" >
                  <?php if(isset($errors['e'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['e']?></div>
                  <?php }?>
                </div>
                <div class="form-group">
                  <label for="age"><h5><b>Age:</b></h5></label>
                  <input type="text" class="form-control vk" id="age" placeholder="Age" name="age"value="<?php echo isset($_POST['age'])?$_POST['age']:''; ?>" >
                  <?php if(isset($errors['a'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['a']?></div>
                  <?php }?>
                </div>
                <div class="form-group">
                  <label for="gender"><h5><b>Gender:</b></h5></label>
                  <select class="form-control vk" name="gender" id="gender" value="<?php echo isset($_POST['gender'])?$_POST['gender']:''; ?>" >
                    <option value="">select gender</option>
                    <option value="Male">Male</option>
                    <option value="Famale">Female</option>
                  </select>
                  <?php if(isset($errors['g'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['g']?></div>
                  <?php }?>
                </div>
                <div class="form-group">
                  <label for="region"><h5><b>Region:</b></h5></label>
                  <input type="text" class="form-control vk" id="region" placeholder="Region" name="region" value="<?php echo isset($_POST['region'])?$_POST['region']:''; ?>" >
                  <?php if(isset($errors['r'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['r']?></div>
                  <?php }?>
                </div>
                 <div class="form-group">
                  <label for="plan"><h5><b>Plan:</b></h5></label>
                  <select class="form-control vk" name="plan"  id="plan" value="<?php echo isset($_POST['plan'])?$_POST['plan']:''; ?>" >
                    <option value="">select plan</option>
                    <option value="Gold">Gold</option>
                    <option value="Platinum">Platinum</option>
                     <option value="Silver">Silver</option>
                  </select>
                  <?php if(isset($errors['p'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['p']?></div>
                  <?php }?>
                </div>
                <div class="form-group">
                  <label for="expiry date"><h5><b>Expiry Date:</b></h5></label>
                  <input type="text" class="form-control vk" id="expirydate" placeholder="yyyy-mm-dd" name="expirydate"value="<?php echo isset($_POST['expirydate'])?$_POST['expirydate']:''; ?>" >
                  <?php if(isset($errors['ex'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['ex']?></div>
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
