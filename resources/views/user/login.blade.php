<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ログイン画面</title>
    <meta name="description" content="自分の想いを届ける">
    <link rel="stylesheet" href="../../css/user.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>

  <body>
    <div class="login_image">
      <div class="login_info">
        <div class="login_title">Voice</div>
        <form method=post action="#">
          @csrf
          <input id="email" class="email" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus />
          <input id="password" class="email" type="password" placeholder="Password" name="password" equired autocomplete="current-password"/>
          <a href="{{ route('password.request') }}"><div class="forgot">Forgot Password?</div></a>
          <button class="login">Login</button>
        </form>
      </div>
    </div>
  </body>
</html>

