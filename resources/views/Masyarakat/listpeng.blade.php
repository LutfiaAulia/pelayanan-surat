@extends('Layout.navbar')

@section('content')

{{-- content --}}
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pengajuan Surat</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Tanggal Pengajuan</th>
                                    <th scope="col">Jenis Surat</th>
                                    <th scope="col">Acc Staff</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detail</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Example rows --}}
                                <tr>
                                    <th scope="row">1</th>
                                    <td>12/02/2024</td>
                                    <td>SKTM</td>
                                    <td>Sarah Putri</td>
                                    <td>Acc</td>
                                    <td>Cek</td>
                                    <td style="width: 200px; text-align: center;" >
                                        {{-- @if ($item->jenis_surat == 'SKTM')
                                            <a href="{{ route('masyarakat.sktm') }}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @elseif ($item->jenis_surat == 'SKU')
                                            <a href="{{ route('masyarakat.sku') }}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @elseif ($item->jenis_surat == 'SurPeng')
                                            <a href="{{ route('masyarakat.surpeng') }}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif --}}

                                        <a href="{{ route('masyarakat.sktm') }}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>                                        
                                        <button class="btn btn-success"><i class="fas fa-file-upload"></i></button>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
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
