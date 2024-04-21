<?php

$con=new mysqli("localhost","root","","bank");
session_start();
$acno=$_SESSION['acnumber'];
$res=$con->query("select name from customers where acnumber=$acno");
$n=$res->fetch_assoc();
$name=$n['name'];

echo "<html>
<head>
    <link href='styling.css' rel='stylesheet'>
    <style>
        .container7 {
            background-color: rgb(255, 230, 0);
            height: 260px;
            width: 420px;
            border-radius: 20px;
        }

    </style>
</head>
<body>
    <form action='name1.php' method='POST'>
    <center>
        <br><br>
        <h1><u><b>Change name</b></u></h1>

        <div class='container7'><br>
            <table>
                <tr>
                    <th>Current Name:</th>
                    <td>$name</td>
                </tr>
                <tr>
                    <th>New name:</th>
                    <td>
                        <input type='text' name='name' id='name' required>
                    </td>
                </tr>
                <tr>
                    <th>Confirm name:</th>
                    <td>
                        <input type='text' name='cname' id='cname' required>
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
$con->close();
?>