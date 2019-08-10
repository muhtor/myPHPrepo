<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php'; ?>
    <?php include '_aside.php'; ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-shopping-cart"></i> Product List
                <small> Boshqaruv Paneli</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-plus"></i> <a href="addProduct.php">Add product</a></b>
                </li>
            </ol>
        </section>
        <?php
        include 'configDB.php';
        $sql = "SELECT products.id, 
categories.title, 
providers.provider_name, 
products.product_name, products.quantity, 
ulchovbirligi.code, 
products.country, products.city, products.price, products.date 
FROM `products` 
JOIN providers ON products.provider_id = providers.id 
JOIN categories ON products.category_id = categories.id 
JOIN ulchovbirligi ON products.ulch_bir_ID = ulchovbirligi.id";
        $joinSTM = $pdoQuery->prepare($sql);
        $joinSTM->execute();
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
                                        <th>Provider Name</th>
                                        <th>Product Name</th>
                                        <th>Product quantity</th>
                                        <th>Product ED</th>
                                        <th>Product Country</th>
                                        <th>Product City</th>
                                        <th>Product Price</th>
                                        <th>Product Date</th>
                                        <th>Function</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($joinSTM as $item): ?>
                                        <tr>
                                            <td><?= $item['id'] ?></td>
                                            <td><?= $item['title'] ?></td>
                                            <td><?= $item['provider_name'] ?></td>
                                            <td><?= $item['product_name'] ?></td>
                                            <td><?= $item['quantity'] ?></td>
                                            <td><?= $item['code'] ?></td>
                                            <td><?= $item['country'] ?></td>
                                            <td><?= $item['city'] ?></td>
                                            <td><?= $item['price'] ?></td>
                                            <td><?= $item['date'] ?></td>
                                            <td>
                                                <a class="btn-lg" href="edit.php?id=<?= $item['id']; ?>">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="delete btn-lg" href="delete.php?id=<?= $item['id']; ?>">
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

