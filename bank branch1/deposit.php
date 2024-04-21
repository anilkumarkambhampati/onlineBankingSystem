<?php
$con=new mysqli("localhost","root","","bank");

$acno=$_POST['acnumber'];
$sq="select acnumber from customers";
$res=$con->query($sq);
$flag=0;
while($row=$res->fetch_assoc())
{
    if($row['acnumber']==$acno)
    {
        $flag=$flag+1;
    }
}
if($flag==0)
{
    echo "<!DOCTYPE html>
    <html lang='en'>
        <head>
        <script> alert('Enter valid account number!') </script>
        <link href='styling.css' rel='stylesheet'>
    </head>
    <body><form method='post' action='deposit.php'>
        <center><br><br>
            <h1><u><b>Deposit</b></u></h1>
            <div class='container3'>
                <br>
                <table>
                    <tr>
                        <th>A/C Number:</th>
                        <td>
                            <input type='text' id='acnumber' name='acnumber' required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' align='center'>
                            <input type='submit' value='Deposit' class='button'>
                        </td>
                    </tr>
                </table>
            </div>
        </center>
        </form>
    </body>
</html>";
}
else
{
    session_start();
    $_SESSION['acnumber']=$acno;
    $sq="select name,Fname from customers where acnumber=$acno";
    $res=$con->query($sq);
    while($row=$res->fetch_assoc())
    {
        $name= $row['name'];
        $fname= $row['Fname'];
    }
    
    echo "<!DOCTYPE html>
    <html lang='en'>
        <head>
        <link rel='stylesheet' href='styling.css'>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Document</title>
        </head>
        <body>
            <center><br>
            <h1><u><b>Deposit</b></u></h1><br><br>
            <div class='container4'>
                
            <form action='deposit1.php' method='post'>
            <table>
                <tr>
                    <th>Name:</th>
                    <td>$name</td>
                </tr>
                <tr>
                    <th>Guardian Name:</th>
                    <td>$fname</td>
                </tr>
                <tr>
                    <th>Amonut</th>
                    <td>
                        <input type='number' name='amount' id='amount' required>
                    </td>
                </tr>
                <tr>
                    <td colspan='2' align='center'>
                        <input type='submit' value='Deposit' class='button'>
                    </td>
                </tr>
            </table>
            </form>
            </div>
        </center>
        </body>
    </html>";
}

$con->close();
?>