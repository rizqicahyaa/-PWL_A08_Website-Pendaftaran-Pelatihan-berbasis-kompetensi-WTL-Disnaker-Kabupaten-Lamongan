@extends('layout.v_template')
@section('content')
    <!-- page title -->
    <section class="page-title-section overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb mb-2">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="{{ route('peserta') }}">Beranda</a>
                        </li>
                        <li class="list-inline-item nasted"><a class="h2 text-primary font-secondary"
                                href="{{url('profil') }}">Profil</a></li>
                        <li class="list-inline-item text-dark h2 font-secondary nasted"><strong> Edit Profil</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- /page title -->

    <!-- contact -->
    <section class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-title">Edit Profil</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <form action="{{ route('profil/edit-proses', ['user_id' => $user]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @foreach ( $datapeserta as $p)
                        @php $path = Storage::url('public/foto-user/'.$p->pasfoto); @endphp
                        <div class="col-lg-6 mb-4">
                            <div
                                style="border: 1px solid #cccccc; max-width: 100%; width: 300px; height: 320px; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ asset($path) }}" style="width: 200px;"
                                    alt="Foto Profil" id="pasfoto">
                            </div>
                        </div>
                        <div class="mb-4">
                            <input type="checkbox" name="cbcek" id="cbcek" value="GANTI"
                                onclick="javascript: if(this.checked==true){
                            document.getElementById('pasfoto').style.display='none';
                        }else{
                            document.getElementById('pasfoto').style.display='block'; }" />
                            Centang jika foto mau diganti
                            <input type="file" name="pasfoto" id="pasfoto" />
                        </div>
                        <input type="text" class="form-control mb-3" id="nama" name="nama" placeholder="Nama Lengkap" value="{{ Auth::user()->name }}"
                            required>
                            <input type="number" class="form-control mb-3" id="nik" name="nik" placeholder="NIK"
                                value="{{ old('datapeserta', $p->nik) }}" required>
                        <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Email"
                            value="{{ Auth::user()->email }} " required>
                        <input type="text" class="form-control mb-3" id="nohp" name="nohp" placeholder="No. Hp"
                            value="{{ old('datapeserta', $p->nohp) }}" required>
                        <textarea name="alamatktp" id="alamatktp" class="form-control mb-3" placeholder="Alamat KTP" required>{{ old('datapeserta', $p->alamatktp) }}</textarea>
                        <textarea name="alamatdomisili" id="alamatdomisili" class="form-control mb-3" placeholder="Alamat Domisili"
                         required>{{ old('datapeserta', $p->alamatdomisili) }}</textarea>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /contact -->
@endsection
