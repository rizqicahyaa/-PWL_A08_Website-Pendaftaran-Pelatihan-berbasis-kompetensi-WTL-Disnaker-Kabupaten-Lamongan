<?php

namespace App\Http\Controllers;

use App\Models\PelatihanModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mengambil data dari table pelatihan
        $pelatihan = DB::table('pelatihan')->get();

        // mengirim data pelatihan ke view
        return view('v_admin_pelatihan', ['pelatihan' => $pelatihan]);
        // return view('v_admin_pelatihan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('v_admin_pelatihantambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gambar    = $request->file('gambar');
        $filename   = date('Y-m-d') . $gambar->getClientOriginalName();
        $path       = 'foto-pelatihan/' . $filename;
        Storage::disk('public')->put($path, file_get_contents($gambar));

        // insert data ke table pelatihan
        DB::table('pelatihan')->insert([
            'pelatihan' => $request->pelatihan,
            'tglmulaipelatihan' => $request->mulaipelatihan,
            'tglakhirpelatihan' => $request->akhirpelatihan,
            'tglmulaipendaftaran' => $request->mulaidaftar,
            'tglakhirpendaftaran' => $request->akhirdaftar,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'fasilitas' => $request->fasilitas,
            'gambar' => $filename,
            'status' => $request->status
        ]);
        // alihkan halaman ke halaman data pelatihan
        return redirect('/admin/pelatihan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        //get pelatihan by ID
        $pelatihan = PelatihanModel::findOrFail($id);

        //render view with pelatihan
        return view('v_admin_pelatihan', compact('pelatihan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //get pelatihan by ID
        $pelatihan = PelatihanModel::findOrFail($id);

        //render view with pelatihan
        return view('v_admin_pelatihanedit', compact('pelatihan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $pelatihan = PelatihanModel::find($id);
        $pelatihan-> pelatihan = $request-> pelatihan;
        $pelatihan-> tglmulaipelatihan = $request-> mulaipelatihan;
        $pelatihan-> tglakhirpelatihan = $request-> akhirpelatihan;
        $pelatihan-> tglmulaipendaftaran = $request-> mulaidaftar;
        $pelatihan-> tglakhirpendaftaran = $request-> akhirdaftar;
        $pelatihan-> lokasi = $request-> lokasi;
        $pelatihan-> deskripsi = $request-> deskripsi;
        $pelatihan-> fasilitas = $request-> fasilitas;
        $pelatihan-> status = $request-> status;

        if($request->hasFile('gambar')){
            $file = $request-> file('gambar');
            $filename = date('Y-m-d') . $file-> getClientOriginalName();
            $location = public_path('storage/foto-pelatihan');
            $file-> move($location, $filename);
            $oldImage = $pelatihan->gambar;
            Storage::delete($oldImage);
            $pelatihan-> gambar= $filename;
        }
        // dd($pelatihan);
        $pelatihan-> save();

        //redirect to index
        return redirect('/admin/pelatihan')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //ambil pelatihan berdasarkan ID
        $pelatihan = PelatihanModel::findOrFail($id);

        //Hapus Foto
        Storage::delete('public/foto-pelatihan/'. $pelatihan->gambar);

        //Hapus pelatihan
        $pelatihan->delete();
        return redirect('/admin/pelatihan')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
