<?php
$con=new mysqli("localhost","root","","bank");

if($con->connect_error)
{
    echo "database is not connected";
}
else
{
    //retreive the username and password from page
    $username=$_POST["username"];
    $password=$_POST["password"];
    //retreive the password from database
    $sql="select password from customers where username='$username'";
    $pass=$con->query($sql);
    $res="";
    while($row=$pass->fetch_assoc())
    {
        $res=$row["password"];
    }
    //check the password is correct or not
    if($res==$password)
    {
        //if password is correct set the session value
        $ac=$con->query("select acnumber from customers where username='$username'");
        $ac=$ac->fetch_assoc();
        $a=$ac['acnumber'];
        session_start();
        $_SESSION['user']="$username";
        $_SESSION['acnumber']=$a;
        //redirect to main page
        header("Location: onlineBank1.html");
    }
    else
    {
        //if password is incorrect give an alert message
        echo "<script>window.alert('username or password is incorrect')</script>";
    }


}
$con->close();
?>