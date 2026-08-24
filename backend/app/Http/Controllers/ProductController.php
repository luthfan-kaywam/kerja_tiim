<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Product::all());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'category' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product = Product::create($data);

        return response()->json($product, 201);
    }

    public function show(int $id): JsonResponse
    {
        $product = Product::find($id);

        if (! $product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $product = Product::find($id);

        if (! $product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['sometimes', 'numeric', 'min:0'],
            'stock' => ['sometimes', 'integer', 'min:0'],
            'category' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            if ($product->getRawOriginal('image')) {
                Storage::disk('public')->delete($product->getRawOriginal('image'));
            }

            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return response()->json($product);
    }

    public function destroy(int $id): JsonResponse
    {
        $product = Product::find($id);

        if (! $product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        if ($product->getRawOriginal('image')) {
            Storage::disk('public')->delete($product->getRawOriginal('image'));
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted']);
    }
}
