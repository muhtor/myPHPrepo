<?php

require_once '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php';
    include '_aside.php';
    ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-pencil"></i> Updated in common product
                <small> Boshqaruv Paneli</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"> <i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-th-list"></i> <a href="listCommonProducts.php">Common products</a></b>
                </li>
            </ol>
        </section>
        <?php
        include 'configAdminDB.php';
        /*********  Add providers  ********/
        function getPostProduct(){
            $posts = array();
            $posts[0] = $_POST['category'];
            $posts[1] = $_POST['product'];
            $posts[2] = $_POST['provider'];
            $posts[3] = $_POST['quantity'];
            $posts[4] = $_POST['ulch_bir'];
            $posts[5] = $_POST['old'];
            $posts[6] = $_POST['new'];
            $posts[7] = $_POST['country'];
            $posts[8] = $_POST['city'];
            return $posts;
        }

        // add product
        if (isset($_POST['addProduct'])){
            $data = getPostProduct();
            if (isset($_POST)) {

                $sqlInsert = "INSERT INTO `add_product` (
category_id, product_id, provider_id, quantity, ul_bir_ID, old_price, new_price, country, city
) VALUES (
:category_id, :product_id, :provider_id, :quantity, :ul_bir_ID, :old_price, :new_price, :country, :city)";
                $insertSTM = $pdoQueryAdmin->prepare($sqlInsert);
                $insertSTM->execute(array(
                    ':category_id'      => $data[0],
                    ':product_id'       => $data[1],
                    ':provider_id'      => $data[2],
                    ':quantity'         => $data[3],
                    ':ul_bir_ID'        => $data[4],
                    ':old_price'        => $data[5],
                    ':new_price'        => $data[6],
                    ':country'          => $data[7],
                    ':city'             => $data[8],
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





