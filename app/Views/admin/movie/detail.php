<?php

use Illuminate\Support\Str;

?>
<?php
require assets('app/Views/admin/header.php');
?>
<form action="../update/<?php echo $movie->id?>" method="POST">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo $movie->name?>">
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?php echo $movie->title?>">
    </div>
    <div class="form-group">
        <label for="release_date">Release Date</label>
        <input type="date" name="release_date" id="release_date" value=<?php echo $movie->release_date?>>
    </div>
    <div class="form-group">
        <label for="close_date">Close Date</label>
        <input type="date" name="close_date" id="close_date" value=<?php echo $movie->close_date?>>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" ><?php echo $movie->description?></textarea>
    </div>
    <div class="form-group">
        <label for="duration">Duration</label>
        <input type="text" name="duration" id="duration" value=<?php echo $movie->duration?>>
    </div>
    <div class="form-group">
        <label for="trailer_path">Trailer Path</label>
        <input type="text" name="trailer_path" id="trailer_path" value=<?php echo $movie->trailer_path?>>
    </div>
    <div class="form-group">
        <label for="banner_path">Banner Path</label>
        <input type="text" name="banner_path" id="banner_path" value=<?php echo $movie->banner_path?>>
    </div>
    <!-- multiple checkbox -->
    <div class="form-group">
        <label for="categories">Category</label>
        <div class="form-group">
            <?php foreach($categories as $category) {?>
                <div class="checkbox-lable">
                    <input type="checkbox" name="categories[]" value="<?php echo $category['id']?>" <?php echo in_array($category, $movie->categories) ? 'checked' : '' ?>>
                    <label for="categories"><?php echo $category['type']?></label>
                </div>  
            <?php }?>
        </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
<?php
require assets('app/Views/admin/footer.php');
?>

