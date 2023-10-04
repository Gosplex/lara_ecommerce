<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(ColorFormRequest $request)
    {
        $validatedData = $request->validated();
        Color::create([
            'name' => $validatedData['name'],
            'code' => $validatedData['code'],
            'status' => $request->status == true ? 1 : 0,

        ]);
        return redirect()->route('admin.colors')->with('success', 'Color created successfully');
    }

    public function edit(Color $color)
    {
        return view('admin.colors.edit', compact('color'));
    }

    public function update(ColorFormRequest $request, Color $color)
    {
        $validatedData = $request->validated();
        $color->update([
            'name' => $validatedData['name'],
            'code' => $validatedData['code'],
            'status' => $request->status == true ? 1 : 0,
        ]);
        return redirect()->route('admin.colors')->with('success', 'Color updated successfully');
    }

    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('admin.colors')->with('success', 'Color deleted successfully');
    }
}
