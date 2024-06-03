@extends('Layout.navbar')

@section('content')

<div class="me-auto" style="margin-bottom: 20px;">
    <h3>Surat Keterangan Tidak Mampu</h3>
</div>

<div class="d-flex justify-content-center">
    <div class="card p-4" style="width: 70%">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center; margin-bottom: 20px;">Form Pengajuan Surat Keterangan Tidak Mampu</h4>
                <form class="form" method="post">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group mb-4">
                                    <label for="namapengaju" class="form-label">Nama Pengaju</label>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="nik" class="form-label">NIK</label>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="alasan" class="form-label">Alasan</label>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="filektp" class="form-label">Upload KTP</label>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="filekk" class="form-label">Upload KK</label>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group mb-3">
                                    <input type="text" id="namapengaju" class="form-control" placeholder="Nama" name="nama_pengaju">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" id="nik" class="form-control" placeholder="16-digit" name="nik">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" id="alasan" class="form-control" placeholder="Tambahkan alasan pengajuan surat" name="alasan">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="file" id="filektp" class="form-control" name="filektp">
                                    <small class="text-muted">Ukuran maksimum: 500KB, Format: JPG</small>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="file" id="filekk" class="form-control" name="filekk">
                                    <small class="text-muted">Ukuran maksimum: 500KB, Format: JPG</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <button type="reset" class="btn btn-light-primary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
