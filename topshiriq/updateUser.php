<?php
include '_header.php';
include 'configDatabase.php';

$id = $_GET['id'];
if (!empty($id)) {
    $users = $pdoQr->query("SELECT * FROM `user` WHERE `id` = $id");
    $users->setFetchMode(PDO::FETCH_ASSOC);
}
?>

<div class="container h-100">
    <div class="row align-items-center mt-lg-5">
        <div class="col-6 mx-auto">
            <div class="jumbotron text-center">
                <?php foreach ($users as $user): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="font-weight-bold text-uppercase">
                                <p class="card-text"><?= $user['name']; ?></p>
                            </h2>
                        </div>
                    </div>
                    <form action="update.php" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text" style="width: 100px;">Login</div>
                            </div>
                            <input type="text" value="<?= $user['login']; ?>" name="login" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text" style="width: 100px;">Name</div>
                            </div>
                            <input type="text" value="<?= $user['name']; ?>" name="name" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text" style="width: 100px;">Age</div>
                            </div>
                            <input type="text" name="age" value="<?= $user['age']; ?>" class="form-control">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" style="width: 100px;">Password</div>
                            </div>
                            <input type="text" value="<?= $user['password']; ?>" name="password" class="form-control">
                        </div>
                        <div class="input-group">
                            <input type="hidden" value="<?= $user['id']; ?>" name="id">
                        </div>
                        <div class="card-btn mt-3">
                            <button class="col-md-8 btn btn-outline-info" name="update">UPDATE</button>
                            <a href="index.php" class="col-md-8 btn btn-outline-info mt-3">Back to Home</a>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

