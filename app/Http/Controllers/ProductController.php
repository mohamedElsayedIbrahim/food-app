<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Services\LocalStorage\LocalStorageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = product::get();
        // $products = product::paginate(10);
        // ProductResource::collection($products);
        return $this->sendsuccess($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $valitation = Validator::make($request->all(),[
            'recipe_name'=>'required|string',
            'ingredients'=>'required|string',
            'nutritional_info'=>'required|string',
            'price'=>'required|numeric',
            'image'=>'required|image|mimes:png,jpg,webP,jpeg',
            'category'=>'required|exists:categories,id'
        ]);

        if ($valitation->fails()) {
            # code...
            return $this->sendError($valitation->errors());
        }

        $name = "";
        if ($request->hasFile('image')) {
            # code...
            $storage_data = LocalStorageService::storeFile($request->file('image'),'product');
            $name = $storage_data['path'];
        }

        try {
            //code...
            Product::create([
                'recipe_name'=>$request->recipe_name,
                'ingredients'=>$request->ingredients,
                'nutritional_info'=>$request->nutritional_info,
                'price'=>$request->price,
                'category_id'=>$request->category,
                'image'=>$name,
            ]);
    
            return $this->sendsuccess(['message'=>'created successfully']);

        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError(['messgae'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {        
        return $this->sendsuccess(new ProductResource($product));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        $id = $product->id;
        //
        $valitation = Validator::make($request->all(),[
            'recipe_name'=>"required|string|unique:products,recipe_name,$id",
            'ingredients'=>'required|string',
            'nutritional_info'=>'required|string',
            'price'=>'required|numeric',
            'image'=>'nullable|image|mimes:png,jpg,webP,jpeg',
            'category'=>'required|exists:categories,id'
        ]);

        if ($valitation->fails()) {
            # code...
            return $this->sendError($valitation->errors());
        }

        $name = $product->image;

        if ($request->hasFile('image')) {
            # code...
            $storage_data = LocalStorageService::updateFile($name,$request->file('image'),'product');
            $name = $storage_data['path'];
        }

        try {
            //code...
            $product->update([
                'recipe_name'=>$request->recipe_name,
                'ingredients'=>$request->ingredients,
                'nutritional_info'=>$request->nutritional_info,
                'price'=>$request->price,
                'category_id'=>$request->category,
                'image'=>$name,
            ]);
    
            return $this->sendsuccess(['message'=>'Updated successfully']);

        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError(['messgae'=>$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
        if ($product->image) {
            # code...
            LocalStorageService::deleteFile($product->image,'product');
        }

        $product->delete();
        return $this->sendsuccess(['message'=>'Deleted Successfully']);
    }
}
