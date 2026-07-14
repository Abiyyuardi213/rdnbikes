<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductStock;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the shopping cart page.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['qty'];
        }

        // Build WhatsApp Checkout message
        $waMessage = "Halo RDN Bikes, saya ingin memesan produk berikut:\n\n";
        $index = 1;
        foreach ($cart as $item) {
            $optionStr = isset($item['option']) ? " ({$item['option']})" : "";
            $variantStr = isset($item['variant']) && $item['variant'] ? " - [{$item['variant']}]" : "";
            $priceFormatted = 'Rp ' . number_format($item['price'] * $item['qty'], 0, ',', '.');
            $waMessage .= "{$index}. {$item['name']}{$optionStr}{$variantStr}\n";
            $waMessage .= "   Qty: {$item['qty']} x Rp " . number_format($item['price'], 0, ',', '.') . " = {$priceFormatted}\n\n";
            $index++;
        }
        $waMessage .= "Total Harga: Rp " . number_format($subtotal, 0, ',', '.') . "\n\n";
        $waMessage .= "Mohon informasi ketersediaan stok & ongkos kirim ke alamat saya. Terima kasih!";
        
        $waLink = "https://wa.me/628123456789?text=" . rawurlencode($waMessage);

        return view('cart.index', compact('cart', 'subtotal', 'waLink'));
    }

    /**
     * Add a product variant to the cart.
     */
    public function add(Request $request, Product $product)
    {
        $request->validate([
            'qty' => 'required|integer|min:1',
            'option' => 'nullable|string', // e.g. "Full Bike" or "Frame Only"
            'variant' => 'nullable|string', // e.g. "Ukuran S / Warna Hitam"
        ]);

        $qty = $request->input('qty', 1);
        $option = $request->input('option', 'Full Bike');
        $variant = $request->input('variant');

        // Determine price based on bike option
        $price = $product->price;
        if ($option === 'Frame Only' && $product->allow_frame_only) {
            $price = $product->frame_only_price ?? $product->price;
        }

        // Verify stock levels from variants
        if ($product->stocks()->exists()) {
            if (!$variant) {
                return redirect()->back()
                    ->with('error', 'Silakan pilih varian ukuran & warna terlebih dahulu.');
            }

            // Extract size & color from dropdown format (Ukuran S / Warna Hitam)
            $size = null;
            $color = null;
            if (preg_match('/Ukuran\s+([^\/]+)\s*\/\s*Warna\s+(.+)/i', $variant, $matches)) {
                $size = trim($matches[1]);
                $color = trim($matches[2]);
            }

            $stockQuery = ProductStock::where('product_id', $product->id);
            if ($size) {
                $stockQuery->where('size', $size);
            }
            if ($color) {
                $stockQuery->where('color', $color);
            }
            
            $dbStock = $stockQuery->first();
            if (!$dbStock || $dbStock->qty < $qty) {
                return redirect()->back()
                    ->with('error', 'Stok varian terpilih tidak mencukupi untuk jumlah yang dipesan.');
            }
        } else {
            // General fallback total stock check
            if ($product->total_stock < $qty) {
                return redirect()->back()
                    ->with('error', 'Stok produk tidak mencukupi untuk jumlah yang dipesan.');
            }
        }

        $cartKey = $product->id . '_' . md5($option . $variant);
        $cart = session()->get('cart', []);

        if (isset($cart[$cartKey])) {
            // Check stock logic again for aggregated quantity
            $newQty = $cart[$cartKey]['qty'] + $qty;
            if ($product->stocks()->exists()) {
                if (isset($dbStock) && $dbStock->qty < $newQty) {
                    return redirect()->back()
                        ->with('error', 'Jumlah total varian ini di keranjang melebihi stok yang tersedia.');
                }
            } else {
                if ($product->total_stock < $newQty) {
                    return redirect()->back()
                        ->with('error', 'Jumlah total produk ini di keranjang melebihi stok yang tersedia.');
                }
            }
            $cart[$cartKey]['qty'] = $newQty;
        } else {
            $cart[$cartKey] = [
                'id' => $product->id,
                'slug' => $product->slug,
                'name' => $product->name,
                'image' => $product->image,
                'price' => $price,
                'option' => $option,
                'variant' => $variant,
                'qty' => $qty
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    /**
     * Update the quantity of a cart item.
     */
    public function update(Request $request, $key)
    {
        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);
        if (!isset($cart[$key])) {
            return redirect()->back()->with('error', 'Item tidak ditemukan di keranjang.');
        }

        $qty = $request->input('qty');
        $product = Product::find($cart[$key]['id']);

        if ($product) {
            // Check stocks limit
            if ($product->stocks()->exists()) {
                $variant = $cart[$key]['variant'];
                $size = null;
                $color = null;
                if (preg_match('/Ukuran\s+([^\/]+)\s*\/\s*Warna\s+(.+)/i', $variant, $matches)) {
                    $size = trim($matches[1]);
                    $color = trim($matches[2]);
                }

                $stockQuery = ProductStock::where('product_id', $product->id);
                if ($size) {
                    $stockQuery->where('size', $size);
                }
                if ($color) {
                    $stockQuery->where('color', $color);
                }
                
                $dbStock = $stockQuery->first();
                if (!$dbStock || $dbStock->qty < $qty) {
                    return redirect()->back()
                        ->with('error', "Stok untuk {$cart[$key]['name']} varian {$cart[$key]['variant']} tidak mencukupi.");
                }
            } else {
                if ($product->total_stock < $qty) {
                    return redirect()->back()
                        ->with('error', "Stok untuk {$cart[$key]['name']} tidak mencukupi.");
                }
            }
        }

        $cart[$key]['qty'] = $qty;
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Jumlah pesanan berhasil diperbarui.');
    }

    /**
     * Remove an item from the cart.
     */
    public function remove($key)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    /**
     * Clear the cart.
     */
    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Keranjang belanja berhasil dikosongkan.');
    }
}
