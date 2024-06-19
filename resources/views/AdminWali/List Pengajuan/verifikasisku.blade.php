@extends('Layout.navbar')

@section('content')

<div class="me-auto" style="margin-bottom: 20px;">
    <h3>Detail Surat</h3>
</div>

<div class="d-flex justify-content-center">
    <div class="card p-4" style="width: 70%">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center; margin-bottom: 20px;">Detail Surat Keterangan Usaha</h4>
                <form class="form" method="post" action="{{ route('adminwali.listpengajuan.verifikasisku', $data->id_pengajuan) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="namapengaju" class="form-label" style="min-width: 200px;">Nama Pengaju</label>
                                    <input type="text" id="nama_pengaju" class="form-control" name="nama_pengaju" value="{{ $data['nama'] }}" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="nik" class="form-label" style="min-width: 200px;">NIK</label>
                                    <input type="text" id="nik" class="form-control" name="nik" value="{{ $data->nik }}" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="alasan" class="form-label" style="min-width: 200px;">Alasan</label>
                                    <input type="text" id="alasan" class="form-control" name="alasan" value="{{ $data->alasan }}" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="filektp" class="form-label" style="min-width: 200px;">Lampiran KTP</label>
                                    <img src="{{ asset('storage/filektp/' . $data->filektp) }}" alt="" style="max-width: 500px; height: auto;">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="filektp" class="form-label" style="min-width: 200px;">Lampiran Fhoto Usaha</label>
                                    <img src="{{ asset('storage/fotousaha/' . $data->fotousaha) }}" alt="" style="max-width: 500px; height: auto;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions d-flex justify-content-end">
                        <button type="submit" class="btn btn-success me-1">Verifikasi</button>
                        <button type="button" class="btn btn-danger" id="tolakButton">Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="alasanModal" tabindex="-1" aria-labelledby="alasanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alasanModalLabel">Tulis Alasan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form id="alasanForm" method="post" action="{{ route('pengajuan.tolaksku') }}"> 
                    @csrf
                    <input type="hidden" name="id_pengajuan" value="{{ $data->id_pengajuan }}">
                    <div class="mb-3">
                        <label for="alasan_penolakan" class="form-label">Alasan</label>
                        <textarea class="form-control" id="alasan_penolakan" name="alasan_penolakan" rows="6" required></textarea>
                    </div>
                    <div class="form-actions d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Close</button>
                        <button type="submit" form="alasanForm" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* CSS untuk memposisikan modal di tengah halaman */
    .modal-dialog {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
</style>

<script>
    document.getElementById('tolakButton').addEventListener('click', function() {
        var alasanModal = new bootstrap.Modal(document.getElementById('alasanModal'));
        alasanModal.show();
    });
</script>

@endsection
