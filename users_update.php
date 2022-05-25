<?php
// var_dump($_POST);
// exit();

include('functions.php');
// 入力項目のチェック
if (
  !isset($_POST['username']) || $_POST['username'] =='' ||
  !isset($_POST['password']) || $_POST['password'] =='' ||
  !isset($_POST['id']) || $_POST['id'] =='' 
) {
  exit('ParamError');
}

$username = $_POST['username'];
$password = $_POST['password'];
$id = $_POST['id'];

// DB接続
$pdo = connect_to_db();

/* ---------------------------SQL作成及び実行-------------------- */
$sql = 'UPDATE users_table SET username=:username, password=:password WHERE id = :id';
$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:users_read.php");
exit();
?>