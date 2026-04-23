<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'leads_count' => \App\Models\Lead::count(),
            'faqs_count' => \App\Models\Faq::count(),
            'stories_count' => \App\Models\SuccessStory::count(),
        ];
        return view('admin.index', compact('stats'));
    }

    public function leads()
    {
        $leads = \App\Models\Lead::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.leads.index', compact('leads'));
    }

    public function faqs()
    {
        $faqs = \App\Models\Faq::orderBy('order')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function stories()
    {
        $stories = \App\Models\SuccessStory::orderBy('order')->get();
        return view('admin.stories.index', compact('stories'));
    }

    public function settings()
    {
        $settings = \App\Models\SiteSetting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function settingsUpdate(Request $request)
    {
        $settings = $request->input('settings');
        foreach ($settings as $key => $value) {
            \App\Models\SiteSetting::where('key', $key)->update(['value' => $value]);
        }
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
