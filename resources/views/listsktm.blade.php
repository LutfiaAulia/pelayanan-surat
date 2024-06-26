@extends('Layout.navbar')

@section('content')

{{-- content --}}
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pengajuan SKTM</h4>
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
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Example rows --}}
                                <tr>
                                    <th scope="row">1</th>
                                    <td>John Doe</td>
                                    <td>123456789</td>
                                    <td>2023-05-01</td>
                                    <td>Diproses</td>
                                    <td><button class="btn btn-primary"><i class="fas fa-edit"></i></button></td>
                                    <td><button class="btn btn-success"><i class="fas fa-file"></i></button></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jane Smith</td>
                                    <td>987654321</td>
                                    <td>2023-04-25</td>
                                    <td>Selesai</td>
                                    <td><button class="btn btn-primary"><i class="fas fa-edit"></i></button></td>
                                    <td><button class="btn btn-success"><i class="fas fa-file"></i></button></td>
                                </tr>
                                {{-- Add more rows as needed --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
