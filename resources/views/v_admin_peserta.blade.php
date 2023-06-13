@extends('layout.v_template2')
@section('contentadmin')
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <h2>Data Peserta</h2>
                                </div>
                                <div class="breadcomb-report">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                        {{-- <a href="?">
                                            <button class="btn btn-default btn-icon-notika" data-placement="top" data-toggle="tooltip" title="Tambah Data">
                                                <i class="notika-icon">+</i> Tambah
                                            </button>
                                        </a> --}}
                                        {{-- <a href="?">
                                            <button class="btn btn-default btn-icon-notika" data-placement="left"
                                                data-toggle="tooltip" title="Download PDF">
                                                <i class="notika-icon notika-down-arrow"></i> PDF
                                            </button>
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>No.Hp</th>
                                        <th>Pengaturan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datapeserta as $no => $peserta)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $peserta->name }}</td>
                                            <td>{{ $peserta->nik }}</td>
                                            <td>{{ $peserta->nohp }}</td>
                                            <td>
                                                <button class="btn btn-lightgreen lightgreen-icon-notika"
                                                    title="Detail Peserta" data-toggle="modal"
                                                    data-target="#myModalthree{{ $peserta->id }}"><i
                                                        class="notika-icon notika-eye"></i></button>
                                                <button type="button" class="btn btn-teal teal-icon-notika"
                                                    title="Detail Berkas" data-toggle="modal"
                                                    data-target="#myModaltwo{{ $peserta->id }}">
                                                    <i class="notika-icon notika-file"></i></button>
                                                <a href="/admin/peserta/edit{{ $peserta->id }}"><button
                                                        class="btn btn-primary primary-icon-notika" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i
                                                            class="notika-icon notika-edit"></i></button></a>
                                                <a href="/admin/peserta/hapus{{ $peserta->id }}"><button
                                                        class="btn btn-danger danger-icon-notika" data-toggle="tooltip"
                                                        data-placement="top" title="Hapus"
                                                        onclick="return confirm('Anda Yakin Ingin Menghapus Peserta Bernama {{ $peserta->name }} ?')">
                                                        <i class="notika-icon notika-trash"></i></button></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @foreach ($datapeserta as $peserta)
                    @php $path = Storage::url('public/foto-user/'.$peserta->pasfoto); @endphp
                    <div class="modal fade" id="myModalthree{{ $peserta->id }}" role="dialog">
                        <div class="modal-dialog modal-large">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <h2>Detail Data Peserta</h2>
                                        <img src="{{ asset($path) }}" style="width: 150px; margin-bottom: 10px;"
                                            alt="Foto Profil">
                                        <h4 style="margin-bottom: 15px;">Nama Lengkap : {{ $peserta->name }}</h4>
                                        <h4 style="margin-bottom: 15px;">NIK : {{ $peserta->nik }}</h4>
                                        <h4 style="margin-bottom: 15px;">Email : {{ $peserta->email }}</h4>
                                        <h4 style="margin-bottom: 15px;">No. Hp : {{ $peserta->nohp }}</h4>
                                        <h4 style="margin-bottom: 15px;">Alamat KTP : {{ $peserta->alamatktp }}</h4>
                                        <h4 style="margin-bottom: 15px;">Alamat Domisili : {{ $peserta->alamatdomisili }}
                                        </h4>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($datapeserta as $peserta)
                    @php
                    $path1 = Storage::url('public/foto-user/'.$peserta->ktp);
                    $path2 = Storage::url('public/foto-user/'.$peserta->ijazah);
                    $path3 = Storage::url('public/foto-user/'.$peserta->skd);
                    @endphp
                    <div class="modal fade" id="myModaltwo{{ $peserta->id }}" role="dialog">
                        <div class="modal-dialog modal-large">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <h2>Detail Data Peserta</h2>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6" style="margin-top:15px;">
                                                    <h2>KTP</h2>
                                                    <img src="{{ asset($path1) }}"
                                                        style="width: 480px; height: 580px; margin-bottom: 10px;"
                                                        alt="Foto skd">
                                                </div>
                                                <div class="col-md-6"  style="margin-top:15px;">
                                                    <h2 class="mt-15">Ijazah / SKL</h2>
                                                    <img src="{{ asset($path2) }}"
                                                        style="width: 480px; height: 580px; margin-bottom: 10px;"
                                                        alt="Foto skd">
                                                </div>
                                                <div class="col-md-6"  style="margin-top:15px;">
                                                    <h2 class="mt-15">SKD</h2>
                                                    <img src="{{ asset($path3) }}"
                                                        style="width: 480px; height: 580px; margin-bottom: 10px;"
                                                        alt="Foto skd">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
@endsection
