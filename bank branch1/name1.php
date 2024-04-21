<?php
$con=new mysqli("localhost","root","","bank");

$name=$_POST['name'];
$cname=$_POST['cname'];


if($name===$cname)
{
    session_start();
    $acno=$_SESSION['acnumber'];
    if($con->query("update customers set name='$name' where acnumber=$acno"))
    {
        include('updatestatus.html');
    }
    else
    {
        echo "error in updation";
    }

}
else
{
    //$con->close();
    echo "<script>alert('please enter the names correctly')</script>";
    include("name.php");
}