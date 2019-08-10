<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php'; ?>
    <?php include '_aside.php'; ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-cubes"></i> Products List <small> Boshqaruv Paneli</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-plus"></i> <a href="addProduct.php"> Add product</a></b>
                </li>
            </ol>
        </section>
        <?php
        include 'configAdminDB.php';
        $joinSql = "SELECT products.id ,categories.title, products.product_name 
FROM `products` JOIN categories ON
products.category_id = categories.id";
        $product = $pdoQueryAdmin->query($joinSql);
        $products = $product->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body no-padding">
                            <div class="table-responsive">
                                <table class="text-center table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                        <th>Product Name</th>
                                        <th>Function</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($products as $product): ?>
                                        <tr>
                                            <td><?= $product['id'] ?></td>
                                            <td><?= $product['title'] ?></td>
                                            <td><?= $product['product_name'] ?></td>
                                            <td>
                                                <a class="btn-lg" href="updateProductForm.php?id=<?= $product['id']; ?>">
                                                    <i class="fa fa-fw fa-pencil-square-o"></i>
                                                </a>
                                                <a class="delete btn-lg" href="deleteProduct.php?id=<?= $product['id']; ?>">
                                                    <i class="fa fa-fw fa-close text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include '_footer.php'; ?>




