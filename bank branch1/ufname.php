<?php
$con=new mysqli("localhost","root","","bank");
$fname=$_POST['Fname'];
session_start();
$acno=$_SESSION['acnumber'];

if($con->query("update customers set Fname='$fname' where acnumber=$acno"))
{
    include("updatestatus.html");
}
else{
    echo "error in updation";
}

?>