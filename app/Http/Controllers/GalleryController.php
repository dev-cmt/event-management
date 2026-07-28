<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::ordered()->paginate(15);
        return view('backend.pages.galleries.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'title' => 'nullable|string|max:255',
            'category' => 'required|string|max:100',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|boolean'
        ]);

        $data = $request->except('_token', 'image');
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;
        $data['category'] = strtolower(trim($request->category));

        if ($request->hasFile('image')) {
            $data['image'] = ImageHelper::uploadImage($request->file('image'), 'uploads/galleries');
        }

        Gallery::create($data);

        return redirect()->route('galleries.index')->with('success', 'Photo added to gallery successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:galleries,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'title' => 'nullable|string|max:255',
            'category' => 'required|string|max:100',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|boolean'
        ]);

        $gallery = Gallery::findOrFail($request->id);
        $data = $request->except('_token', '_method', 'image', 'id');
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;
        $data['category'] = strtolower(trim($request->category));

        if ($request->hasFile('image')) {
            $data['image'] = ImageHelper::uploadImage($request->file('image'), 'uploads/galleries', $gallery->image);
        } else {
            $data['image'] = $gallery->image;
        }

        $gallery->update($data);

        return redirect()->route('galleries.index')->with('success', 'Gallery item updated successfully.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image) {
            $oldFilePath = public_path($gallery->image);
            if (file_exists($oldFilePath) && !is_dir($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gallery item deleted successfully.');
    }
}
