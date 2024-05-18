@extends('Layout.navbar')

@section('content')

<div class="me-auto" style="margin-bottom: 20px;">
    <h3>Surat Penghasilan Orang Tua</h3>
</div>

<div class="d-flex justify-content-center">
    <div class="card p-4" style="width: 70%">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center; margin-bottom: 20px;">Form Pengajuan Surat SKTM</h4>
                <form class="form" method="post">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group mb-4">
                                    <label for="feedback1" class="form-label">Jenis Surat</label>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="feedback4" class="form-label">Nama Pengaju</label>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="feedback2" class="form-label">NIK</label>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="feedback2" class="form-label">Penghasilan Orang Tua</label>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="fileUpload" class="form-label">Upload KK</label>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group mb-3">
                                    <input type="text" id="feedback1" class="form-control" placeholder="" name="jenis_surat">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" id="feedback4" class="form-control" placeholder="" name="nama_pengaju">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" id="feedback2" class="form-control" placeholder="" name="nik">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" id="feedback2" class="form-control" placeholder="" name="penghasilan">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="file" id="fileUpload" class="form-control" name="fileUploadkk">
                                    <small class="text-muted">Ukuran maksimum: 500KB, Format: JPG</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="" style="text-align: center">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <button type="reset" class="btn btn-light-primary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
