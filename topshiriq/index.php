<?php include '_header.php'; ?>
<?php include 'configDatabase.php';

$sql = "SELECT * FROM `user`";
$users = $pdoQr->query($sql);
?>

<!--VIEW USER start -->
<div class="container">
    <header class="mt-5 nav nav-link">
        <h1 class="text-center title">User Table Page</h1>

        <a class="btn btn-success" href="createUser.php">CREATE NEW USER</a>
    </header>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="table-responsive">
                    <table class="text-center table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Login</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Password</th>
                            <th>Function</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <th><?= $user['id'] ?></th>
                            <td><?= $user['login'] ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['age'] ?></td>
                            <td><?= $user['password'] ?></td>
                            <td>
                                <a class="delete btn-lg" href="/deleteUser.php?id=<?= $user['id'] ?>">
                                    <i class="fa fa-fw fa-close text-danger"></i>
                                </a>
                                <a class="delete btn-lg" href="/updateUser.php?id=<?= $user['id'] ?>">
                                    <i class="fa fa-fw fa-pencil text-info"></i>
                                </a>
                                <a class="delete btn-lg" href="/editUser.php?id=<?= $user['id'] ?>">
                                    <i class="fa fa-fw fa-eye text-secondary"></i>
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

<?php include '_footer.php'; ?>


</body>
</html>