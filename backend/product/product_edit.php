<?php 
include '../../php/controller/product_controller.php';    
include '../../include/header.php';
?>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
        <?php 
            require_once "../../php/database_connect.php";
            $sql_query = "SELECT * FROM product WHERE productID = ".$_GET["id"];
            if ($result = $connect ->query($sql_query)) {
                while ($row = $result -> fetch_assoc()) { 
                    $product_id = $row['ProductID'];
                    $product_name = $row['Name'];
                    $description = $row['Description'];
                    $price = $row['Price'];
                    $stock = $row['QuantityInStock'];
                    $category = $row['CategoryID'];
                    $brand = $row['BrandID'];
                    $size = $row['SizeID'];
        ?>
        <form class="border shadow p-3 rounded" style="width:450px;" action="" method="post" >
        <h1 class="text-center p-3">Edit product </h1>
            <?php if(isset($errors)) { 
                foreach($errors as $error){ ?>                     
                <div class="alert alert-danger" role="alert">
                        <?=$error ?>
                </div>                    
            <?php } }elseif(isset($success)) {  
                foreach($success as $s){ ?>                     
                <div class="alert alert-success" role="alert">
                        <?=$s ?>
                </div>  
                <?php } } ?>
            <input type="text" name="id" value="<?php echo $product_id ?>" hidden>
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $product_name ?>" required>                    
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" name="description" id="description" value="<?php echo $description ?>"> </textarea>                    
            </div>  
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="price" required value="<?php echo $price ?>">                    
            </div>
            <div class="mb-3">
                <label for="stock_quantity" class="form-label">Stock Quantity</label>
                <input type="text" class="form-control" name="stock_quantity" id="stock_quantity" required value="<?php echo $stock ?>"> 
            </div>   
            <select class="form-select" aria-label="Select a category" name="category">
                <option selected>Select a category</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select> 
            <select class="form-select" aria-label="Select a brand" name="brand">
                <option selected>Select a brand</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select> 
            <select class="form-select" aria-label="Select a size" name="size">
                <option selected>Select a size</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select> 
            <a href="../../backend/product/product_index.php" class="btn btn-primary">Back</a>                                          
            <button type="submit" name="update" class="btn btn-secondary">Edit</button>
        </form>
        <?php 
                }
            }
        ?>
    </div>
</body>


<?php include '../../include/footer.php'; ?>