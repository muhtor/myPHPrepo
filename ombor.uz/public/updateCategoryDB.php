<?php include '_header.php'; ?>
<div class="wrapper">
    <?php include '_main-header.php';
    include '_aside.php';
    ?>
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1 class=""><i class="fa fa-pencil-square-o"></i> Category updated
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
        $id = $_POST['id'];
        function getUpdatePost(){
            $posts = array();
            $posts[0] = $_POST['title'];
            $posts[1] = $_POST['category'];
            return $posts;
        }
        // update category
        if (isset($_POST['update'])) {
            $data = getUpdatePost();
            if (isset($_POST)) {

                $updateSTM = $pdoQuery->prepare("UPDATE `categories` SET 
                    `title` = :title, `category_name` = :category_name WHERE `id` = $id");
                $updateSTM->execute(array(
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
                            <div class="col-md-4">
                                <h2 class= "alert alert-success">ID number `<?=$id;?>`</h2>
                            </div>
                            <div class="box-group">
                                <?php
                                if ($updateSTM) {
                                    echo '<h2 class="alert alert-success">Good JOB process successful</h2>';
                                }else{
                                    echo '<h2 class="alert alert-error">Oops JOB process not successful</h2>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


<?php include '_footer.php'; ?>




