@extends('Layout.navbar')

@section('content')

<div class="me-auto" style="margin-bottom: 20px;">
    <h3>Detail Surat</h3>
</div>

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
                            <div class="col-md-2">
                                <div class="form-group mb-4">
                                    <label for="nama_pengaju" class="form-label">Nama Pengaju</label>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="nik" class="form-label">NIK</label>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="penghasilan" class="form-label">Penghasilan Orang Tua</label>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="fileUploadkk" class="form-label">Lampiran KK</label>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group mb-3">
                                    <input type="text" id="nama_pengaju" class="form-control" name="nama_pengaju" value="Intan Putri" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" id="nik" class="form-control" name="nik" value="123456" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" id="penghasilan" class="form-control" name="penghasilan" value="Rp1.000.000" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions d-flex justify-content-end">
                        <a href="{{ route('admin.generatesurpeng') }}" class="btn btn-success me-1" name="action" value="verifikasi">Verifikasi</a>
                        <button type="button" class="btn btn-danger" id="tolakButton">Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="alasanModal" tabindex="-1" aria-labelledby="alasanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Tambahkan kelas modal-lg untuk modal lebih besar -->
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
                <form id="alasanForm" method="post" action=""> 
                    @csrf
                    <div class="mb-3">
                        <label for="alasan" class="form-label">Alasan</label>
                        <textarea class="form-control" id="alasan" name="alasan" rows="6" required></textarea> <!-- Ubah rows menjadi 6 -->
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
