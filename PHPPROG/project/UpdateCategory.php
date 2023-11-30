<?php
include 'Database_connect.php';

// Check whether id is set or not 
if(isset($_GET['id'])) {
    // Get all the details
    $id = $_GET['id'];

    // SQL Query to Get the Selected Category
    $qry = "SELECT * FROM tblcategory WHERE id = '$id'";
    // Execute the Query
    $data = mysqli_query($conn, $qry);

    // Get the value based on query executed
    $t = mysqli_num_rows($data);
    $r = mysqli_fetch_assoc($data);

    // Get the Individual Values of Selected Category
    $title = $r['cname'];
    $description = $r['cdesc'];
    $price = $r['cprice'];
    $current_image = $r['cimage'];
} else {
    // Redirect to Manage Category page
    header('location: AddCategory.php');
}

if(isset($_POST['submit'])) {
    // Get all the details from the form
    $id = $_POST['id'];
    $Cname = $_POST["txtcname"];
    $description = $_POST["txtdescription"];
    $current_image = $_POST['current_image'];
    $price = $_POST["txtprice"];

    // Upload the image if selected
    // Check whether upload button is clicked or not
    if(isset($_FILES['image']['name'])) {
        // Upload Button Clicked
        $image_name = $_FILES['image']['name']; // New Image Name

        // Check whether the file is available or not
        if($image_name!="") {
            // Image is Available
            // A. Uploading New Image

            // Rename the Image
            $ext = end(explode('.', $image_name)); // Gets the extension of the image
            $image_name = "image".'/a'.rand(0000, 9999).'.'.$ext; // This will be renamed image

            // Get the Source Path and Destination Path
            $src_path = $_FILES['image']['tmp_name']; // Source Path
            $dest_path = $_SERVER['DOCUMENT_ROOT'] . '/PHPPROG/project/' . $image_name; // Destination Path

            // Upload the image
            $upload = move_uploaded_file($src_path, $dest_path);

            // Check whether the image is uploaded or not
            if($upload==false) {
                // Failed to Upload
                $error_msg = "Failed to Upload new Image";
            }

            // Remove the image if new image is uploaded and current image exists
            // B. Remove current Image if Available
            if($current_image!="") {
                // Current Image is Available
                // Remove the image
                $remove_path = $_SERVER['DOCUMENT_ROOT'] . '/PHPPROG/project/' . $current_image;
                $remove = unlink($remove_path);

                // Check whether the image is removed or not
                if($remove==false) {
                    // Failed to remove current image
                    $error_msg = "Failed to remove current image";
                }
            }
        } else {
            $image_name = $current_image; // Default Image when Image is Not Selected
        }
    } else {
        $image_name = $current_image; // Default Image when Button is not Clicked
    }

    // Update the Category in Database
    $sqlquery2 = "UPDATE tblcategory SET cname='$Cname', cimage='$image_name', cdesc='$description', cprice='$price' WHERE id = '$id'";

    // Execute the SQL Query
    $res3 = mysqli_query($conn, $sqlquery2);

    // Check whether the query is executed or not 
    if($res3==true) {
        // Query Exectued and Category Updated
        $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
        header('location:AddCategory.php');
    } else {
        // Failed to Update Category
        $error_msg = "Failed to Update Category.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>Category</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <form action="" method="POST" class="order">
                <div class="title">
                    Update Category
                </div>
                <?php if(isset($error_msg)) { ?>
                    <div class="error"><?php echo $error_msg; ?></div>
                <?php } ?>
                <div class="form">
                    <div class="input_field">
                        <label>Category Name</label>
                        <input type="text" name="txtcname" class="input" value="<?php echo $r['cname']; ?>">
                    </div>

                    <div class="input_field">
                        <label>Current Image:</label>
                        <?php if($current_image == "") { ?>
                            <div class='error'>Image not Available.</div>
                        <?php } else { ?>
                            <br><img src="<?php echo "http://localhost/PHPPROG/project/$current_image" ; ?>" width="150px"><br>
                        <?php } ?>
                    </div>

                    <div class="input_field">
                        <label>Select New Image: </label>
                        <input type="file" name="image">
                    </div>

                    <div class="input_field">
                        <label>Description</label>
                        <textarea name="txtdescription" class="input" required><?php echo $r['cdesc']; ?></textarea>
                    </div>

                    <div class="input_field">
                        <label>Price</label>
                        <input type="text" name="txtprice" class="input" value="<?php echo $r['cprice']; ?>">
                    </div>

                    <div class="input_field">
                        <input type="submit" name="submit" value="Update Order" class="btn">
                    </div>
                    <div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    </div>
                </div>
            </form>
        </div>
    </form>
</html>