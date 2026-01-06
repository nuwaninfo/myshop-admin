<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('pages.categories.index');
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(Request $request)
    {
        // Logic to store a new category
    }

    public function edit($category)
    {
        return view('pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $category)
    {
        // Logic to update the category
    }

    public function delete($category)
    {
        // Logic to delete the category
    }

    public function status($category)
    {
        // Logic to toggle the status of the category
    }
}
