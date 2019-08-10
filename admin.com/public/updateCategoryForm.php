<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php'; ?>
    <?php include '_aside.php'; ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-pencil-square-o"></i> Category update
                <small> Boshqaruv Paneli</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"> <i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-th-list"></i> <a href="listCategories.php">List category</a></b>
                </li>
            </ol>
        </section>
        <?php include 'configAdminDB.php';
        $id = $_GET['id'];
        if (!empty($id)) {
            $categories = $pdoQueryAdmin->query("SELECT * FROM `categories` WHERE `id` = $id");
            $categories->setFetchMode(PDO::FETCH_ASSOC);
        }
        ?>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <?php foreach ($categories as $category): ?>
                        <form action="updateCategoryDB.php" method="post" data-toggle="validator">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Category ID</label>
                                    <input type="text" name="id" readonly class="form-control"
                                           value="<?= $category['id']; ?>">
                                </div>
                                <!--  **********************************************-->
                                <div class="form-group">
                                    <label for="">Category Title</label>
                                    <input type="text" name="title" class="form-control"
                                           value="<?=$category['title'];?>">
                                </div>
                                <!--  **********************************************-->
                                <div class="form-group">
                                    <label for="">Category Name</label>
                                    <input type="text" name="category" class="form-control"
                                           value="<?=$category['category_name'];?>">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="categoryUpdate" class="btn btn-success">UPDATE</button>
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




