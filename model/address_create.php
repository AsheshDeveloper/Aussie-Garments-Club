<?php 
include '../../php/controller/address_controller.php';    
include '../../include/header.php';
?>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
        <form class="border shadow p-3 rounded" style="width:450px;" action="" method="post" >
        <h1 class="text-center p-3">Create an address</h1>
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
                <label for="street_address" class="form-label">Street Address</label>
                <input type="text" class="form-control" name="street_address" id="street_address" required>                    
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" name="city" id="city" required>                    
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" name="state" id="state" required>                    
            </div>
            <div class="mb-3">
                <label for="postal_code" class="form-label">Postal Code</label>
                <input type="text" class="form-control" name="postal_code" id="postal_code" required> 
            </div>                                           
            <button type="create" name="create" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
<?php include '../../include/footer.php'; ?>