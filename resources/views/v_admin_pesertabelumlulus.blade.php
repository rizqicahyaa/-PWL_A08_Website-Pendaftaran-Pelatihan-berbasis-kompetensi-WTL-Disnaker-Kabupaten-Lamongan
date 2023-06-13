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
                                    <h2>Data Peserta Tidak Lulus Pelatihan</h2>
                                </div>
                                {{-- <div class="breadcomb-report">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                        <a href="?">
                                            <button class="btn btn-default btn-icon-notika" data-placement="left"
                                                data-toggle="tooltip" title="Download PDF">
                                                <i class="notika-icon notika-down-arrow"></i> PDF
                                            </button>
                                        </a>
                                    </div>
                                </div> --}}
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
                                        <th>Tgl Pendaftaran</th>
                                        <th>Pelatihan</th>
                                        <th>No. Pendaftaran</th>
                                        <th>Status</th>
                                        <th>Pengaturan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendaftaran as $no => $p)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $p->name }}</td>
                                            <td>{{ $p->nik }}</td>
                                            <td>{{ $p->nohp }}</td>
                                            <td>{{Carbon\Carbon::parse($p->tglpendaftaran)->format('d M Y') }}</td>
                                            <td>{{ $p->pelatihan }}</td>
                                            <td>{{ $p->nopendaftaran }}</td>
                                            <td>
                                                @if ($p->status_pendaftaran == 'Menunggu Konfirmasi')
                                                    <p class="btn btn-primary notika-btn-primary">
                                                        <strong>{{ $p->status_pendaftaran }}</strong>
                                                    </p>
                                                @elseif ($p->status_pendaftaran == 'Lolos')
                                                    <p class="btn btn-success notika-btn-success">
                                                        <strong>{{ $p->status_pendaftaran }}</strong>
                                                    </p>
                                                @elseif ($p->status_pendaftaran == 'Tidak Lolos')
                                                    <p class="btn btn-danger notika-btn-danger">
                                                        <strong>{{ $p->status_pendaftaran }}</strong>
                                                    </p>
                                                @elseif ($p->status_pendaftaran == 'Sedang Pelatihan')
                                                    <p class="btn btn-warning notika-btn-warning">
                                                        <strong>{{ $p->status_pendaftaran }}</strong>
                                                    </p>
                                                @elseif ($p->status_pendaftaran == 'Lulus')
                                                    <p class="btn btn-success notika-btn-success">
                                                        <strong>{{ $p->status_pendaftaran }}</strong>
                                                    </p>
                                                @else
                                                    <p class="btn btn-danger notika-btn-danger">
                                                        <strong>{{ $p->status_pendaftaran }}</strong>
                                                    </p>
                                                @endif
                                            </td>
                                            <td><button class="btn btn-teal teal-icon-notika" title="Detail Berkas"
                                                    data-toggle="modal" data-target="#myModaltwo{{ $p->id }}"><i
                                                        class="notika-icon notika-file"></i></button>
                                                <a href="/admin/pesertabelumlulus/edit{{ $p->id }}"><button
                                                        class="btn btn-primary primary-icon-notika" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i
                                                            class="notika-icon notika-edit"></i></button></a>
                                                <a href="/admin/pesertabelumlulus/hapus{{ $p->id }}"><button class="btn btn-danger danger-icon-notika"
                                                        data-toggle="tooltip" data-placement="top" title="Hapus"
                                                        onclick="return confirm('Anda Yakin Ingin Menghapus Data Pendaftaran Peserta Bernama {{ $p->name }} ?')"><i
                                                            class="notika-icon notika-trash"></i></button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @foreach ($pendaftaran as $p)
                    @php
                        $path1 = Storage::url('public/foto-user/' . $p->pasfoto);
                        $path2 = Storage::url('public/foto-user/' . $p->ktp);
                        $path3 = Storage::url('public/foto-user/' . $p->ijazah);
                        $path4 = Storage::url('public/foto-user/' . $p->skd);
                    @endphp
                    <div class="modal fade" id="myModaltwo{{ $p->id }}" role="dialog">
                        <div class="modal-dialog modal-large">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <h2>Berkas</h2>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6" style="margin-top:15px;">
                                                    <h2>Pas Foto</h2>
                                                    <img src="{{ asset($path1) }}"
                                                        style="width: 480px; height: 580px; margin-bottom: 10px;"
                                                        alt="Pas Foto">
                                                </div>
                                                <div class="col-md-6" style="margin-top:15px;">
                                                    <h2>KTP</h2>
                                                    <img src="{{ asset($path2) }}"
                                                        style="width: 480px; height: 580px; margin-bottom: 10px;"
                                                        alt="Foto KTP">
                                                </div>
                                                <div class="col-md-6" style="margin-top:15px;">
                                                    <h2 class="mt-15">Ijazah / SKL</h2>
                                                    <img src="{{ asset($path3) }}"
                                                        style="width: 480px; height: 580px; margin-bottom: 10px;"
                                                        alt="Foto Ijazah">
                                                </div>
                                                <div class="col-md-6" style="margin-top:15px;">
                                                    <h2 class="mt-15">SKD</h2>
                                                    <img src="{{ asset($path4) }}"
                                                        style="width: 480px; height: 580px; margin-bottom: 10px;"
                                                        alt="Foto SKD">
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
