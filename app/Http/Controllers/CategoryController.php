<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // ======================
    // INDEX
    // ======================
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // ======================
    // CREATE
    // ======================
    public function create()
    {
        return view('categories.create');
    }

    // ======================
    // STORE
    // ======================
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        Category::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('categories.index')
            ->with('success','Kategori berhasil ditambah');
    }

    // ======================
    // EDIT
    // ======================
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // ======================
    // UPDATE
    // ======================
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('categories.index')
            ->with('success','Kategori berhasil diupdate');
    }

    // ======================
    // DELETE
    // ======================
    public function destroy($id)
    {
        Category::destroy($id);

        return redirect()->route('categories.index')
            ->with('success','Kategori berhasil dihapus');
    }
}