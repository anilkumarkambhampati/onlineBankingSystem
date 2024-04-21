<?php
$con=new mysqli("localhost","root","","bank");
$mobile=$_POST['mobile'];
session_start();
$acno=$_SESSION['acnumber'];

if($con->query("update customers set mobile=$mobile where acnumber=$acno"))
{
    include('updatestatus.html');
}
else
{
    echo "error in updation";
}

$con->close();

?>