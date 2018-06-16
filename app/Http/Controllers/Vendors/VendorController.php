<?php

namespace imake\Http\Controllers\Vendors;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use imake\Http\Controllers\Controller;
use imake\Image;
use Countries;
use imake\Vendor;

class VendorController extends Controller
{


    public function __construct() {
        $this->middleware(['auth', 'auth.vendor'])->only(['create', 'edit', 'store', 'update', 'destroy']);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'shop_name' => 'required|string|max:255',
            'shop_description' => 'required|string',
            'shop_country' => 'required|country',
            'logo' => 'image',

        ]);
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
        $vendor = Vendor::findOrFail($id);
        return view("vendors.show", ["vendor" => $vendor, 'country' => Countries::where('name.common', $vendor->shop_country)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view( 'vendors.edit', ['countries' => Countries::all(), "id" => $id] );
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
        $validator = $this->validator($request->all());

        $user = Auth::user();
        $user->load("vendor");

        if(!$validator->fails()) {


            $user->vendor->image_id = null;

            if(!empty(json_decode($request->{"fileuploader-list-logo"}))){
                if($request->hasFile("logo")){
                    $image = Image::create( $request->file("logo"), [500,500] );
                    $image->save();
                    $user->vendor->image_id = $image->id;
                }else{
                    $image = Image::where("file", json_decode($request->{"fileuploader-list-logo"})[0]->file)->first();
                    if($image){
                        $user->vendor->image_id = $image->id;
                    }
                }
            }

            $user->vendor->shop_name         = $request->get( 'shop_name' );
            $user->vendor->shop_description  = $request->get( 'shop_description' );
            $user->vendor->shop_country      = $request->get( 'shop_country' );

            $user->vendor->save();

        }else{
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }
        return redirect()->back()->with("message", __('strings.account-success-updated'));
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
