$(function () {
  let like = $('.like-toggle');//like-toggleのついたiタグを取得し代入。
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
