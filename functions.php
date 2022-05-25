<?php

// DB接続処理
function connect_to_db() {
  $dbn = 'mysql:dbname=gsacf_l07_05;charset=utf8mb4;port=3306;host=localhost';
  $user = 'root';
  $pwd = '';
  try {
    return $pdo = new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}
}


?>