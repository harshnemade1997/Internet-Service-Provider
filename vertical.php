<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>sidebar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="css/crm.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <script src="main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style type="text/css">
          .sidenav
           {
             z-index: 1;
            top: 0;
            left: 0;
            overflow-x: hidden;
            padding-top: 20px;
            }

          .sidenav a 
          {
             padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
          }

          .sidenav a:hover
           {
           color: #f1f1f1;
          }
          .sidenav a, .dropdown-btn 
          {
             padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size:25px;
            color: black;
            display: block;
            border: none;
            background: none;
            width: 100%;
            text-align:left;
            cursor: pointer;
            outline: none;
          }

          /* On mouse-over */
          .sidenav a:hover, .dropdown-btn:hover
          {
          color: black;
          }
        .active
         {
         background-color: green;
         color: black;
         }
        .dropdown-container
        {
         display: none ;
        }
        @media screen and (max-height: 450px)
       {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
       }
       .sd
       {
         height: 700px;
         margin-top:-50px;
        }
      </style>
    </head>
    <body>
        <div class="sidenav sd">
          <button class="dropdown-btn">
            <i class="fa fa-tasks" aria-hidden="true"></i>
            Plan 
            <i class="fa fa-caret-down"></i>
          </button>
            <div class="dropdown-container">
              <a href="createplan.php"><h4><b>Create Plan</b></h4></a>
              <a href="existingplan.php"><h4><b>Existing Plan</b></h4></a>
            </div>
          <button class="dropdown-btn">
            <i class="fa fa-users" aria-hidden="true"></i>
            Customer
            <i class="fa fa-caret-down"></i>
          </button>
            <div class="dropdown-container">
              <a href="addcustomer.php"><h4><b>Add Customer</b></h4></a>
                <a href="viewcustomer.php"><h4><b>View Customer</b></h4></a>
            </div>
          <button class="dropdown-btn">
            <i class="fa fa-user" aria-hidden="true"></i>
            Employee
            <i class="fa fa-caret-down"></i>
          </button>
            <div class="dropdown-container">
              <a href="addemployee.php"><h4><b>Add Employee</b></h4></a>
              <a href="viewemployee.php"><h4><b>View Employee</b></h4></a>
            </div>
          <button class="dropdown-btn">
            <i class="fa fa-folder-open" aria-hidden="true"></i>
            Complaint 
            <i class="fa fa-caret-down"></i>
          </button>
            <div class="dropdown-container">
              <a href="viewcomplaint.php"><h4><b>View Complaint</b></h4></a>
            </div>
        </div>
      </div>
         
        
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
      /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
      var dropdown = document.getElementsByClassName("dropdown-btn");
      var i;

      for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display == "block") {
      dropdownContent.style.display = "none";
     } 
     else 
     {
      dropdownContent.style.display = "block";
      }
    });
    } 
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  
  </body>
</html>
