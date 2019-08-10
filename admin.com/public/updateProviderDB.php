<?php include '_header.php'; ?>
<div class="wrapper">
    <?php
    include '_main-header.php';
    include '_aside.php';
    ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-pencil-square-o"></i> Provider updated
                <small> Boshqaruv Paneli</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php"> <i class="fa fa-home"></i> Home</a>
                </li>
                <li class="active">
                    <b><i class="fa fa-th-list"></i> <a href="listProviders.php">List providers</a></b>
                </li>
            </ol>
        </section>
        <?php
        include 'configAdminDB.php';
        $id = $_POST['id'];

        function getUpdateProvider()
        {
            $posts = array();
            $posts[0] = $_POST['category'];
            $posts[1] = $_POST['product'];
            $posts[2] = $_POST['provider'];
            $posts[3] = $_POST['phone'];
            $posts[4] = $_POST['company'];
            return $posts;
        }
        if (isset($_POST['updateProvider'])) {
            $data = getUpdateProvider();
            if (isset($_POST)) {
                $updateSTM = $pdoQueryAdmin->prepare("UPDATE `providers` SET 
`category_id` = :category_id, `product_id` = :product_id,  
`provider_name` = :provider_name, `phone` = :phone, `company` = :company WHERE `id` = $id");

                $execUpdate = $updateSTM->execute(array(
                    ':category_id'      => $data[0],
                    ':product_id'       => $data[1],
                    ':provider_name'    => $data[2],
                    ':phone'            => $data[3],
                    ':company'          => $data[4],
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



