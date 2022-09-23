<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>deletecustomer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="css/crm.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <script src="main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style type="text/css">

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
            <div class="col-md-2 left text-center" style="height: 600px;">
              <?php
                  include('vertical.php');
                  ?>
             <div class="container col-md-10">
                  <h1 class="text-center">Delete COmplaint</h1>
                 
                  <table class="table-hover table">
                      <tr class="greenrow">
                      <th>Name </th> 
                      <th>Contact</th>
                      <th>E-mail</th>
                      <th>Age </th> 
                      <th>Gender</th>
                      <th>Region</th>
                      <th>Plan</th>
                      <th>Action</th>
                      </tr>
                  </table>
             </div>   
        </section>
      </div>
        <section>
            <?php
                 include('footer.php');
            ?>
        </section>
         <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  
    </body>
    </html>
