<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>新規登録画面</title>
    <meta name="description" content="自分の想いを届ける">
    <link rel="stylesheet" href="../../css/user.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>

  <body>
    <div class="register_image">
      <div class="register_info">
        <div class="register_title">Voice</div>
        <form method=post action="#">
          @csrf
          <input id="name" class="name" type="text" name="name" :value="old('name')" placeholder="Name" required autofocus />
          <input id="email" class="email" type="email" name="email" :value="old('email')" placeholder="Email" required />
          <input id="password" class="password" type="password" placeholder="Password" name="password" required autocomplete="new-password"/>
          <input id="password_confirm" class="password_confirm" type="password" placeholder="Password Confirm" name="password_confirm" required/>
          <a href="{{ route('user.login') }}"><div class="forgot">Already Registered?</div></a>
          <button class="registration">Registration</button>
        </form>
      </div>
    </div>
  </body>
</html>

