<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php'; ?>
    <?php include '_aside.php'; ?>
    <?php
    include 'configDB.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM `providers` WHERE `id` = $id";
    $providers = $pdoQuery->prepare($sql);
    $providers->execute();
    ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <?php foreach ($providers as $provider): ?>
            <h1 class=""><i class="fa fa-user"></i> view products <?=$provider['provider_name']?>
                <small> Boshqaruv Paneli</small>
            </h1>
            <?php endforeach; ?>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-th-list"></i> <a href="listProviders.php"> List providers</a></b>
                </li>
            </ol>
        </section>
        <?php
        include 'configDB.php';
        $joinSql = "SELECT providers.id, providers.provider_name, 
products.product_name, 
providers.provider_phone, 
products.date FROM `providers`
JOIN products ON providers.id = products.provider_id
WHERE providers.id = $id";

        $joinSTM = $pdoQuery->query($joinSql);
        $providers = $joinSTM->fetchAll();
        ?>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body no-padding">
                            <div class="table-responsive">
                                <?php if (!empty($providers)): ?>
                                <table class="text-center table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Provider Name</th>
                                        <th>Delivered Products</th>
                                        <th>Products Product SUM</th>
                                        <th>Provider Phone</th>
                                        <th>Delivered Date</th>
                                        <th>Function</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($providers as $provider): ?>
                                        <tr>
                                            <td><?= $provider['id'] ?></td>
                                            <td><?= $provider['provider_name'] ?></td>
                                            <td><?= $provider['provider_name'] ?></td>
                                            <td><?= $provider['product_name'] ?></td>
                                            <td><?= $provider['provider_phone'] ?></td>
                                            <td><?= $provider['date'] ?></td>
                                            <td>
                                                <a class="btn-lg" href="editProviderProduct.php?id=<?= $provider['id']; ?>">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="delete btn-lg" href="delete.php?id=<?= $provider['id']; ?>">
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
                                            `<?=$provider['provider_name'];?>`
                                            keltirgan mahsulot mavjud emas!</h3>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '_footer.php'; ?>




