<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>投稿一覧ページ</title>
    <meta name="description" content="自分の想いを届ける">
    <link rel="stylesheet" href="../../css/upload.css">
    <script src="https://kit.fontawesome.com/ad6134a757.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>

  <body>
    @component('components.heater')
    @endcomponent
    
    <div class="each_content_body">
      <div class="content_userInfo">
        <div class="content_user">
          <div class="content_userIcon"></div>
          <div class="content_userName">ユーザー名</div>
        </div>
        <div class="content_user_profile"></div>
        @if (!$like_model->like_exist(Auth::user()->id, $content->id))
          <div class="like_icon">
            <i class="fa-regular fa-heart like-toggle" data-voice-id="{{ $content->id }}"></i>
          </div>
        @else
          <div class="like_icon">
            <i class="fa-solid fa-heart like-toggle liked" data-voice-id="{{ $content->id }}"></i>
          </div>
        @endif
      </div>
      <div class="content_voice">
        <div class="content_voice_title">目標から決めるとダイエットは失敗する？！</div>
        <audio controls src="https://res.cloudinary.com/code-kitchen/video/upload/v1555038697/posts/zk5sldkxuebny7mwlhh3.mp3" type="audio/mp3"></audio>
      </div>
      <div class="comments_to_content">
        <div class="comments_title">コメント</div>

        @if ($errors->has('comment'))
          <div class="comment_error" style="color:red;">{{$errors->first('comment')}}</div>
        @endif
 
        <div class="commnet_to_content">
          <div class="userIcon_of_comment"></div>
          <div class="input_of_comment">
            <form action="/voice/content/post/{{$content->id}}" method="post">
              @csrf
              <textarea class="comment_input" id="comment" type="text" name="comment" placeholder="感想・応援メッセージを書こう"></textarea>
              <div class="btns_of_input">
                <div id="notSendBtn" >やめる</div>
                <button type="submit" id="sendBtn" >コメント</button>
              </div>
            </form>
          </div>
        </div>

        @if (isset($comments_to_voice))
          @foreach ($comments_to_voice as $comment_to_voice)
            <div class="each_comments_info">
              <div class="userIcon_of_eachComment"></div>
              <div class="contents_of_comment">
                <div class="userName_of_comment">{{ $comment_to_voice->user->name }}</div>
                <div class="date_of_comment">{{ $comment_to_voice->created_at->format('Y-m-d') }}</div>
                <div class="comment">{{ $comment_to_voice->comment }}</div>
              </div>
            </div>
          @endforeach
        @endif

        <button class="btn js-btn-more" id="more_btn">もっと見る</button>
        <button class="btn js-btn-close" id="close_btn">閉じる</button>

        @component('components.footer')
        @endcomponent
      </div>
    </div>
  </body>
</html>



<script>
  $(function(){
    $("#sendBtn").hide();
    $("#notSendBtn").hide();
    $('textarea').on('click', function() {
      $("#sendBtn").show();
      $("#notSendBtn").show();
    });
  });

  $(function(){
    $('#notSendBtn').click(function() {
      $("#sendBtn").hide();
      $("#notSendBtn").hide();
    });
  });



  // もっと見るボタン作成
  $(function() {
    var $commentNumbers = $(".comments_to_content .each_comments_info").length;

    var defaultNum = 5;

    var addNum = 3;

    var currentNum = 0;

    $(".comments_to_content").each(function() {
      // moreボタンを表示し、closeボタンを隠す
      $(this).find("#more_btn").show();
      $(this).find("#close_btn").hide();

      $(this).find(".each_comments_info:not(:lt("+defaultNum+"))").hide();

      currentNum = defaultNum;

      $("#more_btn").click(function() {
        currentNum += addNum;

        $(this).parent().find(".each_comments_info:lt("+currentNum+")").slideDown();

        if($commentNumbers <= currentNum) {

          currentNum = defaultNum;

          indexNum = currentNum - 1;

          $("#more_btn").hide();
          $("#close_btn").show();

          $("#close_btn").click(function() {

            $(this).parent().find(".each_comments_info:gt("+indexNum+")").slideUp();

            $(this).hide();
            $("#more_btn").show();
          });
        }
      });
    });
  });


  $(function () {
    let like = $('i .like-toggle');//like-toggleのついたiタグを取得し代入。
    let likeVoiceId; //変数を宣言

    like.on('click', function () {
      let $this = $(this);//this=イベントの発火した要素＝iタグを代入
      likeVoiceId = $this.data('voice-id'); //iタグに仕込んだdata-review-idの値を取得
      //ajax処理スタート
      $.ajax({
        headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },  //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
        url: '/like', //通信先アドレスで、このURLをあとでルートで設定します
        method: 'POST',
        data: { //サーバーに送信するデータ
          'voice_id': likeVoiceId //コントローラに渡すパラメータ
        },
      })
      //通信成功した時の処理
      .done(function (data) {
        $this.toggleClass('liked'); //likedクラスのON/OFF切り替え。
        $this.next('.like-counter').html(data.voice_likes_count);
      })
      //通信失敗した時の処理
      .fail(function () {
        console.log('fail'); 
      });
    })
  })

</script>