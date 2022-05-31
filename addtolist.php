<?php
  session_start();

  $task = $_POST["todo"];
  if ($task === '') {
  $_SESSION['error'] = "Вы не заполнили поле!";
  header('Location: /');
  exit();
  }
  $_SESSION['error'] = "";

  require_once 'config.php';
  $sql = 'INSERT INTO `tasks` (`task`) VALUES (:task)';
  $query = $pdo->prepare($sql);
  $query->execute(['task' => $task]);

  header('Location: /');

?>