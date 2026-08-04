<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact;
use App\Models\Sale;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Story;
use App\Models\Client;
use App\Models\Service;
use App\Models\Team;
use App\Models\Enlistment;
use App\Models\Achievement;
use App\Models\BlogPost;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\Booking;
use App\Models\Page;
use App\Models\MenuCategory;
use App\Models\MenuPackage;
use App\Models\Package;
use App\Models\PackageItem;
use App\Models\PackageGallery;
use App\Http\Traits\SeoTrait;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\TrackVisitorMiddleware;

class HomeController extends Controller implements HasMiddleware
{
    use SeoTrait;
    public static function middleware(): array
    {
        return [
            new Middleware(TrackVisitorMiddleware::class, [
                'welcome',
                'about',
                'teams',
                'teamsDetails',
                'contact',
                'services',
                'packages',
                'servicesDetails',
                'enlistments',
                'enlistmentsDetails',
                'products',
                'productsDetails',
                'blogs',
                'blogsDetails',
            ]),
        ];
    }

    public function welcome()
    {
        $story = Story::where('status', true)->first();
        $sliders = Slider::where('status', true)->orderBy('order', 'asc')->get();
        $testimonials = Testimonial::where('status', true)->latest()->get();
        $clients = Client::active()->ordered()->get();
        $services = Service::active()->ordered()->get();
        $packages = Package::where('status', true)->orderBy('sort_order')->get();
        $teams = Team::where('status', true)->orderBy('order')->get();
        $achievements = Achievement::where('status', 'active')->orderBy('sort_order')->get();
        $enlistments = Enlistment::with('media')->latest()->take(8)->get();
        $blogPosts = BlogPost::with('author')->where('status', 'published')->where('published_date', '<=', now())->orderBy('published_date', 'desc')->take(3)->get();
        $galleries = Gallery::active()->ordered()->get();

        // SEO
        $page = Page::with('seo')->where('slug', 'home')->firstOrFail();
        $seotags = $this->applySeo($page);

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
        ]);

        return view('frontend.index', compact('sliders', 'story', 'packages', 'services', 'achievements', 'testimonials', 'teams', 'clients', 'enlistments', 'blogPosts', 'galleries', 'seotags', 'breadcrumbs', 'page'));
    }
    /**________________________________________________________________________________________
     * About Menu Pages
     * ________________________________________________________________________________________
     */
    public function about()
    {
        $story = Story::where('status', true)->first();
        $testimonials = Testimonial::where('status', true)->latest()->get();
        $clients = Client::active()->ordered()->get();
        $teams = Team::where('status', true)->orderBy('order')->get();
        $achievements = Achievement::where('status', 'active')->orderBy('sort_order')->get();

        // SEO
        $page = Page::with('seo')->where('slug', 'about')->firstOrFail();
        $seotags = $this->applySeo($page);

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'About', 'url' => url()->current()],
        ]);

        return view('frontend.pages.about-us', compact('story', 'achievements', 'testimonials', 'teams', 'clients', 'seotags', 'breadcrumbs', 'page'));
    }
    /**________________________________________________________________________________________
     * Teams Menu Pages
     * ________________________________________________________________________________________
     */
    public function teams()
    {
        $teams = Team::active()->ordered()->get();

        // SEO
        $page = Page::with('seo')->where('slug', 'teams')->firstOrFail();
        $seotags = $this->applySeo($page);

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Teams', 'url' => url()->current()],
        ]);

        return view('frontend.pages.teams', compact('seotags', 'breadcrumbs', 'teams', 'page'));
    }

    public function teamsDetails($slug)
    {
        $team = Team::with('seo')->where('slug', $slug)->firstOrFail();

        // SEO
        $seotags = $this->applySeo($team, $team->name);

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Teams', 'url' => url()->current()],
        ]);

        return view('frontend.pages.teams-details', compact('team', 'seotags', 'breadcrumbs'));
    }

    /**________________________________________________________________________________________
     * Catering Menus Page
     * ________________________________________________________________________________________
     */
    public function menus(Request $request)
    {
        $categories = MenuCategory::with(['activePackages.items'])->where('status', true)->orderBy('order', 'asc')->get();
        $selectedCategorySlug = $request->get('category', 'all');
        $selectedCategoryExists = $selectedCategorySlug === 'all'
            || $categories->contains('slug', $selectedCategorySlug);

        if (! $selectedCategoryExists) {
            $selectedCategorySlug = 'all';
        }

        // SEO
        $page = Page::with('seo')->where('slug', 'menus')->firstOrFail();
        $seotags = $this->applySeo($page);

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Menus', 'url' => url()->current()],
        ]);

        return view('frontend.pages.menus', compact('seotags', 'breadcrumbs', 'categories', 'selectedCategorySlug', 'page'));
    }

    /**________________________________________________________________________________________
     * Packages Showcase Pages
     * ________________________________________________________________________________________
     */
    public function packages()
    {
        $packages = Package::with('items')->where('status', true)->orderBy('sort_order', 'asc')->get();

        // SEO
        $page = Page::with('seo')->where('slug', 'packages')->firstOrFail();
        $seotags = $this->applySeo($page);

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Packages', 'url' => url()->current()],
        ]);

        return view('frontend.pages.packages', compact('packages', 'page', 'seotags', 'breadcrumbs'));
    }

    public function packageDetails($slug)
    {
        $package = Package::with(['items.galleries'])->where('slug', $slug)->firstOrFail();

        // SEO
        $seotags = $this->applySeo($package, $package->name);
        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Packages', 'url' => route('page.packages')],
            ['name' => $package->name, 'url' => url()->current()],
        ]);

        return view('frontend.pages.package-details', compact('package', 'seotags', 'breadcrumbs'));
    }

    public function packageGallery($itemSlug = null)
    {
        // 1. Fetch item
        $selectedItem = PackageItem::when($itemSlug, fn($q) => $q->where('slug', $itemSlug))->firstOrFail();
        $galleries = $selectedItem->galleries;

        // SEO
        $seotags = $this->applySeo($selectedItem, $selectedItem->name);
        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => $selectedItem->name, 'url' => url()->current()],
        ]);

        return view('frontend.pages.package-gallery', compact(
            'selectedItem', 'galleries', 'seotags', 'breadcrumbs'
        ));
    }
    /**________________________________________________________________________________________
     * Contact Menu Pages
     * ________________________________________________________________________________________
     */
    public function contact()
    {
        $clients = Client::active()->ordered()->get();

        // SEO
        $page = Page::with('seo')->where('slug', 'contact')->firstOrFail();
        $seotags = $this->applySeo($page);

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Contact', 'url' => url()->current()],
        ]);

        return view('frontend.pages.contact-us', compact('clients', 'seotags', 'breadcrumbs', 'page'));
    }
    /**________________________________________________________________________________________
     * Gallery Page
     * ________________________________________________________________________________________
     */
    public function gallery()
    {
        $galleries = Gallery::active()->ordered()->get();

        $galleryCategories = $galleries->pluck('category')->unique()->filter()->values();

        // SEO
        $page = Page::with('seo')->where('slug', 'home')->first();
        $seotags = $this->applySeo($page, 'Photo Gallery');

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Gallery', 'url' => url()->current()],
        ]);

        return view('frontend.pages.gallery', compact('galleries', 'galleryCategories', 'seotags', 'breadcrumbs'));
    }
    public function contactStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Contact::create([
            'type' => 'contact',
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'is_seen' => false,
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
    /**________________________________________________________________________________________
     * Services Menu Pages
     * ________________________________________________________________________________________
     */
    public function services()
    {
        $services = Service::active()->ordered()->get();
        $achievements = Achievement::where('status', 'active')->orderBy('sort_order')->get();

        // SEO
        $page = Page::with('seo')->where('slug', 'services')->firstOrFail();
        $seotags = $this->applySeo($page);

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Services', 'url' => url()->current()],
        ]);

        // Page Content
        $page = Page::where('slug', 'services')->firstOrFail();

        return view('frontend.pages.services', compact('services', 'achievements', 'seotags', 'breadcrumbs', 'page'));
    }
    public function servicesDetails($slug)
    {
        // Load service with all needed relations
        $service = Service::with(['media', 'attachments', 'seo'])->where('slug', $slug)->active()->firstOrFail();

        // Optional: Load all services for sidebar list
        $allServices = Service::active()->ordered()->get();

        // SEO
        $seotags = $this->applySeo($service, $service->title);
        // $json_ld = $this->generateProductJsonLd($data);

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Service Details', 'url' => url()->current()],
        ]);

        return view('frontend.pages.services-details', compact('service', 'allServices', 'seotags', 'breadcrumbs'));
    }
    /**________________________________________________________________________________________
     * Enlistments Menu Pages
     * ________________________________________________________________________________________
     */
    public function enlistments()
    {
        $enlistments = Enlistment::with(['category', 'media'])->latest()->get();

        // SEO
        $page = Page::with('seo')->where('slug', 'enlistments')->firstOrFail();
        $seotags = $this->applySeo($page);

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Enlistments', 'url' => url()->current()],
        ]);

        return view('frontend.pages.enlistments', compact('enlistments', 'seotags', 'breadcrumbs', 'page'));
    }
    public function enlistmentsDetails($slug)
    {
        $enlistment = Enlistment::with(['category', 'media'])->where('slug', $slug)->firstOrFail();

        // SEO
        $seotags = $this->applySeo($enlistment, $enlistment->title);
        // $json_ld = $this->generateProductJsonLd($data);

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Enlistment Details', 'url' => url()->current()],
        ]);

        return view('frontend.pages.enlistments-details', compact('enlistment', 'seotags', 'breadcrumbs'));
    }

    /**________________________________________________________________________________________
     * Blog Menu Pages
     * ________________________________________________________________________________________
     */
    public function blogs()
    {
        $blogPosts = BlogPost::with(['author', 'category', 'tags'])
            ->where('status', 'published')
            ->where('published_date', '<=', now())
            ->orderBy('published_date', 'desc')
            ->paginate(8);

        $categories = Category::withCount('blogPosts')->get();
        $allTags = Tag::all();
        $recentPosts = BlogPost::latest()->take(5)->get();

        // SEO
        $page = Page::with('seo')->where('slug', 'blogs')->firstOrFail();
        $seotags = $this->applySeo($page);

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Blogs', 'url' => url()->current()],
        ]);

        return view('frontend.pages.blogs', compact('blogPosts', 'categories', 'allTags', 'recentPosts', 'seotags', 'breadcrumbs'));
    }
    // Blog details page
    public function blogsDetails($slug)
    {
        $post = BlogPost::with(['author', 'category', 'tags', 'comments.replies'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->where('published_date', '<=', now())
            ->firstOrFail();

        $categories = Category::withCount('blogPosts')->get();
        $recentPosts = BlogPost::latest()->take(5)->get();
        $allTags = Tag::all();

        // SEO
        $seotags = $this->applySeo($post, $post->title);
        // $json_ld = $this->generateProductJsonLd($data);

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Blog Details', 'url' => url()->current()],
        ]);

        return view('frontend.pages.blogs-details', compact('post', 'categories', 'recentPosts', 'allTags', 'seotags', 'breadcrumbs'));
    }
    // Blogs by tag
    public function blogsTag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $blogPosts = $tag->blogPosts()
            ->with(['author', 'category', 'tags'])
            ->where('status', 'published')
            ->where('published_date', '<=', now())
            ->orderBy('published_date', 'desc')
            ->paginate(8);

        $categories = Category::withCount('blogPosts')->get();
        $allTags = Tag::all();
        $recentPosts = BlogPost::latest()->take(5)->get();

        // SEO
        $seotags = $this->applySeo($tag, $tag->title);
        // $json_ld = $this->generateProductJsonLd($data);

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Blog Details', 'url' => url()->current()],
        ]);

        return view('frontend.pages.blogs', compact('blogPosts', 'tag', 'categories', 'allTags', 'recentPosts', 'seotags', 'breadcrumbs'));
    }
    // Blogs by category
    public function blogsCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $blogPosts = BlogPost::where('category_id', $category->id)
            ->where('status', 'published')
            ->where('published_date', '<=', now())
            ->with(['author', 'tags'])
            ->orderBy('published_date', 'desc')
            ->paginate(8);

        $categories = Category::withCount('blogPosts')->get();
        $allTags = Tag::all();
        $recentPosts = BlogPost::latest()->take(5)->get();

        // SEO
        $seotags = $this->applySeo($category, $category->title);
        // $json_ld = $this->generateProductJsonLd($data);

        $breadcrumbs = $this->generateBreadcrumbJsonLd([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Blog Details', 'url' => url()->current()],
        ]);

        return view('frontend.pages.blogs', compact('blogPosts', 'category', 'categories', 'allTags', 'recentPosts', 'seotags', 'breadcrumbs'));
    }
    // Blogs by search
    public function blogsSearch(Request $request)
    {
        $query = $request->input('query');

        $blogPosts = BlogPost::where(function ($q) use ($query) {
            $q->where('title', 'like', "%{$query}%")
                ->orWhere('content', 'like', "%{$query}%");
        })
            ->where('status', 'published')
            ->where('published_date', '<=', now())
            ->with(['author', 'category', 'tags'])
            ->orderBy('published_date', 'desc')
            ->paginate(8);

        $categories = Category::withCount('blogPosts')->get();
        $allTags = Tag::all();
        $recentPosts = BlogPost::latest()->take(5)->get();

        return view('frontend.pages.blogs', compact('blogPosts', 'query', 'categories', 'allTags', 'recentPosts'));
    }
    // Store comment
    public function blogsCommentsStore(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:blog_comments,id',
        ]);

        $blog->comments()->create([
            'parent_id' => $validated['parent_id'] ?? null,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'content' => $validated['content'],
        ]);

        return back()->with('success', 'Comment submitted successfully!');
    }
    /**
     * AJAX search for Services, Enlistments, and Blogs
     */
    public function blogsAjaxSearch(Request $request)
    {
        $query = $request->get('query');
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $results = [];

        // Services
        $services = Service::active()
            ->where('title', 'LIKE', "%{$query}%")
            ->take(5)
            ->get();
        foreach ($services as $service) {
            $mainMedia = $service->media->where('is_main', 1)->first();
            $results[] = [
                'title' => $service->title,
                'link' => route('page.services-details', $service->slug),
                'image' => $mainMedia ? asset($mainMedia->path) : asset('frontend/images/resource/news-1.jpg'),
                'type' => 'Service'
            ];
        }

        // Enlistments
        $enlistments = Enlistment::active()
            ->where('title', 'LIKE', "%{$query}%")
            ->take(5)
            ->get(['title', 'slug']);
        foreach ($enlistments as $enlistment) {
            $mainImg = $enlistment->media->where('is_main', 1)->first();
            $results[] = [
                'title' => $enlistment->title,
                'link' => route('page.enlistments-details', $enlistment->slug),
                'image' => $mainImg ? asset($mainImg->path) : asset('frontend/images/resource/news-1.jpg'),
                'type' => 'Enlistment'
            ];
        }

        // Blogs
        $blogs = BlogPost::where('status', 'published')
            ->where('title', 'LIKE', "%{$query}%")
            ->take(5)
            ->get(['title', 'slug', 'image_path']);
        foreach ($blogs as $blog) {
            $results[] = [
                'title' => $blog->title,
                'link' => route('page.blogs-details', $blog->slug),
                'image' => $blog->main_image ? asset($blog->main_image->path) : asset('frontend/images/resource/news-1.jpg'),
                'type' => 'Blog'
            ];
        }

        return response()->json($results);
    }

    /**________________________________________________________________________________________
     * Booking Menu Pages
     * ________________________________________________________________________________________
     */
    public function storeBooking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|string|max:255',
            'phone'      => 'required|string|max:20',
            'email'      => 'nullable|email|max:255',
            'event_type' => 'required|string',
            'event_date' => 'required|date',
            'guests'     => 'required|integer|min:1',
            'location'   => 'nullable|string|max:255',
            'notes'      => 'nullable|string',
            'service_id' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()->all()
            ], 422);
        }

        Booking::create($validator->validated());

        return response()->json([
            'status'  => 'success',
            'message' => 'Thank you! Your booking request has been submitted successfully.'
        ], 200);
    }
}

