<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::withCount('items')->orderBy('sort_order', 'asc')->get();
        return view('backend.pages.packages.index', compact('packages'));
    }

    public function create()
    {
        return redirect()->route('packages.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/packages'), $imageName);
            $imagePath = 'uploads/packages/' . $imageName;
        }

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;
        while (Package::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        Package::create([
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('packages.index')->with('success', 'Package created successfully.');
    }

    public function show($id)
    {
        $package = Package::with('items')->findOrFail($id);
        if (request()->wantsJson() || request()->ajax()) {
            return response()->json($package);
        }
        return redirect()->route('packages.index');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        if (request()->wantsJson() || request()->ajax()) {
            return response()->json($package);
        }
        $packages = Package::withCount('items')->orderBy('sort_order', 'asc')->get();
        return view('backend.pages.packages.index', compact('packages', 'package'));
    }

    public function update(Request $request, $id = null)
    {
        $packageId = $id ?? $request->id;

        $request->validate([
            'id' => 'nullable|exists:packages,id',
            'name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ]);

        $package = Package::findOrFail($packageId);

        $imagePath = $package->image;
        if ($request->hasFile('image')) {
            if ($package->image && file_exists(public_path($package->image))) {
                @unlink(public_path($package->image));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/packages'), $imageName);
            $imagePath = 'uploads/packages/' . $imageName;
        }

        if ($package->name !== $request->name) {
            $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $count = 1;
            while (Package::where('slug', $slug)->where('id', '!=', $package->id)->exists()) {
                $slug = "{$originalSlug}-{$count}";
                $count++;
            }
        } else {
            $slug = $package->slug;
        }

        $package->update([
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        if ($package->image && file_exists(public_path($package->image))) {
            @unlink(public_path($package->image));
        }
        $package->delete();

        return redirect()->route('packages.index')->with('success', 'Package deleted successfully.');
    }
}
