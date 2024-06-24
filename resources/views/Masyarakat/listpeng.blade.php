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
                                                            <a href="{{ route('masyarakat.pot.edit', $item['id_pengajuan']) }}" class="btn btn-primary">
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
                                                        <a href="{{ route('download.surat', ['id_pengajuan' => $item['id_pengajuan']]) }}" class="btn btn-success">
                                                            <i class="fas fa-download"></i>
                                                        </a>
                                                    @endif

                                                    @if($item['status_pengajuan'] == 'Ditolak')
                                                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#alasanTolakModal" data-id="{{ $item['id_pengajuan'] }}">Cek</button>
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

<!-- Modal -->
<div class="modal fade" id="alasanTolakModal" tabindex="-1" aria-labelledby="alasanTolakModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alasanTolakModalLabel">Alasan Penolakan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="alasanPenolakanText"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#alasanTolakModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id_pengajuan = button.data('id');

        $.ajax({
            url: '{{ route("alasanTolak") }}',
            method: 'GET',
            data: { id_pengajuan: id_pengajuan },
            success: function(response) {
                console.log(response); // Debugging
                $('#alasanPenolakanText').text(response.alasan_penolakan);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error); // Debugging
                console.error('Status:', status);
                console.error('Response:', xhr.responseText);
                $('#alasanPenolakanText').text('Gagal mengambil data');
            }
        });
    });
});
</script>

@endsection
