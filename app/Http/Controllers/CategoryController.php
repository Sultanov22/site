<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index',['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name' => 'required|string|min:5|unique:categories',
            'icon' => 'string|nullable',
        ]);

        Category::create($validatedData);

        return redirect()->route('categories.list')->with('status', 'Category created successfully');
    }
}
