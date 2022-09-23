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
        <title>create plan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="css/crm.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <script src="main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style type="text/css">
        .vk
        {
          border-color: transparent!important;
          -webkit-box-shadow:none !important;
          box-shadow: none !important;
          border-bottom: 1px solid black !important;
          border-radius: 0px !important;
        }

        </style>

    </head>
    <body>
        <section>
            <?php
                 include('header.php');
            ?>
        </section>
        <div class="container-fluid">
        <section>
          <div class="row ">
            <div class="col-md-2 left text-center" style="height:750px;">
                  <?php
                  include('vertical.php');
                  ?>
            <div class="col-md-10" style="min-height:700px;" >
              <?php
                //validate plans
                if(isset($_POST['createplan']))  
                {
                  $errors=array();
                  $errors= validate_plan();
                     //print_r($errors);exit;
                  if(!count($errors))
                  {
                      $query="insert into plan set plan_name='".$_POST['pname']."',service_provider='".$_POST['sprovider']."',speed_limit='".$_POST['speedlimit']."',cost='".$_POST['cost']."',duration='".$_POST['duration']."',created=now(),modified=now()";
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
                  <h1 class="text-center">Create Plan</h1>
                    <form action="" method="POST">
                <div class="form-group">
                  <label for="pwd"><h5><b>Plan Name:</b></h5></label>
                  <input type="name" class="form-control vk" id="name" placeholder="eg:monthly" name="pname"value="<?php echo isset($_POST['pname'])?$_POST['pname']:''; ?>" >
                  <?php if(isset($errors['p'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['p']?></div>
                  <?php }?>
                </div>
                 <div class="form-group">
                  <label for="pwd"><h5><b>Service Provider :</b></h5></label>
                  <input type="name" class="form-control vk" id="name" placeholder="eg:ICEICO" name="sprovider" value="<?php echo isset($_POST['sprovider'])?$_POST['sprovider']:''; ?>">
                  <?php if(isset($errors['s'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['s']?></div>
                  <?php }?>
                </div>
                <div class="form-group">
                  <label for="speed"><h5><b>Speed Limit:</b></h5></label>
                  <input type="text" class="form-control vk" id="speed" placeholder="eg:128kbps" name="speedlimit" value="<?php echo isset($_POST['speedlimit'])?$_POST['speedlimit']:''; ?>">
                  <?php if(isset($errors['l'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['l']?></div>
                  <?php }?>
                </div>
                <div class="form-group">
                  <label for="cost"><h5><b>Cost:</b></h5></label>
                  <input type="text" class="form-control vk" id="cost" placeholder="eg:Rs500" name="cost" value="<?php echo isset($_POST['cost'])?$_POST['cost']:''; ?>">
                  <?php if(isset($errors['c'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['c']?></div>
                  <?php }?>
                </div>
                <div class="form-group">
                  <label for="cost"><h5><b>Duration:</b></h5></label>
                  <input type="text" class="form-control vk" id="duration" placeholder="eg:30days" name="duration" value="<?php echo isset($_POST['duration'])?$_POST['duration']:''; ?>">
                  <small>Duration should be in Days</small>
                  <?php if(isset($errors['d'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['d']?></div>
                  <?php }?>
                </div>
                <button type="submit" class="btn btn-success" name="createplan">CREATE</button>
                  </form>
              </div>   
            </div>   
        </section>
      </div>
        <footer>
            <?php
                 include('footer.php');
            ?>
        </footer>
         <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  
    </body>
    </html>
