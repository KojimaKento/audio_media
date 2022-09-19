<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Voice;
use Illuminate\Support\Facades\Auth;
use Validator;

class CommentController extends Controller
{
    public function post(Request $request, $id) {

        $get_voice_id = Voice::find($id);

        $rules = [
            'comment' => 'required|max:250'
        ];

        $messages = [
            'comment.required' => 'コメントを入力してください。',
            'comment.max' => '250文字以内でコメントしてください。',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $comment = new Comment();

        $comment->comment = $request->comment;
        $comment->voice_id = $get_voice_id->id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return view('commented');
    }

    public function commented() {
        return view('commented');
    }
}
