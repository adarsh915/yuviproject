<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $faqs = \App\Models\Faq::where('is_active', true)->orderBy('order')->get();
        $stories = \App\Models\SuccessStory::where('is_active', true)->orderBy('order')->get();
        $settings = \App\Models\SiteSetting::all()->pluck('value', 'key');

        return view('frontend.index', compact('faqs', 'stories', 'settings'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function blogDetails()
    {
        return view('frontend.blog-details');
    }

    public function contact()
    {
        $settings = \App\Models\SiteSetting::all()->pluck('value', 'key');
        return view('frontend.contact', compact('settings'));
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'concern' => 'required',
            'message' => 'nullable',
        ]);

        \App\Models\Lead::create([
            'name' => $request->firstName . ' ' . $request->lastName,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->concern,
            'message' => $request->message ?? 'No message provided',
        ]);

        return response()->json(['success' => true]);
    }

    public function faq()
    {
        return view('frontend.faq');
    }

    public function gallery()
    {
        return view('frontend.gallery');
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy-policy');
    }

    public function quiz()
    {
        return view('frontend.quiz');
    }

    public function serviceDetail()
    {
        return view('frontend.service-detail');
    }

    public function services()
    {
        return view('frontend.services');
    }

    public function successStories()
    {
        return view('frontend.success-stories');
    }
}
