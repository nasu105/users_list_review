<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型ユーザー作成(入力画面)</title>
</head>
<body>
  <form action="users_create.php" method="POST">
    <fieldset>
      <legend>DB連携型ユーザー作成(入力画面)</legend>
      <a href="users_read.php">ユーザーリスト</a>
      <div>
        name: <input type="text" name="username">
      </div>
      <div>
        password: <input type="text" name="password">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>
  
</body>
</html>