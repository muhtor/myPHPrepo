<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php'; ?>
    <?php include '_aside.php'; ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-plus"></i> Add new product <small> Boshqaruv Paneli</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-th-list"></i> <a href="listProducts.php">List products</a></b>
                </li>
            </ol>
        </section>
        <?php include 'configAdminDB.php';

        $sqlCategories = "SELECT * FROM `categories`";
        $categories = $pdoQueryAdmin->query($sqlCategories);
        $allCategories = $categories->fetchAll();

        ;?>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <form action="addProductDB.php" method="post" data-toggle="validator">
                            <div class="box-body">
                                <!--  ***************** Categories **************-->
                                <div class="form-group">
                                    <label for="">Categories</label>
                                    <select class="form-control" name="category" required>
                                        <option></option>
                                        <?php foreach ($allCategories as $category): ?>
                                            <option value="<?=$category['id'];?>">
                                                <?=$category['category_name'];?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  *************** Company Name *************-->
                                <div class="form-group has-feedback">
                                    <label for="">Product Name</label>
                                    <input type="text" name="product" class="form-control"
                                           placeholder="product name" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="addProduct" class="btn btn-success">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include '_footer.php'; ?>




