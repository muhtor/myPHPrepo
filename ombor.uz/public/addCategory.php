<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php'; ?>
    <?php include '_aside.php'; ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class="">Add new category
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
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <form action="addDB.php" method="post" data-toggle="validator">
                            <div class="box-body">
                                <!--  **********************************************-->
                                <div class="form-group">
                                    <label for="">Category Title</label>
                                    <input type="text" name="title" class="form-control"
                                           placeholder="category title CODE :" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <!--  **********************************************-->
                                <div class="form-group">
                                    <label for="">Category Name</label>
                                    <input type="text" name="category" class="form-control"
                                           placeholder="category name" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="addCategory" class="btn btn-success">Add new Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


<?php include '_footer.php'; ?>




