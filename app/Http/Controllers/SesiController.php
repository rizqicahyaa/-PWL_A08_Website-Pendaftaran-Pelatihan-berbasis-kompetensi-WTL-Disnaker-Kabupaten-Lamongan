<?php

namespace App\Http\Controllers;

use App\Models\datapeserta;
use App\Models\PendaftaranModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SesiController extends Controller
{
    function index()
    {

        $peserta = DB::table('users')->where('role','=','peserta')->get();
        $pelatihan = DB::table('pelatihan')->get();
        return view('v_peserta_beranda', compact('peserta','pelatihan'));
    }

    function login()
    {
        return view('v_peserta_login');
    }
    function login_proses(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ], [
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'peserta'){
                return redirect('/peserta');
            }elseif(Auth::user()->role == 'admin'){
                return redirect('/admin');
            }
        }else{
            return redirect('login')->withErrors('Email dan Password yang dimasukkan tidak valid. Silahkan coba lagi')->withInput();
        }
    }

    function daftar()
    {
        return view('v_peserta_daftar');
    }
    function daftar_proses(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8'
        ], [
            'name.required'=>'Nama Lengkap wajib diisi',
            'email.required'=>'Email wajib diisi',
            'email.email'=>'Silahkan masukkan email yang valid',
            'email.unique'=>'Email sudah pernah digunakkan. Silahkan pilih email yang lain',
            'password.required'=>'Password wajib diisi',
            'password.min'=>'Password yang dimasukkan minimal 8 karakter',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'peserta'){
                return redirect('/isidata');
            }elseif(Auth::user()->role == 'admin'){
                return redirect('/admin');
            }
        }else{
            return redirect('daftar')->withErrors('Email dan Password yang dimasukkan tidak valid. Silahkan coba lagi')->withInput();
        }
    }

    function isidata()
    {
        return view('v_peserta_isidata');
    }
    //error property
    function isidata_proses(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:datapeserta,nik',
            'nohp' => 'required',
            'umur' => 'required',
            'alamatktp' => 'required',
            'alamatdomisili' => 'required',
            'skd' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'ktp' => 'required|mimes:png,jpg,jpeg|max:2048',
            'ijazah' => 'required|mimes:png,jpg,jpeg|max:2048',
            'pasfoto' => 'required|mimes:png,jpg,jpeg|max:2048'
        ], [
            'nik.required'=>'NIK wajib diisi',
            'nik.unique'=>'NIK sudah pernah digunakkan',
            'nohp.required'=>'No. Hp wajib diisi',
            'umur.required'=>'Umur wajib diisi',
            'alamatktp.required'=>'Alamat KTP wajib diisi',
            'alamatdomisili.required'=>'Alamat Domisili wajib diisi',
            'ktp.required'=>'Foto KTP wajib diisi',
            'ijazah.required'=>'Foto Ijazah wajib diisi',
            'pasfoto.required'=>'Pas Foto wajib diisi',
        ]);


        $fotoskd    = $request->file('skd');
        $filename1   = date('Y-m-d').$fotoskd->getClientOriginalName();
        $path       = 'foto-user/'.$filename1;

        Storage::disk('public')->put($path,file_get_contents($fotoskd));

        $fotoktp    = $request->file('ktp');
        $filename2   = date('Y-m-d').$fotoktp->getClientOriginalName();
        $path       = 'foto-user/'.$filename2;

        Storage::disk('public')->put($path,file_get_contents($fotoktp));

        $fotoijazah    = $request->file('ijazah');
        $filename3   = date('Y-m-d').$fotoijazah->getClientOriginalName();
        $path       = 'foto-user/'.$filename3;

        Storage::disk('public')->put($path,file_get_contents($fotoijazah));

        $pasfoto    = $request->file('pasfoto');
        $filename4   = date('Y-m-d').$pasfoto->getClientOriginalName();
        $path       = 'foto-user/'.$filename4;

        Storage::disk('public')->put($path,file_get_contents($pasfoto));

        // $email = $request->session()->get('email');
        // $id = User::where('email', $email)->select('id')->get();
        DB::table('datapeserta')->insert([
            'user_id' => Auth::user()->id,
            'nik'    => $request->nik,
            'nohp'   => $request->nohp,
            'umur'   => $request->umur,
            'alamatktp'  => $request->alamatktp,
            'alamatdomisili' => $request->alamatdomisili,
            'pasfoto'        => $filename4,
            'ijazah'     => $filename3,
            'ktp'        => $filename2,
            'skd'        => $filename1,
            'created_at' => now()
         ]);

        // $infologin = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];

        // if(Auth::attempt($infologin)){
        //     if(Auth::user()->role == 'peserta'){
        //         return redirect('/peserta');
        //     }elseif(Auth::user()->role == 'admin'){
        //         return redirect('/admin');
        //     }
        // }else{
        //     return redirect('isidata')->withErrors('Isi Data Gagal. Silahkan coba lagi')->withInput();
        // }
        return redirect('/peserta')->with(['success' => 'Daftar Berhasil!']);

    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
