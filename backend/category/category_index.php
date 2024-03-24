<?php 
include '../../php/controller/category_controller.php';    
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
    <a href="../../backend/category/category_create.php" class="btn btn-primary">Insert an category</a>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Category Name</th>
                <th scope="col">Description</th>
                <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    require_once "../../php/database_connect.php";
                    $fetch = "SELECT * FROM category";
                    if ($result = $connect ->query($fetch)) {
                        while ($row = $result -> fetch_assoc()) { 
                            //print_r($row);
                            $category_id = $row['CategoryID'];
                            $category_name = $row['CategoryName'];
                            $description = $row['Description'];
                ?>                    
                <tr class="trow">
                    <td><?php echo $category_id; ?></td>
                    <td><?php echo $category_name; ?></td>
                    <td><?php echo $description; ?></td>
                    <td><a href="../../backend/category/category_edit.php?id=<?php echo $category_id; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="../../backend/category/category_delete.php?id=<?php echo $category_id; ?>" class="btn btn-danger">Delete</a></td>
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