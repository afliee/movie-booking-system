<?php

use Illuminate\Support\Str;

?>
<?php
require assets('app/Views/admin/header.php');
?>
<script>
    // datatable
    $(document).ready(function() {
        $('#table-product').DataTable();
    });
</script>
<?php if (count($products) == 0) {?>
    <h1 class="white-space">Not Product Yet</h1>
<?php } else { ?>
    <!-- <h3 class="white-space" style="display: inline-block"><?php echo breadcrumbs(' / ', 'Movie'); ?></h3> -->
    <!-- button create a new product -->
    <a href="<?php echo url('admin/product/create')?>" class="btn btn-success">Create a new product</a>
    <h1>Products</h1>
    <table width="100%" border="0" cellspacing="2px" class="white-space" id="table-product">

        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product ) {?>
                <tr>
                    <td><?php echo $product['name']?></td>
                    <td><strong><?php echo $product['type']?></strong></td>
                    <td><?php echo $product['description']?></td>
                    <td><?php 
                        // format price 10000 to 10,000 VNĐ
                        $price = number_format($product['price'], 0, ',');
                        $price .= ' VNĐ';
                        echo $price;    
                    ?></>
                    <td class="action">
                        <a href="<?php echo url('admin/product/detail/'.$product['id'])?>">Edit</a>/
                        <a href="<?php echo url('admin/product/delete/'.$product['id'])?>">Delete</a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    
<?php }?>
<?php
require assets('app/Views/admin/footer.php');
?>