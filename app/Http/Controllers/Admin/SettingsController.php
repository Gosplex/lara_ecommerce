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

            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/website_details', $image_name);
                $setting->update(['logo' => $image_name]);
            }

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
                'map' => $request->map,
            ]);

            return redirect()->back()->with('success', 'Settings updated successfully!');
        } else {
            $settingsData = [];

            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/website_details', $image_name);
                $settingsData['logo'] = $image_name;
            }

            $settingsData['website_name'] = $request->website_name;
            $settingsData['website_url'] = $request->website_url;
            $settingsData['title'] = $request->title;
            $settingsData['meta_keywords'] = $request->meta_keywords;
            $settingsData['meta_description'] = $request->meta_description;
            $settingsData['company_address'] = $request->company_address;
            $settingsData['phone_1'] = $request->phone_1;
            $settingsData['phone_2'] = $request->phone_2;
            $settingsData['email_1'] = $request->email_1;
            $settingsData['email_2'] = $request->email_2;
            $settingsData['email_2'] = $request->email_2;
            $settingsData['facebook'] = $request->facebook;
            $settingsData['twitter'] = $request->twitter;
            $settingsData['instagram'] = $request->instagram;
            $settingsData['youtube'] = $request->youtube;


            Setting::create($settingsData);

            return redirect()->back()->with('success', 'Settings created successfully!');
        }
    }
}
