<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php';
    include '_aside.php';
    include 'configDB.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM `categories` WHERE `id` = $id";
    $categories = $pdoQuery->prepare($sql);
    $categories->execute();
    ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <?php foreach ($categories as $category): ?>
            <h1 class=""><i class="fa fa-lg fa-list-alt"></i> <?=$category['title'];?>
                <small> Boshqaruv Paneli</small>
            </h1>
            <?php endforeach; ?>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"> <i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-th-list"></i> <a href="listCategories.php">List category</a></b>
                </li>
            </ol>
        </section>
        <?php

        $joinSql = "SELECT providers.id, providers.provider_name,  
products.product_name, products.quantity, products.price, 
ulchovbirligi.code, 
products.date FROM `providers`
JOIN products ON providers.id = products.provider_id
JOIN ulchovbirligi ON products.ulch_bir_ID = ulchovbirligi.id
WHERE providers.category_id = $id";

        $joinSTM = $pdoQuery->query($joinSql);
        $providersProducts = $joinSTM->fetchAll();
        ?>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body no-padding">
                            <div class="table-responsive">
                                <?php if (!empty($providersProducts)): ?>
                                <table class="text-center table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Provider Name</th>
                                        <th>Product Name</th>
                                        <th>Product Quantity</th>
                                        <th>Product Price</th>
                                        <th>Product ED</th>
                                        <th>Delivered Date</th>
                                        <th>Function</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($providersProducts as $product): ?>
                                        <tr>
                                            <td><?= $product['id'];?></td>
                                            <td><?= $product['provider_name'];?></td>
                                            <td><?= $product['product_name'];?></td>
                                            <td><?= $product['quantity'];?> <i> <?= $product['code'] ?></i></td>
                                            <td><?= $product['price'];?></td>
                                            <td><b><?= $product['code'];?></b></td>
                                            <td><?= $product['date'];?></td>
                                            <td>
                                                <a class="delete btn-lg" href="delete.php?id=<?=$product['id']; ?>">
                                                    <i class="fa fa-fw fa-close text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php else: ?>
                                <div class="alert text-center">
                                    <h2 class="ion-alert-circled"></h2>
                                    <h3 class="">Hozircha
                                        `<?=$category['title'];?>`
                                        category buyicha mahsulot mavjud emas!</h3>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include '_footer.php'; ?>




