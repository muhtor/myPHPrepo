<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php'; ?>
    <?php include '_aside.php'; ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-shopping-cart"></i> Common List
                <small> Boshqaruv Paneli</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-plus"></i> <a href="inCommProduct.php"> In common product</a></b>
                </li>
            </ol>
        </section>
        <?php
        include 'configAdminDB.php';
        /*
        $joinSql = "SELECT add_product.id, categories.title, products.product_name, providers.provider_name, add_product.quantity, ulchovbirligi.code 
FROM `add_product` 
JOIN categories ON add_product.category_id = categories.id
JOIN products ON add_product.product_id = products.id
JOIN providers ON add_product.provider_id = providers.id
JOIN ulchovbirligi ON add_product.ul_bir_ID = ulchovbirligi.id";
        */
        $joinSql = "SELECT add_product.id, categories.title, products.product_name, 
add_product.quantity, SUM(quantity) AS SUMMA, ulchovbirligi.code
FROM `add_product` 
JOIN categories ON add_product.category_id = categories.id
JOIN products ON add_product.product_id = products.id
JOIN ulchovbirligi ON add_product.ul_bir_ID = ulchovbirligi.id
GROUP BY products.product_name ORDER BY id ASC";
        $productSTM = $pdoQueryAdmin->query($joinSql);
        $products = $productSTM->fetchAll(PDO::FETCH_ASSOC);
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
                                        <th>Product Name</th>
                                        <th>Category Title</th>
                                        <th>Product quantity</th>
                                        <th>Product U-ED</th>
                                        <th>Function</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($products as $product): ?>
                                        <tr>
                                            <td><?= $product['id'] ?></td>
                                            <td><?= $product['product_name'] ?></td>
                                            <td><?= $product['title'] ?></td>
                                            <td><?= $product['SUMMA'] ?></td>
                                            <td><?= $product['code'] ?></td>
                                            <td>
                                                <a class="btn-lg" href="edit.php?id=<?= $product['id']; ?>">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="delete btn-lg" href="delete.php?id=<?= $product['id']; ?>">
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

