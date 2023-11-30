
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
    <a href="users.php">User</a>
    <a href="index.php">Logout</a>
    </div>

</body>
</html>

<?php
    include 'Database_connect.php';

    $query = "select * from tblorder";
    $data = mysqli_query($conn,$query);
    $t = mysqli_num_rows($data);

    if($t != 0)
    {
        ?>
        <table  align="center" border="3px" width=1400 bgcolor=antiquewhite style='text-align:center'>
            <tr>
                <th>Id</th>
                <th>Quantity</th>
			    <th>Full Name</th>
			    <th>Phone Number</th>
                <th>Email</th>
			    <th>Address</th>
			    <th>Action</th>
            </tr>
       
        <?php
        while( $r = mysqli_fetch_assoc($data))
        {
        echo "<tr>
                <td>".$r['id']."</td>
                <td>".$r['quantity']."</td>
                <td>".$r['fname']."</td>
                <td>".$r['phno']."</td>
                <td>".$r['email']."</td>
                <td>".$r['address']."</td>
               
                <td><a href='DeleteOrder.php?id=$r[id]'><input type='submit'class='delete' value='Cancel Order'></a>
                </td>

            </tr>";
        }
    }        
    else
        echo "No Data Found";
?>

</table>

