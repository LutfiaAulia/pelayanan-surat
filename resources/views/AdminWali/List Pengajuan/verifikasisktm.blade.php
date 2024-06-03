@extends('Layout.navbar')

@section('content')

<div class="me-auto" style="margin-bottom: 20px;">
    <h3>Detail Surat</h3>
</div>

<div class="d-flex justify-content-center">
    <div class="card p-4" style="width: 70%">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center; margin-bottom: 20px;">Detail Surat Keterangan Tidak Mampu</h4>
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
                                    <label for="fileUploadktp" class="form-label">Lampiran KTP</label>
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
                        </div>
                    </div>
                    <div class="form-actions d-flex justify-content-end">
                        <button type="submit" class="btn btn-success me-1" name="action" value="verifikasi">Verifikasi</button>
                        <button type="submit" class="btn btn-danger" name="action" value="tolak">Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
