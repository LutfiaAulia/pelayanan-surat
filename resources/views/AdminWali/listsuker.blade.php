@extends('Layout.navbar')

@section('content')

{{-- konten --}}
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Surat Keluar</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Pengaju</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Jenis Surat</th>
                                    <th scope="col">Nomor Surat</th>
                                    <th scope="col">Status</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suratKeluar as $index => $surat)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $surat->nama_pengaju }}</td>
                                        <td>{{ $surat->nik }}</td>
                                        <td>{{ $surat->jenis_surat }}</td>
                                        <td>{{ $surat->nomor_surat }}</td>
                                        <td>{{ $surat->status }}</td>
                                        <td style="width: 140px; text-align: center;">
                                            <a href="{{ route('download.surat', $surat->id_pengajuan) }}" class="btn btn-success">
                                                <i class="fas fa-download"></i> Download
                                            </a>
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
