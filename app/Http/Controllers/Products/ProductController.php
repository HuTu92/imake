<?php

namespace imake\Http\Controllers\Products;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use imake\Category;
use imake\Color;
use imake\Http\Controllers\Controller;
use imake\Image;
use imake\Product;
use imake\Tag;
use imake\User;

class ProductController extends Controller
{


	public function __construct() {
		$this->middleware(['auth', 'auth.vendor'])->only(['create', 'edit', 'store', 'update', 'destroy']);
	}

	protected function validator(array $data)
	{

	    if($data["fileuploader-list-images"] == "[]"){
            $data["fileuploader-list-images"] = null;
        }

		$rules = [
			'name' => 'required|string|max:255',
			'description' => 'required|string|max:5000',
			//'currency' => 'required|string',
			'regular_price' => 'required|numeric',
			'sale_price' => 'nullable|numeric|less_than_field:regular_price',
			'categories' => 'exists:categories,id',
			'colors' => 'exists:colors,id',
			'tags' => 'exists:tags,id',
			'fileuploader-list-images' => 'required|string|min:10',
			'length' => 'nullable|numeric',
			'width' => 'nullable|numeric',
			'height' => 'nullable|numeric',
			'weight' => 'nullable|numeric',
			'stock' => 'required|integer',
		];

		return Validator::make($data, $rules, [
            'fileuploader-list-images.required' => __('strings.fileuploader-list-images'),
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
	    return view( 'shop' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view("products.create", [
					        'user' =>Auth::user(),
					        'categories' => Category::all(),
		                    'colors' => Color::all(),
		                    'tags' => Tag::all(),
						    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $validator = $this->validator($request->all());
	    if(!$validator->fails()) {

	    	$user                       = Auth::user();
		    $product                    = new Product();

	    	if($user->cannot("add", $product)){
	    		return redirect()->back()->withErrors(["error" =>  Lang::get('strings.access-denied')])->withInput($request->input());
		    }

		    $user->load("vendor");

		    $product->name              = $request->get( 'name' );
		    $product->description       = $request->get( 'description' );
		    $product->regular_price     = $request->get( 'regular_price' );
		    $product->sale_price        = $request->get( 'sale_price' );
		    $product->length            = $request->get( 'length' );
		    $product->width             = $request->get( 'width' );
		    $product->height            = $request->get( 'height' );
		    $product->weight            = $request->get( 'weight' );
		    $product->stock             = $request->get( 'stock' );
		   // $product->currency          = $request->get( 'currency' );
		    $product->user_id           = $user->id;
		    $product->vendor_id         = $user->vendor->id;

		    $product->save();

		    $product->categories()->saveMany(
			    Category::find($request->get( 'categories', []))
		    );

		    $product->colors()->saveMany(
		        Color::find($request->get('colors', []))
		    );

		    $product->tags()->saveMany(
		        Tag::find($request->get('tags', []))
		    );


		   if(!empty($request->{"fileuploader-list-images"})){
		       $images = json_decode($request->{"fileuploader-list-images"});
		       if(!empty($images)) {
                   $product_images = [];
                   foreach ($images as $image) {
                       $file = Image::where("file", str_replace("0:/", "", $image->file))->first();
                       if($file){
                           $product_images[] = $file;
                       }
                   }
                    if(!empty($product_images)){
                        $product->images()->saveMany(
                            $product_images
                        );
                    }
               }
           }

		    return redirect()->route('products.show', $product->id);
	    }else{
		    return redirect()->back()->withErrors($validator)->withInput($request->input());
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
    	if($product = Product::with("categories", "colors", "tags", "vendor", "user", "images")->find($id)){
		    return view( 'products.product', ["product" => $product] );
	    }
	    abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


	    if($product = Product::with("categories", "colors", "tags", "vendor", "user", "images")->find($id)){
		    $user = Auth::user();
		    if($user->cannot("update", $product)){
			    return redirect()->route("products.my");
		    }

		    return view( 'products.edit', [
								        "product" => $product,
									    'user' => $user,
									    'categories' => Category::all(),
									    'colors' => Color::all(),
									    'tags' => Tag::all(),
								    ] );
	    }
	    abort(404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

	    $validator = $this->validator($request->all());
	    if(!$validator->fails()) {

		    $product = Product::findOrFail( $id );
		    $user = Auth::user();

		    if($user->cannot("update", $product)){
			    return redirect()->back()->withErrors(["error" =>  Lang::get('strings.access-denied')])->withInput($request->input());
		    }

		    $product->categories()->sync(
			    Category::find($request->get("categories", []))
		    );

		    $product->colors()->sync(
			    Color::find($request->get('colors', []))
		    );

		    $product->tags()->sync(
			    Tag::find($request->get('tags', []))
		    );

		    $product->images()->sync(
			    Image::find($request->get('old_images', []))
		    );



            if(!empty($request->{"fileuploader-list-images"})){
                $images = json_decode($request->{"fileuploader-list-images"});
                if(!empty($images)) {
                    $product_images = [];
                    foreach ($images as $image) {
                        $product_images[] = Image::where("file", str_replace("0:/", "", $image->file))->first();
                    }

                    $product->images()->saveMany(
                        $product_images
                    );
                }
            }

		    $product->update($request->all());


		    return redirect()->back()->with("message", Lang::get('strings.product-success-updated'));
	    }else{
		    return redirect()->back()->withErrors($validator)->withInput($request->input());
	    }
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
