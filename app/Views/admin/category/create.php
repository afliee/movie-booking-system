<?php

use Illuminate\Support\Str;
use Carbon\Carbon;

?>
<?php
require assets('app/Views/admin/header.php');
?>
<h3>Create a new category</h3>
<form action="store" method="POST">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="type" id="type" require>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Create</button>
    </div>
</form>
<?php
require assets('app/Views/admin/footer.php');
?>

