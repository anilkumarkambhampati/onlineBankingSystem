<?php

$con=new mysqli("localhost","root","","bank");
session_start();
$acno=$_SESSION['acnumber'];
$res=$con->query("select Fname from customers where acnumber=$acno");
$n=$res->fetch_assoc();
$fname=$n['Fname'];

echo "
<html>
<head>
    <link href='styling.css' rel='stylesheet'>
    <style>
        .container7 {
            background-color: rgb(255, 230, 0);
            height: 230px;
            width: 400px;
            border-radius: 20px;
        }

    </style>
</head>
<body>
    <form action='ufname.php' method='post'>
    <center>
        <br><br>
        <h1><u><b>Change guardian name</b></u></h1>

        <div class='container7'><br>
            <table>
                <tr>
                    <th>Current Guardian Name:</th>
                    <td> $fname </td>
                <tr>
                    <th>New name:</th>
                    <td>
                        <input type='text' name='Fname' id='Fname' required>
                    </td>
                </tr>
                <tr>
                    <td colspan='2' align='center'>
                            <input type='submit'  class='button' value='Update'>
                    </td>
                </tr>
            </table>
        </div>
    </center>
    </form>
</body>
</html>";

?>