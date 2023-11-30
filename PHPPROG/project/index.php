<?php
    session_start();

    include "Database_connect.php";

    if(isset($_POST['submit']))
    {
        //save in session for myorder.php file serching
        $_SESSION['ue']  = $_POST['username'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($conn,"Select * from tbluser where username = '$username'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            if($password == $row['password']){
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header("Location: UserHomePage.php");
            }
            else
            {
                echo "<script> alert('Wrong Password');</script>";
            }

        }else
        {
            echo "<script> alert('Username Not Registrered');</script>";
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Sign in</header>
       
    <form action="" method="post">
        <div class="field input">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div class="field input">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="field">
            <input type="submit" class="btn" name="submit" value="Login" required>
        </div>
        <div class="links">
            Don't have account? <a href="UserRegister.php">SignUp Now</a>
        </div>
    </form>
    </div>
</div>
</body>
</html>