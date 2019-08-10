<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php';
    include '_aside.php';?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-pencil"></i> Update category
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
        <?php
        include 'configDB.php';
        $id = $_GET['id'];
        if (!empty($id)) {
            $category = $pdoQuery->query("SELECT * FROM `categories` WHERE `id` = $id");
            $category->setFetchMode(PDO::FETCH_ASSOC);
        }
        ?>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <?php foreach ($category as $value): ?>
                        <form action="updateCategoryDB.php" method="post" data-toggle="validator">
                            <div class="box-body">
                                <!--  **********************************************-->
                                <div class="form-group">
                                    <label for="">Category ID</label>
                                    <input type="text" name="id" readonly class="form-control"
                                           value="<?=$value['id'];?>">
                                </div>
                                <!--  **********************************************-->
                                <div class="form-group">
                                    <label for="">Category Title</label>
                                    <input type="text" name="title" class="form-control"
                                           value="<?=$value['title'];?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  **********************************************-->
                                <div class="form-group">
                                    <label for="">Category Name</label>
                                    <input type="text" name="category" class="form-control"
                                    value="<?=$value['category_name'];?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="update" class="btn btn-success">Update Category
                                </button>
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




