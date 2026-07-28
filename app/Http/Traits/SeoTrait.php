<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

trait SeoTrait
{
    protected array $seo = [];

    public function setSeo(array $data): self
    {
        $this->seo = array_merge([
            'title'       => config('app.name'),
            'description' => '',
            'keywords'    => '',
            'image'       => '',
            'canonical'   => url()->current(),
            'robots'      => 'index,follow',
        ], $data);

        return $this;
    }

    /**
     * Apply SEO from a model (Page, Product, BlogPost, etc.)
     */
    public function applySeo($model = null, $defaultTitle = null, array $overrides = []): string
    {
        $seo = data_get($model, 'seo');

        $data = [
            'title'       => $overrides['title'] ?? data_get($seo, 'meta_title') ?? data_get($model, 'title') ?? data_get($model, 'name') ?? $defaultTitle ?? config('app.name'),
            'description' => $overrides['description'] ?? data_get($seo, 'meta_description') ?? data_get($model, 'excerpt') ?? '',
            'keywords'    => $overrides['keywords'] ?? $this->formatKeywords(data_get($seo, 'meta_keywords') ?? ''),
            'image'       => $overrides['image'] ?? $this->resolveSeoImage($model, $seo),
            'canonical'   => $overrides['canonical'] ?? data_get($seo, 'canonical_url') ?? url()->current(),
            'robots'      => $overrides['robots'] ?? data_get($seo, 'robots') ?? 'index,follow',
        ];

        return $this->setSeo($data)->generateTags();
    }

    protected function resolveSeoImage($model = null, $seo = null): string
    {
        $image = data_get($seo, 'og_image');

        if (!empty($image)) {
            return $image;
        }

        foreach (['image_path', 'featured_image', 'image', 'thumbnail', 'cover_image'] as $field) {
            $value = data_get($model, $field);
            if (!empty($value)) {
                return $value;
            }
        }

        $mainImagePath = data_get($model, 'main_image.path');
        if (!empty($mainImagePath)) {
            return $mainImagePath;
        }

        $mediaItems = data_get($model, 'media');
        if (is_iterable($mediaItems)) {
            foreach ($mediaItems as $mediaItem) {
                if ((int) data_get($mediaItem, 'is_main') === 1 && !empty(data_get($mediaItem, 'path'))) {
                    return data_get($mediaItem, 'path');
                }
            }

            $firstMedia = is_array($mediaItems) ? reset($mediaItems) : ($mediaItems instanceof \Illuminate\Support\Collection ? $mediaItems->first() : null);
            $firstMediaPath = data_get($firstMedia, 'path');
            if (!empty($firstMediaPath)) {
                return $firstMediaPath;
            }
        }

        return '';
    }
    /**-----------------------------------------------------------------------
     * Generate Tags Meta, Canonical, OG, Twitter
     * -----------------------------------------------------------------------
     */
    public function generateTags(): string
    {
        $seo = $this->seo;
        $og = config('seo.og', [
            'type' => 'website',
            'site_name' => config('app.name'),
            'locale' => app()->getLocale() . '_' . strtoupper(app()->getLocale())
        ]);

        $tags = [
            // Basic Meta
            '<title>' . e($seo['title']) . '</title>',
            '<meta name="description" content="' . e($seo['description']) . '">',
            '<meta name="keywords" content="' . e($seo['keywords']) . '">',
            '<meta name="robots" content="' . e($seo['robots']) . '">',

            // Open Graph
            '<meta property="og:title" content="' . e($seo['title']) . '">',
            '<meta property="og:description" content="' . e($seo['description']) . '">',
            '<meta property="og:type" content="' . e($og['type']) . '">',
            '<meta property="og:url" content="' . e(url()->current()) . '">',
            '<meta property="og:site_name" content="' . e($og['site_name']) . '">',
            '<meta property="og:locale" content="' . e($og['locale']) . '">',

            // Twitter Card
            '<meta name="twitter:card" content="summary_large_image">',
            '<meta name="twitter:title" content="' . e($seo['title']) . '">',
            '<meta name="twitter:description" content="' . e($seo['description']) . '">'
        ];
        // Facebook
        if ($fbAppId = env('FACEBOOK_APP_ID')) {
            $tags[] = '<meta property="fb:app_id" content="' . e($fbAppId) . '">';
        }

        // Canonical URL
        if (!empty($seo['canonical'])) {
            $tags[] = '<link rel="canonical" href="' . e($seo['canonical']) . '">';
        }

        // Image meta tags
        if (!empty($seo['image'])) {
            $imageUrl = asset($seo['image']);
            $imageTags = [
                '<meta property="og:image" content="' . e($imageUrl) . '">',
                '<meta name="twitter:image" content="' . e($imageUrl) . '">',
                '<meta name="pinterest-rich-pin" content="true">',
                '<meta property="og:image:width" content="1200">',
                '<meta property="og:image:height" content="630">'
            ];
            $tags = array_merge($tags, $imageTags);
        }

        return implode("\n", $tags);
    }

    /**-----------------------------------------------------------------------
     * Generate Breadcrumbs JSON-LD
     * -----------------------------------------------------------------------
     */
    public function generateBreadcrumbJsonLd(array $items): string
    {
        $breadcrumbs = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [],
        ];

