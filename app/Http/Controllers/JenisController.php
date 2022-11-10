<?php

namespace App\Http\Controllers;

use App\Models\Jenis_keb;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'jenis_keb' => 'required'
        ]);

        Jenis_keb::create($request->all());

        return redirect()->route('profile.index')
            ->with('success', 'Student created successfully.');
    }
}
