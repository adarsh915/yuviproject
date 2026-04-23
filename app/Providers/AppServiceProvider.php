<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $settings = \App\Models\SiteSetting::all()->pluck('value', 'key')->toArray();
            $view->with('siteSettings', $settings);
        });

        View::composer('frontend.layouts.app', function ($view) {
            $data = $view->getData();
            $settings = $data['siteSettings'] ?? [];
            
            $siteName = $settings['site_title'] ?? 'Dr. Yuvraj Jadeja';
            $defaultDescription = 'Ethical, evidence-based fertility and women\'s health care in Ahmedabad.';
            $defaultKeywords = 'fertility, IVF, Ahmedabad, Dr. Yuvraj Jadeja';
            
            $metaTitle = $data['meta_title'] ?? null;
            $metaDescription = $data['meta_description'] ?? $defaultDescription;
            $metaKeywords = $data['meta_keywords'] ?? $defaultKeywords;

            $view->with([
                'seoTitle' => $metaTitle ? "$metaTitle | $siteName" : $siteName,
                'seoDescription' => $metaDescription,
                'seoKeywords' => $metaKeywords,
            ]);
        });
    }
}
