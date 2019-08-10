<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php'; ?>
    <?php include '_aside.php'; ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-cart-plus"></i> Add new product <small> Boshqaruv Paneli</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-th-list"></i> <a href="listProduct.php">List products</a></b>
                </li>
            </ol>
        </section>
        <?php include 'configDB.php';

        $sqlCategories = "SELECT categories.id, categories.title FROM `categories`";
        $categories = $pdoQuery->query($sqlCategories);
        $allCategories = $categories->fetchAll();

        $sqlProviders = "SELECT providers.id, providers.provider_name, categories.category_name 
FROM `providers`
JOIN categories ON
providers.category_id = categories.id";
        $providers = $pdoQuery->query($sqlProviders);
        $allProviders = $providers->fetchAll();

        $sqlED = "SELECT * FROM `ulchovbirligi`";
        $ed = $pdoQuery->query($sqlED);
        $allEd = $ed->fetchAll();

        ;?>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <form action="addDB.php" method="post" data-toggle="validator">
                            <div class="box-body">
                                <!--  **********************************************-->
                                <div class="form-group">
                                    <label for="">Categories</label>
                                    <select class="form-control" name="categories" required>
                                        <option></option>
                                        <?php foreach ($allCategories as $category): ?>
                                        <option value="<?=$category['id'];?>">
                                            <?=$category['title'];?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  **********************************************-->
                                <div class="form-group">
                                    <label for="">Providers</label>
                                    <select class="form-control" name="providers" required>
                                        <option></option>
                                        <?php foreach ($allProviders as $provider): ?>
                                        <option value="<?=$provider['id'];?>">
                                            <?=$provider['provider_name'];?> ===
                                                <?=$provider['category_name'];?> )
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  **********************************************-->
                                <div class="form-group has-feedback">
                                    <label for="">Product name</label>
                                    <input type="text" name="product" class="form-control"
                                           placeholder="product name" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  **********************************************-->
                                <div class="form-group has-feedback">
                                    <label for="">Quantity</label>
                                    <input type="text" name="quantity" class="form-control"
                                           placeholder="quantity" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  **********************************************-->
                                <div class="form-group has-feedback">
                                    <label for="">Ulchov birligi</label>
                                    <select class="form-control" name="ulch_bir" required>
                                        <option></option>
                                        <?php foreach ($allEd as $eda): ?>
                                            <option value="<?=$eda['id'];?>">
                                                <?=$eda['code'];?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  **********************************************-->
                                <div class="form-group has-feedback">
                                    <label for="">Price</label>
                                    <input type="text" name="price" class="form-control"
                                           placeholder="price" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  **********************************************-->
                                <div class="form-group has-feedback">
                                    <label for="">Country</label>
                                    <input type="text" name="country" class="form-control"
                                           placeholder="country" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  **********************************************-->
                                <div class="form-group has-feedback">
                                    <label for="">City</label>
                                    <input type="text" name="city" class="form-control"
                                           placeholder="city" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  **********************************************-->
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="addProduct" class="btn btn-success">Add new Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include '_footer.php'; ?>




