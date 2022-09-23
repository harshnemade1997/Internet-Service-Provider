<?php
//connection file
require_once("connect.php");
//session check
if(!isset($_SESSION['crm']['admin_id']))
{
   header("location:index.php");
   exit();
}
if(isset($_GET['status']))
  {
    if($_GET['status'] == "warning")
      {
?>
    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">

        <title>Delete Plan!</title>
      </head>
      <body>
        <div class="container" style="margin-top:10%;">
          <div class="row justify-content-center">
            <div class="col-md-6">
               <div class="card bg-success">
                <div class="card-body">
                  <h5 class="card-title" style="color:white;">Are you Sure you want to Delete?</h5><br>
                  <?php
                    echo '<a href="deleteplan.php.?id='.$_GET["id"].'&status=yes" class="btn btn-danger">Yes</a>';
                  ?>
                  <?php
                    echo '<a href="deleteplan.php.?id='.$_GET["id"].'&status=no" class="btn btn-warning">No</a>';
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
      </body>
    </html>

<?php
      }
    elseif($_GET['status'] == "yes")
      {

          if(isset($_GET['id']))
          {
             $delete="delete from plan where plan_id='".$_GET['id']."'";
             if(mysqli_query($con,$delete))
             {
                 header("location:existingplan.php");

             }
          }
          else
          {
            echo "Delete unsuccessful";
            header("location:existingplan.php.");
          }
      }
    else
      {
        header('location:existingplan.php');
      }
  }
else
  {
    header('location:existingplan.php');
  }
?>