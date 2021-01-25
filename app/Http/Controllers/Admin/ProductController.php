<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\ProductsModel\Products;
use Validator;

class ProductController extends Controller
{
    public function Uploadproduct(Request $request){

    	$this->validate($request,[
    		'name' => 'required',
			'long_description' => 'required|string|min:20',
			'short_description' => 'required|string|min:20',
			'SRP' => 'required|min:1',
			'price' => 'required|min:1',
			'primary' => 'required',
			'primary_cat' => 'required',
			'image' => 'required'
    	]);

    	$product = new Products;
    	$product->name = Str::slug($request->name);
		$product->long_description = $request->long_description;
		$product->short_description = $request->short_description;
		$product->SRP = $request->SRP;
		$product->price = $request->price;
		$product->primary = $request->primary;
		$product->primary_cat = $request->primary_cat;
		$product->image = $request->image;

		if($product->Save()){
			$image_name = time(). $request->image . '.' . $value->getClientOriginalExtension();
	        $value->move(public_path('products'), $image_name);
	        $image->image_path = 'products/' . $image_name;
	        $image->save();

	        return response()->json([
	        'success' => true,
	        'message' => 'Product Successfully added.'
	      ]);
		}
		else{
return response()->json([
        'success' => false,
        'message' => 'Can`t upload product.'
      ]);
		}

    	// $validation = validate($request->all(),[
     //        'fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
     //    ]);

        // $validation = Validator::make($request->all(),[
        //     'fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        // ]);

        // $request->validate([
        //     'fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        // ]);
    

        // if($validation->passes()){
          //   if($request->srp > $request->price){

		        // $imageName = time().'.'.$request->fileUpload->extension();  
		     
		        // $request->fileUpload->move(public_path('products/images'), $imageName);


                // $image = $request->file('fileUpload');
                // $new_name = rand() . '.' . $image->extension();
                // $image->move(public_path('products/images'), $new_name);
                
            //     $value = array(
            //         "id" => 1,
            //         "sellerId" => "Test",
            //         "itemId" => 1,
            //         "supplierId" => 1,
            //         "name" => $request->productname,
            //         "long_description" => $request->shortdesc,
            //         "short_description" => $request->longdesc,
            //         "SRP" => $request->srp,
            //         "price" => $request->price,
            //         "primary" => $request->category,
            //         "primary_cat" => $request->category,
            //         "image" => $request->category,
            //         "status" => 1
            //     );
            //     $insert = Products::insert($value);
            //     if($insert){
            //         return json_encode(array(
            //             "result" => "success",
            //             "message" => "Product successfully uploaded"
            //         ));
            //     }
            // }
            // else{
            //     return json_encode(array(
            //         "result" => "failed",
            //         "message" => "Price should be less than to mall price"
            //     ));
            // }
        // }
        // else{
        //     return json_encode(array(
        //         "result" => "failed",
        //         "message" => "Invalid image format!"
        //     ));
        // }
    }
}
