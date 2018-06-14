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


    protected function validator(array $data)
    {
        $rules = [
            'product_id' => 'required|integer',
            'comment' => 'required',
        ];

        return Validator::make($data, $rules);
    }


    public function store(Request $request){

        $validator = $this->validator($request->all());

        if($validator->fails()){
            return redirect()->back()->withErrors(["error" =>  __('strings.comment_except')])->withInput($request->input());
        }


        if(Product::find($request->get("product_id"))){
            $comment = Comment::create([
                'comment' => $request->get("comment"),
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
