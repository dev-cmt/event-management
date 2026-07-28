<?php

namespace App\Http\Controllers;

use App\Models\Enlistment;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Models\Category;
use App\Models\Media;

class EnlistmentController extends Controller
{
    public function index()
    {
        $enlistments = Enlistment::paginate(10);
        return view('backend.pages.enlistments.index', compact('enlistments'));
    }

    public function create()
    {
        $categories = Category::where('status', true)->get();
        return view('backend.pages.enlistments.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title'          => 'required|string|max:255|unique:enlistments,title',
            'description'    => 'nullable|string',
        ]);

        $data = $request->all();

        // Upload main image (meta_image in your form)
        if ($request->hasFile('meta_image')) {
            $data['og_image'] = ImageHelper::uploadImage($request->file('meta_image'), 'uploads/seo');
        }

        // Create the enlistment record
        $enlistment = Enlistment::create($data);

        // Create SEO record
        $enlistment->seo()->create($data);

        // Handle Media uploads
        if ($request->hasFile('media')) {
            $hasDefault = Media::where('model_id', $enlistment->id)
                ->where('model_type', Enlistment::class)
                ->where('is_main', true)
                ->exists();

            foreach ($request->file('media') as $key => $file) {
                $name = $file->getClientOriginalName();
                $size = $file->getSize();
                $path = ImageHelper::uploadImage($file, 'uploads');

                Media::create([
                    'model_type' => Enlistment::class,
                    'model_id'   => $enlistment->id,
                    'name'       => $name,
                    'path'       => $path,
                    'type'       => 'image',
                    'alt_text'   => $enlistment->title,
                    'size'       => $size,
                    'is_main'    => !$hasDefault && $key === 0,
                    'created_by' => auth()->id(),
                ]);
                $hasDefault = true; // Set to true after first upload
            }
        }

        return redirect()->route('enlistments.index')->with('success', 'Enlistment created successfully.');
    }

    public function edit($id)
    {
        $enlistment = Enlistment::with(['category', 'media'])->findOrFail($id);
        $categories = Category::where('status', true)->get();
        return view('backend.pages.enlistments.edit', compact('enlistment', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $enlistment = Enlistment::findOrFail($id);
        // Validate the request data
        $validated = $request->validate([
            'title'          => 'required|string|max:255|unique:enlistments,title,' . $id,
            'description'    => 'nullable|string',
        ]);

        $data = $request->all();

        // Handle OG image
        $ogImagePath = $enlistment->seo->og_image ?? null;
        if ($request->hasFile('meta_image')) {
            // Delete old OG image if exists
            if ($ogImagePath && file_exists(public_path($ogImagePath))) {
                unlink(public_path($ogImagePath));
            }
            $data['og_image'] = ImageHelper::uploadImage($request->file('meta_image'), 'uploads/seo');
        }

        // Update enlistment
        $enlistment->update($data);

        // Prepare SEO data - only include relevant fields
        $seoData = [
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'og_image' => $data['og_image'] ?? $ogImagePath,
        ];

        // Update or create SEO record
        if ($enlistment->seo) {
            $enlistment->seo()->update($seoData);
        } else {
            $enlistment->seo()->create($seoData);
        }

        // Handle main image selection
        if ($request->filled('is_main')) {
            // Reset all media to not default
            Media::where('model_id', $enlistment->id)
                ->where('model_type', Enlistment::class)
                ->update(['is_main' => false]);

            // Set the selected media as main
            if (str_starts_with($request->is_main, 'new_')) {
                // This is a new image, we'll handle it after upload
                $newMainFlag = true;
            } else {
                // This is an existing image
                Media::where('id', $request->is_main)
                    ->where('model_id', $enlistment->id)
                    ->where('model_type', Enlistment::class)
                    ->update(['is_main' => true]);
            }
        }

        // Handle Media deletion
        if ($request->filled('delete_media')) {
            foreach ($request->delete_media as $mediaId) {
                $media = Media::find($mediaId);
                if ($media && $media->model_id == $enlistment->id && $media->model_type == Enlistment::class) {
                    ImageHelper::deleteImage($media->path);
                    $media->delete();
                }
            }
        }

        // Handle Media uploads
        if ($request->hasFile('media')) {
            $hasDefault = Media::where('model_id', $enlistment->id)
                ->where('model_type', Enlistment::class)
                ->where('is_main', true)
                ->exists();

            foreach ($request->file('media') as $key => $file) {
                $isMain = (!$hasDefault && $key === 0) || (isset($newMainFlag) && $newMainFlag);
                $name = $file->getClientOriginalName();
                $size = $file->getSize();
                $path = ImageHelper::uploadImage($file, 'uploads');

                Media::create([
                    'model_type' => Enlistment::class,
                    'model_id'   => $enlistment->id,
                    'name'       => $name,
                    'path'       => $path,
                    'type'       => 'image',
                    'alt_text'   => $enlistment->title,
                    'size'       => $size,
                    'is_main'    => $isMain,
                    'created_by' => auth()->id(),
                ]);

                if ($isMain) {
                    $hasDefault = true;
                    $newMainFlag = false;
                }
            }
        }
        return redirect()->route('enlistments.index')->with('success', 'Enlistment updated successfully.');
    }

    public function destroy($id)
    {
        $enlistment = Enlistment::with(['media'])->findOrFail($id);

        // Delete SEO OG image
        if ($og = $enlistment->seo?->og_image) {
            ImageHelper::deleteImage($og);
            $enlistment->seo()->delete();
        }

        // Delete media files
        foreach ($enlistment->media as $media) {
            ImageHelper::deleteImage($media->path);
            $media->delete();
        }

        $enlistment->delete();

        return redirect()->route('enlistments.index')->with('success', 'Enlistment deleted successfully.');
    }

    public function deleteImage($id)
    {
        $media = Media::findOrFail($id);

        // Delete physical file
        if ($media->path) {
            ImageHelper::deleteImage($media->path);
        }

        $media->delete();

        return response()->json(['success' => true]);
    }

}
