<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voice;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Validator;

class UploadController extends Controller
{

    public function index() {
        $voices = Voice::all();
        return view("upload.index")
            ->with('voices', $voices);
    }

    public function show() {
        return view("upload.post");
    }

    public function post(Request $request) {
        $rules = [
            'upload_data' => 'required',
            'title' => 'required|max:40'
        ];

        $messages = [
            'upload_data.required' => 'ファイルを選択してください。',
            'upload_data.mimetypes' => '音声ファイルを選択してください。',
            'title.required' => 'タイトルを記入してください。',
            'title.max' => 'タイトルは40文字以内で記入してください。',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/voice/post')
                ->withErrors($validator)
                ->withInput();
        }

        $upload_data = $request->file('upload_data');

        if ($upload_data) {
            $upload_data->store('uploads',"public");
        }

        $voice = new Voice;
        $voice->user_id = Auth::id();
        $voice->upload_data = $request->upload_data;
        $voice->title = $request->title;
        $voice->save();
        return redirect()->route('upload.index');

    }

    public function content($id) {
        $content = Voice::find($id);
        $comments_to_voice = Comment::where("voice_id", "=", $content->id)->latest()->get();
        $like_model = new Like;
        return view("upload.content", [
            'content' => $content,
            'comments_to_voice' => $comments_to_voice,
            'like_model' => $like_model,
        ]);
    }

    public function like(Request $request) {
        $user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $voice_id = $request->voice_id; //2.投稿idの取得
        $already_liked = Like::where('user_id', $user_id)->where('voice_id', $voice_id)->first(); //3.

        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $like = new Like; //4.Likeクラスのインスタンスを作成
            $like->voice_id = $voice_id; //Likeインスタンスにvoice_id,user_idをセット
            $like->user_id = $user_id;
            $like->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Like::where('voice_id', $voice_id)->where('user_id', $user_id)->delete();
        }

        //5.この投稿の最新の総いいね数を取得
        $voice_likes_count = Review::withCount('likes')->findOrFail($voice_id)->likes_count;
        $param = [
            'voice_likes_count' => $voice_likes_count,
        ];
        return response()->json($param); //6.JSONデータをjQueryに返す
    }
}
