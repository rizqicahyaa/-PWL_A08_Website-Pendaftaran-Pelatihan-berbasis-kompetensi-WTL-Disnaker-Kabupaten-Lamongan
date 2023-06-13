<?php

namespace App\Http\Controllers;

use App\Models\datapeserta;
use App\Models\PendaftaranModel;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datapeserta = DB::table('datapeserta')->join('users', 'users.id', '=', 'datapeserta.user_id')->where('role', '=', 'peserta')->get();
        return view('v_admin_peserta', compact('datapeserta'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(datapeserta $datapeserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        // $users = User::all();
        // $datapeserta = datapeserta::findOrFail($id);
        $datapeserta = datapeserta::join('users', 'users.id', '=', 'datapeserta.user_id')->where('users.id', '=', $id)->get();
        //render view with datapeserta
        return view('v_admin_pesertaedit', compact('datapeserta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->hasFile('pasfoto')) {
            $file = $request->file('pasfoto');
            $filename = date('Y-m-d') . $file->getClientOriginalName();
            $location = public_path('storage/foto-user');
            $file->move($location, $filename);
            // $oldImage = $datapeserta->pasfoto;
            Storage::delete($file);
            // $datapeserta->pasfoto = $filename;
        }
// dd($request->hasFile('pasfoto'));


        DB::table('datapeserta')->join('users', 'users.id', '=', 'datapeserta.user_id')->where('datapeserta.user_id',  $request->user_id)->update([
            'name' => $request->nama,
            'email' => $request->email,
            'nik' => $request->nik,
            'nohp'  => $request->nohp,
            'alamatktp' => $request->alamatdomisili,
            'alamatdomisili' => $request->alamatktp
            // 'pasfoto' => $filename
        ]);

        //mengalihkan halaman ke data peserta
        return redirect('/admin/peserta')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //ambil datapeserta berdasarkan ID
        $datapeserta = User::findOrFail($id);
        // $datapeserta = datapeserta::join('users', 'users.id', '=', 'datapeserta.user_id')->where('datapeserta.id', '=', $id)->get(['users.*', 'datapeserta.*']);
// dd($datapeserta);
        //hapus foto
        Storage::delete('public/foto-user/' . $datapeserta->pasfoto);
        Storage::delete('public/foto-user/' . $datapeserta->ijazah);
        Storage::delete('public/foto-user/' . $datapeserta->ktp);
        Storage::delete('public/foto-user/' . $datapeserta->skd);

        //hapus datapeserta
        $datapeserta->delete();
        return redirect('/admin/peserta')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function indexbelumlulus()
    {
        // $pendaftaran = PendaftaranModel::join('pelatihan', 'pelatihan.id', '=', 'riwayatpelatihan.pelatihan_id')
        // ->join('users', 'users.id', '=', 'riwayatpelatihan.user_id')
        // ->join('datapeserta', 'datapeserta.user_id', '=', 'users.id')
        // ->where('riwayatpelatihan.status_pendaftaran', '=', 'Tidak Lulus')
        // ->get(['riwayatpelatihan.*', 'pelatihan.pelatihan', 'users.name', 'datapeserta.*']);

        $pendaftaran = PendaftaranModel::join('users', 'users.id','=','riwayatpelatihan.user_id')->
        join('datapeserta','datapeserta.user_id','=','users.id')->
        join('pelatihan','pelatihan.id','=','riwayatpelatihan.pelatihan_id')->
        where('riwayatpelatihan.status_pendaftaran','=','Tidak Lulus')->
        get(['riwayatpelatihan.*','pelatihan.pelatihan','users.name','datapeserta.nik','datapeserta.nohp','datapeserta.pasfoto','datapeserta.ijazah','datapeserta.ktp','datapeserta.skd']);

        return view('v_admin_pesertabelumlulus', compact('pendaftaran'));
    }

    public function editbelumlulus(string $id): View
    {
        $pendaftaran = PendaftaranModel::join('users', 'users.id', '=', 'riwayatpelatihan.user_id')
        ->join('datapeserta', 'datapeserta.user_id', '=', 'users.id')
        ->join('pelatihan', 'pelatihan.id', '=', 'riwayatpelatihan.pelatihan_id')
        ->where('riwayatpelatihan.id', '=', $id)
        ->get(['riwayatpelatihan.*','pelatihan.pelatihan','pelatihan.tglmulaipelatihan','pelatihan.tglakhirpelatihan','pelatihan.tglmulaipendaftaran','pelatihan.tglakhirpendaftaran',
        'users.name','users.email','datapeserta.nik','datapeserta.nohp','datapeserta.pasfoto','datapeserta.ijazah','datapeserta.ktp','datapeserta.skd']);
        // dd($id);

        return view('v_admin_pesertabelumlulusedit', compact('pendaftaran'));
    }


    public function updatebelumlulus(Request $request)
    {
        DB::table('riwayatpelatihan')->where('id', '=', $request->id)->update([
            'status_pendaftaran' => $request->status_pendaftaran,
            'updated_at' => now()
        ]);
        // dd($request->id);

        // $pendaftaran = PendaftaranModel::find($id);
        // $pendaftaran-> status_pendaftaran = $request-> status_pendaftaran;
        // $pendaftaran-> save();

        //mengalihkan halaman ke data peserta belum lulus
        return redirect('admin/pesertabelumlulus')->with(['success' => 'Data Berhasil Diubah!']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroybelumlulus($id): RedirectResponse
    {
        //ambil pendaftaran berdasarkan ID
        $pendaftaran = PendaftaranModel::findOrFail($id);
        //Hapus pendaftaran
        $pendaftaran->delete();
        return redirect('/admin/pesertabelumlulus')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function indexlulus()
    {
        $pendaftaran = PendaftaranModel::join('users', 'users.id','=','riwayatpelatihan.user_id')->
        join('datapeserta','datapeserta.user_id','=','users.id')->
        join('pelatihan','pelatihan.id','=','riwayatpelatihan.pelatihan_id')->
        where('riwayatpelatihan.status_pendaftaran','=','Lulus')->
        get(['riwayatpelatihan.*','pelatihan.pelatihan','users.name','datapeserta.nik','datapeserta.nohp','datapeserta.pasfoto','datapeserta.ijazah','datapeserta.ktp','datapeserta.skd']);

        return view('v_admin_pesertalulus', compact('pendaftaran'));
    }

    public function editlulus(string $id): View
    {
        $pendaftaran = PendaftaranModel::join('users', 'users.id', '=', 'riwayatpelatihan.user_id')
        ->join('datapeserta', 'datapeserta.user_id', '=', 'users.id')
        ->join('pelatihan', 'pelatihan.id', '=', 'riwayatpelatihan.pelatihan_id')
        ->where('riwayatpelatihan.id', '=', $id)
        ->get(['riwayatpelatihan.*','pelatihan.pelatihan','pelatihan.tglmulaipelatihan','pelatihan.tglakhirpelatihan','pelatihan.tglmulaipendaftaran','pelatihan.tglakhirpendaftaran',
        'users.name','users.email','datapeserta.nik','datapeserta.nohp','datapeserta.pasfoto','datapeserta.ijazah','datapeserta.ktp','datapeserta.skd']);

        return view('v_admin_pesertalulusedit', compact('pendaftaran'));
    }

    public function updatelulus(Request $request)
    {
        DB::table('riwayatpelatihan')->where('id', '=', $request->id)->update([
            'status_pendaftaran' => $request->status_pendaftaran,
            'updated_at' => now()
        ]);

        //mengalihkan halaman ke data peserta
        return redirect('/admin/pesertalulus')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroylulus($id): RedirectResponse
    {
        //ambil pendaftaran berdasarkan ID
        $pendaftaran = PendaftaranModel::findOrFail($id);
        //Hapus pendaftaran
        $pendaftaran->delete();
        return redirect('/admin/pesertalulus')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
