<?php

// DBを繋ぐ
include('functions.php');
$pdo = connect_to_db();

// id受け取り
$id = $_GET['id'];

// var_dump($_GET);
// exit();

$sql = "SELECT * FROM users_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型ユーザーリスト(編集画面)</title>
</head>
<body>
  <form action="users_update.php" method="POST">
    <fieldset>
      <legend>DB連携型ユーザーリスト(編集画面)</legend>
      <a href="users_read.php">ユーザーリスト</a>
      <div>
        name: <input type="text" name="username" value="<?= $record['username'] ?>">
      </div>
      <div>
        password: <input type="text" name="password" value="<?= $record['password']?>">
      </div>
      <div>
        <input type="hidden" name="id" value="<?= $record['id'] ?>">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>
  
</body>
</html>