<?php

namespace imake\Http\Controllers;

use Illuminate\Http\Request;
use imake\Image;

class ImageController extends Controller
{
    //
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        if($request->hasFile("images")){
            $image = Image::create( $request->file("images")[0]);
            $image->save();
            echo $image->file;
        }else{
            //TODO VALIDATE
            echo "oops;";
        }
        exit;
    }

}
