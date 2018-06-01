<?php

namespace imake\Http\Controllers;

use Illuminate\Http\Request;
use imake\Image;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{

    protected function validator(array $data)
    {
        $rules = [
            'images' => 'required|image',
        ];
        return Validator::make($data, $rules);
    }

    public function store(Request $request)
    {

        if($request->hasFile("images")){

            $validator = $this->validator(['images'=>$request->file("images")[0]]);
            if(!$validator->fails()) {
                $image = Image::create($request->file("images")[0]);
                $image->save();
                echo $image->file;
            }
        }
        exit;
    }

}
