@extends('layout.v_template')
@section('content')
    <!-- page title -->
    <section class="page-title-section overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb mb-2">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary"
                                href="{{ route('peserta') }}">Beranda</a>
                        </li>
                        <li class="list-inline-item nasted"><a class="h2 text-primary font-secondary"
                                href="{{ url('profil') }}">Profil</a></li>
                        <li class="list-inline-item text-dark h2 font-secondary nasted"><strong> Edit Berkas</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- /page title -->

    <!-- berkas -->
    <section class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-title">Edit Berkas</h2>
                </div>
            </div>
            <form action="{{ route('berkas/edit-proses', ['id' => $datapeserta->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    @php
                        $path1 = Storage::url('public/foto-user/' . $datapeserta->ijazah);
                        $path2 = Storage::url('public/foto-user/' . $datapeserta->ktp);
                        $path3 = Storage::url('public/foto-user/' . $datapeserta->skd);
                    @endphp
                    <div class="row">
                        <!-- ijazah/skl-->
                        <div class="col-lg-5 mb-4 mb-lg-0">
                            <div
                                style="border: 1px solid #cccccc; max-width: 100%; width: 300px; height: 320px; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ asset($path1) }}" style="width: 200px;" alt="Foto Ijazah/SKL" id="ijazah">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <h3 class="mb-4">Scan FC Ijazah Terakhir / SKL</h3>
                            <input type="checkbox" name="cbcek" id="cbcek" value="GANTI"
                                onclick="javascript: if(this.checked==true){
                            document.getElementById('ijazah').style.display='none';
                        }else{
                            document.getElementById('ijazah').style.display='block'; }" />
                            Centang jika foto mau diganti
                            <input type="file" name="ijazah" id="ijazah" />
                        </div>
                        <!-- /ijazah/skl -->

                        <!-- ktp-->
                        <div class="col-lg-5 mb-4 mb-lg-0">
                            <div
                                style="border: 1px solid #cccccc; max-width: 100%; width: 300px; height: 320px; display: flex; align-items: center; justify-content: center;  margin-top:45px;">
                                <img src="{{ asset($path2) }}" style="width: 200px;" alt="Foto KTP" id="ktp">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <h3 class="mb-4 mt-5">Scan FC KTP</h3>
                            <input type="checkbox" name="cbcek" id="cbcek" value="GANTI2"
                                onclick="javascript: if(this.checked==true){
                            document.getElementById('ktp').style.display='none';
                        }else{
                            document.getElementById('ktp').style.display='block'; }" />
                            Centang jika foto mau diganti
                            <input type="file" name="ktp" id="ktp" />
                        </div>
                        <!-- /ktp -->

                        <!-- surat keterangan domisili-->
                        <div class="col-lg-5 mb-4 mb-lg-0">
                            <div
                                style="border: 1px solid #cccccc; max-width: 100%; width: 300px; height: 320px; display: flex; align-items: center; justify-content: center;  margin-top:45px;">
                                <img src="{{ asset($path3) }}" style="width: 200px;" alt="Foto SKD" id="skd">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <h3 class="mt-5">Scan Surat Keterangan Domisili dari Kelurahan</h3>
                            <p class="mb-4 text-dark">*Jika Alamat KTP berbeda dengan Alamat Domisili</p>
                            <input type="checkbox" name="cbcek" id="cbcek" value="GANTI3"
                                onclick="javascript: if(this.checked==true){
                            document.getElementById('skd').style.display='none';
                        }else{
                            document.getElementById('skd').style.display='block'; }" />
                            Centang jika foto mau diganti
                            <input type="file" name="skd" id="skd" />
                        </div>
                        <!-- /surat keterangan domisili -->

                        <div class="col-lg-12 mt-5 text-right">
                            <button type="submit" value="send" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
            </form>
        </div>
    </section>
    <!-- /berkas -->
@endsection
