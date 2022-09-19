<head>
  <link rel="stylesheet" href="../../../css/heater.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<div class="heater">
  <div class="heater_title"><a href="/index">Voice</a></div>
  <form id="form_search" action="#" method="get">
    <input id="search" type="search" name="search" placeholder="キーワード">
    <button type="submit" id="search_btn"><i id="search_btn_icon" class="fas fa-search"></i></button>
  </form>
  <div class="sign_contents">
    @if (Route::has('login'))
      @auth
        <a href="{{ route('user') }}" class="user_icon" style="background-color: #fd644f;"></a>
      @else
        <a href="{{ route('login') }}" class="login_font">ログイン</a>

        @if (Route::has('register'))
          <a href="{{ route('register') }}" class="register_font">新規登録</a>
        @endif
      @endauth
    @endif
  </div>
</div>