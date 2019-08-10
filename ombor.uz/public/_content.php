<section class="content-header">
    <h1><i class="fa fa-home"></i> Home <small> Control panel</small></h1>
</section>
<section class="content">
    <div class="row">
        <?php include 'configDB.php';
        $sqlProducts = "SELECT * FROM `products`";
        $sqlProviders = "SELECT * FROM `providers`";
        $sqlCategories = "SELECT * FROM `categories`";

        $products = $pdoQuery->query($sqlProducts);
        $productsResult = $products->fetchAll();
        $productsCount = 0;
        foreach ($productsResult as $result){
            $productsCount++;
        }

        $providers = $pdoQuery->query($sqlProviders);
        $providersResult = $providers->fetchAll();
        $providersCount = 0;
        foreach ($providersResult  as $result){
            $providersCount++;
        }

        $categories = $pdoQuery->query($sqlCategories);
        $categoriesResult = $categories->fetchAll();
        $categoriesCount = 0;
        foreach ($categoriesResult as $result){
            $categoriesCount++;
        }
        ?>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?=$productsCount;?></h3>
                    <p>Products</p>
                </div>
                <div class="icon">
                    <i class="ion-android-cart"></i>
                </div>
                <a href="listProduct.php" class="small-box-footer">
                    view
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?=$providersCount;?></h3>
                    <p>Providers</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                </div>
                <a href="listProviders.php" class="small-box-footer">view
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?=$categoriesCount;?></h3>
                    <p>Categories</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-list"></i>
                </div>
                <a href="listCategories.php" class="small-box-footer">view
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>
                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</section>
