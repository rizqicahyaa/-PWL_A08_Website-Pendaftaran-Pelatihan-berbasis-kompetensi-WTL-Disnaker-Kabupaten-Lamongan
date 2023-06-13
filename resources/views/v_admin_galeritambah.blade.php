@extends('layout.v_template2')
@section('contentadmin')
    <!-- galeri Start-->
    <div class="row">
        <form action="{{ route('admin/galeri/tambah-proses')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
                <div class="widget-tabs-int mg-t-30">
                    <div class="tab-hd">
                        <h2>Tambah Galeri</h2>
                    </div>
                    <div class="form-example-int form-horizental" style="margin-bottom: 50px;">
                        <div class="form-group">
                            <div class="row" style="margin-top: 50px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">
                                        <h4>Pelatihan : </h4>
                                    </label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" id="pelatihan_id" name="pelatihan_id">
                                            <option value="">-- Pilih Pelatihan --</option>
                                            @foreach ($pelatihan as $pel)
                                                <option value="{{ $pel->id }}">{{ $pel->pelatihan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">
                                        <h4>Gambar 1 : </h4>
                                    </label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="file" class="form-control input-sm" id="gambar1" name="gambar1">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">
                                        <h4>Gambar 2 : </h4>
                                    </label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="file" class="form-control input-sm" id="gambar2" name="gambar2">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">
                                        <h4>Gambar 3 : </h4>
                                    </label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="file" class="form-control input-sm" id="gambar3" name="gambar3">
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
