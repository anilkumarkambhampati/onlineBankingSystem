<?php
$con=new mysqli("localhost","root","","bank");
$fld=$_POST['field'];
$acno=$_POST['acnumber'];

$res=$con->query("select acnumber from customers");
$flag=0;
while($row=$res->fetch_assoc())
{
    if($row['acnumber']==$acno)
    {
        $flag=1;
        break;
    }
}
if($flag==0)
{
    echo "<script>alert('Account number is not registered')</script>";
    include("edit.html");
}
else if($fld=="")
{
    echo "<script>alert('Choose the field to change')</script>";
    include("edit.html");
}
else
{
    session_start();
    $_SESSION['acnumber']=$acno;
    if($fld=='name')
    {
        header("Location:name.php");
    }
    else if($fld=='fname')
    {
        header("Location:Fname.php");
    }
    else if($fld=='email')
    {
        header('Location:email.php');
    }
    else if($fld=='mobile')
    {
        header('Location:mobile.php');
    }
    else if($fld=='username')
    {
        header('Location:username.php');
    }
    
}
$con->close();
?>