        foreach ($items as $position => $item) {
            $breadcrumbs['itemListElement'][] = [
                '@type' => 'ListItem',
                'position' => $position + 1,
                'name' => $item['name'],
                'item' => $item['url'] ?? null,
            ];
        }

        return '<script type="application/ld+json">' . json_encode($breadcrumbs) . '</script>';
    }

    /**-----------------------------------------------------------------------
     * Product JSON-LD
     * -----------------------------------------------------------------------
     */
    public function generateProductJsonLd($product): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $product->name,
            'description' => $product->meta_description,
            // 'brand' => [
            //     '@type' => 'Brand',
            //     'name' => $product->brand->name,
            // ],
            'offers' => [
                '@type' => 'Offer',
                'url' => route('single.product', [$product->slug, $product->id]),
                'priceCurrency' => 'BDT',
                'price' => $product->price,
                'availability' => $product->stock ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock'
            ],
        ];

        // if ($product->reviews->count() > 0) {
        //     $data['aggregateRating'] = [
        //         '@type' => 'AggregateRating',
        //         'ratingValue' => $product->reviews->avg('rating'),
        //         'reviewCount' => $product->reviews->count(),
        //     ];
        // }

        return '<script type="application/ld+json">' . json_encode($data) . '</script>';
    }

    /**-----------------------------------------------------------------------
     * Article JSON-LD
     * -----------------------------------------------------------------------
     */
    public function generateArticleJsonLd($article): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $article->title,
            'description' => $article->excerpt ?? Str::limit(strip_tags($article->content), 160),
            'author' => [
                '@type' => 'Person',
                'name' => $article->author->name ?? config('app.name'),
            ],
            'datePublished' => optional($article->published_at ?? $article->published_date ?? $article->created_at)->toIso8601String(),
            'dateModified' => optional($article->updated_at ?? $article->created_at)->toIso8601String(),
            'publisher' => [
                '@type' => 'Organization',
                'name' => config('app.name'),
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('images/logo.png'),
                ],
            ],
        ];

        if ($article->featured_image) {
            $data['image'] = asset($article->featured_image);
        }

        return '<script type="application/ld+json">' . json_encode($data) . '</script>';
    }

    /**-----------------------------------------------------------------------
     * Article JSON-LD
     * -----------------------------------------------------------------------
     */
    protected function formatKeywords(?string $keywords): string
    {
        // If empty, return default
        if (empty($keywords)) {
            return 'default,keywords';
        }

        // Convert to lowercase and clean
        $keywords = strtolower($keywords);

        // Replace any whitespace around commas with single comma
        $keywords = preg_replace('/\s*,\s*/', ',', $keywords);

        // Replace multiple commas with single comma
        $keywords = preg_replace('/,+/', ',', $keywords);

        // Trim leading/trailing commas and whitespace
        $keywords = trim($keywords, " ,");

        // Replace remaining spaces with commas (for "keywords sagour" case)
        $keywords = preg_replace('/\s+/', ',', $keywords);

        return $keywords ?: 'default,keywords';
    }


    /**-----------------------------------------------------------------------
     * Build LocalBusiness structured data from settings
     * -----------------------------------------------------------------------
     */
    public function buildLocalBusinessData(): array
    {
        $settings = Setting::first();

        $phone = $settings->phone ?? config('courier.redx.phone', '');
        if (!empty($phone) && !Str::startsWith($phone, '+')) {
            $phone = '+88' . ltrim($phone, '0');
        }

        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            'name' => $settings->company_name ?? config('app.name'),
            'url' => config('app.url'),
            'image' => $settings->logo ? asset($settings->logo) : asset('images/logo.png'),
            'telephone' => $phone,
            'email' => $settings->email ?? config('mail.from.address'),
        ];

        if (!empty($settings->address)) {
            $data['address'] = [
                '@type' => 'PostalAddress',
                'streetAddress' => $settings->address,
            ];
        }

        $social = array_filter([
            $settings->facebook ?? null,
            $settings->twitter ?? null,
            $settings->instagram ?? null,
            $settings->linkedin ?? null,
            $settings->youtube ?? null,
        ]);

        if (!empty($social)) {
            $data['sameAs'] = array_values($social);
        }

        return $data;
    }

    public function generateLocalBusinessJsonLd(): string
    {
        return '<script type="application/ld+json">' . json_encode($this->buildLocalBusinessData(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
    }

    /**
     * Assemble multiple JSON-LD parts into a single string.
     * Parts: 'localBusiness', 'article', 'product', 'breadcrumb'
     */
    public function getJsonLd(array $parts = ['localBusiness'], $model = null): string
    {
        $out = [];

        foreach ($parts as $part) {
            switch ($part) {
                case 'localBusiness':
                    $out[] = $this->generateLocalBusinessJsonLd();
                    break;
                case 'article':
                    if ($model) $out[] = $this->generateArticleJsonLd($model);
                    break;
                case 'product':
                    if ($model) $out[] = $this->generateProductJsonLd($model);
                    break;
                case 'breadcrumb':
                    if (is_array($model)) $out[] = $this->generateBreadcrumbJsonLd($model);
                    break;
            }
        }

        return implode("\n", $out);
    }

    /**
     * Share JSON-LD string to all views as `$jsonld` so layouts can render `{!! $jsonld ?? '' !!}`
     */
    public function shareJsonLd(array $parts = ['localBusiness'], $model = null): void
    {
        View::share('jsonld', $this->getJsonLd($parts, $model));
    }


}
