<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DataPendaftaranController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function index(Request $id)
    {
        $pendaftaran = PendaftaranModel::join('users', 'users.id','=','riwayatpelatihan.user_id')->
        join('datapeserta','datapeserta.user_id','=','users.id')->
        join('pelatihan','pelatihan.id','=','riwayatpelatihan.pelatihan_id')->orderBy('riwayatpelatihan.status_pendaftaran','asc')->
        get(['riwayatpelatihan.*','pelatihan.pelatihan','users.name','datapeserta.nik','datapeserta.nohp']);

        return view('v_admin_pendaftaran', compact('pendaftaran'));

    }

    public function edit(string $id): View
    {
        $pendaftaran = PendaftaranModel::join('users', 'users.id', '=', 'riwayatpelatihan.user_id')
        ->join('datapeserta', 'datapeserta.user_id', '=', 'users.id')
        ->join('pelatihan', 'pelatihan.id', '=', 'riwayatpelatihan.pelatihan_id')
        ->where('riwayatpelatihan.id', '=', $id)
        ->get(['riwayatpelatihan.*','pelatihan.pelatihan','pelatihan.tglmulaipelatihan','pelatihan.tglakhirpelatihan','pelatihan.tglmulaipendaftaran','pelatihan.tglakhirpendaftaran',
        'users.name','users.email','datapeserta.nik','datapeserta.nohp','datapeserta.pasfoto','datapeserta.ijazah','datapeserta.ktp','datapeserta.skd']);

        return view('v_admin_pendaftaranedit', compact('pendaftaran'));
    }

    public function update(Request $request)
    {
        DB::table('riwayatpelatihan')->
        where('id','=',$request->id)->update([
            'status_pendaftaran' => $request->status_pendaftaran,
            'updated_at' => now()
        ]);

        //mengalihkan halaman ke data peserta
        return redirect('/admin/pendaftaran')->with(['success', 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //ambil pendaftaran berdasarkan ID
        $pendaftaran = PendaftaranModel::findOrFail($id);
        //Hapus pendaftaran
        $pendaftaran->delete();
        return redirect('/admin/pendaftaran')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
