<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderBy('id', 'asc')->paginate(10);
        return view('layouts.pages.products.index', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('layouts.pages.products.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'sku' => 'required',
            'category_id' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'price.required' => 'Harga harus diisi',
            'stock.required' => 'Stok harus diisi',
            'sku.required' => 'SKU harus diisi',
            'category_id.required' => 'Kategori harus diisi',
        ]);

        $product = Product::create($validated);
        return redirect('/products')->with('success', 'Product berhasil ditambahkan');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('layouts.pages.products.edit', [
            'categories' => $categories,
            'product' => $product,
        ]);
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'sku' => 'required',
            'category_id' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'price.required' => 'Harga harus diisi',
            'stock.required' => 'Stok harus diisi',
            'sku.required' => 'SKU harus diisi',
            'category_id.required' => 'Kategori harus diisi',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'sku' => $request->input('sku'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect('/products')->with('success', 'Product berhasil diubah');
    }

    public function delete($id)
    {
        $product = Product::where('id', $id);
        $product->delete();

        return redirect('/products')->with('success', 'Product berhasil dihapus');
    }
}
