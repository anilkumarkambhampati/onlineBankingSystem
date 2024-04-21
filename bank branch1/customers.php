<?php
$con=new mysqli("localhost","root","","bank");

$res=$con->query("select * from customers");

echo "<html>
<head>
    <link rel='stylesheet' href='styling.css'>
</head>
<body>
    <center>
        <h1><u><strong>DataBase</strong></u></h1>
        <table style='background-color: white;border-radius: 8px;border-collapse:collapse' border='1px'>
            <tr>
                <th>A/C Number:</th>    
                <th>Name:</th>
                <th>Fname</th>
                <th>Gender</th>
                <th>Aadhar</th>
                <th>Username</th>
            <tr>";

while($row=$res->fetch_assoc())
{
    echo "<tr>
            <td>",$row['acnumber'] ,"</td>
            <td>",$row['name'],"</td>
            <td>",$row['Fname'],"</td>
            <td>",$row['gender'],"</td>
            <td>",$row['aadhar'],"</td>
            <td>",$row['username'],"</td>
        <tr>";
}

echo "</table>
    </center>
    </body>
    <html>";

$con->close();
?>