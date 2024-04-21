<?php
$con=new mysqli("localhost","root","","bank");
//retreive amount to be deposit from page
$amount=$_POST["amount"];
//retreive username 
session_start();
$acno=$_SESSION['acnumber'];
//query to retreive the balance
$s1="select balance from customers where acnumber='$acno'";
$a=0;
$res=$con->query($s1);
while($row=$res->fetch_assoc())
{
    $a=$row['balance'];
}
//updating the balance in database
$a=$a+$amount;
//echo $a;
$s1="update customers set balance=$a where acnumber='$acno'";
if($con->query($s1))
{
    header("Location: depositstatus.html");
}

$con->close();
?>