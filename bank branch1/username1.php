<?php
$con=new mysqli("localhost","root","","bank");
session_start();
$acno=$_SESSION['acnumber'];
$user=$_POST['user'];

$res=$con->query("select username from customers");
$flag=0;
while($row=$res->fetch_assoc())
{
    if($row['username']===$user)
    {
        $flag=1;
        break;
    }
}
if($flag==0)
{
    if($con->query("update customers set username='$user' where acnumber=$acno"))
    {
        include('updatestatus.html');
        $con->close();
    }
    else
    {
        echo 'Error in updation';
    }
}
else
{
    session_abort();
    $con->close();
    echo "<script>alert('username already exist please enter another username')</script>";
    include("username.php");
}

//$con->close();
?>