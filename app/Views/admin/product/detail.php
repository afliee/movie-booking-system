<?php

use Illuminate\Support\Str;
use Carbon\Carbon;

?>
<?php
require assets('app/Views/admin/header.php');
?>
<form action="../update/<?php echo $product->id?>" method="POST">
    <!-- radio to choose food or combo -->
    <!-- get type to checked -->
    <h4>Product</h4>
    <div class="form-group">
        <div class="type-product">
            <input type="radio" class="form-check" name="type" value="food" disabled <?php echo $product->type == 'food' ? 'checked' : '' ?>>
            <label for="food">
                Food
            </label>
        </div>
        <div class="type-product">
            <input type="radio" class="form-check" name="type" disabled  <?php echo $product->type == 'combo' ? 'checked' : '' ?>>
            <label for="combo">
                Combo
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $product->name ?>">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" value="<?php echo $product->description ?>">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" value="<?php echo $product->price ?>">
    </div>

    <div class="form-create-combo">
        <!-- checkbox foods -->
        <?php if ($product->type == 'combo') {?>
            <div class="form-group" id="foods">
                <h4><label for="foods">Foods</label></h4>
                <?php foreach ($foods as $food) { ?>
                    <div class="checkbox-lable">
                        <input type="checkbox" name="foods[]" value="<?php echo $food['id'] ?>" <?php echo in_array($food, $product->foods) ? 'checked' : '' ?>>
                        <label for="foods"><?php echo $food['name'] ?></label>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>

<script>
    $(document).ready(function() {
        // hide foods when type is food
        if ($('input[name="type"]:checked').val() == 'food') {
            $('.form-create-combo').hide();
        }
    });
</script>

<?php
require assets('app/Views/admin/footer.php');
?>


