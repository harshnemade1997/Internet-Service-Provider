<?php
   //connection file
   require_once("connect.php");
   //check and validate login
   if(isset($_POST['login']))
   {
    $errors=array();
    $errors=validate_login();
    if(!count($errors))
    {
      $query="select * from admin where username='".$_POST['username']."' AND password='".$_POST['password']."'";
      $result = mysqli_query($con, $query);
      $res = mysqli_fetch_assoc($result);     
      if(isset($res))
      {
        unset($res['password']);
        $_SESSION['crm'] = $res;
        //print_r($_SESSION['crm']);exit;
        header("location:dashboard.php");
      }
      else
      {
        echo "<div class='alert alert-danger'>login failed. please try again.</div>";
      }
    }
    
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

          border-color:transparent !important; 
          -webkit-box-shadow: none !important;
          box-shadow: none !important;
         border-bottom: 1px solid black !important;
         border-radius: 0px !important;
        }
        .bg
        {
            margin: 0;padding: 0;
            background-image: url('image/green.svg');    
            background-repeat:no-repeat;
            background-size:cover;
        }
        </style>
    </head>
    <body class="bg">
        <div class="container col-md-5 col-md-offset-3" style="margin-top:10%;">
            <div class="panel panel-success" style="padding: 20px;">
            <div class="panel-heading" style="text-align: center;"><h2>Admin Login</h2></div>
            <form action="" method="POST">
            <div class=" form-group" style="text-align: center;padding:15px;">
            <label for="email">User Name:</label>
            <input type="text" class="form-control vk" id="email" placeholder="Enter user name" name="username" value="<?php echo isset($_POST['username'])?$_POST['username']:''; ?>">
            <?php if(isset($errors['u'])) { ?>
                <div class="alert alert-danger">
                    <?php echo $errors['u'];?>
                </div>
                <?php } ?>            
            </div>
            <div class="form-group" style="text-align: center;padding: 15px;">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control vk" id="pwd" placeholder="Enter password" name="password" value="<?php echo isset($_POST['password'])?$_POST['password']:''; ?>">
            <?php if(isset($errors['p'])) { ?>
                <div class="alert alert-danger">
                    <?php echo $errors['p'];?>
                </div>
                <?php } ?>   
            </div>
               <button  type="submit" class="btn btn-success" style="margin-left:43%" name="login">Login</button>
             </form>
            </div>
        </div>
    </body>
</html>