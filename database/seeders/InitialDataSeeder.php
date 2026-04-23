<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Site Settings
        $settings = [
            ['key' => 'phone_number', 'value' => '+91 999 999 9999', 'group' => 'contact'],
            ['key' => 'email_address', 'value' => 'dr.yuvi@example.com', 'group' => 'contact'],
            ['key' => 'office_address', 'value' => 'Ethical Fertility Care, Ahmedabad, India', 'group' => 'contact'],
            ['key' => 'whatsapp_number', 'value' => '919999999999', 'group' => 'social'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/dr_yuvraj_jadeja', 'group' => 'social'],
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/dryuvrajjadeja', 'group' => 'social'],
            ['key' => 'site_title', 'value' => 'Dr. Yuvraj Jadeja | Ethical Fertility Care', 'group' => 'general'],
        ];

        foreach ($settings as $setting) {
            \App\Models\SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        // FAQs
        $faqs = [
            [
                'question' => 'How long does an IVF cycle typically take?',
                'answer' => 'Typically 4–8 weeks in total — covering initial consultations, ovarian stimulation (10–14 days), egg retrieval, fertilization, and embryo transfer.',
                'order' => 1
            ],
            [
                'question' => 'Is financial counseling available?',
                'answer' => 'Absolutely. We believe in zero hidden costs. Our financial coordinators establish a clear, transparent cost roadmap before any treatment begins — no surprises.',
                'order' => 2
            ],
            [
                'question' => 'What should I bring to my first appointment?',
                'answer' => 'Any previous medical records, prior fertility test results, a list of current medications, and history of previous treatments.',
                'order' => 3
            ],
        ];

        foreach ($faqs as $faq) {
            \App\Models\Faq::updateOrCreate(['question' => $faq['question']], $faq);
        }

        // Success Stories
        $stories = [
            [
                'title' => 'The 1% Chance Story',
                'video_url' => 'https://www.youtube.com/embed/_B8vH0l4Eio?controls=1',
                'treatment_type' => 'IVF · Ethical',
                'patient_name' => 'Anonymous',
                'order' => 1
            ],
            [
                'title' => 'Is IUI Right for You?',
                'video_url' => 'https://www.youtube.com/embed/YOUR_ID_2?controls=1',
                'treatment_type' => 'IUI',
                'patient_name' => 'Anonymous',
                'order' => 2
            ],
        ];

        foreach ($stories as $story) {
            \App\Models\SuccessStory::updateOrCreate(['title' => $story['title']], $story);
        }
    }
}
