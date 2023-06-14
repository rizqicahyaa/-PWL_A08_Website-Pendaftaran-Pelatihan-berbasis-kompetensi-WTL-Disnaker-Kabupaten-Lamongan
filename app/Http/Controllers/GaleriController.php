<?php

namespace App\Http\Controllers;

use App\Models\GaleriModel;
use App\Models\PelatihanModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'peserta') {
            // mengambil data dari table galeri
            $galeri = DB::table('pelatihan')->join('galeri', 'galeri.pelatihan_id', '=', 'pelatihan.id')->get();

            // mengirim data galeri ke view
            return view('v_peserta_galeri', compact('galeri'));
        } elseif (Auth::user()->role == 'admin') {
            // mengambil data dari table galeri
            $galeri = DB::table('pelatihan')->join('galeri', 'galeri.pelatihan_id', '=', 'pelatihan.id')->get();

            // mengirim data galeri ke view
            return view('v_admin_galeri', compact('galeri'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelatihan = PelatihanModel::all();
        return view('v_admin_galeritambah', compact('pelatihan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gambar1    = $request->file('gambar1');
        $filename1   = date('Y-m-d') . $gambar1->getClientOriginalName();
        $path       = 'foto-galeri/' . $filename1;
        Storage::disk('public')->put($path, file_get_contents($gambar1));

        $gambar2    = $request->file('gambar2');
        $filename2   = date('Y-m-d') . $gambar2->getClientOriginalName();
        $path       = 'foto-galeri/' . $filename2;
        Storage::disk('public')->put($path, file_get_contents($gambar2));

        $gambar3    = $request->file('gambar3');
        $filename3   = date('Y-m-d') . $gambar3->getClientOriginalName();
        $path       = 'foto-galeri/' . $filename3;
        Storage::disk('public')->put($path, file_get_contents($gambar3));

        // insert data ke table galeri
        DB::table('galeri')->insert([
            'admin_id' => Auth::user()->id,
            'pelatihan_id' => $request->pelatihan_id,
            'gambar1' => $filename1,
            'gambar2' => $filename2,
            'gambar3' => $filename3,
            'created_at' => now()
        ]);
        // alihkan halaman ke halaman data galeri
        return redirect('/admin/galeri');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        // mengambil data dari table galeri
        $galeri = GaleriModel::findOrFail($id);
        // $galeri = PelatihanModel::join('galeri', 'galeri.pelatihan_id' , '=','pelatihan.id')->where('galeri.pelatihan_id','=',$id)->get();

        // mengirim data galeri ke view
        return view('v_peserta_galeridetail', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $pelatihan = PelatihanModel::all();
        //get galeri by ID
        $galeri = GaleriModel::findOrFail($id);

        //render view with galeri
        return view('v_admin_galeriedit', compact('galeri', 'pelatihan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $galeri = GaleriModel::find($id);

        if ($request->hasFile('gambar1')) {
            $file = $request->file('gambar1');
            $filename1 = date('Y-m-d') . $file->getClientOriginalName();
            $location = public_path('storage/foto-galeri');
            $file->move($location, $filename1);
            $oldImage = $galeri->gambar1;
            Storage::delete($oldImage);
            $galeri->gambar1 = $filename1;
        }
        if ($request->hasFile('gambar2')) {
            $file = $request->file('gambar2');
            $filename2 = date('Y-m-d') . $file->getClientOriginalName();
            $location = public_path('storage/foto-galeri');
            $file->move($location, $filename2);
            $oldImage = $galeri->gambar2;
            Storage::delete($oldImage);
            $galeri->gambar2 = $filename2;
        }
        if ($request->hasFile('gambar3')){
            $file = $request->file('gambar3');
            $filename3 = date('Y-m-d') . $file->getClientOriginalName();
            $location = public_path('storage/foto-galeri');
            $file->move($location, $filename3);
            $oldImage = $galeri->gambar3;
            Storage::delete($oldImage);
            $galeri->gambar3 = $filename3;
        }

        $galeri->save();
        
        $galeri = GaleriModel::join('pelatihan','pelatihan.id','=','galeri.pelatihan_id')->where('galeri.id', '=', $request->id)->update([
            'pelatihan_id' => $request->pelatihan_id
        ]);
        
        //redirect to index
        return redirect('/admin/galeri')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //get galeri by ID
        $galeri = GaleriModel::findOrFail($id);

        //delete gambar
        Storage::delete('public/foto-galeri/' . $galeri->gambar1);
        Storage::delete('public/foto-galeri/' . $galeri->gambar2);
        Storage::delete('public/foto-galeri/' . $galeri->gambar3);

        //delete galeri
        $galeri->delete();
        return redirect('/admin/galeri')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
