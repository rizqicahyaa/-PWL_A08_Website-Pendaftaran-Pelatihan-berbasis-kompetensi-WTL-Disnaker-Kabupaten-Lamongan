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
                                    <h2>Data Pelatihan</h2>
                                </div>
                                <div class="breadcomb-report">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                        <a href="{{ route('admin/pelatihan/tambah') }}">
                                            <button class="btn btn-default btn-icon-notika" data-placement="top"
                                                data-toggle="tooltip" title="Tambah Data">
                                                <i class="notika-icon">+</i> Tambah
                                            </button>
                                        </a>
                                        {{-- <a href="?">
                                            <button class="btn btn-default btn-icon-notika" data-placement="top"
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
                                        <th>Pelatihan</th>
                                        <th>Tgl Mulai Pendaftaran</th>
                                        <th>Tgl Akhir Pendaftaran</th>
                                        <th>Tgl Mulai Pelatihan</th>
                                        <th>Tgl Akhir Pelatihan</th>
                                        <th>Status</th>
                                        <th>Pengaturan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelatihan as $no => $pel)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $pel->pelatihan }}</td>
                                            <td>{{Carbon\Carbon::parse($pel->tglmulaipendaftaran)->format('d M Y') }}</td>
                                            <td>{{Carbon\Carbon::parse($pel->tglakhirpendaftaran)->format('d M Y') }}</td>
                                            <td>{{ Carbon\Carbon::parse($pel->tglmulaipelatihan)->format('d M Y') }}</td>
                                            <td>{{ Carbon\Carbon::parse($pel->tglakhirpelatihan)->format('d M Y') }}</td>
                                            <td>
                                                <p
                                                    class="btn {{ $pel->status == 'Buka' ? 'btn-success notika-btn-success' : 'btn-danger notika-btn-danger' }}">
                                                    {{ $pel->status == 'Buka' ? 'Buka' : 'Tutup' }}</p>
                                            </td>
                                            <td><button class="btn btn-lightgreen lightgreen-icon-notika" title="Detail"
                                                    data-toggle="modal" data-target="#myModalthree{{ $pel->id }}"><i
                                                        class="notika-icon notika-eye"></i></button>
                                                <a href="/admin/pelatihan/edit{{ $pel->id }}"><button
                                                        class="btn btn-primary primary-icon-notika" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i
                                                            class="notika-icon notika-edit"></i></button></a>
                                                <a href="/admin/pelatihan/hapus{{ $pel->id }}"><button class="btn btn-danger danger-icon-notika" data-toggle="tooltip"
                                                    data-placement="top" title="Hapus" onclick="return confirm('Anda Yakin Ingin Menghapus {{ $pel->pelatihan }} ?')">
                                                    <i class="notika-icon notika-trash"></i></button></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @foreach ($pelatihan as $pel)
                    <div class="modal fade" id="myModalthree{{ $pel->id }}" role="dialog">
                        <div class="modal-dialog modal-large">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <h2>Detail Data Pelatihan</h2>
                                        <img src="{{ Storage::url('public/foto-pelatihan/').$pel->gambar }}" style="width: 150px; margin-bottom: 10px;" alt="Gambar">
                                        <h4 style="margin-bottom: 15px;">Pelatihan : {{ $pel->pelatihan }}</h4>
                                        <h4 style="margin-bottom: 15px;">Status : <strong>
                                                <p
                                                    class="btn {{ $pel->status == 'Buka' ? 'btn-success notika-btn-success' : 'btn-danger notika-btn-danger' }}">
                                                    {{ $pel->status == 'Buka' ? 'Buka' : 'Tutup' }}</p>
                                        </h4>
                                        <h4 style="margin-bottom: 15px;">Tanggal Pendaftaran :
                                            {{Carbon\Carbon::parse($pel->tglmulaipendaftaran)->format('d M') }} - {{Carbon\Carbon::parse($pel->tglakhirpendaftaran)->format('d M Y') }}</h4>
                                        <h4 style="margin-bottom: 15px;">Tanggal Pelatihan : {{ Carbon\Carbon::parse($pel->tglmulaipelatihan)->format('d M') }}
                                            - {{ Carbon\Carbon::parse($pel->tglakhirpelatihan)->format('d M Y') }}</h4>
                                        <h4 style="margin-bottom: 15px;">Lokasi : {{ $pel->lokasi }}</h4>
                                        <h4 style="margin-bottom: 15px;">Deskripsi : {{ $pel->deskripsi }}</h4>
                                        <h4 style="margin-bottom: 15px;">Fasilitas : <br> {!! nl2br(e($pel->fasilitas)) !!}</li></h4>

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
