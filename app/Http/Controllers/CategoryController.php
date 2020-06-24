<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Model\Category;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function storeCategory(Request $request){
        //Category::create($request->all());
        $category = new Category;

        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();
        return response('Created', Response::HTTP_CREATED);
    }

    public function getAllCategory(){
      return CategoryResource::collection(Category::latest()->get());
    }

    public function getSingleCategory(Category $category){
        return new CategoryResource($category);
    }

    public function updateCategory(Category $category, Request $request){
        $category->update(
            [
                'name' => $request->name,
                'slug' => str_slug($request->name)
            ]);

        return response('Updated', Response::HTTP_ACCEPTED);
    }

    public function deleteCategory(Category $category){
        try {
            $category->delete();
            return response(null, Response::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            return "an error occurred";
        }

    }
}
