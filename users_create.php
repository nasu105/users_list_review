<?php
include('functions.php');
//  var_dump($_POST);
//  exit();

if (
  !isset($_POST['username']) || $_POST['username'] =='' ||
  !isset($_POST['password']) || $_POST['password'] =='' 
) {
  exit('ParamError');
}

$username = $_POST['username'];
$password = $_POST['password'];

// DB接続処理

$pdo = connect_to_db();

// SQL作成及び実行
$sql = "INSERT INTO users_table (id, username, password, is_admin, is_deleted, created_at, updated_at) VALUES(NULL, :username, :password, 0, 1, now(), now())";
$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:users_input.php");
exit();


?>