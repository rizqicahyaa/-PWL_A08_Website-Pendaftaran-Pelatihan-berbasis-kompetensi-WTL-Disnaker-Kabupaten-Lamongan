@extends('layout.v_template2')
@section('contentadmin')
    <!-- Data Profil Admin-->
    <div class="buttons-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="btn-demo-notika">
                        <div class="notika-btn-hd">
                            <h2>Profil</h2>
                            {{-- <div
                                style="border: 1px solid #cccccc; max-width: 100%; width: 300px; height: 320px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                                <img src="{{ asset('template') }}/images/contohpasfoto.png" style="width: 200px;"
                                    alt="Foto Profil">
                            </div> --}}
                            <h4 class="text-dark" style="margin-top:20px; margin-bottom: 20px;">Nama Lengkap : {{ Auth::user()->name }}</h4>
                            <h4 class="text-dark" style="margin-bottom: 20px;">Email : {{ Auth::user()->email }}</h4>
                            {{-- <h4 class="text-dark" style="margin-bottom: 20px;">No. Hp : 081888888888</h4>
                            <h4 class="text-dark" style="margin-bottom: 100px;">Alamat : Jl. Anggrek</h4> --}}
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="btn-demo-notika sm-res-mg-t-30">
                        <div class="notika-btn-hd">
                            <h2 class="text-center">Edit Profil</h2>
                        </div>
                        <div class="row">
                            <div class="material-design-btn">
                                <a href="{{ route('admin/profil/update') }}">
                                    <button
                                        class="btn notika-btn-1 btn-reco-mg btn-button-mg col-lg-12 col-md-12 col-sm-12 col-xs-12">Edit
                                        Profil
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-top: 20px;">
                    <div class="btn-demo-notika sm-res-mg-t-30">
                        <div class="notika-btn-hd">
                            <h2 class="text-center">Logout</h2>
                        </div>
                        <div class="row">
                            <div class="material-design-btn">
                                <a href="/logout">
                                    <button
                                        class="btn notika-btn-1 btn-reco-mg btn-button-mg col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        Logout
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Profil Admin End-->
@endsection
