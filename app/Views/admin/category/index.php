<?php

use Illuminate\Support\Str;

?>
<?php
require assets('app/Views/admin/header.php');
?>
<script>
    // datatable
    $(document).ready(function() {
        $('#table-category').DataTable();
    });
</script>
<?php if (count($categories) == 0) {?>
    <h1 class="white-space">Not Category Yet</h1>
<?php } else { ?>
    <!-- <h3 class="white-space" style="display: inline-block"><?php echo breadcrumbs(' / ', 'Movie'); ?></h3> -->
    <!-- btn create a new product -->
    <a href="<?php echo url('admin/category/create')?>" class="btn btn-success">Create a new category</a>
    <h1>Categories</h1>
    <table width="100%" border="0" cellspacing="2px" class="white-space" id="table-category">

        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $category ) {?>
                <tr>
                    <td><?php echo $category['type']?></td>
                    <td class="action">
                        <a href="<?php echo url('admin/category/detail/'.$category['id'])?>">Edit</a>/
                        <a href="<?php echo url('admin/category/delete/'.$category['id'])?>">Delete</a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    
<?php }?>
<?php
require assets('app/Views/admin/footer.php');
?>