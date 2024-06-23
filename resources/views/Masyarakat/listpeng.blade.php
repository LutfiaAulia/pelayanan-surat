@extends('Layout.navbar')

@section('content')

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
                                    <th scope="col">Status</th>
                                    <th scope="col">Detail</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($list)
                                    @if($list->isNotEmpty())
                                        @foreach ($list as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item['tanggal_pengajuan'] }}</td>
                                                <td>{{ $item['jenis_surat'] }}</td>
                                                <td>{{ $item['status_pengajuan'] }}</td>
                                                <td><a href="{{ route('masyarakat.sktm', $item['id_pengajuan']) }}">Cek</a></td>
                                                <td style="width: 200px; text-align: center;">
                                                    @if($item['status_pengajuan'] == 'Mengajukan')
                                                        @if($item['jenis_surat'] == 'SKTM')
                                                            <a href="{{ route('masyarakat.sktm.edit', $item['id_pengajuan']) }}" class="btn btn-primary">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        @elseif($item['jenis_surat'] == 'SKU')
                                                            <a href="{{ route('masyarakat.sku.edit', $item['id_pengajuan']) }}" class="btn btn-primary">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        @elseif($item['jenis_surat'] == 'POT')
                                                            <a href="{{ route('masyarakat.surpeng.edit', $item['id_pengajuan']) }}" class="btn btn-primary">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        @endif
                                                        <form action="{{ route('masyarakat.' . strtolower($item['jenis_surat']) . '.destroy', $item['id_pengajuan']) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if($item['status_pengajuan'] == 'Selesai')
                                                        <button class="btn btn-success">
                                                            <i class="fas fa-file-download"></i>
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">Tidak ada data pengajuan.</td>
                                        </tr>
                                    @endif
                                @else
                                    <tr>
                                        <td colspan="6">Variabel $list tidak terdefinisi.</td>
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
