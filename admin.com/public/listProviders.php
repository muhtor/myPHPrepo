<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php'; ?>
    <?php include '_aside.php'; ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-users"></i> Providers List <small> Boshqaruv Paneli</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-plus"></i> <a href="addProviderForm.php"> Add provider</a></b>
                </li>
            </ol>
        </section>
        <?php
        include 'configAdminDB.php';
        $joinSql = "SELECT providers.id, providers.provider_name, 
categories.title, 
providers.phone, providers.company, providers.membership_date 
FROM `providers` JOIN categories ON
providers.category_id = categories.id";
        $provider = $pdoQueryAdmin->query($joinSql);
        $providers = $provider->fetchAll(PDO::FETCH_ASSOC);
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
                                        <th>Provider Name</th>
                                        <th>Category Name</th>
                                        <th>Provider Phone</th>
                                        <th>Company Name</th>
                                        <th>Membership Date</th>
                                        <th>Function</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($providers as $provider): ?>
                                        <tr>
                                            <td><?= $provider['id'] ?></td>
                                            <td><?= $provider['provider_name'] ?></td>
                                            <td><?= $provider['title'] ?></td>
                                            <td><?= $provider['phone'] ?></td>
                                            <td><?= $provider['company'] ?></td>
                                            <td><?= $provider['membership_date'] ?></td>
                                            <td>
                                                <a class="btn-lg" href="viewProviderProducts.php?id=<?= $provider['id']; ?>">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn-lg" href="updateProviderForm.php?id=<?= $provider['id']; ?>">
                                                    <i class="fa fa-fw fa-pencil-square-o"></i>
                                                </a>
                                                <a class="delete btn-lg" href="delete.php?id=<?= $provider['id']; ?>">
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




