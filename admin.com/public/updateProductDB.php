<?php include '_header.php'; ?>
<div class="wrapper">
    <?php
    include '_main-header.php';
    include '_aside.php';
    ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-pencil-square-o"></i> Product updated
                <small> Boshqaruv Paneli</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"> <i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-th-list"></i> <a href="listProducts.php">List products</a></b>
                </li>
            </ol>
        </section>
        <?php
        include 'configAdminDB.php';
        $id = $_POST['id'];

        function getUpdateProduct()
        {
            $posts = array();
            $posts[0] = $_POST['category'];
            $posts[1] = $_POST['product'];
            return $posts;
        }

        if (isset($_POST['updateProduct'])) {
            $data = getUpdateProduct();
            if (isset($_POST)) {
                $updateSTM = $pdoQueryAdmin->prepare("UPDATE `products` SET `category_id` = :category_id, 
`product_name` = :product_name WHERE `id` = $id");

                $execUpdate = $updateSTM->execute(array(
                    ':category_id'      => $data[0],
                    ':product_name'     => $data[1],
                ));
            }
        }
        ?>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
                            <?php if ($execUpdate): ?>
                                <div class="alert alert-success">
                                    <h2 class=""><i class="fa fa-pencil-square-o"></i> Good!</h2>
                                    <p> process successful </p>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-danger">
                                    <h2 class=""><i class="fa fa-close"></i> Oops!</h2>
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



