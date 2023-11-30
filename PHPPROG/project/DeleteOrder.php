<?php
    include 'Database_connect.php';
  
        $id = $_GET['id'];
        $qry = "delete from tblorder where id = $id ";
        $data = mysqli_query($conn,$qry);

        if($data)
        {
            //header("Location : Allorder.php");
            echo "<script> alert('your order has been cancelled Suessfully');</script>";
        }
        else
        {
            echo "<script> alert('Not cancel') </script>";
        }
    
?>