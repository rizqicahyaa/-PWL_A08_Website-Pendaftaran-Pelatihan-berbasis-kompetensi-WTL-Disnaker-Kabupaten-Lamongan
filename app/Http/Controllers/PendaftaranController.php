<?php

namespace App\Http\Controllers;

use App\Models\datapeserta;
use App\Models\PelatihanModel;
use App\Models\PendaftaranModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id): View
    {

        // $pelatihan = PelatihanModel::findOrFail($id);
        // $pelatihan = PendaftaranModel::with(['pelatihan']);
        // $user = PendaftaranModel::with(['user']);
        // $datapeserta = PendaftaranModel::with(['datapeserta']);

        // $user = PendaftaranModel::with(['user'])->get();
        // $datapeserta = datapeserta::with(['datapeserta'])->get();
        // $pelatihan = PelatihanModel::findOrFail($id);
        // $pelatihan = PendaftaranModel::with(['pelatihan','datapeserta','user'])->get();
        $datapeserta = datapeserta::join('users','users.id','=','datapeserta.user_id')->where('datapeserta.user_id','=',Auth::user()->id)->get();
        $pelatihan = DB::table('pelatihan')->where('id','=',$id)->get();
                                        // dd($pelatihan);
        return view('v_peserta_enroll', compact('pelatihan','datapeserta'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $code = random_int(100000, 999999);

         // insert data ke table riwayat pelatihan
         DB::table('riwayatpelatihan')->insert([
            'user_id' => Auth::user()->id,
            'pelatihan_id' => $request->pelatihan_id ,
            // 'datapeserta_id' => $request->datapeserta_id,
            'tglpendaftaran' => now(),
            'nopendaftaran' => ('Reg'. date('dmY') . $code),
            'status_pendaftaran' => ('Menunggu Konfirmasi'),
            'created_at' => now()
        ]);
        // alihkan halaman ke halaman data riwayat pendaftaran
        return redirect('/riwayatpelatihan')->with('success', 'Pendaftaran Pelatihan Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        // $pendaftaran = PendaftaranModel::where('pendaftaran');
        $pendaftaran = PendaftaranModel::join('users', 'users.id','=','riwayatpelatihan.user_id')->
        join('datapeserta','datapeserta.user_id','=','users.id')->
        join('pelatihan','pelatihan.id','=','riwayatpelatihan.pelatihan_id')->
        where('riwayatpelatihan.user_id','=', Auth::user()->id)->get();

        return view('v_peserta_riwayatpelatihan', compact('pendaftaran'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PendaftaranModel $pendaftaranModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PendaftaranModel $pendaftaranModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PendaftaranModel $pendaftaranModel)
    {
        //
    }
}
