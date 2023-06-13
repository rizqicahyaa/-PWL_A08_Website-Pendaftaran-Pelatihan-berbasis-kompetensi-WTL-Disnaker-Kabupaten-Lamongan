@extends('layout.v_template2')
@section('contentadmin')
    <!-- galeri Start-->
    <div class="row">
        @foreach ( $datapeserta as $datapeserta )
        <form action="{{ route('admin/peserta/edit-proses') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{$datapeserta->user_id}}">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="widget-tabs-int mg-t-30">
                <div class="tab-hd">
                    <h2>Edit Data Peserta</h2>
                </div>
                <div class="form-example-int form-horizental" style="margin-bottom: 50px;">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div
                                    style="border: 1px solid #cccccc; max-width: 100%; width: 300px; height: 320px; display: flex; align-items: center; justify-content: center;">
                                    <img src="{{ Storage::url('public/foto-user/') . $datapeserta->pasfoto }}"
                                        style="width: 200px;" alt="Gambar 1" id="pasfoto">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-4">Pas Foto</h3>
                                <input type="checkbox" name="cbcek" id="cbcek" value="GANTI"
                                    onclick="javascript: if(this.checked==true){
                                    document.getElementById('pasfoto').style.display='none';
                                }else{
                                    document.getElementById('pasfoto').style.display='block'; }" />
                                Centang jika foto mau diganti
                                <input type="file" name="pasfoto" id="pasfoto" />
                            </div>
                        </div>
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <label class="hrzn-fm">
                                    <h4>Nama Lengkap : </h4>
                                </label>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm"
                                        placeholder="Masukkan Nama Lengkap" name="nama" value="{{ old('nama', $datapeserta->name) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <label class="hrzn-fm">
                                    <h4>NIK : </h4>
                                </label>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="nik" placeholder="Masukkan NIK"
                                        value="{{ old('nik', $datapeserta->nik) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <label class="hrzn-fm">
                                    <h4>Email : </h4>
                                </label>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="email" placeholder="Masukkan Email"
                                        value="{{ old('email', $datapeserta->email) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <label class="hrzn-fm">
                                    <h4>No. HP : </h4>
                                </label>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="nohp" placeholder="Masukkan No. HP"
                                        value="{{ old('nohp', $datapeserta->nohp) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <label class="hrzn-fm">
                                    <h4>Alamat KTP : </h4>
                                </label>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm"
                                        placeholder="Masukkan Alamat KTP" name="alamatktp"
                                        value="{{ old('alamatktp', $datapeserta->alamatktp) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <label class="hrzn-fm">
                                    <h4>Alamat Domisili : </h4>
                                </label>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="alamatdomisili"
                                        placeholder="Masukkan Alamat Domisili"
                                        value="{{ old('alamatdomisili', $datapeserta->alamatdomisili) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-example-int mg-t-15" style="margin-bottom: 50px;">
                    <div class="material-design-btn">
                        <button class="btn notika-btn-1 btn-reco-mg btn-button-mg" type="submit">Simpan</button>
                        <button class="btn notika-btn-red btn-reco-mg btn-button-mg" type="reset">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
        @endforeach

    </div>
    <!-- galeri End-->
@endsection
