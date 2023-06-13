<?php

namespace App\Http\Controllers;

use App\Models\PelatihanModel;
use App\Models\PendaftaranModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PesertaPelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mengambil data dari table pelatihan
        $pelatihan = DB::table('pelatihan')->get();

        // mengirim data pelatihan ke view
        return view('v_peserta_jadwalpelatihan', ['pelatihan' => $pelatihan]);
        // return view('v_admin_pelatihan');
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
    public function show(string $id): View
    {
        //get pelatihan by ID
        $pelatihan = PelatihanModel::findOrFail($id);
        // $users =  PendaftaranModel::with(['pelatihan','user'])->get();

        //render view with pelatihan
        return view('v_peserta_jadwalpelatihandetail', compact('pelatihan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
