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
<!--      Product      -->
            <li class="treeview">
                <a href="#"><i class="fa fa-cubes"></i>
                    <span>Product</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="listProduct.php">List product</a></li>
                    <li><a href="addProduct.php">Add product</a></li>
                </ul>
            </li>
<!--      end Product      -->
            <li class="treeview">
                <a href="#"><i class="fa fa-navicon"></i> <span>Category</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="listCategories.php">List category</a></li>
                    <li><a href="addCategory.php">Add category</a></li>
                </ul>
            </li>
                <!-- Providers -->
            <li class="treeview">
                <a href="#"><i class="fa fa-cubes"></i>
                    <span> Providers</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="listProviders.php">List providers</a></li>
                    <li><a href="addProviderForm.php">Add provider</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-users"></i>
                       <span>Users</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= ADMIN ?>/user">List users</a></li>
                    <li><a href="<?= ADMIN ?>/user/add">Add user</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
