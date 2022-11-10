<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Profile;
use App\Models\Bagian;
use App\Models\Jenis_keb;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $profile = Profile::latest()->paginate();
        $bagian = Bagian::latest()->paginate();
        $jenis = Jenis_keb::latest()->paginate();
        $data = [
            'progres' => ['Dipelajari', 'Dikerjakan', 'Selesai', 'Dicanangkan'],
            'kategori' => ['Laporan', 'Permintaan'],
            'urgensi' => ['Urgent', 'Medium', 'Low']
        ];
        // dd($data);
        $data1 = DB::table('profiles')
            ->join('jenis_kebs', 'jenis_kebs.id_jenisKeb', '=', 'profiles.id_jenisKeb')
            ->join('bagians', 'bagians.id_bagian', '=', 'profiles.id_bagian')
            ->get();
        // dd($data1);
        //tampilkan view barang dan kirim datanya ke view tersebut
        return view('index', [
            'profile' => $profile,
            'bagian' => $bagian,
            'jenis' => $jenis,
            'data' => $data,
            'data1' => $data1
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([]);

        Profile::create($request->all());

        return redirect()->route('profile.index')
            ->with('success', 'Student created successfully.');
    }


    public function destroy($id)
    {
        DB::table('profiles')->where('id_profile', '=', $id)->delete();
        return redirect('prfile.index');
    }
}
