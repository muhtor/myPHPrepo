<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php'; ?>
    <?php include '_aside.php'; ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-pencil-square-o"></i> Update product <small> Boshqaruv Paneli</small>
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
        $idProduct = $_GET['id'];
        if (!empty($idProduct)){
            $sqlProducts = "SELECT * FROM `products` WHERE `products`.id = '$idProduct'";
            $product = $pdoQueryAdmin->query($sqlProducts);
            $products = $product->fetchAll();
        }
        $allCategories= "SELECT * FROM `categories`";
        $category = $pdoQueryAdmin->query($allCategories);
        $categories = $category->fetchAll();
        ?>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <?php foreach ($products as $product): ?>
                        <form action="updateProductDB.php" method="post" data-toggle="validator">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Product ID</label>
                                    <input type="text" name="id" readonly class="form-control"
                                           value="<?= $product['id']; ?>">
                                </div>
                                <!--  ***************** Categories **************-->
                                <div class="form-group">
                                    <label for="">Categories</label>
                                    <select class="form-control" name="category" required>
                                        <?php foreach ($categories as $category): ?>
                                            <option <?php if ($product['category_id']
                                                == $category['id']) echo 'selected';?>
                                                value="<?=$category['id'];?>">
                                                <?=$category['title'];?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  *************** Company Name *************-->
                                <div class="form-group has-feedback">
                                    <label for="">Product Name</label>
                                    <input type="text" name="product" value="<?=$product['product_name'];?>" class="form-control">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="updateProduct" class="btn btn-success">UPDATE</button>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include '_footer.php'; ?>




