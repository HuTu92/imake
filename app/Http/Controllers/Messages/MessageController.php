<?php

namespace imake\Http\Controllers\Messages;

use Illuminate\Http\Request;
use imake\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use imake\Chat;
use imake\Message;
use Illuminate\Support\Facades\Auth;



class MessageController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']);
    }

    protected function validator(array $data)
    {
        $rules = [
            'chat_id' => 'required|integer',
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
        //
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

        if(Chat::find($request->get("chat_id"))){
            $message = Message::create([
                'message' => $request->get("message"),
                'chat_id' => $request->get("chat_id"),
                'user_id' => Auth::user()->id,
            ]);
            $message->save();
            return redirect()->back()->with("message", __('strings.message_send'));
        }else{
            return redirect()->back()->withErrors(["error" =>  __('strings.message_except')])->withInput($request->input());

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
