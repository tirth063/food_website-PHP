<?php 
        include "Database_connect.php";
      
        
        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $conformpassword = $_POST['conformpassword'];
            $password = $_POST['password'];
            $duplicate = mysqli_query($conn,"select * from tbluser where username = '$username' or email = '$email'");
            if(mysqli_num_rows($duplicate) > 0){
                echo "<script> alert('Username or Email Has Already Taken');</script>";
            }
            else {
                if($password == $conformpassword){
                    $query = "insert into tbluser values('$username','$email','$password','$conformpassword')";
                    mysqli_query($conn,$query);
                    echo "<script> alert('Registration Successful');</script>";
                    header("Location: index.php");
                }
                else{
                    echo "<script> alert('Password Does Not Match');</script>";
                }
            }
            
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"href="styele1.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Sign Up</header>
    <form action="" method="post">

        <div class="field input">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div class="field input">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="field input">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="field input">
            <label for="conformpassword">Conform Password</label>
            <input type="password" name="conformpassword" id="conformpassword" required>
        </div>

        <div class="field">
            <input type="submit" class="btn" name="submit" value="Login" required>
        </div>
        <div class="links">
            Already a member? <a href="index.php">Sign in</a>
        </div>
    </form>
    </div>
</div>
</body>
</html>