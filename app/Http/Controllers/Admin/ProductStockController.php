<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductStock;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    /**
     * Display a listing of all product stock variations.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category_id');

        $query = ProductStock::with('product.category');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('product', function ($pq) use ($search) {
                    $pq->where('name', 'like', "%{$search}%")
                       ->orWhere('slug', 'like', "%{$search}%");
                })
                ->orWhere('size', 'like', "%{$search}%")
                ->orWhere('color', 'like', "%{$search}%");
            });
        }

        if ($categoryId) {
            $query->whereHas('product', function ($pq) use ($categoryId) {
                $pq->where('category_id', $categoryId);
            });
        }

        $stocks = $query->orderBy('id', 'desc')->paginate(10);
        $categories = \App\Models\Category::orderBy('name', 'asc')->get();

        return view('admin.stocks.index', compact('stocks', 'categories', 'search', 'categoryId'));
    }

    /**
     * Store a newly created product stock variant.
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'size' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:50',
            'qty' => 'required|integer|min:0',
        ]);

        // Check if variant size & color combination already exists for this product
        $exists = ProductStock::where('product_id', $product->id)
            ->where('size', $request->size)
            ->where('color', $request->color)
            ->exists();

        if ($exists) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Kombinasi varian ukuran dan warna tersebut sudah terdaftar untuk produk ini.');
        }

        ProductStock::create([
            'product_id' => $product->id,
            'size' => $request->size,
            'color' => $request->color,
            'qty' => $request->qty,
        ]);

        return redirect()->back()
            ->with('success', 'Varian stok berhasil ditambahkan.');
    }

    /**
     * Update the specified product stock quantity.
     */
    public function update(Request $request, Product $product, ProductStock $stock)
    {
        $request->validate([
            'qty' => 'required|integer|min:0',
        ]);

        $stock->update([
            'qty' => $request->qty,
        ]);

        return redirect()->back()
            ->with('success', 'Jumlah stok berhasil diperbarui.');
    }

    /**
     * Remove the specified product stock variant.
     */
    public function destroy(Product $product, ProductStock $stock)
    {
        $stock->delete();

        return redirect()->back()
            ->with('success', 'Varian stok berhasil dihapus.');
    }
}
