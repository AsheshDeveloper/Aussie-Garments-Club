<?php 
include '../../php/controller/product_controller.php';    
include '../../include/header.php';
?>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
        <form class="border shadow p-3 rounded" style="width:450px;" action="" method="post" >
        <h1 class="text-center p-3">Add a product</h1>
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
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="product_name" id="product_name" required>                    
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" name="description" id="description"> </textarea>                    
            </div>  
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="price" required>                    
            </div>
            <div class="mb-3">
                <label for="stock_quantity" class="form-label">Stock Quantity</label>
                <input type="text" class="form-control" name="stock_quantity" id="stock_quantity" required> 
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
            <button type="create" name="create" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
<?php include '../../include/footer.php'; ?>