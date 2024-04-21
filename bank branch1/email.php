<?php
$con=new mysqli("localhost","root","","bank");
session_start();
$acno=$_SESSION['acnumber'];
$mail=$con->query("select email from customers where acnumber=$acno");
$mail=$mail->fetch_assoc();
$mail=$mail['email'];

echo "<html>
<head>
    <link href='styling.css' rel='stylesheet'>
    <style>
    .container7
    {
        background-color: rgb(255, 230, 0);
        height: fit-content;
        width: fit-content;
        border-radius: 20px;
    }

</style>
</head>
<body>
    <form action='email1.php' method='post'>
    <center>
        <br><br>
        <h1><u><b>Change email</b></u></h1>

        <div class='container7'>
            <table>
                <tr>
                    <th>Current Email:</th>
                    <td> $mail </td>
                </tr>
                <tr>
                    <th>New mail id:</th>
                    <td>
                        <input type='email' name='email' id='email' required>
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