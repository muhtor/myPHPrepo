<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php'; ?>
    <?php include '_aside.php'; ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-user-plus"></i> Add new provider <small> Boshqaruv Paneli</small>
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

        $sqlCategory = "SELECT * FROM `categories`";
        $category = $pdoQueryAdmin->query($sqlCategory);
        $categories = $category->fetchAll();

        $sqlProviders = "SELECT * FROM `providers`";
        $providers = $pdoQueryAdmin->query($sqlProviders);
        $allProviders = $providers->fetchAll();

        $sqlProducts = "SELECT * FROM `products`";
        $product = $pdoQueryAdmin->query($sqlProducts);
        $products = $product->fetchAll();
        ;?>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <form action="addProviderDB.php" method="post" data-toggle="validator">
                            <div class="box-body">
                                <!--  ***************** Categories **************-->
                                <div class="form-group">
                                    <label for="">Categories</label>
                                    <select class="form-control" name="categories" id="category" required>
                                        <option>Select category</option>
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?=$category['id'];?>">
                                                <?=$category['category_name'];?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  ***************** Categories **************-->
                                <div class="form-group">
                                    <label for="">Products</label>
                                    <select class="form-control" name="product" id="product" required>
                                        <option>Select product</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  *************** Provider Name ************-->
                                <div class="form-group">
                                    <label for="">Provider Name</label>
                                    <input type="text" name="provider" class="form-control"
                                           placeholder="provider name" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  *************** Provider Phone **************-->
                                <div class="form-group has-feedback">
                                    <label for="">Provider Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                           placeholder="provider phone" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  *************** Company Name *************-->
                                <div class="form-group has-feedback">
                                    <label for="">Company Name</label>
                                    <input type="text" name="company" class="form-control"
                                           placeholder="company name" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="addProvider" class="btn btn-success">Add new Provider</button>
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
                console.log(categoryID);
                if (categoryID !== 0){
                    $('#product').html('<option value="0">Select product</option>');
                    $.ajax({
                        type: "POST",
                        url: 'ajaxProvider.php',
                        data:  'category_ID='+categoryID,
                        success: function (product) {
                            $('#product').append(product);
                        }
                    });
                }
            });
        });
    </script>

<?php include '_footer.php'; ?>




