<?php

namespace imake\Http\Controllers;

use Illuminate\Http\Request;
use imake\Comment;
use imake\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CommentController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function addComment(Request $request){

        $rules = [
            'product_id' => 'required|integer',
            'product_comment' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors(["error" =>  __('strings.comment_except')])->withInput($request->input());
        }


        if(Product::find($request->get("product_id"))){
            $comment = Comment::create([
                'comment' => $request->get("product_comment"),
                'product_id' => $request->get("product_id"),
                'user_id' => Auth::user()->id,
            ]);
            $comment->save();
            return redirect()->back()->with("message", __('strings.commented'));
        }else{
            return redirect()->back()->withErrors(["error" =>  __('strings.comment_except')])->withInput($request->input());

        }
    }
}
