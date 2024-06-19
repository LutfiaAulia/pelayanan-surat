@extends('layout.navbar')

@section('content')

<div class="container">
    <h3>Detail Surat</h3>
    <div class="d-flex justify-content-center">
        <div class="card p-4" style="width: 70%">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center; margin-bottom: 20px;">Detail Surat Keterangan Penghasilan</h4>
                    <form class="form" method="post" action=""> 
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
                                        <label for="penghasilan" class="form-label" style="min-width: 200px;">Penghasilan Orang Tua</label>
                                        <input type="text" id="penghasilan" class="form-control" name="penghasilan" value="{{ $data->penghasilan }}" readonly>
                                    </div>
                                    <div class="form-group d-flex align-items-center mb-4">
                                        <label for="alasan" class="form-label" style="min-width: 200px;">Alasan</label>
                                        <input type="text" id="alasan" class="form-control" name="alasan" value="{{ $data->alasan }}" readonly>
                                    </div>
                                    <div class="form-group d-flex align-items-center mb-4">
                                        <label for="filektp" class="form-label" style="min-width: 200px;">Lampiran KTP</label>
                                        <img src="{{ asset('storage/filekk/' . $data->filekk) }}" alt="" style="max-width: 500px; height: auto;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions d-flex justify-content-end">
                            <a href="{{ route('adminwali.listpengajuan.verifikasipot', $data->id_pengajuan) }}" class="btn btn-success me-1">Verifikasi</a>
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
                    <form id="alasanForm" method="post" action="{{ route('pengajuan.tolakpot') }}"> 
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
</div>

<!-- Include jQuery and Bootstrap JS (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('tolakButton').addEventListener('click', function() {
        var alasanModal = new bootstrap.Modal(document.getElementById('alasanModal'));
        alasanModal.show();
    });
</script>

@endsection
