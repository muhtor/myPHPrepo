<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php';
    include '_aside.php';
    ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-pencil"></i> Product added
                <small> Boshqaruv Paneli</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"> <i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-th-list"></i> <a href="listCommonProducts.php">List products</a></b>
                </li>
            </ol>
        </section>
        <?php
        include 'configAdminDB.php';
        /*********  Add product  ********/

        function getPostProduct(){
            $posts = array();
            $posts[0] = $_POST['category'];
            $posts[1] = $_POST['product'];
            return $posts;
        }

        // add product
        if (isset($_POST['addProduct'])){
            $data = getPostProduct();

            if (isset($_POST)) {
                $sqlInsert = "INSERT INTO `products` (
category_id, product_name) VALUES (
:category_id, :product_name)";
                $insertSTM = $pdoQueryAdmin->prepare($sqlInsert);
                $insertSTM->execute(array(
                    ':category_id'  => $data[0],
                    ':product_name' => $data[1],
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
                                    <h2 class=""> <i class="fa fa-user-plus"></i> Good!</h2>
                                    <p> process successful </p>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-danger">
                                    <h2 class=""> <i class="fa fa-close"></i> Oops!</h2>
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




