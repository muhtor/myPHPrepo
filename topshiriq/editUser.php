<?php
include 'configDatabase.php';
include '_header.php';
$id = $_GET['id'];
if (!empty($id)) {
    $users = $pdoQr->query("SELECT * FROM `user` WHERE `id` = $id");
    $users->setFetchMode(PDO::FETCH_ASSOC);
}
?>
    <div class="container h-100">
        <?php foreach ($users as $user): ?>
            <div class="text-center mt-5">
                <h2 class="text-uppercase font-weight-bolder">
                    <?= $user['name']; ?>
                </h2>
            </div>
            <div class="row mt-lg-5 justify-content-center align-items-center">
                <div class="col-md-offset-4 align-content-center">
                    <img src="img/admin.ico" alt="">
                </div>
                <div class="col-md-6 align-items-center">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Key</th>
                            <th>Value</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>User ID</td>
                            <td><?= $user['id'] ?></td>
                        </tr>
                        <tr>
                            <td>User Login</td>
                            <td><?= $user['login'] ?></td>
                        </tr>
                        <tr>
                            <td>User Name</td>
                            <td><?= $user['name'] ?></td>
                        </tr>
                        <tr>
                            <td>User Age</td>
                            <td><?= $user['age'] ?></td>
                        </tr>
                        <tr>
                            <td>User Password</td>
                            <td><?= $user['password'] ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-9 btn-group align-items-center">
                    <a class="btn btn-outline-info" href="index.php">Back To Users Table</a>
            </div>
        <?php endforeach; ?>
    </div>

<?php include '_footer.php'; ?>