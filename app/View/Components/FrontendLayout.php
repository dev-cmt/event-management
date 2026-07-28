<?php

namespace App\View\Components;

use App\Models\Setting;
use Illuminate\View\Component;

class FrontendLayout extends Component
{
    public $title;
    public $seotags;
    public $breadcrumbs;
    public $jsonld;

    // Accept title, seo_tags, and json_ld from the component tag
    public function __construct($title = null, $seotags = null, $breadcrumbs = null, $jsonld = null)
    {
        $this->title = $title;
        $this->seotags = $seotags;
        $this->breadcrumbs = $breadcrumbs;
        $this->jsonld = $jsonld ?? $this->buildOrganizationJsonLd();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('frontend.layouts.master');
    }

    protected function buildOrganizationJsonLd(): string
    {
        $settings = Setting::first();

        $sameAs = array_values(array_filter([
            $settings ? $settings->facebook : null,
            $settings ? $settings->linkedin : null,
            $settings ? $settings->instagram : null,
            $settings ? $settings->twitter : null,
            $settings ? $settings->youtube : null,
        ]));

        $address = $settings ? $settings->address : null;

        $logoPath = 'images/logo.png';
        if ($settings && !empty($settings->logo_light)) {
            $logoPath = $settings->logo_light;
        } elseif ($settings && !empty($settings->logo)) {
            $logoPath = $settings->logo;
        }

        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $settings && !empty($settings->company_name) ? $settings->company_name : config('app.name', 'Sky Tech Solve'),
            'url' => url('/'),
            'logo' => asset($logoPath),
        ];

        if (!empty($sameAs)) {
            $data['sameAs'] = $sameAs;
        }

        if (!empty($address)) {
            $data['address'] = array_filter([
                '@type' => 'PostalAddress',
                'streetAddress' => $address,
                'addressLocality' => config('app.city', 'Dhaka'),
                'addressCountry' => config('app.country', 'BD'),
            ]);
        }

        return '<script type="application/ld+json">' . json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
    }
}
