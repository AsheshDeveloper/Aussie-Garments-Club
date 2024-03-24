<?php 
include '../../php/controller/brand_controller.php';    
include '../../include/header.php';
?>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
        <?php 
            require_once "../../php/database_connect.php";
            $sql_query = "SELECT * FROM brand WHERE brandID = ".$_GET["id"];
            if ($result = $connect ->query($sql_query)) {
                while ($row = $result -> fetch_assoc()) { 
                    $brand_id = $row['BrandID'];
                    $brand_name = $row['BrandName'];
                    $description = $row['Description'];
        ?>
        <form class="border shadow p-3 rounded" style="width:450px;" action="" method="post" >
        <h1 class="text-center p-3">Edit brand </h1>
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
            <input type="text" name="id" value="<?php echo $brand_id ?>" hidden>
            <div class="mb-3">
                <label for="brand_name" class="form-label">Brand Name</label>
                <input type="text" class="form-control" name="brand_name" id="brand_name"  value="<?php echo $brand_name ?>" required>                    
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" name="description" id="description" value="<?php echo $description ?>"> </textarea>                    
            </div> 
            <a href="../../backend/brand/brand_index.php" class="btn btn-primary">Back</a>                                          
            <button type="submit" name="update" class="btn btn-secondary">Edit</button>
        </form>
        <?php 
                }
            }
        ?>
    </div>
</body>


<?php include '../../include/footer.php'; ?>