<?php

namespace imake\Http\Controllers\Chats;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use imake\Chat;
use imake\Http\Controllers\Controller;
use imake\Message;

class ChatController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']);
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
        $chats = Chat::where("user_id",$user->id)->orwhere("vendor_id",$user->id)->orderBy('created_at', 'desc')->paginate(1);
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
        //
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
