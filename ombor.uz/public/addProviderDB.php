<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php';
    include '_aside.php';
    ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-pencil-square-o"></i> Provider added
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
        include 'configDB.php';
        /*********  Add providers  ********/

        function getPostProvider(){
            $posts = array();
            $posts[0] = $_POST['categories'];
            $posts[1] = $_POST['provider'];
            $posts[2] = $_POST['phone'];
            return $posts;
        }

        // add provider
        if (isset($_POST['addProvider'])){
            $data = getPostProvider();
            if (isset($_POST)) {
                $sqlInsert = "INSERT INTO `providers` (
category_id, provider_name, provider_phone) VALUES (
:category_id, :provider_name, :provider_phone)";
                $insertSTM = $pdoQueryAdmin->prepare($sqlInsert);
                $insertSTM->execute(array(
                    ':category_id'          => $data[0],
                    ':provider_name'        => $data[1],
                    ':provider_phone'       => $data[2],
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




