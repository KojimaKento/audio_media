<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ユーザーマイページ</title>
    <meta name="description" content="自分の想いを届ける">
    <link rel="stylesheet" href="css/user.css">
  </head>

  <body>
    @component('components.heater')
    @endcomponent

    <div class="userMyPage">
      <div class="profile_contents">
        <div class="profile_title">
          <div class="profile_font">プロフィール</div>
          @if (Route::has('login'))
            @auth
              <div class="edit_font"><a href="{{ route('edit') }}">編集</a></div>
            @endauth
          @endif
        </div>
        <div class="user_info">
          <div class="user_contents">
            <div class="profile_icon"></div>
            @if (Auth::check())
            <div class="user_name">{{ $user->name }}</div>
            @endif
          </div>
          <div class="profile_text">
            {!! nl2br(e($user->profile)) !!}
          </div>
        </div>
        <div class="user_post"><a href="{{ route('upload.show') }}">投稿する</a></div>
      </div>
      <div class="follow_font">あなたのフォロー</div>
      <div class="follow_users">
        <div class="follow_user">
          <div class="follow_user_icon"></div>
          <div class="follow_user_name">ユーザー名</div>
        </div>
        <div class="follow_user">
          <div class="follow_user_icon"></div>
          <div class="follow_user_name">ユーザー名</div>
        </div>
        <div class="follow_user">
          <div class="follow_user_icon"></div>
          <div class="follow_user_name">ユーザー名</div>
        </div>
      </div>
      <div class="post_voices">
        最近の投稿
        @if (isset($postVoices))
          @foreach ($postVoices as $postVoice)
            <div class="post_voices_contents">
              <!-- <div class="post_voice_content" style="float:left;"> -->
              <a href="/voice/content/{{$postVoice->id}}"><div class="post_voice_content" style="width: 210px; height: 280px; float:left; margin-right: 30px;">
                <div class="voice_content_icon">
                  <div class="voice_content_icon_img"></div>
                </div>
                <div class="post_voice_title">{{ $postVoice->title }}</div>
                <div class="post_voice_date">{{ $postVoice->created_at->format('Y-m-d') }}</div>
              </div></a>
            </div>
          @endforeach
        @endif
        <div class="post_voices_contents">
          <!-- <div class="post_voice_content" style="float:left;"> -->
          <a href="#"><div class="post_voice_content" style="width: 210px; height: 280px; float:left; margin-right: 30px;">
            <div class="voice_content_icon">
              <div class="voice_content_icon_img"></div>
            </div>
            <div class="post_voice_title">タイトル</div>
            <div class="post_voice_date">2022-9-19</div>
          </div></a>
        </div>
      </div>
    </div>

    @component('components.footer')
    @endcomponent
  </body>
</html>