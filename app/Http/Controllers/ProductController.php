<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductPostRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\FileUploaderService;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function list(Category $category)
    {
        return view('products.index', ['list' => $category->products]);
    }

    public function create()
    {
        return view('products.create', ['categories' => Category::all()]);
    }

    public function store(ProductPostRequest $request, FileUploaderService $fileUploaderService)
    {
        $validatedData = $request->validated();
        unset($validatedData['image']);
        $product = Product::create(validatedData);
        
        $product->update([
            'image' => $fileUploaderService->uploadPhoto($request->image, $product),
        ]);

        return redirect()->route('products.list', [$validatedDAta['category_id']])->with('status', 'Product created successfully');
    }
}

