<?php
//connection
    require_once("connect.php");
                      

    if(isset($_POST['add']))
    {
                    $errors=array();
                    $errors= validate_complaint();
                    //print_r($errors);
                    if(!count($errors))
                     {
                       //print_r($errors);exit;
                        $cid=$_POST['complaint_id'];
                        $email=$_POST['email'];
                        $city=$_POST['city'];
                        $complaint=$_POST['complaint1'];
                        $problem=$_POST['problem1'];
                        $rand; 
                    
                     $check = mysqli_query($con,"SELECT * from customer WHERE c_id = '$cid'");  
                      

                       if (mysqli_num_rows($check) > 0) 
                            {
                                
                                $sqlinsert="insert into complaint(complaint_id,email,city,complaint1,complaint_date,problem,
                                created,modified)values('$cid','$email','$city','$complaint',now(),'$problem',now(),now())";
                                $result=mysqli_query($con,$sqlinsert);
                                if($result)
                                    {
                                        echo "<div class='alert alert-success'>Complaint inserted successfully</div>";
                                    }
                                    else
                                    {
                                        echo"<div class='alert alert-danger'>Data Not Insert/Invalid User</div>".mysqli_error($con);
                                    }
                            }
                            else
                            {
                                echo "<div class='alert alert-danger'>enter valid username</div>";
                            }
                        }
                       else
                         {
                             echo  "<div class='alert alert-danger'>Fill All The Fields </div>";
                         }
                   
                        
}
                    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Complaint Box</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




    <script src="main.js"></script>
    <style> 
        div.a
        {
        padding-left: 20px;
        padding-right: 20px;
        padding-bottom: 20px;
        padding-top: 20px;
        outline-style: solid;
        outline-color: #7aff94;
        }
    </style>
</head>
    <body>
    
    <h1 style="text-align:center"><b>Complaint Box</b></h1>
        <!--For Select City Start-->
        <div class="container" style="border:2px;">
            <div class="a">
                <h4><b>Please Let Us Know What You Think.</b></h4>
                <div class="form-group">
                <form action="" method="POST">
                    <label for="inputdefault">Enter Your Provided User ID:</label>
                    <input class="form-control" id="complaint_id" type="text" name="complaint_id" placeholder="eg:5555">
                    <?php if(isset($errors['n'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['n']?></div>
                  <?php }?>
                </div>
                <div class="form-group">
                    <label for="sel1">Enter City Name:</label>
                    <select class="form-control" name="city" id="city" value="">
                    
                        
                        <option value="">Select City</option>
                        <option value="Akola">Akola</option>
                        <option value="Amravati">Amravati</option>
                        <option value="Bhandara">Bhandara</option>
                        <option value="Gondia">Gondia</option>
                        <option value="Nagpur">Nagpur</option>
                        <option value="Wardha">Wardha</option>
                        <option value="Yavatmal">Yavatmal</option>
                    </select>
                     <?php if(isset($errors['c'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['c']?></div>
                  <?php }?>
                </div>
                <!--For Select City End-->
                <!--For Select Problen Start-->
                <div class="form-group">
                    <label for="sel1">Problem</label>
                    <p>Problem Phase In:</p>
                    <select class="form-control" name="problem1" id="problem1" value="">
                  
                        <option value="">Select Problem</option>
                        <option value="Unable To Connect Internet">Unable To Connect Internet</option>
                        <option value="Speed Is Low">Speed Is Low</option>
                        <option value="Plan Activation Problem">Plan Activation Problem</option>
                        <option value="Service Issue">Service Issue</option>
                    </select>
                    <?php if(isset($errors['p'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['p']?></div>
                  <?php }?>
                </div>
                <!--For Select Problen End-->
                 <!--For Message Box Start-->
                <div class="form-group">
                    <label for="comment">Message:</label>
                    <p>Enter Message Here To Improve Ourself:</p>
                    <textarea class="form-control" rows="5" name="complaint1" id="problem"placeholder="Write Here" ></textarea>
                    <?php if(isset($errors['m'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['m']?></div>
                  <?php }?>
                </div>
                  <!--For Message Box  End-->
                 <!--For Email Box Start-->
                  <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <p>Enter Your Already Provided Email Address:</p>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        <?php if(isset($errors['e'])) {?>
                    <div class="alert alert-danger"><?php echo $errors['e']?></div>
                  <?php }?>
                    </div>
                <!--For Email Box End-->
                <!--For Submit Button-->
                <button type="submit" class="btn btn-success" name="add">Submit Your Complaint</button>
                </form>
                <!--For Submit Button-->
            </div>
        </div>
    </body>
</html>