<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php'; ?>
    <?php include '_aside.php'; ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-cart-plus"></i> In common product
                <small> Boshqaruv Paneli</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-th-list"></i> <a href="listCommonProducts.php">Common list</a></b>
                </li>
            </ol>
        </section>
        <?php
        include 'configAdminDB.php';
        include 'queryBuilder.php';

        Query::selectTable('add_product');

        $categorySql = $pdoQueryAdmin->query("SELECT * FROM `categories`");
        $categories = $categorySql->fetchAll(PDO::FETCH_ASSOC);

        $ed = $pdoQueryAdmin->query("SELECT * FROM `ulchovbirligi`");
        $allEd = $ed->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <form action="inCommProductDB.php" method="post" data-toggle="validator">
                            <div class="box-body">
                                <div class="form-group">
                                    <!-- ******* Categories ****** -->
                                    <label for="">Categories</label>
                                    <select class="form-control" id="category" name="category" required>
                                        <option value="0">Select category</option>
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?= $category['id']; ?>">
                                                <?= $category['title']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!-- ******* Products ****** -->
                                <!--***********************************-->
                                <div class="form-group">
                                    <label for="">Available products</label>
                                    <select class="form-control" id="product" name="product" required>
                                        <option>Select product</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  **********************************************-->
                                <div class="form-group">
                                    <label for="">Providers</label>
                                    <select class="form-control" id="provider" name="provider" required>
                                        <option>Select provider</option>
                                    </select>
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
                                            <option value="<?= $eda['id']; ?>">
                                                <?= $eda['code']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  **********************************************-->
                                <div class="form-group has-feedback">
                                    <label for="">Old Price</label>
                                    <input type="text" name="old" class="form-control"
                                           placeholder="old price" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="">New Price</label>
                                    <input type="text" name="new" class="form-control"
                                           placeholder="new price" required>
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

    <script src="js/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#category').change(function () {
            let categoryID = $(this).val();
            if (categoryID !== 0){
                $('#product').html('<option value="0">Select product</option>');
                $('#provider').html('<option value="0">Select provider</option>');
                $.ajax({
                    type: "POST",
                    url: 'ajax.php',
                    data:  'category_ID='+categoryID+'&type=product',
                    success: function (product) {
                        $('#product').append(product);
                    }
                });
            }
        });
        $('#product').change(function () {
            let providerID = $(this).val();
            if (providerID !== 0){
                $('#provider').html('<option value="0">Select provider</option>');
                $.ajax({
                    type: "POST",
                    url: 'ajax.php',
                    data:  'provider_ID='+providerID+'&type=provider',
                    success: function (provider) {
                        $('#provider').append(provider);
                    }
                });
            }
        });
    });
</script>
<?php include '_footer.php'; ?>




