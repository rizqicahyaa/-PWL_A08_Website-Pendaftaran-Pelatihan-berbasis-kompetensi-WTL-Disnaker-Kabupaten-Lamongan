@extends('layout.v_template2')
@section('contentadmin')
    <!-- galeri Start-->
    <div class="row">
        <form action="{{ route('admin/galeri/edit-proses', ['id' => $galeri->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="widget-tabs-int mg-t-30">
                    <div class="tab-hd">
                        <h2>Edit Galeri</h2>
                    </div>
                    <div class="row" style="margin-top: 50px;">
                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                            <label class="hrzn-fm">
                                <h4>Pelatihan : </h4>
                            </label>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                            <div class="bootstrap-select fm-cmp-mg">
                                <select class="selectpicker" id="pelatihan_id" name="pelatihan_id">
                                    {{-- <option value="">-- Pilih Pelatihan --</option> --}}
                                    @foreach ($pelatihan as $pel)
                                        <option value="{{ $pel->id }}"
                                            @if ($pel->id === $galeri->pelatihan_id) selected @endif>
                                            {{ $pel->pelatihan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div
                                style="border: 1px solid #cccccc; max-width: 100%; width: 300px; height: 320px; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ Storage::url('public/foto-galeri/').$galeri->gambar1 }}" style="width: 200px;" alt="Gambar 1"
                                    id="gambar1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3 class="mb-4">Gambar 1</h3>
                            <input type="checkbox" name="cbcek" id="cbcek" value="GANTI1"
                                onclick="javascript: if(this.checked==true){
                                document.getElementById('gambar1').style.display='none';
                            }else{
                                document.getElementById('gambar1').style.display='block'; }" />
                            Centang jika foto mau diganti
                            <input type="file" name="gambar1" id="gambar1" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mg-t-15">
                            <div
                                style="border: 1px solid #cccccc; max-width: 100%; width: 300px; height: 320px; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ Storage::url('public/foto-galeri/').$galeri->gambar2 }}" style="width: 200px;" alt="Gambar 2"
                                    id="gambar2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3 class="mb-4 mg-t-15">Gambar 2</h3>
                            <input type="checkbox" name="cbcek" id="cbcek" value="GANTI2"
                                onclick="javascript: if(this.checked==true){
                                document.getElementById('gambar2').style.display='none';
                            }else{
                                document.getElementById('gambar2').style.display='block'; }" />
                            Centang jika foto mau diganti
                            <input type="file" name="gambar2" id="gambar2" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mg-t-15">
                            <div
                                style="border: 1px solid #cccccc; max-width: 100%; width: 300px; height: 320px; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ Storage::url('public/foto-galeri/').$galeri->gambar3 }}" style="width: 200px;" alt="Gambar 3"
                                    id="gambar3">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3 class="mb-4 mg-t-15">Gambar 3</h3>
                            <input type="checkbox" name="cbcek" id="cbcek" value="GANTI3"
                                onclick="javascript: if(this.checked==true){
                                document.getElementById('gambar3').style.display='none';
                            }else{
                                document.getElementById('gambar3').style.display='block'; }" />
                            Centang jika foto mau diganti
                            <input type="file" name="gambar3" id="gambar3" />
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
