<?php
//connection file
require_once("connect.php");
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
            <title>dashboard</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="css/crm.css">
            <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
            <script src="main.js"></script>


        <style> 
            #div1 
            {
            font-size:40px;
            } 
            #div2
            {
            font-size:40px;
            }
            #div3
            {
            font-size:40px;
            }
            .ab
            {
            margin-top:-20px;
            }
        </style>
        <style>
    .btn {
    background-color: #f4511e;
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    font-size: 16px;
    margin: 4px 2px;
    opacity: 0.6;
    transition: 0.3s;
    }

    .btn:hover {opacity: 1}
    </style>
    <style>
        .smaller {
    font-size: 0.7rem;
    }
    </style>
    </head>
        <body>`
            <section class="ab">
                <?php
                    include('header.php');
                ?>
            </section>
            <div class="container-fluid">
            <section>
            <div class="row ">
                <div class="col-md-2 left text-center" style="height: 800px;">
                    <!--include sidebar-->
                <?php
                    include('vertical.php');
                    ?>
                    <div class="col-md-10" >
                    <div class="container col-md-10" style="min-height: 700px;">                    
                    <b><h4> <?php
                                date_default_timezone_set("Asia/Kolkata");
                                /*date function to show date*/
                                echo "Today is " . date("d/m/y") . "<br>";
                            ?><hr></b></h4>
                        <h1><b>Dashboard</b></h1>
                        <div>
                        <div class="content-wrapper">
                            <div class="container-fluid">
                            <!-- Icon Cards-->
                            <div class="row">
                                <div class="col-xl-6 col-sm-6 mb-3">
                                <div class="card text-white bg-primary o-hidden h-100">
                                    <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-fw fa-users fa-4x"></i>
                                    </div>
                                    <h2><?php
                                    $selt= mysqli_query($con,"select * from customer");
                                    $tc= mysqli_num_rows($selt);
                                    echo $tc;
                                    ?></h2>
                                    <div class="mr-5">Total Customers</div>
                                    
                                    </div>
                                
                                    <a class="card-footer text-white clearfix small z-1" href="viewcustomer.php">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                    </a>
                                </div>
                                </div>
                                <div class="col-xl-6 col-sm-6 mb-3">
                                <div class="card text-white bg-warning o-hidden h-100">
                                    <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-fw fa-id-card fa-4x"></i>
                                    </div>
                                    <h2><?php
                                    $selt= mysqli_query($con,"select * from employee");
                                    $te= mysqli_num_rows($selt);
                                    echo $te;
                                    ?> </h2>
                                    <div class="mr-5">Total Employee</div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="viewemployee.php">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                    </a>
                                </div>
                                </div>
                                <div class="col-xl-6 col-sm-6 mb-3">
                                <div class="card text-white bg-success o-hidden h-100">
                                    <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-fw fa-tasks fa-4x"></i>
                                    </div>
                                    <h2><?php
                                    $selt= mysqli_query($con,"select * from plan");
                                    $tp= mysqli_num_rows($selt);
                                    echo $tp;
                                    ?></h2>
                                    <div class="mr-5">Total Plans</div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="existingplan.php">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                    </a>
                                </div>
                                </div>
                                <div class="col-xl-6 col-sm-6 mb-3">
                                <div class="card text-white bg-danger o-hidden h-100">
                                    <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-fw fa-folder fa-4x"></i>
                                    </div>
                                    <h2><?php
                                    $selt= mysqli_query($con,"select * from complaint");
                                    $tp= mysqli_num_rows($selt);
                                    echo $tp;
                                    ?></h2>
                                    <div class="mr-5">Total Complaints</div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="viewcomplaint.php">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                    </a>
                                </div>
                                </div>
                            </div>
                        </div>             
                    </div>   
                </div>   
            </section>
        </div>
        <!--include footer from outside-->
            <section>
                <?php
                    include('footer.php'); 
                ?>
            </section>
            
        </body>
 </html>
