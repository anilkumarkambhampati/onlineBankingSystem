<?php
$con=new mysqli("localhost","root","","bank");
//username retreived
session_start();
$user=$_SESSION['user'];
//retrteive the pin from page
$pin=$_POST['pin'];
//query to retreive pin from database
$sq="select pin from customers where username='$user'";
$res=$con->query($sq);
$a=0;
while($row=$res->fetch_assoc())
{
    $a=$row['pin'];
}
//check the pin retreived from page with actual pin
if($pin==$a)
{
    $sq="select acnumber,balance from customers where username='$user'";
$res=$con->query($sq);
$acno="";
$cb=0;
while($row=$res->fetch_assoc())
{
    $acno=$row['acnumber'];
    $cb=$row['balance'];
}
//printing the details
    echo "<html>
    <head>
        <link rel='stylesheet' href='styling1.css'>
        <style>
        .back {
            background-color: rgb(255, 153, 0);
        }
        .container10 {
            background-color: rgb(255, 230, 0);
            height: auto;
            font-size: 25px;
            width: 450px;
            border-radius: 10px;
        }
        .containera{
            background-color: rgb(255, 230, 0);
            height: 70;
            font-size: 25px;
            width: 130px;
            border-radius: 10px;
        }
        </style>
    </head>
    <body>
        <center>
            <font color='aliceblue' size='5px'>
                <h1><u>Balance</u></h1>
            </font>
            <div class='container10'>
                <table>
                    <tr>
                        <th>A/C Number:</th>
                        <td>$acno</td>
                        <th>IFSC:</th>
                        <td>sreyas123</td>
                    </tr>
                </table>
            </div>
            <br>
            <div class='containera'>
                <u><b>Balance</b></u><br>
                <b>$cb</b>
            </div>
        </center>
        <br><br><br>
        <div class='back'>
        <a href='home1.html'><strong> <-- </strong> </a>
    </div>
    
    </body>
    </html>";
}
else
{
    echo "<script>alert('incorrect pin')</script>";
    include("balance.html");
}
$con->close();

?>