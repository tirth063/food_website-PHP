<?php
    include 'Database_connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .topnav {
        overflow: hidden;
        background-color: #ffeae0;
    }
    .topnav a {
            float: left;
            margin-left: 180px;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
        .contanier{
            margin: 0 auto;
            padding: 10px;
            margin-left: 200px;
            margin-top: 50px;
         
        }
        .firstdev{
            background-color:#eee;
            padding: 5px;
            width: 300px;
            border-radius: 5px;
            display: inline-block;
        }
        .firstdev h3{
            text-align: center;
        }
        .firstdev h1{
            text-align: center;
        }
        .seconddev{
            background-color: #eee;
            padding: 5px;
            width: 300px;
            border-radius: 5px;
            display: inline-block;
        }
        .seconddev h3{
            text-align: center;
        }
        .seconddev h1{
            text-align: center;
        }
        .threedev{
            background-color: #eee;
            padding: 5px;
            width: 300px;
            border-radius: 5px;
            display: inline-block;
        }
        .threedev h3{
            text-align: center;
        }
        .threedev h1{
            text-align: center;
        }
        
    </style>
</head>
<body style="background-color:#ffeae0">
    <div class="topnav">
    <a href="AddCategory.php">Category</a>
    <a href="Allorder.php">Allorder</a>
    <a href="users.php">User</a>
    <a href="AdminLogin.php">Logout</a>
    </div>
    <div class="contanier">
        <div class="firstdev">
            <h3>Category</h3>
            <?php 
                $sql = "Select * From tblcategory";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
            ?>
            <h1><?php echo $count; ?></h1>  
        </div>
        <div class="seconddev">
        <h3>Total Orders</h3>
            <?php 
                $sql3 = "Select * From tblorder";
                $res3 = mysqli_query($conn, $sql3);
                $count3 = mysqli_num_rows($res3);
            ?>
            <h1><?php echo $count3; ?></h1>
        </div>
        <div class="threedev">
            <h3>Cancel Order</h3>
            <?php 
                $sql3 = "Select * From tblorder";
                $res3 = mysqli_query($conn, $sql3);
                $count3 = mysqli_num_rows($res3);
            ?>
            <h1><?php echo $count3; ?></h1>
        </div>
    </div>
    
</body>
</html>

          