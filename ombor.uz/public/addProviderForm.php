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
        <?php include 'configDB.php';

        $sqlCategories = "SELECT * FROM `categories`";
        $categories = $pdoQuery->query($sqlCategories);
        $allCategories = $categories->fetchAll();

        $sqlProviders = "SELECT * FROM `providers`";
        $providers = $pdoQuery->query($sqlProviders);
        $allProviders = $providers->fetchAll();

        ;?>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <form action="addProviderDB.php" method="post" data-toggle="validator">
                            <div class="box-body">
                                <!--  **********************************************-->
                                <div class="form-group">
                                    <label for="">Categories</label>
                                    <select class="form-control" name="categories" required>
                                        <option></option>
                                        <?php foreach ($allCategories as $category): ?>
                                            <option value="<?=$category['id'];?>">
                                                <?=$category['category_name'];?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  **********************************************-->
                                <div class="form-group">
                                    <label for="">Provider Name</label>
                                    <input type="text" name="provider" class="form-control"
                                           placeholder="provider name" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  **********************************************-->
                                <div class="form-group has-feedback">
                                    <label for="">Provider Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                           placeholder="provider phone" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  **********************************************-->
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
</div>
<?php include '_footer.php'; ?>




