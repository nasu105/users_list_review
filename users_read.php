<?php

include('functions.php');
// DB接続
$pdo = connect_to_db();

// SQL作成及び実行
$sql = 'SELECT * FROM users_table ORDER BY created_at ASC';
$stmt = $pdo->prepare($sql);

// var_dump($stmt);
// exit();

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["username"]}</td>
      <td>{$record["password"]}</td>
      <td>
        <a href='users_edit.php?id={$record["id"]}'>edit</a>
      </td>
      <td>
        <a href='users_delete.php?id={$record["id"]}'>delete</a>
      </td>
    </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型ユーザーリスト(一覧画面)</title>
</head>
<body>
  <fieldset>
    <legend>DB連携型ユーザーリスト(一覧画面)</legend>
    <a href="users_input.php">ユーザー作成画面</a>
    <table>
      <thead>
        <tr>
          <th>users_name</th>
          <th>password</th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
  
</body>
</html>