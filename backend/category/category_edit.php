<?php 
include '../../php/controller/category_controller.php';    
include '../../include/header.php';
?>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
        <?php 
            require_once "../../php/database_connect.php";
            $sql_query = "SELECT * FROM category WHERE categoryID = ".$_GET["id"];
            if ($result = $connect ->query($sql_query)) {
                while ($row = $result -> fetch_assoc()) { 
                    $category_id = $row['CategoryID'];
                    $category_name = $row['CategoryName'];
                    $city = $row['Description'];                    
        ?>
        <form class="border shadow p-3 rounded" style="width:450px;" action="" method="post" >
        <h1 class="text-center p-3">Edit category </h1>
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
            <input type="text" name="id" value="<?php echo $category_id ?>" hidden>
            <div class="mb-3">
                <label for="category_name" class="form-label">Categroy Name</label>
                <input type="text" class="form-control" name="category_name" id="category_name" value="<?php echo $category_name ?>" required>                    
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" name="description" id="description"> </textarea>                    
            </div>  
            <a href="../../backend/category/category_index.php" class="btn btn-primary">Back</a>                                          
            <button type="submit" name="update" class="btn btn-secondary">Edit</button>
        </form>
        <?php 
                }
            }
        ?>
    </div>
</body>


<?php include '../../include/footer.php'; ?>