@extends('layout.v_template2')
@section('contentadmin')
    <!-- galeri Start-->
    <div class="row">
        <form action="{{ route('admin/pelatihan/tambah-proses')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="widget-tabs-int mg-t-30">
                    <div class="tab-hd">
                        <h2>Tambah Data Pelatihan</h2>
                    </div>
                    <div class="form-example-int form-horizental" style="margin-bottom: 50px; margin-top: 50px;">
                        <div class="form-group">
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">
                                        <h4>Gambar Pelatihan : </h4>
                                    </label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="file" class="form-control input-sm" id="gambar" name="gambar" required>
                                    </div>
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
                                            required>
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
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" id="status" name="status" >
                                            <option value="">-- Pilih Status --</option>
                                            <option value="Buka" {{ (old('status') == 'Buka') ? 'selected' : ''}}>Buka</option>
                                            <option value="Tutup" {{ (old('status') == 'Tutup') ? 'selected' : ''}}>Tutup</option>
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
                                        <input type="date" class="form-control input-sm" placeholder="Pilih Tanggal Mulai Pendaftaran"
                                            id="mulaidaftar" name="mulaidaftar" required>
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
                                        <input type="date" class="form-control input-sm" placeholder="Pilih Tanggal Akhir Pendaftaran"
                                            id="akhirdaftar" name="akhirdaftar" required>
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
                                        <input type="date" class="form-control input-sm" placeholder="Pilih Tanggal Mulai Pelatihan"
                                            id="mulaipelatihan" name="mulaipelatihan" required>
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
                                        <input type="date" class="form-control input-sm" placeholder="Pilih Tanggal Akhir Pelatihan"
                                            id="akhirpelatihan" name="akhirpelatihan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 50px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm"><h4>Lokasi : </h4></label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <textarea class="form-control auto-size" rows="2" placeholder="Masukkan Lokasi" name="lokasi" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 50px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm"><h4>Deskripsi : </h4></label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <textarea class="form-control auto-size" rows="2" placeholder="Masukkan Deskripsi Pelatihan" name="deskripsi" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 50px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm"><h4>Fasilitas : </h4></label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <textarea class="form-control auto-size" rows="2" placeholder="Masukkan Fasilitas Pelatihan" name="fasilitas" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-example-int mg-t-15" style="margin-bottom: 50px;">
                        <div class="material-design-btn">
                            <button class="btn notika-btn-1 btn-reco-mg btn-button-mg" type="submit">Simpan</button>
                            <button class="btn notika-btn-red btn-reco-mg btn-button-mg">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- galeri End-->
@endsection
