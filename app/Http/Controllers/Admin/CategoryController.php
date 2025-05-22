<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->paginate(10);
        return view('layouts.pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('layouts.pages.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|unique:categories,name',
            ],
            [
                'name.required' => 'Kategori harus diisi',
                'name.unique' => 'Kategori sudah ada',
            ]
        );

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        return redirect('/categories')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('layouts.pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'name' => 'required|unique:categories,name',
            ],
            [
                'name.required' => 'Kategori harus diisi',
                'name.unique' => 'Kategori sudah ada',
            ]
        );

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        return redirect('/categories')->with('success', 'Kategori berhasil diubah');
    }

    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return redirect('/categories')->with('success', 'Kategori berhasil dihapus');
    }
}
