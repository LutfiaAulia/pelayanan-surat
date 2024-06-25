@extends('Layout.navbar')

@section('content')

{{-- Konten --}}
<div class="page-content">
    <div class="me-auto" style="margin-bottom: 20px;">
        {{-- Flash messages --}}
        @if (session('success'))
        <div class="alert alert-success">
                {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
                {{ session('error') }}
        </div>
        @endif
        <h3>Surat Keterangan Tidak Mampu</h3>
    </div>
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pengajuan Surat Keterangan Tidak Mampu</h4>
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
                                    <th>Aksi</th> <!-- Ubah colspan dari 2 ke 1 -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>{{ $item['nik'] }}</td>
                                        <td>{{ $item['tanggal_pengajuan'] }}</td>
                                        <td>{{ $item['status_pengajuan'] }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('admin.verifikasisktm', ['id_pengajuan' => $item['id_pengajuan']]) }}" class="btn btn-primary mr-2"><i class="fas fa-edit"></i></a>
                                                @if ($item['status_pengajuan'] != 'Mengajukan' && $item['status_pengajuan'] != 'Ditolak')
                                                    <form action="{{ route('upload.suratsktm', ['id_pengajuan' => $item['id_pengajuan']]) }}" method="POST" enctype="multipart/form-data">
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
