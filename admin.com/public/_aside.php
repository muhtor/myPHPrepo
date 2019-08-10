<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/public/images/admin.ico" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <i class="fa fa-circle text-success"></i>
                <p><?= $_SESSION['user']['name']; ?>Online</p>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn"
                        class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Mune Navigation</li>
            <li>
                <a href="index.php"><i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <!--      start Product      -->
            <li>
                <a href="listProducts.php">
                    <i class="fa fa-cubes"></i>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a href="addProduct.php">
                    <i class="fa fa-plus"></i>
                    <span>Add Product</span>
                </a>
            </li>
            <li>
                <a href="listCommonProducts.php">
                    <i class="fa fa-cubes"></i>
                    <span>Common Product</span>
                </a>
            </li>
            <li>
                <a href="inCommProduct.php">
                    <i class="fa fa-cart-plus"></i>
                    <span>In Comm Product</span>
                </a>
            </li>
            <!--      end Product      -->
            <!--      start Category-->
            <li>
                <a href="listCategories.php">
                    <i class="fa fa-list-ul"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li>
                <a href="addCategoryForm.php">
                    <i class="fa fa-plus"></i>
                    <span>Add category</span>
                </a>
            </li>
            <!-- end Category-->
            <!-- start Providers -->
            <li>
                <a href="listProviders.php">
                    <i class="fa fa-users"></i>
                    <span>Providers</span>
                </a>
            </li>
            <li>
                <a href="addProviderForm.php">
                    <i class="fa fa-user-plus"></i>
                    <span>Add Provider</span>
                </a>
            </li>
            <!-- end Providers -->
        </ul>
    </section>
</aside>
