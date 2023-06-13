<?php

namespace App\Http\Controllers;

use App\Models\datapeserta;
use App\Models\PelatihanModel;
use App\Models\PendaftaranModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\userModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    ///peserta///

    function peserta()
    {
        // $pendaftaran = PendaftaranModel::join('users', 'users.id','=','riwayatpelatihan.user_id')->
        // where('riwayatpelatihan.status_pendaftaran','=','Lolos','Tidak Lolos')->
        // where('riwayatpelatihan.user_id','=', Auth::user()->id)->
        // get(['riwayatpelatihan.*','users.*']);
        $peserta = DB::table('users')->where('role','=','peserta')->get();
        $pelatihan = DB::table('pelatihan')->get();
        return view('v_peserta_beranda', compact('peserta','pelatihan'));
    }

    /**
     * Display the specified resource.
     */
    public function index()
    {
        // mengambil data dari table users
        // $datapeserta = DB::table('datapeserta')->join('users','users.id' , '=', 'datapeserta.user_id')->get();
        $user = auth()->id();
        $datapeserta = datapeserta::where('user_id', $user)->get();
        // dd($datapeserta);

        // mengirim data ke view
        return view('v_peserta_profil', compact('datapeserta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $user = auth()->id();
        $datapeserta = datapeserta::where('user_id', $user)->get();

        //render view with datapeserta
        return view('v_peserta_profiledit', compact('user', 'datapeserta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // $datapeserta = datapeserta::all();
        // $datapeserta =  DB::table('datapeserta')->join('users', 'users.id', '=', 'datapeserta.user_id')->where('user_id', $id)->get();
        // $user = auth()->id();
        // $datapeserta = datapeserta::findOrFail('user_id', $id);
        // $datapeserta->nik = $request->nik;
        // $datapeserta->nohp = $request->nohp;
        // $datapeserta->email = $request->email;
        // $datapeserta->name = $request->nama;
        // $datapeserta->alamatdomisili = $request->alamatdomisili;
        // $datapeserta->alamatktp = $request->alamatktp;
        if ($request->hasFile('pasfoto')) {
            $file = $request->file('pasfoto');
            $filename = date('Y-m-d') . $file->getClientOriginalName();
            $location = public_path('storage/foto-user');
            $file->move($location, $filename);
            // $oldImage = $datapeserta->pasfoto;
            Storage::delete($file);
            // $datapeserta->pasfoto = $filename;
        }
        DB::table('datapeserta')->join('users', 'users.id', '=', 'datapeserta.user_id')->where('user_id', $id)->update([
            'name' => $request->nama,
            'email' => $request->email,
            'nik' => $request->nik,
            'nohp'  => $request->nohp,
            'alamatktp' => $request->alamatdomisili,
            'alamatdomisili' => $request->alamatktp,
            'pasfoto' => $filename
        ]);


        // $datapeserta->save();

        //redirect to profil
        return redirect('/profil')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function berkasedit(string $id): View
    {

        $datapeserta = datapeserta::find($id);

        //render view with datapeserta
        return view('v_peserta_berkasedit', compact('datapeserta'));
    }

    public function berkasupdate(Request $request, $id): RedirectResponse
    {
        $datapeserta = datapeserta::find($id);
        if ($request->hasFile('ijazah')) {
            $file = $request->file('ijazah');
            $filename1 = date('Y-m-d') . $file->getClientOriginalName();
            $location = public_path('storage/foto-user');
            $file->move($location, $filename1);
            $oldImage1 = $datapeserta->ijazah;
            Storage::delete($oldImage1);
            $datapeserta->ijazah = $filename1;
        } elseif ($request->hasFile('ktp')) {
            $file = $request->file('ktp');
            $filename2 = date('Y-m-d') . $file->getClientOriginalName();
            $location = public_path('storage/foto-user');
            $file->move($location, $filename2);
            $oldImage2 = $datapeserta->ktp;
            Storage::delete($oldImage2);
            $datapeserta->ktp = $filename2;
        } else {
            $file = $request->file('skd');
            $filename3 = date('Y-m-d') . $file->getClientOriginalName();
            $location = public_path('storage/foto-user');
            $file->move($location, $filename3);
            $oldImage3 = $datapeserta->skd;
            Storage::delete($oldImage3);
            $datapeserta->skd = $filename3;
        }

        $datapeserta->save();

        //redirect to index
        return redirect('/profil')->with(['success' => 'Data Berhasil Diubah!']);
    }


    ///endpeserta///

    function admin()
    {
        $lulus = DB::table('riwayatpelatihan')->where('status_pendaftaran','=','Lulus')->get();
        $tidaklulus = DB::table('riwayatpelatihan')->where('status_pendaftaran','=','Tidak Lulus')->get();
        $menunggu = DB::table('riwayatpelatihan')->where('status_pendaftaran','=','Menunggu Konfirmasi')->get();
        $pendaftaran = DB::table('riwayatpelatihan')->get();
        $sedangpelatihan = DB::table('riwayatpelatihan')->where('status_pendaftaran','=','Sedang Pelatihan')->get();
        $peserta = DB::table('users')->where('role','=','peserta')->get();
        $pelatihan = PelatihanModel::all();
        return view('v_admin_dashboard', compact('menunggu','tidaklulus','lulus','sedangpelatihan','pendaftaran','peserta','pelatihan'));
    }

    public function admin_profil()
    {
        return view('v_admin_profil');
    }
    public function admin_profiledit()
    {
        return view('v_admin_profiledit');
    }
    public function admin_update(Request $request, $id)
    {
        if ($request->password) {
            $password = Hash::make($request->password);
        } else {
            $password = $request->old_password;
        }

        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  $password,
        ]);

        return redirect('/admin/profil')->with('success', 'Profil Berhasil diperbarui');
    }
}
