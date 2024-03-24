<?php 
include '../../php/controller/address_controller.php';    
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
    <a href="../../backend/address/address_create.php" class="btn btn-primary">Insert an Address</a>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Street Address</th>
                <th scope="col">State</th>
                <th scope="col">Postal Code</th>
                <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    require_once "../../php/database_connect.php";
                    $fetch = "SELECT * FROM address";
                    if ($result = $connect ->query($fetch)) {
                        while ($row = $result -> fetch_assoc()) { 
                            //print_r($row);
                            $address_id = $row['AddressID'];
                            $street_address = $row['StreetAddress'];
                            $state = $row['State'];
                            $postal_code = $row['PostalCode'];
                ?>                    
                <tr class="trow">
                    <td><?php echo $address_id; ?></td>
                    <td><?php echo $street_address; ?></td>
                    <td><?php echo $state; ?></td>
                    <td><?php echo $postal_code; ?></td>
                    <td><a href="../../backend/address/address_edit.php?id=<?php echo $address_id; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="../../backend/address/address_delete.php?id=<?php echo $address_id; ?>" class="btn btn-danger">Delete</a></td>
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