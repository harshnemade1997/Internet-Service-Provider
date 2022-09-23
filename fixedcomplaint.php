<?php
//connecton file
require_once("connect.php");
$to       = 'harshalnemade97@gmail.com';
$subject  = 'PROBLEM FIXED ';
$message  = ' your problem of internet is solved.';
$headers  = 'From:ISP';
if(mail($to, $subject, $message, $headers))
    echo "Email sent";
else
    echo "Email sending failed";
?>