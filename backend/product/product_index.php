<?php 
include '../../php/controller/product_controller.php';    
include '../../include/header.php';
?>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
    <?php 
    session_start();
    if(!empty($_SESSION['message'])) { ?>                                    
        <div class="alert alert-success" role="alert">
                <?=$_SESSION['message'] ?>
        </div>                    
    <?php } ?> 
    <a href="../../backend/product/product_create.php" class="btn btn-primary">Add a product</a>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Stock Quantity</th>
                <th scope="col">Category</th>
                <th scope="col">Brand</th>
                <th scope="col">Availabe Size</th>
                <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    require_once "../../php/database_connect.php";
                    $fetch = "SELECT * FROM product";
                    if ($result = $connect ->query($fetch)) {
                        while ($row = $result -> fetch_assoc()) { 
                            //print_r($row);
                            $product_id = $row['ProductID'];
                            $product_name = $row['Name'];
                            $description = $row['Description'];
                            $price = $row['Price'];
                            $stock = $row['QuantityInStock'];
                            $category = $row['CategoryID'];
                            $brand = $row['BrandID'];
                            $size = $row['SizeID'];

                ?>                    
                <tr class="trow">
                    <td><?php echo $product_id; ?></td>
                    <td><?php echo $product_name; ?></td>
                    <td><?php echo $description; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $stock; ?></td>
                    <td><?php echo $category; ?></td>
                    <td><?php echo $brand; ?></td>
                    <td><?php echo $size; ?></td>
                    <td><a href="../../backend/product/product_edit.php?id=<?php echo $product_id; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="../../backend/product/product_delete.php?id=<?php echo $product_id; ?>" class="btn btn-danger">Delete</a></td>
                </tr>

                <?php
                    } 
                    ?>
            <?php } else{  ?>
                <tr class="trow">
                    <td colspan="5">No data found!</td>
                </tr>
                    
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
<?php include '../../include/footer.php'; ?>