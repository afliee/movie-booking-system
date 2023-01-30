<?php

use Illuminate\Support\Str;


?>
<?php
require assets('app/Views/admin/header.php');
?>
<script>
    // datatable
    $(document).ready(function() {
        $('#table-movie').DataTable();
    } );
</script>
<?php if (count($movies) == 0) {?>
    <h1 class="white-space">Not Movie Yet</h1>
<?php } else { ?>
    <!-- <h3 class="white-space" style="display: inline-block"><?php echo breadcrumbs(' / ', 'Movie'); ?></h3> -->
    <a href="<?php echo url('admin/movie/create')?>" class="btn btn-success">Create a new movie</a>

    <h1>Movies</h1>
    <table width="100%" border="0" cellspacing="2px" class="white-space" id="table-movie">

        <thead>
            <tr>
                <th>Name</th>
                <th>Title</th>
                <th>Type</th>
                <th>Release Date</th>
                <th>Close Date</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($movies as $movie) {?>
                <tr>
                    <td><?php echo $movie->name?></td>
                    <td><?php echo $movie->title?></td>
                    <td><?php 
                        $category = $movie->categories;
                        foreach($category as $cate) {
                            echo $cate['type'] . ', ';
                        }
                    ?></td>
                    <td><?php echo $movie->release_date?></td>
                    <td><?php echo $movie->close_date?></td>
                    <td><?php echo $movie->description?></td>
                    <td><?php echo $movie->duration?></>
                    <td class="action">
                        <a href="<?php echo url('admin/movie/detail/'.$movie->id)?>">Edit</a>/
                        <a href="<?php echo url('admin/movie/delete/'.$movie->id)?>">Delete</a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
<?php }?>
<?php
require assets('app/Views/admin/footer.php');
?>