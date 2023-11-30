
<?php
    session_start();

    include "Database_connect.php";

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

       
       $query = "select * from tbladmin where username = '$username' and password = '$password'";
        $result = mysqli_query($conn,$query);
       if(mysqli_num_rows($result) > 0)
       {
            header('location:AdminHomePage.php');
       }
       else
       {
            echo "<script> alert('Wrong username and Password);</script>";
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
    </form>
    </div>
</div>
</body>
</html>