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
        <title>viewemployeee</title>
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
                  <div class="row">
                    <div class="col-md-2 left text-center leftheight" style="height:900px;">
                       <?php
                  include('vertical.php');
                  ?>
                    <!--left menu bar close here-->
                   <!--table for delete data fetch b
                    from db-->
                    <h1 class="text-center">View Employee</h1>
                    <div class="container col-md-10 table-responsive">
                          <table class="table-hover table table-striped">
                              <tr class="greenrow">
                              <th>Emp-Id </th> 
                              <th>Emp-Name </th> 
                              <th>Emp-Contact</th>
                              <th>Emp-E-mail</th>
                              <th>Emp-Region</th>
                              <th>Edit</th>
                              <th>Delete</th>
                              </tr>

                              <?php
                                $query="select * from employee";
                                $result=mysqli_query($con,$query);
                                while($row=mysqli_fetch_assoc($result))
                                {
                                  echo '<tr>';
                                  echo '<td>'.$row['emp_id'].' '.'</td>';
                                  echo '<td>'.$row['name'].' '.'</td>';
                                  echo '<td>'.$row['contact'].' '.'</td>';
                                  echo '<td>'.$row['email'].' '.'</td>';
                                  echo '<td>'.$row['region'].' '.'</td>';
                                  echo '<td><a href="editemployee.php.?id='.$row["emp_id"].'" class="btn btn-success btn-sm">Edit</a></td>';
                                  echo '<td><a href="deleteemployee.php.?id='.$row["emp_id"].'&status=warning" class="btn btn-success btn-sm">Delete</a></td>';
                                }
                              ?>
                          </table>
                     </div>  
                      <!--table close here-->  
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
