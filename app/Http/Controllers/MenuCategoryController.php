<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuCategoryController extends Controller
{
    public function index()
    {
        $categories = MenuCategory::withCount('packages')->orderBy('order', 'asc')->get();
        return view('backend.pages.menu-categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);

        MenuCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'order' => $request->order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('menu-categories.index')->with('success', 'Menu Category created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);

        $category = MenuCategory::findOrFail($request->id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'order' => $request->order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('menu-categories.index')->with('success', 'Menu Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = MenuCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('menu-categories.index')->with('success', 'Menu Category deleted successfully.');
    }
}
