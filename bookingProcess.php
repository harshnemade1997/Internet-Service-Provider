<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if(!(isset($_POST['name'])) || empty($_POST['name']))
            {
                echo "Name can't be Empty";
                return 0;
            }

        if(!(isset($_POST['email'])) || empty($_POST['email']))
            {
                echo "Email can't be Empty";
                return 0;
            }

        if(!(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)))
            {
                echo "Invalid Email Provided";
                return 0;
            }

        if(!(isset($_POST['startdate'])) || empty($_POST['startdate']))
            {
                echo "Please Select Start Date";
                return 0;
            }

        if((date('Y-m-d', strtotime($_POST['startdate'])) != $_POST['startdate']))
            {
                echo "Please Enter Valid Date";
                return 0;
            }

        if(strtotime(date('Y-m-d')) >= strtotime(date('Y-m-d',strtotime($_POST['startdate']))))
            {
                echo "Please Select Valid Start Date";
                return 0;
            }

        if(!(isset($_POST['starttime'])) || empty($_POST['starttime']))
            {
                echo "Start Time can't be Empty";
                return 0;
            } 

        if (!(preg_match('/^\d{2}:\d{2}$/', $_POST['starttime']))) 
            {
                echo "Please Select Valid Start Time";
                return 0;
            }

        if(!(isset($_POST['enddate'])) || empty($_POST['enddate']))
            {
                echo "Please Select End Date";
                return 0;
            }

        if((date('Y-m-d', strtotime($_POST['enddate'])) != $_POST['enddate']))
            {
                echo "Please Enter Valid Date";
                return 0;
            }

        if(strtotime(date('Y-m-d')) > strtotime(date('Y-m-d',strtotime($_POST['enddate']))))
            {
                echo "Please Select Valid End Date";
                return 0;
            }

        if(!(isset($_POST['endtime'])) || empty($_POST['endtime']))
            {
                echo "End Time can't be Empty";
                return 0;
            } 

        if (!(preg_match('/^\d{2}:\d{2}$/', $_POST['endtime']))) 
            {
                echo "Please Select Valid End Time";
                return 0;
            }

        $con = mysqli_connect("localhost","root","","testone");
        $name = $_POST['name'];
        $email = $_POST['email'];
        $start = $_POST['startdate'].' '.$_POST['starttime'];
        $end = $_POST['enddate'].' '.$_POST['endtime'];
        $queryAll =  "SELECT * FROM booking";
        $test = mysqli_query($con,$queryAll);
        $status = true;
        while($row = mysqli_fetch_array($test))
            {
                $bookStart = strtotime($row['start']);
                $bookEnd = strtotime($row['end']);
                $start = strtotime($start);
                $end = strtotime($end);

                if (($start >= $bookStart) && ($start <= $bookEnd))
                    {
                        $status = false;
                        break;
                    }

                if (($end >= $bookStart) && ($end <= $bookEnd))
                    {
                        $status = false;
                        break;
                    }
            }
        if($status)
            {
                $query = "INSERT INTO booking (name,email,start,end) VALUES ('$name','$email','$start','$end')";
                $teswt = mysqli_query($con,$query);
                if($teswt)
                    {
                        echo "Booking Successfull";
                        return 0;
                    }
                else
                    {
                        echo "Booking Unsuccessfull";
                        return 0;
                    }
            }
        else
            {
                echo "Booking Not Available For this time Period";
                return 0;
            }
        
    }
else
    {
        header('location:index.php');
    }
?>