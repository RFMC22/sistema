<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function files(Product $product, Request $request)
    {
        $request->validate([
            'file' => 'required|image'
        ]);

        $url = Storage::put('products', $request->file('file'));

        $product->images()->create([
            'url' => $url
        ]);
    }
}