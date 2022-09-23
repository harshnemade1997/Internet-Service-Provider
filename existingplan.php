<?php
//connection file
require_once('connect.php');
//session check
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
        <title>existing plan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="css/crm.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <script src="main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style type="text/css">
        /*form class*/
        .vk 
        {

          border-color:transparent !important; 
          -webkit-box-shadow: none !important;
          box-shadow: none !important;
         border-bottom: 1px solid black !important;
         border-radius: 0px !important;
        }
       </style>
    </head>
    <body>
      <!--start header-->
        <section>
            <?php
                 include('header.php');
            ?>
        </section>
        <!--end header-->
        <!--start main body-->
        <div class="container-fluid">
        <section>
          <div class="row">
            <div class="col-md-2 left text-center" style="height:900px;">
               <?php
                  include('vertical.php');
                  ?>
                    <h1 class="text-center">View Plan</h1>
            <div class="col-md-10 container table-responsive " style="min-height: 700px;">
                  <table class="table-hover table table-striped">
                      <tr class="greenrow">
                      <th>id</th>
                      <th>Plan name</th>
                      <th>Service Provider </th> 
                      <th>Speed Limit </th> 
                      <th>Cost</th>
                      <th>Duration</th> 
                      <th>Edit</th> 
                      <th>Delete</th> 
                      </tr>
                      <?php
                      $query="select * from plan";
                      $result=mysqli_query($con,$query);
                      while($row=mysqli_fetch_assoc($result))
                      {
                        echo '<tr>';
                        echo '<td>'.$row['plan_id'].' '.'</td>';
                        echo '<td>'.$row['plan_name'].' '.'</td>';
                        echo '<td>'.$row['service_provider'].' '.'</td>';
                        echo '<td>'.$row['speed_limit'].' '.'</td>';
                        echo '<td>'.$row['cost'].' '.'</td>';
                        echo '<td>'.$row['duration'].' '.'</td>';
                        echo '<td><a href="editplan.php.?id='.$row["plan_id"].'" class="btn btn-success btn-sm">Edit</a></td>';
                        echo '<td><a href="deleteplan.php.?id='.$row["plan_id"].'&status=warning" class="btn btn-success btn-sm">Delete</a></td>';
                      }
                      ?>
                  </table>
            </div>   
        </section>
      </div>
      <!--end of main body-->
      <!--start footer-->
        <section>
            <?php
                 include('footer.php');
            ?>
        </section>
        <!--end footer-->
         <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </body>
    </html>
