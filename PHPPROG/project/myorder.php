
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
    <a class="active" href="UserHomePage.php">Home</a>
  <a href="myorder.php">MyOrder</a>
        <a href="index.php">Logout</a>
    </div>
    <div>
        <br><br><h1> My Orders </h1><br><br>
    </div>
</body>
</html>

<?php
session_start();
include 'Database_connect.php';

$user_name = $_SESSION['ue'];
$qryemail = "SELECT email FROM tbluser WHERE username = '$user_name'";
$u_email_result = mysqli_query($conn, $qryemail);

if ($u_email_result) {
    $u_email_data = mysqli_fetch_assoc($u_email_result);
    $user_email = $u_email_data['email']; // Retrieve the email value

    $query = "SELECT * FROM tblorder WHERE uemail_order_find = '$user_email'";
    $data = mysqli_query($conn, $query);

    if ($data === false) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {
        $t = mysqli_num_rows($data);
        if ($t != 0) {
            // Display orders in a table
            ?>
            <table  align="center" border="3px" width=1400 bgcolor=antiquewhite style='text-align:center'>
                <tr>
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
                    <td>".$r['quantity']."</td>
                    <td>".$r['fname']."</td>
                    <td>".$r['phno']."</td>
                    <td>".$r['email']."</td>
                    <td>".$r['address']."</td>
                   
                    <td><a href='DeleteOrder.php?id=$r[id]'><input type='submit'class='delete' value='Cancel Order'></a>
                    </td>
    
                </tr>";
            }
            ?>
            </table>
            <?php
        } else {
            echo "<p>No orders have been placed.</p>";
        }
    }
} else {
    echo "Error retrieving email: " . mysqli_error($conn);
}
?>
</table>

