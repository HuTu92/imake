<?php

namespace imake;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intervention\Image\ImageManagerStatic;


class Image extends Model
{
	use SoftDeletes;
	protected $table  = 'images';
	public $appends = ['thumbs'];
	protected $fillable =  [
		'file'
	];

	public static $imageSizes = [
		[35, 35],
		[100, 100],
		[400, 400],
		[500, 500],

	];

	public function getThumbsAttribute()
	{
		$thumbs = [];

		foreach(self::$imageSizes as $thumb){
			$thumbs[$thumb[0].'_'.$thumb[1]] = self::getThumb($this->file, $thumb);
		}
		return $thumbs;
	}

	public function products(){
		return $this->belongsToMany("imake\Product", "product_image");
	}

	public function user(){
		return $this->belongsTo("imake\User", "id", "image_id");
	}



	// CUSTOM

	public static function getThumb($image,  Array $size ){
		$basename =  basename($image);
		return str_replace($basename, $size[0]."_".$size[1].'/'.$basename, $image);
	}

	public static function store($image){
		foreach(self::$imageSizes as $thumb){
			$tmb = $image->store("images/".date("Y").'/'.date("m").'/'.date("d").'/'.$thumb[0].'_'.$thumb[1]);
			ImageManagerStatic::make(public_path('uploads').'/'.$tmb)->fit($thumb[0], $thumb[1])->save();
		}
		return $image->store("images/".date("Y").'/'.date("m").'/'.date("d"));
	}


	public static function create($image, $sizes = []){
		$file = self::store($image);

		if(!empty($sizes)){
			ImageManagerStatic::make(public_path('uploads').'/'.$file)->fit($sizes[0], $sizes[1])->save();
		}


		return new self(["file" => asset('uploads').'/'.$file]);
	}

}
