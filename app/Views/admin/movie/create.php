<?php

use Illuminate\Support\Str;
use Carbon\Carbon;

?>
<?php
require assets('app/Views/admin/header.php');
?>
<h3>Create a new movie</h3>
<form action="store" method="POST">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" require>
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" require>
    </div>
    <div class="form-group">
        <label for="release_date">Release Date</label>
        <input type="date" name="release_date" id="release_date" require>
    </div>
    <div class="form-group">
        <label for="close_date">Close Date</label>
        <input type="date" name="close_date" id="close_date" require>
    </div>
    <!-- get all date checkbox form release_date to close_date -->
    <!-- <div class="form-group">
        <label for="show_dates">Show Dates</label>
        <div class="form-group" id="show_dates">
            
        </div>
    </div> -->
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" require></textarea>
    </div>
    <div class="form-group">
        <label for="duration">Duration</label>
        <input type="text" name="duration" id="duration" require>
    </div>
    <div class="form-group">
        <label for="trailer_path">Trailer Path</label>
        <input type="text" name="trailer_path" id="trailer_path" require>
    </div>
    <div class="form-group">
        <label for="banner_path">Banner Path</label>
        <input type="text" name="banner_path" id="banner_path" require>
    </div>
    <!-- categories checkbox -->
    <div class="form-group">
        <h4><label for="categories">Category</label></h4>
        <div class="form-group">
            <?php foreach($categories as $category) {?>
                <div class="checkbox-lable">
                    <input type="checkbox" name="categories[]" id="categories" value="<?php echo $category['id']?>">
                    <label for="categories"><?php echo $category['type']?></label>
                </div>    
            <?php }?>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success" >Create</button>
    </div>
</form>

<!-- <script>
const releaseDate = document.getElementById('release_date');
const closeDate = document.getElementById('close_date');
const showDates = document.getElementById('show_dates');

var getDaysArray = function(start, end) {
    for(var arr=[],dt=new Date(start); dt<=new Date(end); dt.setDate(dt.getDate()+1)){
        arr.push(new Date(dt));
    }
    return arr;
};

$('#close_date').on('change', function (event) {
        console.log(releaseDate.value)
        console.log(closeDate.value)
        const days = getDaysArray(releaseDate.value, closeDate.value);
    if (releaseDate.value != '' && closeDate.value != '') {
        const days = getDaysArray(releaseDate.value, closeDate.value);
        days.forEach(function (day) {
            const dateStr = day.toLocaleDateString('en-US')
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.name = 'show_dates[]';
            checkbox.value = dateStr;
            const label = document.createElement('label');
            label.htmlFor = dateStr;
            label.appendChild(document.createTextNode(dateStr));
            showDates.appendChild(checkbox);
            showDates.appendChild(label);
        })
    }
})
</script> -->


