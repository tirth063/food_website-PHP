
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
        .delete{
            background-color: red;
            color: white;
            border-radius: 2cm;
            text-align:center;
            width: 100px;
            height: 30px;
        }
    </style>
</head>
<body style="background-color:antiquewhite">
<div class="topnav">
    <a class="active" href="AdminHomePage.php">Home</a>
    <a href="AddCategory.php">Category</a>
    <a href="Allorder.php">All Orders</a>
    <a href="index.php">Logout</a>
    </div>

</body>
</html>

<?php
    include 'Database_connect.php';

    $query = "select * from tbluser";
    $data = mysqli_query($conn,$query);
    $t = mysqli_num_rows($data);

    if($t != 0)
    {
        ?>
        <table  align="center" border="3px" width=1400 bgcolor=antiquewhite style='text-align:center'>
            <tr>
                <th>User Name</th>
                <th>User Email ID</th>
			    <th>Psssword </th>

            </tr>
       
        <?php
        while( $r = mysqli_fetch_assoc($data))
        {
        echo "<tr>
                <td>".$r['username']."</td>
                <td>".$r['email']."</td>
                <td>".$r['password']."</td>

            </tr>";
        }
    }        
    else
        echo "No Data Found";
?>

</table>

