<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('home.profile.index', compact('user'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
        ]);

        $user = User::findOrfail(Auth::user()->id);

        $user->update([
            'name' => $request->name,
        ]);

        $user->userDetail()->updateorCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'address' => $request->address,
                'zip_code' => $request->zip_code,
                'phone' => $request->phone,
            ]
        );

        return back()->with('message', 'Profile updated successfully!');
    }

    function changePswd() {
        return view('home.profile.password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if ($currentPasswordStatus) {

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message', 'Password Updated Successfully');
        } else {

            return redirect()->back()->with('message', 'Current Password does not match with Old Password');
        }
    }
}
