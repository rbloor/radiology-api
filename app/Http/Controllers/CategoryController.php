<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Resources\Category as CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return CategoryResource::collection($categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        return Category::create([
            'name' => $request->name
        ]);
    }
    
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return new CategoryResource($category);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        return Category::findOrFail($id)->update(
            [
                'name' => $request->name
            ]
        );
    }
    
    public function destroy($id)
    {
        return Category::findOrFail($id)->delete();
    }
}
