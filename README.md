# アプリ
### 音声投稿アプリ
# 概要
このアプリでは、ユーザーが自分で録音した音声を投稿し聴くことができるように作成中です。一つ一つの音声の投稿にしたしてコメントをしてコミュニケーションを取ることもできます。
# 制作背景(意図)
近年、誰でも様々な手段で自ら情報を発信できるようになってきています。その発信の仕方として、動画、テキスト、音声と大きく３つに分けることができます。常にスマホを持ち生活する中で、様々な情報を受信しています。発信者が増えることで様々な情報が世の中に広められていくことは良いことだと思います。しかし、生活をしていく中で情報を得るには、情報の受信の仕方（視聴する、読む、聴く）によっては時間を要します。人によっては、仕事や家事などによって1日24時間の中で情報を得られる時間は限られていると思います。そんな忙しい人でも、先ほどあげた３つの情報を得られるモノの中の「音声」だけは動作をしながら（ながら聴き）情報を得ることが可能です。音声は、可処分時間が少ない中で情報を得るにはとても有効なモノだと思います。これからも、音声は情報を得る手段だけでなく、生活に役立つ働きかけもする機能がよりアップデートされていくと思います。そこで今回はそんな音声に興味を持ったため作成していくことにしました。
# DEMO
## トップページ
![トップページ](https://github.com/KojimaKento/audio_media/blob/master/public/gyazo/0a2a8acb6da6f2c3255dd4b2d7f03af3.gif)<br>
トップページには、ログインユーザーのフォロー中のユーザーの表示、よく聴かれる投稿音声を順番に表示されるように作成中です。他にも、ジャンル別で表示されるように作成したいとも考えています。ヘッターには、検索欄とログインボタンと新規登録ボタンが表示されています。ログインされれば、ログインボタンと新規登録ボタンが表示されている部分にアイコンが表示されるように作成中です。現在は、水色のまるが表示される状態です。検索欄では、キーワード検索ができるように作成する予定です。
## 新規登録画面
![新規登録画面](https://github.com/KojimaKento/audio_media/blob/master/public/gyazo/abebfa842d1e69f0eec79a4d8bfee65a.jpg)<br>
新規登録画面では、名前、メールアドレス、パスワード、パスワード確認を入力し「register」ボタンをクリックすれば新規登録されるように作成中です。<br>
※現在は、Laravel Breezeで作成したデフォルトの新規登録を利用して開発しています。
## ログイン画面
![ログイン画面](https://github.com/KojimaKento/audio_media/blob/master/public/gyazo/c92a0c0d8d6037bd7c294bf29b65c422.jpg)<br>
ログイン画面は、メールアドレス、パスワードを入力し「Login」ボタンをクリックすればログインされる様に作成中です。<br>
※現在は、Laravel Breezeで作成したデフォルトのログインを利用して開発しています。
## ユーザーマイページ
![ユーザーマイページ](https://github.com/KojimaKento/audio_media/blob/master/public/gyazo/2779bcc2d72b70eede319ac792a730f1.gif)<br>
ユーザーマイページには、ユーザーアイコン、ユーザー名、プロフィール、そのユーザーがフォローしているユーザーのアイコンとユーザー名、投稿した音声のタイトルが表示されるよにしています。ユーザーアイコンとプロフィールは、ユーザーが編集したものが表示されるように作成中です。「あなたのフォロー」部分に、フォローしているユーザーが表示されるように作成中です。「最近の投稿」部分には、そのユーザーが投稿した音声のタイトルとユーザーアイコン、投稿日時が表示されるようになっています。最新の投稿順に表示される様になっています。各投稿をクリックとその投稿の詳細画面に遷移します。
## ユーザー情報編集画面
![ユーザー情報編集画面](https://github.com/KojimaKento/audio_media/blob/master/public/gyazo/1bb201528eee97f71274b0ab1a59bc84.gif)<br>
ユーザー情報編集画面では、ユーザーのアイコン、ユーザー名、プロフィールを編集できるように作成中です。保存ボタンをクリックし更新されるようにします。
## 音声投稿画面
![音声投稿画面](https://github.com/KojimaKento/audio_media/blob/master/public/gyazo/f612ce7cfb233b3af36e7213c007acc0.png)<br>
音声投稿画面では、投稿する音声のファイルとそのタイトルを選択と入力をして「投稿する」ボタンをクリックすれば投稿されるようになっています。音声ファイルには必須のバリデーション、タイトルには必須と40文字でのバリデーションをかけています。
## 投稿音声詳細画面
https://user-images.githubusercontent.com/68413995/191041999-bc29572b-c40b-499c-a16a-43d11c4021f5.mov
##### 投稿音声詳細画面説明
音声投稿詳細画面では、その音声を聴くことができる画面です。現在は、音声の再生ができるように作成中です。この画面では、音声の他に、音声を投稿したユーザーのアイコン、ユーザー名、プロフィールが記載され、その投稿された音声に対してのコメントができるようになっています。コメントは、コメント欄をクリックすればコメントボタンが表示されるように作成してあります。また、５つのコメントまでは見ることができますが、6つ目コメント以降は、「もっと見る」ボタンをクリックすれば見ることができるようになっています。全てのコメントが表示されると「閉じる」ボタンが表示され、クリックすると5つのコメント表示だけの部分に戻るように作成しています。今後、いいね機能も作成していく予定です。
# 使用技術（開発環境）
## バックエンド
PHP,Laravel
## フロントエンド
HTML,CSS,jQery
## データベース
MySQL
## ソース管理
GitHub
## エディタ
VScode
## サーバー
Docker
# 課題や今後実装したい機能
- キーワード検索機能
- フォロー、フォロワー機能
- 音声再生機能
- 各ユーザーのユーザー画面
- ユーザーアイコン、プロフィール編集機能
# DB設計
## usersテーブル
|Column|Type|Options|
|------|----|-------|
|id|bigint(20) unsigned|null: NO|
|name|varchar(255)|null: NO|
|email|varchar(255)|null: NO|
|email_verified_at|timestamp|null: YES|
|password|varchar(255)|null: NO|
|remember_token|varchar(100)|null: YES|
|created_at|timestamp|null: YES|
|updated_at|timestamp|null: YES|
|name|varchar(255)|null: NO|
|name|varchar(255)|null: NO|
|icon_image_name|varchar(255)|null: YES|
|icon_image_path|varchar(255)|null: YES|
|profile|text|null: YES|
## Association
- has_many :voices
- has_many :comments
- has_many :likes

## voicesテーブル
|Column|Type|Options|
|------|----|-------|
|id|bigint unsigned|null: NO|
|user_id|bigint unsigned|null: YES|
|upload_data|varchar(255)|null: NO|
|title|text|null: NO|
|created_at|timestamp|null: YES|
|updated_at|timestamp|null: YES|
## Association
- has_many :likes
- has_many :comments
- belongs_to :user

## commentsテーブル
|Column|Type|Options|
|------|----|-------|
|id|bigint unsigned|null: NO|
|comment|text|null: NO|
|user_id|bigint unsigned|null: YES|
|voice_id|bigint unsigned|null: YES|
|created_at|timestamp|null: YES|
|updated_at|timestamp|null: YES|
## Association
- belongs_to :user
- belongs_to :voice

## likesテーブル
|Column|Type|Options|
|------|----|-------|
|id|bigint unsigned|null: NO|
|user_id|bigint unsigned|null: YES|
|voice_id|bigint unsigned|null: YES|
|created_at|timestamp|null: YES|
|updated_at|timestamp|null: YES|
## Association
- belongs_to :user
- belongs_to :voice
