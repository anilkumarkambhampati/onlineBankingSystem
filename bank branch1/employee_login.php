<?php

$id=$_POST['id'];
$pass=$_POST['pass'];

if($id=='anil2662' && $pass=='Anil2662@')
{
    header("Location:home1.html");
    exit();
}
else
{
    echo "<script> alert('username or password is incorrect')</script>";
}


// Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user inputs
    // $id = $_POST['id'];
    // $pass = $_POST['pass'];
    
    // Check if credentials are correct
    // if ($id == 'anil2662' && $pass == 'Anil2662@') {
        // Redirect to the home page
//         header("Location: home1.html");
//         exit(); // Ensure script stops executing after redirection
//     } else {
//         // Redirect back to the login page with an error message
//         header("Location: employee_login.php?error=1");
//         exit();
//     }
// }
?>