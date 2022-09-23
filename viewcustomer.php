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
        <title>viewcustomer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="css/crm.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <script src="main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <section>
            <?php
                 include('header1.php');
            ?>
        </section>
        <div class="container-fluid">
        <section>
          <div class="row ">
            <div class="col-md-2 left text-center" style="min-height:900px;">
              
               <?php
                  include('vertical.php');
                  ?>
                    <div class="container col-md-10 ">
                    <h1 class="text-center">View Customer</h1>

                    <div class="table-responsive">
<?php
$result = mysqli_query($con,"SELECT * FROM customer");
echo "<table class='table table-striped '>
                      <tr class='greenrow'>
                      <th>C_Id </th> 
                      <th>Name </th> 
                      <th>Contact</th>
                      <th>E-mail</th>
                      <th>Region</th>
                      <th>Plan</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      </tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['c_id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['contact'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['region'] . "</td>";
echo "<td>" . $row['plan'] . "</td>";
echo '<td> <a href="editcustomer.php?id='.$row["c_id"].'" class="btn btn-success btn-sm">Edit</td>';
echo '<td> <a href="deletecustomer.php?id='.$row["c_id"].'&status=warning" class="btn btn-success btn-sm">Delete</td>';
echo "</tr>";


}
echo "</table>";

?>


</div>
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
