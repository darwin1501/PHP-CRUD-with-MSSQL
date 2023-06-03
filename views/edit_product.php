<?php 
include("../model/app_logic.php");

// store product ID at session
$productID = $_GET['productID'];

if(isset($_POST['submit'])){
    updateProduct($productID);
}

$product = findProduct($productID);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css"/>
    <title>Edit Product</title>
</head>
<body>
    <main class="flex flex-column align-center justify-center">
        <div style="margin-top: 50px;">
            <a class="button" href="../index.php" style="margin-left: -100px;">Go Back.</a>
            <form method="post" action="edit_product.php?productID=<?=$productID?>" class="flex flex-column">
                <label for="productName">Product Name</label>
                <input id="productName" name="productName" type="text" value="<?= $product['name']?>" required/>
                <label for="quantity">Quantity</label>
                <input id="quantity" name="quantity" type="number" value="<?= $product['quantity']?>" style="width: 100px;"/>
                <input type="submit" value="Update" name="submit" class="button"> 
            </form>
        </div>
    </main>
</body>
</html>