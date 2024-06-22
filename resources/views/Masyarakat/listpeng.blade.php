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
                                                    {{-- <a href="{{ route('masyarakat.sktm.edit', $item['id_pengajuan']) }}" class="btn btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
                                                    <button class="btn btn-success"><i class="fas fa-file-upload"></i></button>
                                                    {{-- <form action="{{ route('masyarakat.sktm.destroy', $item['id_pengajuan']) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form> --}}
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
                                    </tr>
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
