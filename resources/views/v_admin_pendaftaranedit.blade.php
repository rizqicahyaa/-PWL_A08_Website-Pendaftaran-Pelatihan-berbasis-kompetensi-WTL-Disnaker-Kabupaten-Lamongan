@extends('layout.v_template2')
@section('contentadmin')
    <!-- galeri Start-->
    <div class="row">
        @foreach ($pendaftaran as $p)
            <form action="{{ route('admin/pendaftaran/edit-proses') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $p->id }}">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget-tabs-int mg-t-30">
                        <div class="tab-hd">
                            <h2>Edit Data Pendaftaran Peserta</h2>
                        </div>
                        <div class="form-example-int form-horizental" style="margin-bottom: 50px;">
                            <div class="form-group">
                                <div class="row" style="margin-top: 50px;">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">
                                            <h4>Nama Lengkap : </h4>
                                        </label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm"
                                                placeholder="Masukkan Nama Lengkap" value="{{ $p->name }}" disabled>
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
                                            <input type="text" class="form-control input-sm" placeholder="Masukkan Email"
                                                value="{{ $p->email }}" disabled>
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
                                            <input type="text" class="form-control input-sm"
                                                placeholder="Masukkan No. HP" value="{{ $p->nohp }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 50px;">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">
                                            <h4>Pelatihan : </h4>
                                        </label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="bootstrap-select fm-cmp-mg" value="pelatihan_id">
                                            <select class="selectpicker" disabled>
                                                <option>{{ $p->pelatihan }}</option>
                                            </select>
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
                                            <select class="selectpicker" id="status_pendaftaran" name="status_pendaftaran">
                                                <option value="Menunggu Konfirmasi"
                                                    {{ old('status_pendaftaran', $p) == 'Menunggu Konfirmasi' ? 'selected' : '' }}>
                                                    Menunggu Konfirmasi</option>
                                                <option value="Lolos"
                                                    {{ old('status_pendaftaran', $p) == 'Lulus' ? 'selected' : '' }}>Lolos
                                                </option>
                                                <option value="Tidak Lolos"
                                                    {{ old('status_pendaftaran', $p) == 'Tidak Lulus' ? 'selected' : '' }}>
                                                    Tidak Lolos</option>
                                                <option value="Sedang Pelatihan"
                                                    {{ old('status_pendaftaran', $p) == 'Sedang Pelatihan' ? 'selected' : '' }}>
                                                    Sedang Pelatihan</option>
                                                <option value="Lulus"
                                                    {{ old('status_pendaftaran', $p) == 'Lulus' ? 'selected' : '' }}>Lulus
                                                </option>
                                                <option value="Tidak Lulus"
                                                    {{ old('status_pendaftaran', $p) == 'Tidak Lulus' ? 'selected' : '' }}>
                                                    Tidak Lulus</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 50px;">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">
                                            <h4>Tanggal Pelatihan : </h4>
                                        </label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="bootstrap-select fm-cmp-mg">
                                            <select class="selectpicker" disabled>
                                                <option>{{ $p->tglmulaipelatihan }} - {{ $p->tglakhirpelatihan }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 50px;">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">
                                            <h4>Tanggal Pendaftaran : </h4>
                                        </label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="bootstrap-select fm-cmp-mg">
                                            <select class="selectpicker" disabled>
                                                <option>{{ $p->tglpendaftaran }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 50px;">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">
                                            <h4>No. Pendaftaran : </h4>
                                        </label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm"
                                                placeholder="Masukkan No. Pendaftaran" id="nodaftar" name="nodaftar"
                                                value="{{ old('nopendaftaran', $p->nopendaftaran) }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int mg-t-15" style="margin-bottom: 50px;">
                            <div class="material-design-btn">
                                <button class="btn notika-btn-1 btn-reco-mg btn-button-mg">Simpan</button>
                                <button class="btn notika-btn-red btn-reco-mg btn-button-mg">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
    <!-- galeri End-->
@endsection
