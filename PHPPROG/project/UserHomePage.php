<?php
    include 'Database_connect.php'; 


    if(isset($_POST['search'])){
        $searchvalue = $_POST['search'];
        $query = "select * from tblcategory where cname like '%$searchvalue%' order by id desc ";
    }
    else{
        $query="select * from tblcategory order by id desc";
    }
    $result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="style3.css">
    <link rel="stylesheet"href="style1.css">
   
    <title>Document</title>
</head>
<body>
<div class="topnav">
  <a class="active" href="UserHomePage.php">Home</a>
  <a href="myorder.php">MyOrder</a>
  <a href="index.php">Logout</a>
  <section class="food-search text-center">
        <div class="container">
            
            <form action="" method="POST">
                <input type="text" name="search" style="width:20%" placeholder="Search for Category" required>
            </form>

        </div>
    </section>
</div>
<main>
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['cname'];
                $desc = $row['cdesc'];
                $image = $row['cimage']; 
                $price = $row['cprice'];
            ?>
            
    <div class="menu">
        <form  action="orderdetali.php" Method="Post">
        <div class="food-items">
            <img src="<?php echo $image; ?>" alt="">
            <div class="details">
                <div class="details-sub">
                    <h5><?php echo $name; ?></h5>
                    <h5 class="price">Rs <?php echo $price; ?></h5>
                </div>
                <p><?php echo $desc; ?></p>
                <button name="submit">Order Now</button>
            </div>
        </div>
        </form>
    </div>
        <?php } ?>

        
        <main>
       
</body>
</html>