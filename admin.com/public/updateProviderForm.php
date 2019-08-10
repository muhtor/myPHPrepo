<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php'; ?>
    <?php include '_aside.php'; ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-pencil-square-o"></i> Update provider
                <small> Boshqaruv Paneli</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-th-list"></i> <a href="listProviders.php">List providers</a></b>
                </li>
            </ol>
        </section>
        <?php include 'configAdminDB.php';

        $provider_id = $_GET['id'];

        $sqlJoin = "SELECT * FROM `providers` WHERE providers.id = '$provider_id'";
        $provider = $pdoQueryAdmin->query($sqlJoin);
        $providers = $provider->fetchAll(PDO::FETCH_ASSOC);

        $category = $pdoQueryAdmin->query("SELECT * FROM `categories`");
        $categories = $category->fetchAll(PDO::FETCH_ASSOC);

        $product = $pdoQueryAdmin->query("SELECT * FROM `products`");
        $products = $product->fetchAll(PDO::FETCH_ASSOC);

        ?>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <form action="updateProviderDB.php" method="post" data-toggle="validator">
                            <div class="box-body">
                                <?php foreach ($providers as $provider): ?>
                                <!--  ***************** ID readonly **************-->
                                <div class="form-group">
                                    <label for="">Provider ID</label>
                                    <input type="text" name="id" readonly class="form-control"
                                           value="<?= $provider['id']; ?>">
                                </div>
                                <!--  ***************** Categories **************-->
                                <div class="form-group">
                                    <label for="">Select other Categories</label>
                                    <select class="form-control" name="category">
                                        <?php foreach ($categories as $category): ?>
                                            <option <?php if ($provider['category_id']
                                                == $category['id']) echo 'selected'; ?>
                                                    value="<?= $category['id'];?>">
                                                <?= $category['title']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!--  ***************** Products**************-->
                                <div class="form-group">
                                    <label for="">Select other Products</label>
                                    <select class="form-control" name="product">
                                        <?php foreach ($products as $product): ?>
                                            <option <?php if ($provider['product_id']
                                                == $product['id']) echo 'selected';?>
                                                    value="<?=$product['id'];?>">
                                                <?=$product['product_name'];?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!--  *************** Provider Name ************-->
                                <div class="form-group">
                                    <label for="">Provider Name</label>
                                    <input type="text" name="provider" class="form-control"
                                           value="<?= $provider['provider_name'];?>">
                                </div>
                                <!--  *************** Provider Phone **************-->
                                <div class="form-group has-feedback">
                                    <label for="">Provider Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                           value="<?= $provider['phone'];?>">
                                </div>
                                <!--  *************** Company Name *************-->
                                <div class="form-group has-feedback">
                                    <label for="">Company Name</label>
                                    <input type="text" name="company" class="form-control"
                                           value="<?=$provider['company'];?>">
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <div class="box-footer">
                                <button type="submit" name="updateProvider" class="btn btn-success">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include '_footer.php'; ?>




