<?php

use Illuminate\Support\Str;
use Carbon\Carbon;

?>
<?php
require assets('app/Views/admin/header.php');
?>
<form action="store" method="POST">
<!-- radio to choose food or combo -->
<h3>Create a new product</h3>
<h4>Choose product</h4>
<div class="form-group">
    <div class="type-product">
        <input type="radio" class="form-check" name="type" id="food" value="food">
        <label for="food">
            Food
        </label>
    </div>
    <div class="type-product">
        <input type="radio" class="form-check" name="type" id="combo" value="combo">
        <label for="combo">
            Combo
        </label>
    </div>
</div>

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" require>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <input type="text" name="description" id="description" require>
</div>
<div class="form-group">
    <label for="price">Price</label>
    <input type="text" name="price" id="price" require>
</div>

<div class="form-create-combo">
    <!-- checkbox foods -->
    <div class="form-group" id="foods">
        <h4><label for="foods">Foods</label></h4>
        <?php foreach ($foods as $food) { ?>
            <div class="checkbox-lable">
                <input type="checkbox" name="foods[]" id="foods" value="<?php echo $food['id'] ?>">
                <label for="foods"><?php echo $food['name'] ?></label>
            </div>
        <?php } ?>
    </div>
</div>
<button type="submit" class="btn btn-success">Create</button>
</form>

<script>
    // if choose combo then show checkbox foods
    $(document).ready(function() {
        $('.form-create-combo').hide();
        $('.type-product').click(function() {
            if ($('#combo').is(':checked')) {
                $('.form-create-combo').show();
            } else {
                $('.form-create-combo').hide();
            }
        });
    });
</script>

<?php
require assets('app/Views/admin/footer.php');
?>


