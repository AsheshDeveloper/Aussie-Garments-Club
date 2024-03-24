<?php 
include '../../php/controller/brand_controller.php';    
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
    <a href="../../backend/brand/brand_create.php" class="btn btn-primary">Create a BRand</a>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Brand Name</th>
                <th scope="col">Description</th>
                <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                require_once "../../php/database_connect.php";
                $fetch = "SELECT * FROM brand";
                if ($result = $connect ->query($fetch)) {
                    while ($row = $result -> fetch_assoc()) { 
                        //print_r($row);
                        $brand_id = $row['BrandID'];
                        $brand_name = $row['BrandName'];
                        $description = $row['Description'];
            ?>                    
            <tr class="trow">
                <td><?php echo $brand_id; ?></td>
                <td><?php echo $brand_name; ?></td>
                <td><?php echo $description; ?></td>
                <td><a href="../../backend/brand/brand_edit.php?id=<?php echo $brand_id; ?>" class="btn btn-primary">Edit</a></td>
                <td><a href="../../backend/brand/brand_delete.php?id=<?php echo $brand_id; ?>" class="btn btn-danger">Delete</a></td>
            </tr>

            <?php
                    } 
                } 
            ?>
            </tbody>
        </table>
    </div>
</body>
<?php include '../../include/footer.php'; ?>