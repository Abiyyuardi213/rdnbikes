<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BikeProductController extends Controller
{
    /**
     * Display a listing of the resource (only bikes category).
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $subcategory = $request->input('subcategory');

        $bikesCategory = Category::where('slug', 'bikes')->first();
        $categoryId = $bikesCategory ? $bikesCategory->id : null;

        $products = Product::query()
            ->where('category_id', $categoryId)
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($subcategory, function ($query, $subcategory) {
                $query->where('subcategory', $subcategory);
            })
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('admin.products.index', compact('products', 'search', 'subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Get default category ID of "bikes"
        $bikesCategory = Category::where('slug', 'bikes')->first();
        $categoryId = $bikesCategory ? $bikesCategory->id : null;

        // 2. Auto-generate slug from name
        $request->merge([
            'slug' => Str::slug($request->name),
            'category_id' => $categoryId
        ]);

        // 3. Set default image path based on subcategory
        $imagePath = '/images/hero_road_bike.png';
        if ($request->subcategory == 'Gravel Bikes') {
            $imagePath = '/images/category_gravel.png';
        }

        // Handle uploaded image
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('images/products'), $filename);
            $imagePath = '/images/products/' . $filename;
        }

        // 4. Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'subcategory' => 'required|in:Road Bikes,Gravel Bikes',
            'price' => 'required|numeric|min:0',
            'allow_frame_only' => 'nullable',
            'frame_only_price' => 'required_if:allow_frame_only,1|nullable|numeric|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'specs' => 'required|array',
            'specs.Frame' => 'required|string',
            'specs.Groupset' => 'required|string',
            'specs.Weight' => 'required|string',
        ]);

        // 5. Parse features from textarea newlines
        $features = [];
        if ($request->filled('features_text')) {
            $features = array_values(array_filter(array_map('trim', explode("\n", $request->features_text))));
        }

        $allowFrameOnly = $request->has('allow_frame_only');
        $frameOnlyPrice = $allowFrameOnly ? $request->frame_only_price : null;

        // 6. Create product
        Product::create([
            'category_id' => $categoryId,
            'subcategory' => $request->subcategory,
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'allow_frame_only' => $allowFrameOnly,
            'frame_only_price' => $frameOnlyPrice,
            'description' => $request->description,
            'image' => $imagePath,
            'specs' => $request->specs,
            'features' => $features
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk sepeda baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        
        // Convert features array back to text block for edit textarea
        $featuresText = '';
        if (is_array($product->features)) {
            $featuresText = implode("\n", $product->features);
        }

        return view('admin.products.edit', compact('product', 'featuresText'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // 1. Get default category ID of "bikes"
        $bikesCategory = Category::where('slug', 'bikes')->first();
        $categoryId = $bikesCategory ? $bikesCategory->id : null;

        // 2. Auto-generate slug from name
        $request->merge([
            'slug' => Str::slug($request->name),
            'category_id' => $categoryId
        ]);

        // Handle uploaded image
        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('images/products'), $filename);
            $imagePath = '/images/products/' . $filename;
        }

        // 4. Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
            'subcategory' => 'required|in:Road Bikes,Gravel Bikes',
            'price' => 'required|numeric|min:0',
            'allow_frame_only' => 'nullable',
            'frame_only_price' => 'required_if:allow_frame_only,1|nullable|numeric|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'specs' => 'required|array',
            'specs.Frame' => 'required|string',
            'specs.Groupset' => 'required|string',
            'specs.Weight' => 'required|string',
        ]);

        // 5. Parse features from textarea newlines
        $features = [];
        if ($request->filled('features_text')) {
            $features = array_values(array_filter(array_map('trim', explode("\n", $request->features_text))));
        }

        $allowFrameOnly = $request->has('allow_frame_only');
        $frameOnlyPrice = $allowFrameOnly ? $request->frame_only_price : null;

        // 6. Update product
        $product->update([
            'category_id' => $categoryId,
            'subcategory' => $request->subcategory,
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'allow_frame_only' => $allowFrameOnly,
            'frame_only_price' => $frameOnlyPrice,
            'description' => $request->description,
            'image' => $imagePath,
            'specs' => $request->specs,
            'features' => $features
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Data produk sepeda berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk sepeda berhasil dihapus.');
    }
}
