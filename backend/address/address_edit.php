<?php 
include '../../php/controller/address_controller.php';    
include '../../include/header.php';
?>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
        <?php 
            require_once "../../php/database_connect.php";
            $sql_query = "SELECT * FROM address WHERE addressID = ".$_GET["id"];
            if ($result = $connect ->query($sql_query)) {
                while ($row = $result -> fetch_assoc()) { 
                    $address_id = $row['AddressID'];
                    $street_address = $row['StreetAddress'];
                    $city = $row['City'];
                    $state = $row['State'];
                    $postal_code = $row['PostalCode'];
        ?>
        <form class="border shadow p-3 rounded" style="width:450px;" action="" method="post" >
        <h1 class="text-center p-3">Edit address </h1>
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
            <input type="text" name="id" value="<?php echo $address_id ?>" hidden>
            <div class="mb-3">
                <label for="street_address" class="form-label">Street Address</label>
                <input type="text" class="form-control" name="street_address" id="street_address" value="<?php echo $street_address ?>" required>                    
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" name="city" id="city" value="<?php echo $city ?>" required>                    
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" name="state" id="state" value="<?php echo $state ?>" required>                    
            </div>
            <div class="mb-3">
                <label for="postal_code" class="form-label">Postal Code</label>
                <input type="text" class="form-control" name="postal_code" id="postal_code" value="<?php echo $postal_code ?>" required> 
            </div> 
            <a href="../../backend/address/address_index.php" class="btn btn-primary">Back</a>                                          
            <button type="submit" name="update" class="btn btn-secondary">Edit</button>
        </form>
        <?php 
                }
            }
        ?>
    </div>
</body>


<?php include '../../include/footer.php'; ?>