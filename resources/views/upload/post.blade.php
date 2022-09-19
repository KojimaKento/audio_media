<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>音声投稿ページ</title>
    <meta name="description" content="自分の想いを届ける">
    <link rel="stylesheet" href="../css/upload.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>

  <body>
    @component('components.heater')
    @endcomponent
    

    <div class="upload_contents">
      <div class="title">放送の投稿</div>
      <form method="post" action="{{ route('upload.post') }}" enctype="multipart/form-data">
        @csrf
        <div class="upload_fonts">
          <div class="upload_font">音源をアップロード</div>
          <div class="must_font">必須</div>
        </div>
        @if ($errors->has('upload_data'))
        <div style="color:red;">{{$errors->first('upload_data')}}</div>
        @endif

        <div class="sound">
          <label>
            <input type="file" name="upload_data">ファイルを選択
          </label>
          <p>選択されていません</p>
        </div>

        <div class="upload_fonts">
          <div class="upload_font">タイトル</div>
          <div class="must_font">必須</div>
        </div>
        @if ($errors->has('title'))
        <div style="color:red;">{{$errors->first('title')}}</div>
        @endif

        <!-- <input type="text" name="upload_title" class="upload_title"> -->
        <textarea name="title" class="upload_title"></textarea>
        <div class="text_validate_fonts">・40文字以内</div>

        <button type="submit">投稿する</button>
      </form>
    </div>
  </body>
</html>

<script>
  $('input').on('change', function () {
    var file = $(this).prop('files')[0];
    $('p').text(file.name);
  });
</script>