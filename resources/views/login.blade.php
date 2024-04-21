<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ログイン</title>
</head>
<body>
  <h1>ログイン画面</h1>
  @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
  <form action="" method="post">
    @csrf
    <label for="email">メールアドレス</label>
    <input type="email" name="email" id="email">
    <label for="">パスワード</label>
    <input type="password" name="password" id="password">
    <button>送信</button>
  </form>
</body>
</html>