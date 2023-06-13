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
                                    <h2>Galeri</h2>
                                </div>
                                <div class="breadcomb-report">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                        <a href="{{ route('admin/galeri/tambah') }}">
                                            <button class="btn btn-default btn-icon-notika" data-placement="top"
                                                data-toggle="tooltip" title="Tambah Data">
                                                <i class="notika-icon">+</i> Tambah
                                            </button>
                                        </a>
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
                                        <th>Gambar 1</th>
                                        <th>Gambar 2</th>
                                        <th>Gambar 3</th>
                                        <th>Tgl Postingan</th>
                                        <th>Pengaturan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galeri as $no => $g)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $g->pelatihan }}</td>
                                            <td><img src="{{ Storage::url('public/foto-galeri/').$g->gambar1 }}" alt="Gambar 1"
                                                    style="width:120px; height:150px;"></td>
                                            <td><img src="{{ Storage::url('public/foto-galeri/').$g->gambar2 }}" alt="Gambar 2"
                                                    style="width:120px; height:150px;"></td>
                                            <td><img src="{{ Storage::url('public/foto-galeri/').$g->gambar3 }}" alt="Gambar 3"
                                                    style="width:120px; height:150px;"></td>
                                            <td>{{Carbon\Carbon::parse( $g->created_at )->format('d M Y') }}</td>
                                            <td>
                                                <a href="/admin/galeri/edit{{ $g->id }}"><button
                                                        class="btn btn-primary primary-icon-notika" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i
                                                            class="notika-icon notika-edit"></i></button></a>
                                                <a href="/admin/galeri/hapus{{ $g->id }}"><button
                                                        class="btn btn-danger danger-icon-notika" data-toggle="tooltip"
                                                        data-placement="top" title="Hapus"  onclick="return confirm('Anda Yakin Ingin Menghapus Galeri Pelatihan {{ $g->pelatihan }} ?')"><i
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
