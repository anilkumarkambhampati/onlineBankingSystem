<?php
$con=new mysqli("localhost","root","","bank");
session_start();
$acno=$_SESSION['acnumber'];
$num=$con->query("select mobile from customers where acnumber=$acno");
$num=$num->fetch_assoc();
$num=$num['mobile'];

echo "<html>
<head>
    <link href='styling.css' rel='stylesheet'>
    <style>
    .container7 {
        background-color: rgb(255, 230, 0);
        height: 180px;
        width: 420px;
        border-radius: 20px;
    }

</style>
</head>
<body>
    <form action='mobile1.php' method='post'>
    <center>
        <br><br>
        <h1><u><b>Change mobile no.</b></u></h1>

        <div class='container7'>
            <table>
                <tr>
                    <th>Current mobile no.:</th>
                    <td> $num </td>
                </tr>
                <tr>
                    <th>New mobile no.:</th>
                    <td>
                        <input type='text' name='mobile' id='mobile' minlength='10' maxlength='10' required>
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