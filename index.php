<?php
include("model/app_logic.php");

if(isset($_GET['delete'])){
    deleteAProduct();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../PHP-basics/assets/style.css"/>
    <title>Mini Inventory</title>
</head>
<body>
    <main class="flex flex-column align-center justify-center">
        <a class="button" href="./views/add_product.php">
            Add new Product
        </a>
        <table>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <?php getProducts();?>
        </table>
    </div>
</body>
</html>
