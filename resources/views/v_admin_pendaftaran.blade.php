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
                                    <h2>Data Pendaftaran</h2>
                                </div>
                                {{-- <div class="breadcomb-report">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                        <a href="?">
                                            <button class="btn btn-default btn-icon-notika" data-placement="top"
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
                                        <th>No. Hp</th>
                                        <th>Pelatihan</th>
                                        <th>Tgl Pendaftaran</th>
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
                                            <td>{{ $p->pelatihan }}</td>
                                            <td>{{Carbon\Carbon::parse($p->tglpendaftaran)->format('d M Y') }}</td>
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
                                            <td>
                                                <a href="/admin/pendaftaran/edit{{ $p->id }}"><button
                                                        class="btn btn-primary primary-icon-notika" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i
                                                            class="notika-icon notika-edit"></i></button></a>
                                                <a href="/admin/pendaftaran/hapus{{ $p->id }}"><button
                                                        class="btn btn-danger danger-icon-notika" data-toggle="tooltip"
                                                        data-placement="top" title="Hapus"
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
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
@endsection
