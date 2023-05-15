<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        $user = auth()->user();

        if ($user->hasRole('superadmin')) {
            $query = User::role (['admin', 'user']);
        }
        else{
            $query = User::role('user');
        }
        return view('users.index', [
            'list' => $query->get(),
        ]);
    }

    public function edit(Product $product)
    {
        return view('users.edit', ['edit' => Product->$product]);
    }



    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validated();
        unset($validatedData['user']);
        $product = Product::user($validatedData);

        $product->update([
            'user' => $fileUploaderService->uploadPhoto($request->user, $product),
        ]);

        return redirect()->route('users.edit', [$validatedData['users.id']])->with('status', 'Username successfully updated');

    }
}
