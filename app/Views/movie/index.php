<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

require assets('app/Views/public/header.php');
?>

<?php if (count($movies) == 0) {?>
    <h1 class="white-space">Not Movie Yet</h1>
<?php } else { ?>
    <div class="container">
        <h1 class="white-space"><?php echo "Movie ". $time?></h1>
        <h3 class="white-space" style="display: inline-block"><?php echo breadcrumbs(' / ', 'Movie'); ?></h3>

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
<?php }?>
<img src="<?php echo url('public/assets/images/color-sharp.png')?>" alt="" class="background-image-left">
<img src="<?php echo url('public/assets/images/color-sharp2.png')?>" alt="" class="background-image-right">
<script>
</script>
<?php require assets('app/Views/public/footer.php'); ?>
