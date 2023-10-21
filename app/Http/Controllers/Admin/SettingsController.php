<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use App\Http\Controllers\Controller;

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

            if ($request->hasFile('about_img_1')) {
                $image = $request->file('about_img_1');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/about_images', $image_name);
                $setting->update(['about_img_1' => $image_name]);
            }

            if ($request->hasFile('about_img_2')) {
                $image = $request->file('about_img_2');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/about_images', $image_name);
                $setting->update(['about_img_2' => $image_name]);
            }

            if ($request->hasFile('about_img_3')) {
                $image = $request->file('about_img_3');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/about_images', $image_name);
                $setting->update(['about_img_3' => $image_name]);
            }

            if ($request->hasFile('favicon_image')) {
                $image = $request->file('favicon_image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/favicon_image', $image_name);
                $setting->favicon_image = $image_name;
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
                'about_text_1' => $request->about_text_1,
                'about_text_2' => $request->about_text_2,
                'about_text_3' => $request->about_text_3,
                'long_text_1' => $request->long_text_1,
                'long_text_2' => $request->long_text_2,
                'long_text_3' => $request->long_text_3,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'map' => $request->map,
                'color_code' => $request->color_code,
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

            if ($request->hasFile('about_img_1')) {
                $image = $request->file('about_img_1');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/about_images', $image_name);
                $settingsData['about_img_1'] = $image_name;
            }

            if ($request->hasFile('about_img_2')) {
                $image = $request->file('about_img_2');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/about_images', $image_name);
                $settingsData['about_img_2'] = $image_name;
            }

            if ($request->hasFile('about_img_3')) {
                $image = $request->file('about_img_3');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/about_images', $image_name);
                $settingsData['about_img_3'] = $image_name;
            }

            if ($request->hasFile('favicon_image')) {
                $image = $request->file('favicon_image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/favicon_image', $image_name);
                $settingsData['favicon_image'] = $image_name;
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
            $settingsData['about_text_1'] = $request->about_text_1;
            $settingsData['about_text_2'] = $request->about_text_2;
            $settingsData['about_text_3'] = $request->about_text_3;
            $settingsData['long_text_1'] = $request->long_text_1;
            $settingsData['long_text_2'] = $request->long_text_2;
            $settingsData['long_text_3'] = $request->long_text_3;
            $settingsData['facebook'] = $request->facebook;
            $settingsData['twitter'] = $request->twitter;
            $settingsData['instagram'] = $request->instagram;
            $settingsData['youtube'] = $request->youtube;
            $settingsData['color_code'] = $request->color_code;


            Setting::create($settingsData);

            return redirect()->back()->with('success', 'Settings created successfully!');
        }
    }
    public function store(TeamRequest $request)
    {
        $validatedData = $request->validated();

        $team = new Team;

        if ($request->hasFile('team_image')) {
            $image = $request->file('team_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/team_images', $image_name);

            $validatedData['team_image'] = $image_name;
        }

        $team->team_name = $validatedData['team_name'];
        $team->team_title = $validatedData['team_title'];
        $team->team_image = $validatedData['team_image'];
        $team->team_facebook = $validatedData['team_facebook'];
        $team->team_twitter = $validatedData['team_twitter'];
        $team->team_linkedin = $validatedData['team_linkedin'];
        $team->team_instagram = $validatedData['team_instagram'];

        $team->save();

        return redirect()->route('admin.settings')->with('success', 'Team member added successfully');
    }
}
