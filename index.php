<?php
include("model/app_logic.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include('./includes/head_content.php') ?>
    <title>Mini Inventory</title>
</head>
<body>
    <div class="table-container">
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
