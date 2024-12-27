<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category\CategoryListResource;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_site()
    {
        //
        $categories = Category::get();
        return $this->sendsuccess(CategoryResource::collection($categories));
    }

    public function index()
    {
        //
        $categories = Category::get();
        // $categories = Category::paginate(10);
        // CategoryListResource::collection($categories);
        return $this->sendsuccess($categories);
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
            'category_title'=>'required|string|unique:categories,category_title',
        ]);

        if ($valitation->fails()) {
            # code...
            return $this->sendError($valitation->errors());
        }

        try {
            //code...
            Category::create([
                'category_title'=>$request->category_title,
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
    public function show(Category $category)
    {
        //
        return $this->sendsuccess(new CategoryListResource($category));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $valitation = Validator::make($request->all(),[
            'category_title'=>"required|string|unique:categories,category_title,$category->id",
        ]);

        if ($valitation->fails()) {
            # code...
            return $this->sendError($valitation->errors());
        }

        try {
            //code...
            $category->update([
                'category_title'=>$request->category_title,
            ]);
    
            return $this->sendsuccess(['message'=>'created successfully']);

        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError(['messgae'=>$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return $this->sendsuccess(['message'=>'Deleted Successfully']);
    }
}
