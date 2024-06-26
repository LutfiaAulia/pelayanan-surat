@extends('Layout.navbar')

@section('content')

{{-- content --}}
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pengajuan Surat Keterangan Usaha</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Pengaju</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Tanggal Pengajuan</th>
                                    <th scope="col">Status</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <th scope="row" style="width: 80px; text-align: center;">{{ $loop->iteration }}</th>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>{{ $item['nik'] }}</td>
                                        <td>{{ $item['tanggal_pengajuan'] }}</td>
                                        <td>{{ $item['status_pengajuan'] }}</td>
                                        <td style="width: 140px; text-align: center;" >
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('admin.verifikasisku', ['id_pengajuan' => $item['id_pengajuan']]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                @if ($item['status_pengajuan'] != 'Mengajukan' && $item['status_pengajuan'] != 'Ditolak')
                                                    <form action="{{ route('upload.suratsku', ['id_pengajuan' => $item['id_pengajuan']]) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <label for="fileInput{{ $loop->iteration }}" class="btn btn-success"><i class="fas fa-file-upload"></i></label>
                                                        <input type="file" id="fileInput{{ $loop->iteration }}" name="file" style="display: none;" onchange="this.form.submit();">
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
