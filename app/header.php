<?php
    require_once 'include/database.php';
    require_once 'include/functions.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Мой первый блог</title>
  </head>

  <body>
	<div class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                    <span class="sr-only">Открыть навигацию</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Мой первый блог</a>
            </div>
            <div class="collapse navbar-collapse" id="responsive-menu">
                <ul class="nav navbar-nav">
                <?php
                    $categories = get_categories();
                ?>
                <?php if(count($categories) === 0): ?>
                    <li><a href="#"><i class="glyphicon glyphicon-plus-sign"></i>Добавить категорию</a></li>
                <?php else: ?>
                <?php
                foreach($categories as $category): ?>                
                    <li><a href="/category.php?id=<?php echo $category['id']?>"><?php echo $category["title"]?></a></li>
                <?php endforeach?>
                <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>