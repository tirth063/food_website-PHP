<?php include 'Database_connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
            <form action="" method="POST" class="order">
                    <div class="title">
                        Order Detail 
                    </div>
                    <div class="form">
                        <div class="input_field">
                            <label>Quantity</label>
                            <input type="number" name="txtqty" class="input-responsive" value="1" required>
                        </div>

                        <div class="input_field">
                            <label>Full Name</label>
                            <input type="text" name="txtfname" class="input"  required>
                        </div>

                        <div class="input_field">
                            <label>Phone Number</label>
                            <input type="text" name="txtphno"  class="input" required>
                        </div>

                        <div class="input_field">
                            <label>Email</label>
                            <input type="email" name="txtemail" class="input" required>
                        </div>

                        <div class="input_field">
                            <label>Address</label>
                            <textarea name="txtaddress" required></textarea><br><br>
                        </div>

                        <div class="input_field">
                            <input type="submit" name="confirmorder" value="Conform Order" class="btn">
                        </div>
                </div>
            </form>
        </div>
</body>
</html>
<?php
session_start();
include 'Database_connect.php';

if(isset($_POST['confirmorder'])) {
    $quantity = $_POST['txtqty'];
    $fname = $_POST['txtfname'];
    $phno = $_POST['txtphno'];
    $email = $_POST['txtemail'];
    $address = $_POST['txtaddress'];

    $user_name = $_SESSION['ue'];

    // Retrieve user's email
    $qryemail = "SELECT email FROM tbluser WHERE username = '$user_name'";
    $u_email_result = mysqli_query($conn, $qryemail);

    if ($u_email_result) {
        $u_email_data = mysqli_fetch_assoc($u_email_result);
        $user_email = $u_email_data['email']; // Retrieve the email value

        // Insert order
        echo  "INSERT INTO tblorder VALUES ('$user_email','$quantity', '$fname', '$phno', '$email', '$address')";
        $qry = "INSERT INTO tblorder VALUES (null,'$user_email','$quantity', '$fname', '$phno', '$email', '$address')";

        if (mysqli_query($conn, $qry)) {
            echo "<script> alert('Order Successfully'); window.location.href='UserHomePage.php'; </script>";
            exit;
        } else {
            echo "<script> alert('Order Fail'); window.location.href='UserHomePage.php'; </script>";
            exit;
        }
    } else {
        echo "Error retrieving email: " . mysqli_error($conn);
    }
}
?>

