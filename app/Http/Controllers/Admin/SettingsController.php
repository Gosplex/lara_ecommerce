<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        if ($setting) {
            $setting->update([
                'website_name' => $request->website_name,
                'website_url' => $request->website_url,
                'title' => $request->title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'company_address' => $request->company_address,
                'phone_1' => $request->phone_1,
                'phone_2' => $request->phone_2,
                'email_1' => $request->email_1,
                'email_2' => $request->email_2,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
            ]);

            return redirect()->back()->with('success', 'Settings updated successfully!');
        } else {
            Setting::create([
                'website_name' => $request->website_name,
                'website_url' => $request->website_url,
                'title' => $request->title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'company_address' => $request->company_address,
                'phone_1' => $request->phone_1,
                'phone_2' => $request->phone_2,
                'email_1' => $request->email_1,
                'email_2' => $request->email_2,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
            ]);

            return redirect()->back()->with('success', 'Settings created successfully!');
        }
    }
}
