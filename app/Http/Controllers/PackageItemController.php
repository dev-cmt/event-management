<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackageItem;
use App\Models\PackageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageItemController extends Controller
{
    public function index()
    {
        $items = PackageItem::with('package', 'galleries')->orderBy('sort_order', 'asc')->get();
        return view('backend.pages.package-items.index', compact('items'));
    }

    public function create()
    {
        $packages = Package::orderBy('sort_order', 'asc')->get();
        return view('backend.pages.package-items.create', compact('packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'gallery_captions.*' => 'nullable|string|max:255',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/package_items'), $imageName);
            $imagePath = 'uploads/package_items/' . $imageName;
        }

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;
        while (PackageItem::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        $item = PackageItem::create([
            'package_id' => $request->package_id,
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        // Process Gallery Images
        if ($request->hasFile('gallery_images')) {
            $galleryImages = $request->file('gallery_images');
            $captions = $request->input('gallery_captions', []);

            foreach ($galleryImages as $index => $gImage) {
                if ($gImage && $gImage->isValid()) {
                    $gName = time() . '_' . uniqid() . '.' . $gImage->extension();
                    $gImage->move(public_path('uploads/package_galleries'), $gName);
                    $gPath = 'uploads/package_galleries/' . $gName;

                    PackageGallery::create([
                        'package_item_id' => $item->id,
                        'image' => $gPath,
                        'caption' => $captions[$index] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('package-items.index')->with('success', 'Package item created successfully.');
    }

    public function edit($id)
    {
        $item = PackageItem::with('galleries')->findOrFail($id);
        $packages = Package::orderBy('sort_order', 'asc')->get();
        return view('backend.pages.package-items.edit', compact('item', 'packages'));
    }

    public function update(Request $request, $id)
    {
        $item = PackageItem::findOrFail($id);

        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'gallery_captions.*' => 'nullable|string|max:255',
            'existing_captions' => 'nullable|array',
        ]);

        $imagePath = $item->image;
        if ($request->hasFile('image')) {
            if ($item->image && file_exists(public_path($item->image))) {
                @unlink(public_path($item->image));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/package_items'), $imageName);
            $imagePath = 'uploads/package_items/' . $imageName;
        }

        if ($item->name !== $request->name) {
            $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $count = 1;
            while (PackageItem::where('slug', $slug)->where('id', '!=', $item->id)->exists()) {
                $slug = "{$originalSlug}-{$count}";
                $count++;
            }
        } else {
            $slug = $item->slug;
        }

        $item->update([
            'package_id' => $request->package_id,
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        // Update existing gallery captions if any
        if ($request->has('existing_captions') && is_array($request->existing_captions)) {
            foreach ($request->existing_captions as $galleryId => $caption) {
                $galleryItem = PackageGallery::where('id', $galleryId)->where('package_item_id', $item->id)->first();
                if ($galleryItem) {
                    $galleryItem->update(['caption' => $caption]);
                }
            }
        }

        // Add new gallery images
        if ($request->hasFile('gallery_images')) {
            $galleryImages = $request->file('gallery_images');
            $captions = $request->input('gallery_captions', []);

            foreach ($galleryImages as $index => $gImage) {
                if ($gImage && $gImage->isValid()) {
                    $gName = time() . '_' . uniqid() . '.' . $gImage->extension();
                    $gImage->move(public_path('uploads/package_galleries'), $gName);
                    $gPath = 'uploads/package_galleries/' . $gName;

                    PackageGallery::create([
                        'package_item_id' => $item->id,
                        'image' => $gPath,
                        'caption' => $captions[$index] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('package-items.index')->with('success', 'Package item updated successfully.');
    }

    public function destroy($id)
    {
        $item = PackageItem::with('galleries')->findOrFail($id);

        if ($item->image && file_exists(public_path($item->image))) {
            @unlink(public_path($item->image));
        }

        foreach ($item->galleries as $gallery) {
            if ($gallery->image && file_exists(public_path($gallery->image))) {
                @unlink(public_path($gallery->image));
            }
            $gallery->delete();
        }

        $item->delete();

        return redirect()->route('package-items.index')->with('success', 'Package item deleted successfully.');
    }

    public function deleteGalleryImage($id)
    {
        $gallery = PackageGallery::findOrFail($id);
        if ($gallery->image && file_exists(public_path($gallery->image))) {
            @unlink(public_path($gallery->image));
        }
        $gallery->delete();

        return response()->json(['success' => true, 'message' => 'Gallery image deleted successfully.']);
    }
}
