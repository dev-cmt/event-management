<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;

class PageContentController extends Controller
{
    // Show all pages with their content info
    public function index()
    {
        $pages = Page::all()->keyBy('slug');
        return view('backend.page-content', compact('pages'));
    }

    // Update content for a single page
    public function update(Request $request)
    {
        $page = Page::where('slug', $request->slug)->firstOrFail();
        $existingContent = is_array($page->content) ? $page->content : [];
        $content = $request->input('content', []);
        $content = is_array($content) ? $content : [];

        // Handle Why Us Image Upload
        if ($request->hasFile('why_us_image')) {
            $oldImage = data_get($existingContent, 'why_us.image');
            $content['why_us']['image'] = ImageHelper::uploadImage($request->file('why_us_image'), 'uploads/pages', $oldImage);
        } elseif ($request->has('remove_why_us_image') && $request->remove_why_us_image) {
            $oldImage = data_get($existingContent, 'why_us.image');
            if ($oldImage) {
                ImageHelper::deleteImage($oldImage);
            }
            $content['why_us']['image'] = null;
        } else {
            $content['why_us']['image'] = data_get($existingContent, 'why_us.image');
        }

        // Handle CEO Image Upload
        if ($request->hasFile('ceo_image')) {
            $oldImage = data_get($existingContent, 'ceo.image');
            $content['ceo']['image'] = ImageHelper::uploadImage($request->file('ceo_image'), 'uploads/pages', $oldImage);
        } elseif ($request->has('remove_ceo_image') && $request->remove_ceo_image) {
            $oldImage = data_get($existingContent, 'ceo.image');
            if ($oldImage) {
                ImageHelper::deleteImage($oldImage);
            }
            $content['ceo']['image'] = null;
        } else {
            $content['ceo']['image'] = data_get($existingContent, 'ceo.image');
        }

        // Merge array preserving other top-level section keys if omitted in form
        $mergedContent = array_merge($existingContent, $content);

        $page->update([
            'content' => $mergedContent
        ]);

        return back()->with('success', 'Page content updated successfully!');
    }
}
