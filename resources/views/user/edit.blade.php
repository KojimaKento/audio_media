<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ユーザーマイページ</title>
    <meta name="description" content="自分の想いを届ける">
    <link rel="stylesheet" href="../../css/user.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>

  <body>
    @component('components.heater')
    @endcomponent

    <div class="edit_body">
      <div class="edit_title">ユーザープロフィール編集</div>
      <div class="edit_contents">
        <form action="{{ route('update') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="edit_icon_image"></div>
          @if ($errors->has('icon_image'))
            <div style="color:red;">{{$errors->first('icon_image')}}</div>
          @endif
          <div class="edit_icon_info">
            <div class="edit_name_title">ユーザーアイコン</div>
            <label>
              <input type="file" name="icon_image" value="{{old('icon_image_name')}}" accept="image/png, image/jpeg">アイコンを選択
            </label>
          </div>
          @if ($errors->has('name'))
            <div style="color:red;">{{$errors->first('name')}}</div>
          @endif
          <div class="edit_name_info">
            <div class="edit_name_title">名前(ニックネーム)</div>
            <input class="input_edit_name" type="text" name="name" value="{{ $user->name }}"/>
            <div class="edit_name_fontNum">32文字</div>
          </div>
          @if ($errors->has('profile'))
            <div style="color:red;">{{$errors->first('profile')}}</div>
          @endif
          <div class="edit_profile_info">
            <div class="edit_name_title">自己紹介</div>
            <textarea class="input_edit_profile" type="text" name="profile" row="7">{{ $user->profile }}</textarea>
            <div class="edit_profile_fontNum">150文字</div>
          </div>
          <div class="edit_btns">
            <button type="submit" class="cancel_btn" >キャンセル</button>
            <button type="submit" class="profile_btn" >保存する</button>
          </div>
        </form>
      </div>
    </div>

    @component('components.footer')
    @endcomponent
  </body>
</html>

<script>
  $('.edit_icon_info label input').on('change', function () {
    var file = $(this).prop('files')[0];
    $('label').text(file.name);
  });
</script>