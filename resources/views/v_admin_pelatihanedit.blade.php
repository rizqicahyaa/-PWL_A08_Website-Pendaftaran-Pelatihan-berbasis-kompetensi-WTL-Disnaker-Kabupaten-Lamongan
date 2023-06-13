@extends('layout.v_template2')
@section('contentadmin')
    <!-- galeri Start-->
    <div class="row">
        <form action="{{ route('admin/pelatihan/edit-proses',  ["id" => $pelatihan->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="widget-tabs-int mg-t-30">
                    <div class="tab-hd">
                        <h2>Edit Data Pelatihan</h2>
                    </div>
                    <div class="form-example-int form-horizental" style="margin-bottom: 50px;">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div
                                        style="border: 1px solid #cccccc; max-width: 100%; width: 300px; height: 320px; display: flex; align-items: center; justify-content: center;">
                                        <img src="{{ Storage::url('public/foto-pelatihan/').$pelatihan->gambar }}" style="width: 200px;"
                                            alt="Gambar 1" id="gambar">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">Gambar Pelatihan</h3>
                                    <input type="checkbox" name="cbcek" id="cbcek" value="GANTI"
                                        onclick="javascript: if(this.checked==true){
                                        document.getElementById('gambar').style.display='none';
                                    }else{
                                        document.getElementById('gambar').style.display='block'; }" />
                                    Centang jika foto mau diganti
                                    <input type="file" name="gambar" id="gambar" />
                                </div>
                            </div>
                            <div class="row" style="margin-top: 50px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">
                                        <h4>Nama Pelatihan : </h4>
                                    </label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm"
                                            placeholder="Masukkan Nama Pelatihan" id="pelatihan" name="pelatihan"
                                            value="{{ old('pelatihan', $pelatihan->pelatihan) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 50px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">
                                        <h4>Status : </h4>
                                    </label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="bootstrap-select fm-cmp-mg" >
                                        <select class="selectpicker" id="status" name="status">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="Buka" {{ old('status',$pelatihan)=='Buka' ? 'selected' : ''  }}>Buka</option>
                                            <option value="Tutup" {{ old('status',$pelatihan)=='Tutup' ? 'selected' : ''  }}>Tutup</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 50px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">
                                        <h4>Tanggal Mulai Pendaftaran : </h4>
                                    </label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="date" class="form-control input-sm"
                                            placeholder="Pilih Tanggal Mulai Pendaftaran" id="mulaidaftar" name="mulaidaftar"
                                            value="{{ old('mulaidaftar', $pelatihan->tglmulaipendaftaran) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 50px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">
                                        <h4>Tanggal Akhir Pendaftaran : </h4>
                                    </label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="date" class="form-control input-sm"
                                            placeholder="Pilih Tanggal Akhir Pendaftaran" id="akhirdaftar" name="akhirdaftar"
                                            value="{{ old('akhirdaftar', $pelatihan->tglakhirpendaftaran) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 50px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">
                                        <h4>Tanggal Mulai Pelatihan : </h4>
                                    </label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="date" class="form-control input-sm"
                                            placeholder="Pilih Tanggal Mulai Pelatihan" id="mulaipelatihan" name="mulaipelatihan"
                                            value="{{ old('mulaipelatihan', $pelatihan->tglmulaipelatihan) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 50px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">
                                        <h4>Tanggal Akhir Pelatihan : </h4>
                                    </label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="date" class="form-control input-sm"
                                            placeholder="Pilih Tanggal Akhir Pelatihan" id="akhirpelatihan" name="akhirpelatihan"
                                            value="{{ old('akhirpelatihan', $pelatihan->tglakhirpelatihan) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 50px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">
                                        <h4>Lokasi : </h4>
                                    </label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <textarea class="form-control auto-size" rows="2" placeholder="Masukkan Lokasi" id="lokasi" name="lokasi">{{ old('lokasi', $pelatihan->lokasi) }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 50px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">
                                        <h4>Deskripsi : </h4>
                                    </label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <textarea class="form-control auto-size" rows="2" placeholder="Masukkan Deskripsi Pelatihan" name="deskripsi">{{ old('deskripsi', $pelatihan->deskripsi) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 50px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">
                                        <h4>Fasilitas : </h4>
                                    </label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <textarea class="form-control auto-size" rows="2" placeholder="Masukkan Fasilitas Pelatihan" name="fasilitas">{{ old('fasilitas', $pelatihan->fasilitas) }}</textarea>
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
    </div>
    <!-- galeri End-->
@endsection
