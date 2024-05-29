<?php
$showError = false;

include "includes/_dbconnect.php";

$username = $_POST['username'];
$pass = $_POST['password'];
$username = mysqli_real_escape_string($conn, $username);

$sql = "SELECT * FROM admin WHERE `username` = '$username'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
   

if ($num == 1){
    while($row=mysqli_fetch_assoc($result)){
        if ($pass == $row['pass']){
        // if (password_verify($pass, $row['password'])){

            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$username;
            header('location: dashboard.php');
        }
        else{
            $showError = "Invalid Password";
        }
    }
} 
else{
    $showError = "Invalid Credentials";
}


if ($showError){
    echo '<div class="alert alert-danger alert-success fade show" role="alert">
    <strong>Error! </strong>'. $showError.' <br>Click <a href="index.php">here</a> to try again
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

?>