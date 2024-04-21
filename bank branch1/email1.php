<?php
$con=new mysqli("localhost","root","","bank");
$email=$_POST['email'];
session_start();
$acno=$_SESSION['acnumber'];

if($con->query("update customers set email='$email' where acnumber=$acno"))
{
    include('updatestatus.html');
}
else
{
    echo "error in updation";
}

$con->close();

?>