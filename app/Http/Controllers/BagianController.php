<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use Illuminate\Http\Request;

class BagianController extends Controller
{

    // public function index()
    // {
    //     $bagian = Bagian::latest()->paginate(5);

    //     return view('index', compact('bagian'))
    //         ->with('i', (request()->input('page', 1) - 1) * 5);
    // }
    public function store(Request $request)
    {
        $request->validate([
            'bagian' => 'required'
        ]);

        Bagian::create($request->all());

        return redirect()->route('profile.index')
            ->with('success', 'Student created successfully.');
    }
}
