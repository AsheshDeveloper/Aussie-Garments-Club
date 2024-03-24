<?php 
include '../../php/controller/category_controller.php';    
include '../../include/header.php';
?>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
        <form class="border shadow p-3 rounded" style="width:450px;" action="" method="post" >
        <h1 class="text-center p-3">Create an category</h1>
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
                <label for="category_name" class="form-label">Category Name</label>
                <input type="text" class="form-control" name="category_name" id="category_name" required>                    
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" name="description" id="description"> </textarea>                    
            </div>                                           
            <button type="create" name="create" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
<?php include '../../include/footer.php'; ?>