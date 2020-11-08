<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'app/header.php';
$post_id = $_GET['post_id'];
if(!is_numeric($post_id)) exit();
$post = get_post_by_id($post_id); //Получаем массив поста
?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
            <h1><?php $post['title']?></h1>
            </div>
            <ul class="list-inline">
                <li><i class="glyphicon glyphicon-list"></i><a href="#"> Категория: </a> | </li>
                <li><i class="glyphicon glyphicon-calendar"></i> Sept 16th. 2012 | </li>
                <li><i class="glyphicon glyphicon-comment"></i> by <a href="#">3 comments</a> | </li>
            </ul>
            <hr>
            <div class="post-content">
            <img src="<?php echo $post['image']?>" align="left" style="padding: 0 10px 10px 0">
                <?php
                    echo $post['content'];
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'app/footer.php';
?>