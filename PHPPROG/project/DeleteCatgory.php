<?php
 include 'Database_connect.php';

 $id = $_GET['id'];

 $query = "delete from tblcategory where id = '$id' ";
 $data = mysqli_query($conn,$query);
 if($data)
 {
    ?>
    <meta http-equiv="refresh"content="0; url = ../project/AddCategory.php"/>
    <?php
     //echo "Record Deletd";

 }
 else
 {
     echo "Record Not Delete";
 }

?>