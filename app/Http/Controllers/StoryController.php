<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\Validator;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $story = Story::first();

        // If no story exists, create a default one
        if (!$story) {
            $story = Story::create([
                'title' => 'About Our Story',
                'badge_text' => 'About Our Story',
                'experience_years' => '30+',
                'experience_title' => 'Years Heritage',
                'content' => '<h2>Catering Service</h2><p>Tell your story here...</p>',
                'status' => true,
                'features' => [
                    [
                        'icon' => 'fas fa-check-circle',
                        'title' => 'Large-Scale Capacity',
                        'subtitle' => 'Up to 30K guests at single event',
                    ],
                    [
                        'icon' => 'fas fa-bolt',
                        'title' => '12-Hour Urgent Prep',
                        'subtitle' => 'Emergency catering execution',
                    ]
                ],
            ]);
        }

        return view('backend.pages.story.index', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'badge_text' => 'nullable|string|max:255',
            'experience_years' => 'nullable|string|max:50',
            'experience_title' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'status' => 'required|boolean',
            'remove_image' => 'nullable|boolean',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'remove_gallery_images' => 'nullable|array',
            'features' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $story = Story::findOrFail($id);

        $data = [
            'title' => $request->title,
            'badge_text' => $request->badge_text,
            'experience_years' => $request->experience_years,
            'experience_title' => $request->experience_title,
            'content' => $request->content,
            'status' => $request->status,
            'features' => $request->input('features', []),
        ];

        // Handle main image upload/removal
        if ($request->hasFile('image')) {
            $data['image'] = ImageHelper::uploadImage($request->file('image'), 'uploads/story', $story->image);
        } elseif ($request->has('remove_image') && $request->remove_image) {
            if ($story->image) {
                ImageHelper::deleteImage($story->image);
                $data['image'] = null;
            }
        } else {
            $data['image'] = $story->image;
        }

        // Handle Gallery Images (Swiper Slider)
        $currentGallery = is_array($story->gallery_images) ? $story->gallery_images : [];

        // Remove requested gallery images
        if ($request->has('remove_gallery_images') && is_array($request->remove_gallery_images)) {
            foreach ($request->remove_gallery_images as $removePath) {
                ImageHelper::deleteImage($removePath);
                $currentGallery = array_values(array_filter($currentGallery, fn($p) => $p !== $removePath));
            }
        }

        // Add newly uploaded gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $path = ImageHelper::uploadImage($file, 'uploads/story/gallery');
                if ($path) {
                    $currentGallery[] = $path;
                }
            }
        }

        $data['gallery_images'] = array_values($currentGallery);

        $story->update($data);

        return redirect()->route('story.index')
            ->with('success', 'Story section updated successfully.');
    }
}
