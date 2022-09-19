<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>トップページ</title>
    <meta name="description" content="自分の想いを届ける">
    <link rel="stylesheet" href="css/index.css">
  </head>

  <body>
    @component('components.heater')
    @endcomponent

    <div class="index_info">
      <p class="info_Text">みんなの声を聞いて</p>
      <p class="info_secondText">毎日を楽しもう!</p>
    </div>

    <div class="index_body">
      <div class="index_contents">
        <a href="#" class="follow_text">フォロー中</a>
        <div class="follow_users">
          <div class="follow_user_content">
            <div class="follow_user"></div>
            <div class="follow_userName">ユーザー名</div>
          </div>
        </div>
      </div>
      <div class="index_contents">
        <a href="#" class="follow_text">人気Voice</a>
        <div class="follow_users">
          <div class="follow_user_content">
            <div class="follow_user"></div>
            <div class="follow_userName">ユーザー名</div>
          </div>
        </div>
      </div>
    </div>

    @component('components.footer')
    @endcomponent
  </body>
</html>