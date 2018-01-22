<?php
if(!isLogin()){
    header("location: ?a=login");
}
global  $db;
$posts = $db->posts->find();
foreach ($posts as $post):
?>
<div class="row">
    <div class="col-xs-12">
        <h3 class="h3"><?= $post['title'] ?></h3>
        <hr>
        <div class="col-xs-12 img-responsive">
            <img src="<?= $post['image'] ?>">
        </div>
        <p><?= $post['description'] ?></p>
    </div>
</div>
<?php endforeach; ?>
