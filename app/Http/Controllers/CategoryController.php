<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends ParentController
{
    public function index()
    {
        $response['categories'] = Category::all();
        return view('pages.categories.index')->with($response);
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = STR::slug($request->name);

        Category::create($data);
        return redirect()->route('categories.index');
    }

    public function edit($category_id)
    {
        $response['category'] = Category::find($category_id);
        return view('pages.categories.edit')->with($response);
    }

    public function update(Request $request, $category_id)
    {
        $data = $request->all();
        $data['slug'] = STR::slug($request->name);

        Category::find($category_id)->update($data);
        return redirect()->route('categories.index');
    }

    public function delete($category_id)
    {
        $category = Category::find($category_id);
        $category->delete();
        return redirect()->route('categories.index');
    }

    public function status($category_id)
    {
        $category = Category::find($category_id);
        if ($category->status == 1) {
            $category->status = 0;
        } else {
            $category->status = 1;
        }
        $category->save();
        return redirect()->route('categories.index');
    }
}
