<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

require_once assets('app/Views/public/header.php');
require_once assets('app/Views/public/banner.php');
?>

<?php if (isset($movies)) { ?>
    <?php if (count($movies) == 0) {
        echo "<h1>Not Movie Yet</h1>";} else {?>
        
        <div class="container">
            <ul class="tagline">
                <li><a href="<?php echo url('movie?filter=time:playing') ?>">Movie Playing</a></li>
                <li><i class="bi bi-slash-lg"></i></li>
                <li><a href="<?php echo url('movie?filter=time:upcoming') ?>">Upcoming Movie</a></li>
            </ul>
            <div class="row">
                <?php foreach($movies as $movie) {?>
                    <div class="movie-card col-md-6 col-lg-4" style="background: center / cover no-repeat url(<?php echo url($movie['banner_path'])?>)">
                        <div class="movie-header">
                            <div class="header-icon-container">
                                <a href="<?php echo url('movie/'.Str::slug($movie['name']).'_'.$movie['movie_id'].".".$movie['category_id'])?>">
                                    <!-- <i class="bi bi-bag-plus header-icon"></i> -->
                                </a>
                            </div>
                        </div><!--movie-header-->
                        <div class="movie-content">
                            
                            <div class="movie-info">
                                <button class="btn-purchase" role="button"><a href="<?php echo url('movie/'.Str::slug($movie['name']).'_'.$movie['movie_id'].".".$movie['category_id'])?>">Buy</a></button>
                            </div>
                        </div><!--movie-content-->

                    </div><!--movie-card-->
                <?php }?>
            </div>
        </div>
        <img src="<?php echo url('public/assets/images/color-sharp.png')?>" alt="" class="background-image-left">
        <img src="<?php echo url('public/assets/images/color-sharp2.png')?>" alt="" class="background-image-right">
    <?php }?>
<?php } else { ?>
    <h1>NOT MOVIE YET</h1>
<?php }?>
<?php require_once assets('app/Views/public/footer.php');?>
<script>
    <?php if (!empty($data)) { ?>
        toast({
            title: "<?php echo $title ?>",
            message: "<?php echo $message ?>",
            type: "<?php echo $type ?>",
            duration: 3000
        });
    <?php }?>
</script>