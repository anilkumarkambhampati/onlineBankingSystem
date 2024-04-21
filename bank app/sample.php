<?php
$con=new mysqli("localhost","root","");


$sq="show databases";
$res=$con->query($sq);
$i=0;
while($row=$res->fetch_assoc())
{
    if($row['Database']=="bank")
    {
        $i=1;
    }
}

if($i==1)
{
    $con->close();
    $con=new mysqli("localhost","root","","bank");
    $sq="show tables";
    $res=$con->query($sq);
    $j=0;
    while($row=$res->fetch_assoc())
    {
        if($row['Tables_in_bank']=="customers")
        {
            $j=1;
            break;
        }
    }
    if($j==1)
    {
        $con->close();
        include 'registration1.php';
    }
    else
    {
        tablecreation();
    }
}
else
{
    
    if($con->query("create database bank"))
    {
        echo "database is created";
        $con->close();
        $con=new mysqli("localhost","root","","bank");
        tablecreation();
    }
    else
    {
        echo "error in createing database";
    }
    
}
function tablecreation()
{
    global $con;
    $sq="create table customers(name varchar(50),
                                    Fname varchar(50),
                                    gender varchar(20),
                                    dob varchar(50),
                                    aadhar varchar(80) unique,
                                    pan varchar(50),
                                    mobile varchar(50),
                                    alternate varchar(50),
                                    email varchar(100),
                                    branch varchar(50),
                                    ifsc varchar(50) default 'sreyas123',
                                    actype varchar(50),
                                    username varchar(80) unique,
                                    password varchar(100),
                                    balance int default 0,
                                    acnumber int unique,
                                    pin int default 0,
                                    primary key(acnumber))";
            $con->query($sq);
            triggercreation();
        include 'registration1.php';
}
function triggercreation()
{
    global $con;
    $sq1="CREATE TRIGGER `t2` BEFORE INSERT ON `customers`
    FOR EACH ROW BEGIN
       DECLARE acn INT;
       SELECT MAX(acnumber) INTO acn FROM customers;
       IF acn IS NULL THEN
           SET NEW.acnumber = 20240000;
       ELSE
           SET NEW.acnumber = acn + 1;
       END IF;
   END";
   $con->query($sq1);
}
?>