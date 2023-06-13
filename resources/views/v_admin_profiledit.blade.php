@extends('layout.v_template2')
@section('contentadmin')
    <!-- Edit Profil Admin-->
    <div class="form-example-area">
        <div class="container">
            <div class="row">
                <form action="{{ route('admin/profil/update-proses', Auth::user()->id) }}" method="POST">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-example-wrap mg-t-30">
                            <div class="cmp-tb-hd cmp-int-hd">
                                <h2>Edit Profil</h2>
                            </div>
                            {{-- <div class="form-example-int">
                                <div class="form-group">
                                    <div
                                        style="border: 1px solid #cccccc; max-width: 100%; width: 300px; height: 320px; display: flex; align-items: center; justify-content: center;">
                                        <img src="{{ asset('template') }}/images/contohpasfoto.png" style="width: 200px;"
                                            alt="Foto Profil" id="?">
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="checkbox" class="i-checks" name="cbcek" id="cbcek" value="GANTI"
                                            onclick="javascript: if(this.checked==true){
                                            document.getElementById('?').style.display='none';
                                        }else{
                                            document.getElementById('?').style.display='block'; }" />
                                        Centang jika foto mau diganti
                                        <input type="file" name="?" id="?" class="mg-b-15"/>
                                    </div>
                                </div>
                            </div> --}}
                            @csrf
                            @method('PATCH')
                            <div class="form-example-int">
                                <div class="form-group">
                                    <label><strong>Nama Lengkap</strong></label>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" name="name"
                                            placeholder="Masukkan Nama Lengkap" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int">
                                <div class="form-group">
                                    <label><strong>Email</strong></label>
                                    <div class="nk-int-st">
                                        <input type="email" class="form-control input-sm" name="email"
                                            placeholder="Masukkan Email" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int">
                                <div class="form-group">
                                    <label><strong>Password</strong></label>
                                    <div class="nk-int-st" style="margin-bottom: 1 0px;">
                                        <input type="hidden" id="old_password" name="old_password"
                                            class="form-control input-sm" placeholder="Masukkan Password"
                                            value="{{ Auth::user()->password }}">
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                    <small>* Kosongkan password jika password tidak ingin diubah</small>
                                </div>
                            </div>
                            {{-- <div class="form-example-int mg-t-15">
                                <div class="form-group">
                                    <label><strong>No. Hp</strong></label>
                                    <div class="nk-int-st">
                                        <input type="number" class="form-control input-sm" placeholder="Masukkan No. Hp"
                                            value="?">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <div class="nk-int-st">
                                            <textarea class="form-control auto-size" rows="2" placeholder="Masukkan Alamat" value="?"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="form-example-int mg-t-15" style="margin-bottom: 50px;">
                                <div class="material-design-btn">
                                    <button class="btn notika-btn-1 btn-reco-mg btn-button-mg"
                                        type="submit">Simpan</button>
                                    {{-- <a href="?"><button
                                            class="btn notika-btn-red btn-reco-mg btn-button-mg">Batal</button></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Profil Admin End-->
@endsection
