<?php

namespace App\Http\Controllers\Home;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->get();
        return view('home.index', compact('sliders'));
    }

    public function categories()
    {
        return view('home.collections.category.index');
    }
}
