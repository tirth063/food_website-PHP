<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>Category</title>
    <style>
          .topnav {
        overflow: hidden;
        background-color:antiquewhite;
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
        .table{
            border-style:dotted;
        }
        .delete{
            background-color: red;
            color: white;
            border-radius: 2cm;
            text-align:center;
            width: 70px;
            height: 30px;
        }
        .update{
            background-color:rgb(75, 75, 255);
            border-radius: 2cm;
            color: white;
            width: 70px;
            height: 30px;
        }
    </style>
</head>
<body>
    <form action="" Method='post' class="order" enctype="multipart/form-data">
    <div class="topnav">
    <a class="active" href="AdminHomePage.php">Home</a>
    <a href="Allorder.php">Allorder</a>
    <a href="users.php">User</a>
    <a href="index.php">Logout</a>
    </div>
        <div class="container">
                    <div class="title">
                        Add Category
                    </div>
                    <div class="form">
                        <div class="input_field">
                            <label>Category Name</label>
                            <input type="text" name="txtcname"class="input">
                        </div>

                        <div class="input_field">
                            <label>Image</label>
                            <input type="file" name="upload" class="input">
                        </div>

                        <div class="input_field">
                            <label>Description</label>
                            <textarea name="txtdescription" class="input" required></textarea>
                        </div>

                        <div class="input_field">
                            <label>Price</label>
                            <input type="text" name="txtprice" class="input">

                        </div>

                        <div class="input_field">
                            <input type="submit" name="submit" value="Add Category" class="btn">
                        </div>
                </div>
    </div>
    </form>
</body>
</html>
<?php
    include 'Database_connect.php';
    if(isset($_POST['submit']))
    {
        $filename = $_FILES["upload"]["name"];
        $tempname= $_FILES["upload"]["tmp_name"];
        $folder = "image/".$filename;
        echo $folder;
        move_uploaded_file($tempname,$folder);
    
        
        $Cname = $_POST["txtcname"];
        $Cdesc = $_POST["txtdescription"];
        $Cprice = $_POST["txtprice"];

        $query = "insert into tblcategory(cname,cimage,cdesc,cprice) values ('$Cname','$folder','$Cdesc','$Cprice')";
        $data = mysqli_query($conn,$query);

        if($data)
        {
            
            ?>

            <meta http-equiv="refresh"content="0; url = ../project/AddCategory.php"/>
            <?php   

        
            
        }
        else
        {
            echo "Data Not Inserted";
        }
    
       
    }
?>
<?php

    $query = "select * from tblcategory";
    $data = mysqli_query($conn,$query);
    $t = mysqli_num_rows($data);

    if($t != 0)
    {
        ?>
        <table align="center" border="3px" width=1500 bgcolor=antiquewhite style='text-align:center'>
            <tr>
                <th>Id</th>
                <th>Category Name</th>
			    <th>Image</th>
			    <th>Description</th>
                <th>Price</th>
			    <th>Action</th>
            </tr>
       
        <?php
        while( $r = mysqli_fetch_assoc($data))
        {
        echo "<tr>
                <td>".$r['id']."</td>
                <td>".$r['cname']."</td>
                <td><img src = '".$r['cimage']."' height = '100px' width= '100px'</td>
                <td>".$r['cdesc']."</td>
                <td>".$r['cprice']."</td>
               
                <td><a href='DeleteCatgory.php?id=$r[id]'><input type='submit' class='delete' value='Delete'></a>
                <a href='UpdateCategory.php?id=$r[id]'><input type='submit' class='update' value='Edit'></a>
               
                </td>

            </tr>";
        }
    }        
    else
        echo "No Data Found";
?>

</table>
