<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once 'app/header.php';

$IntlDateFormatter = datefmt_create(
   'ru_RU',
   IntlDateFormatter::FULL,
   IntlDateFormatter::FULL,
   'Europe/Moscow',
   IntlDateFormatter::GREGORIAN,
   'd MMMM yyyy, EEEE H:mm'
);
?>
<div class="container">
 <div class="row">
  <div class="col-md-9">
   <div class="page-header">
    <h1>Все записи:</h1>
    <select name="page-select" id="page-select" class="form-control pull-right">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
   </div>
   <hr>
   <?php
      $page = isset($_GET['page']) ? $_GET['page']: 1;
      $limit = 5;
      $offset = $limit * ($page - 1);

      $posts = get_posts($limit, $offset);
   ?>
   <?php
      foreach($posts as $post) : 
      ?>
   <div class="row">
    <div class="col-md-3">
     <a href="#" class="thumbnail">
        <img src="<?php echo $post['image']?>" alt="">
     </a>
    </div>
    <div class="col-md-9">
     <h4><a href="/post.php?post_id=<?php echo $post['id'];?>"><?php echo $post['title']?></a></h4>
     <p>
      <?php echo mb_substr($post['content'], 0, 128, 'UTF-8').'...'?>
     </p>
     <p><a class="btn-info btn-sm" href="/posts.php?post_id=<?php echo $post['id'];?>">Читать полностью</a></p>
     <br/>
     <ul class="list-inline">
      <li><i class="glyphicon glyphicon-list"></i><a href="#"> Категория: </a> | </li>
      <li><i class="glyphicon glyphicon-calendar"></i> <br>
      <?php echo datefmt_format($IntlDateFormatter, $post['datetime'])?>
      </li>
      <li><i class="glyphicon glyphicon-comment"></i> by <a href="#">3 comments</a> | </li>
     </ul>
    </div>
   </div>
   <hr>
   <?php
      endforeach;
   ?>
  </div>
  <div class="col-md-3">
      <?php include_once 'app/sidebar.php';?>
  </div>
 </div>
</div>

<?php


require_once 'app/footer.php';

?>