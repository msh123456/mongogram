<?php include_once 'header.php'; ?>
<?php
if (isLogin()) {
    header("Location: ?a=home");
}
$validator = new validator();
if (isset($_POST['username']) && isset($_POST['password'])) {
    global $db;
    $username = protect($_POST['username']);
    $password = protect($_POST['password']);
    $count = $db->users->count(array("username" => $username, "password" => $password));
    if ($count == 1) {
        $doc = $db->users->findOne(array("username" => $username, "password" => $password));
        $_SESSION['username'] = $doc['username'];
        $_SESSION['userdata'] = $doc;
        header("Location: ?a=home");
    } else {

        $validator->error("Username or password is incorrect!");

    }
}
?>

<body>
<div class="container">
    <div class="col-sm-3 col-xs-12"></div>
    <div class="col-sm-6 col-xs-12">
        <?= $validator->getErrorHtml(); ?>
        <h2>Login</h2>
        <hr>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Username:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter username" name="username">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
            </div>

            <button type="submit" class="btn btn-success">Login</button>
            <a href="signup.php" class="btn btn-warning">SignUp</a>
        </form>
    </div>
    <div class="col-sm-3 col-xs-12"></div>



</div>

</body>
<?php include_once 'footer.php'; ?>
