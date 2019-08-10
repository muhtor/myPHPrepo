<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php'; ?>
    <?php include '_aside.php'; ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-list-ol"></i> Categories List
                <small> Boshqaruv Paneli</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"> <i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-plus"></i> <a href="addCategoryForm.php">Add category</a></b>
                </li>
            </ol>
        </section>

        <?php
        include 'configAdminDB.php';
        $sql = "SELECT * FROM `categories`";
        $category = $pdoQueryAdmin->query($sql);
        $categories = $category->fetchAll();
        ?>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body no-padding">
                            <div class="table-responsive">
                                <table class="text-center table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                        <th>Category Name</th>
                                        <th>Create Date</th>
                                        <th>Function</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($categories as $category): ?>
                                        <tr>
                                            <td><?= $category['id'] ?></td>
                                            <td><?= $category['title'] ?></td>
                                            <td><?= $category['category_name'] ?></td>
                                            <td><?= $category['date_add'] ?></td>
                                            <td>
                                                <a class="btn-lg" href="editCategory.php?id=<?= $category['id']; ?>">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn-lg" href="updateCategoryForm.php?id=<?= $category['id']; ?>">
                                                    <i class="fa fa-fw fa-pencil-square-o"></i>
                                                </a>
                                                <a class="delete btn-lg" href="delete.php?id=<?= $category['id']; ?>">
                                                    <i class="fa fa-fw fa-close text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include '_footer.php'; ?>




