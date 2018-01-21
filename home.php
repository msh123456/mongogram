<?php
if(!isLogin()){
    header("location: ?a=login");
}
global  $db;
$posts = $db->posts->find();
foreach ($posts as $post):
?>
<div class="container">
    <div class=""
</div>

<?php endforeach; ?>
