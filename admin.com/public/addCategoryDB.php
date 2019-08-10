<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php';
    include '_aside.php';
    ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-plus"></i> Category added
                <small> Boshqaruv Paneli</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"> <i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-th-list"></i> <a href="listCategories.php">List categories</a></b>
                </li>
            </ol>
        </section>
        <?php
        include 'configAdminDB.php';
        /*********  Add category  ********/

        function getPostCategory(){
            $posts = array();
            $posts[0] = $_POST['title'];
            $posts[1] = $_POST['category'];
            return $posts;
        }

        // add category
        if (isset($_POST['addCategory'])){
            $data = getPostCategory();

            if (isset($_POST)) {
                $sqlInsert = "INSERT INTO `categories` (
title, category_name) VALUES (
:title, :category_name)";
                $insertSTM = $pdoQueryAdmin->prepare($sqlInsert);
                $insertSTM->execute(array(
                    ':title'            => $data[0],
                    ':category_name'    => $data[1],
                ));
            }
        }
        ?>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
                            <?php if ($insertSTM): ?>
                                <div class="alert alert-success">
                                    <h2 class=""> <i class="fa fa-list-alt"></i> Good!</h2>
                                    <p> process successful </p>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-danger">
                                    <h2 class=""> <i class="fa fa-minus"></i> Oops!</h2>
                                    <p> process not successful </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


<?php include '_footer.php'; ?>




