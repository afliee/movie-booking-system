<?php

use Illuminate\Support\Str;
use Carbon\Carbon;

?>
<?php
require assets('app/Views/admin/header.php');
?>
<form action="../update/<?php echo $category->id?>" method="POST">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="type" id="type" value="<?php echo $category->type?>">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
<?php
require assets('app/Views/admin/footer.php');
?>

