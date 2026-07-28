<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Product;
use App\Models\BlogPost;
use App\Models\Service;
use App\Models\Project;
use App\Models\Team;
use Carbon\Carbon;

class SitemapController extends Controller
{
    /**
     * Serve sitemap.xml
     */
    public function index()
    {
        $formatSitemapDate = function ($value): string {
            try {
                return $value ? Carbon::parse($value)->toW3cString() : now()->toW3cString();
            } catch (\Throwable $throwable) {
                return now()->toW3cString();
            }
        };

        $data = [
            'pages'     => Page::select('id', 'slug', 'updated_at')->get(),
            'products'  => Product::select('id', 'slug', 'updated_at')->active()->get(),
            'services'  => Service::select('id', 'slug', 'updated_at')->active()->get(),
            'projects'  => Project::select('id', 'slug', 'updated_at')->active()->get(),
            'blogs'     => BlogPost::select('id', 'slug', 'updated_at', 'status')->where('status', 'published')->get(),
            'teams'     => Team::select('id', 'slug', 'updated_at')->active()->get(),
            'lastmod'   => Carbon::now()->toW3cString(), // Sitemap last update
            'formatSitemapDate' => $formatSitemapDate,
        ];

        return response()->view('sitemap.index', $data)->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
