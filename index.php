<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style/style.css">
  <title>Список дел</title>
</head>
<body>
  <div class="container">
    <h1 class="title">Список дел:</h1>
    <h6>Введите задачи, которые вы хотите выполнить в ближайшее время.</h6>
    <h6 class="error-msg"><?=$_SESSION['error']?></h6>
    <form action="/addtolist.php" method="POST">
      <input class="form-control" type="text" name="todo" id="todo" placeholder="Введите задачу">
      <input class="btn btn-success" name="btn-add" type="submit" value="Добавить">
    </form>
    <?php
    require_once 'config.php';
    $query=$pdo->query('SELECT * FROM `tasks` ORDER BY `id` DESC');
    while($task = $query->fetch(PDO::FETCH_OBJ)) {
      echo '<p class="task">'.$task->task.'<a href="delete.php?id='.$task->id.'"><button class="btn btn-success delete">Удалить</button></a></p>';
    }
    ?>
  </div>
</body>
</html>