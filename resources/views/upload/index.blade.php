<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>投稿一覧ページ</title>
    <meta name="description" content="自分の想いを届ける">
    <link rel="stylesheet" href="../css/upload.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>

  <body>
    @component('components.heater')
    @endcomponent
    

    <div class="uploaded_index">
      <div class="uploaded_user_contents">
        <div class="uploaded_user_icon">
        </div>
        <a href="/user"><div class="uploaded_username">ユーザー名</div></a>
      </div>
      <div class="uploaded_title">すべての放送</div>
      @foreach($voices as $voice)
      <a href="#"><div class="uploaded_content">
        <div class="user_icon"></div>
        <div class="cotent_title">{{ $voice->title }}</div>
        <audio controls src="/storage/{{ $voice->upload_data }}.mp3" type="audio/mp3"></audio>
        <!-- <img href="/storage/$voice->upload_data" style="width:100%;"/> -->
      </div></a>
      @endforeach
      <a href="#"><div class="uploaded_content">
        <div class="user_icon"></div>
        <div class="cotent_title">{{ $voice->title }}</div>
        <audio controls src="https://res.cloudinary.com/code-kitchen/video/upload/v1555038697/posts/zk5sldkxuebny7mwlhh3.mp3" type="audio/mp3"></audio>
      </div></a>
      <a href="#"><div class="uploaded_content">
        <div class="user_icon"></div>
        <div class="cotent_title">{{ $voice->title }}</div>
        <audio controls src="http://upload.wikimedia.org/wikipedia/commons/e/e6/Typing_example.ogv"></audio>
      </div></a>
    </div>
  </body>
</html>
