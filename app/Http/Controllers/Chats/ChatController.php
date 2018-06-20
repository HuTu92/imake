<?php

namespace imake\Http\Controllers\Chats;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use imake\Chat;
use imake\Http\Controllers\Controller;
use imake\Message;
use Illuminate\Support\Facades\Validator;
use imake\Product;
use imake\User;


class ChatController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']);
    }

    protected function validator(array $data)
    {
        $rules = [
            'product_id' => 'required|integer',
            'message' => 'required',
        ];

        return Validator::make($data, $rules);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //TODO pagination chat count
        $user = Auth::user();
        $chats = Chat::where("user_id",$user->id)->orwhere("vendor_id",$user->id)->orderBy('created_at', 'desc')->paginate(2);
        return view("chats.index", ["chats" => $chats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if($validator->fails()){
            return redirect()->back()->withErrors(["error" =>  __('strings.message_except')])->withInput($request->input());
        }

        $user_id = Auth::user()->id;

        if($chat = Chat::where('user_id', $user_id)->where('product_id', $request->get("product_id"))->first())
        {
            $chat_id = $chat->id;
            $vendor_id = $chat->vendor_id;
        }else{

            $product = Product::findOrFail($request->get("product_id"));
            $vendor_id = $product->vendor->id;


            $chat = Chat::create([
                'product_id' => $request->get("product_id"),
                'user_id' => $user_id,
                'vendor_id' => $vendor_id,
            ]);
            $chat->save();
            $chat_id = $chat->id;
        }


        $message = Message::create([
            'message' => $request->get("message"),
            'chat_id' => $chat_id,
            'user_id' => $user_id,
            'is_read' => 0,
        ]);
        $message->save();
        return redirect()->route('chats.show', $chat->id)->with("message", __('strings.message_send'));



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chat = Chat::findOrFail($id);

        Message::where('chat_id', $chat->id)
            ->whereNotIn('user_id', [Auth::user()->id])
            ->update(['is_read' => 1]);

        if(Auth::user()->can("view", $chat)) {
            return view("chats.show", [
                "chat" => $chat,
                "chat_id"=>$chat->id,
                "messages" => $chat->messages
            ]);
        }

        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
