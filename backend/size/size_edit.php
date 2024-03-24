<?php 
include '../../php/controller/size_controller.php';    
include '../../include/header.php';
?>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
        <?php 
            require_once "../../php/database_connect.php";
            $sql_query = "SELECT * FROM size WHERE sizeID = ".$_GET["id"];
            if ($result = $connect ->query($sql_query)) {
                while ($row = $result -> fetch_assoc()) { 
                    $size_id = $row['SizeID'];
                    $size_name = $row['SizeName'];
        ?>
        <form class="border shadow p-3 rounded" style="width:450px;" action="" method="post" >
        <h1 class="text-center p-3">Edit size </h1>
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
            <input type="text" name="id" value="<?php echo $size_id ?>" hidden>
            <div class="mb-3">
                <label for="size_name" class="form-label">Size  Name</label>
                <input type="text" class="form-control" name="size_name" id="size_name" value="<?php echo $size_name ?>" required>                    
            </div>             
            <a href="../../backend/size/size_index.php" class="btn btn-primary">Back</a>                                          
            <button type="submit" name="update" class="btn btn-secondary">Edit</button>
        </form>
        <?php 
                }
            }
        ?>
    </div>
</body>


<?php include '../../include/footer.php'; ?>