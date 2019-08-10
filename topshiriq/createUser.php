
<?php
//session_start();
include '_header.php'; ?>
<div class="container">
    <div class="col-md-6 mx-auto text-center">
        <div class="header-title">
            <h1 class="wv-heading--title">REGISTER</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <form action="addUser.php" method="post">
                <div class="form-group">
                    <input type="text" name="login" class="form-control my-input" id="login"
                           placeholder="Login" required>
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control my-input" id="name"
                           placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input type="number" min="10" max="100" name="age" id="name" class="form-control my-input"
                           placeholder="Age" required>
                </div>
                <div class="form-group">
                    <input type="text" name="password" id="password" class="form-control my-input"
                           placeholder="Password" required>
                </div>
                <div class="text-center">
                    <input type="submit" name="insert"
                           class=" btn btn-block send-button tx-tfm" value="INSERT">
                    <a class="btn btn-block btn-outline-info" href="index.php">Back To Home</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include '_footer.php'; ?>