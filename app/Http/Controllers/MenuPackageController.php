<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\MenuPackage;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MenuPackageController extends Controller
{
    public function index()
    {
        $packages = MenuPackage::with('category', 'items')->orderBy('order', 'asc')->get();
        return view('backend.pages.menu-packages.index', compact('packages'));
    }

    public function create()
    {
        $categories = MenuCategory::where('status', true)->orderBy('order', 'asc')->get();
        return view('backend.pages.menu-packages.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_category_id' => 'nullable|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'order' => 'nullable|integer',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'items' => 'nullable|array',
            'items.*' => 'nullable|string|max:255',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/menu_packages'), $imageName);
            $imagePath = 'uploads/menu_packages/' . $imageName;
        }

        $package = MenuPackage::create([
            'menu_category_id' => $request->menu_category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'subtitle' => $request->subtitle,
            'price' => $request->price,
            'image' => $imagePath,
            'order' => $request->order ?? 0,
            'status' => $request->status,
        ]);

        if ($request->has('items') && is_array($request->items)) {
            $itemNo = 1;
            foreach ($request->items as $itemName) {
                if (!empty(trim($itemName))) {
                    MenuItem::create([
                        'menu_package_id' => $package->id,
                        'name' => trim($itemName),
                        'item_no' => $itemNo,
                        'order' => $itemNo,
                    ]);
                    $itemNo++;
                }
            }
        }

        return redirect()->route('menu-packages.index')->with('success', 'Menu Package created successfully.');
    }

    public function edit($id)
    {
        $package = MenuPackage::with('items')->findOrFail($id);
        $categories = MenuCategory::where('status', true)->orderBy('order', 'asc')->get();
        return view('backend.pages.menu-packages.edit', compact('package', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $package = MenuPackage::findOrFail($id);

        $request->validate([
            'menu_category_id' => 'nullable|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'order' => 'nullable|integer',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'items' => 'nullable|array',
            'items.*' => 'nullable|string|max:255',
        ]);

        $imagePath = $package->image;
        if ($request->hasFile('image')) {
            if ($package->image && file_exists(public_path($package->image))) {
                @unlink(public_path($package->image));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/menu_packages'), $imageName);
            $imagePath = 'uploads/menu_packages/' . $imageName;
        }

        $package->update([
            'menu_category_id' => $request->menu_category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'subtitle' => $request->subtitle,
            'price' => $request->price,
            'image' => $imagePath,
            'order' => $request->order ?? 0,
            'status' => $request->status,
        ]);

        // Re-sync items
        $package->items()->delete();
        if ($request->has('items') && is_array($request->items)) {
            $itemNo = 1;
            foreach ($request->items as $itemName) {
                if (!empty(trim($itemName))) {
                    MenuItem::create([
                        'menu_package_id' => $package->id,
                        'name' => trim($itemName),
                        'item_no' => $itemNo,
                        'order' => $itemNo,
                    ]);
                    $itemNo++;
                }
            }
        }

        return redirect()->route('menu-packages.index')->with('success', 'Menu Package updated successfully.');
    }

    public function destroy($id)
    {
        $package = MenuPackage::findOrFail($id);
        if ($package->image && file_exists(public_path($package->image))) {
            @unlink(public_path($package->image));
        }
        $package->delete();

        return redirect()->route('menu-packages.index')->with('success', 'Menu Package deleted successfully.');
    }
}
