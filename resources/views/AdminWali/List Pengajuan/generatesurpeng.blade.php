@extends('Layout.navbar')

@section('content')

<div class="me-auto" style="margin-bottom: 20px;">
    <h3>Generate Surat</h3>
</div>

<div class="d-flex justify-content-center">
    <div class="card p-4" style="width: 70%">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center; margin-bottom: 20px;">Generate Surat Keterangan Penghasilan</h4>
                <form class="form" method="post" action="">
                    @csrf
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
                                    <label for="nomorsurat" class="form-label">Nomor Surat</label>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="penghasilan" class="form-label">Penghasilan Orang Tua</label>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="alasan" class="form-label">Alasan</label>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group mb-3">
                                    <input type="text" id="namapengaju" class="form-control" placeholder="Nama Pengaju" name="namapengaju" value="{{ $data['nama'] }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" id="nik" class="form-control" placeholder="NIK" name="nik" value="{{ $data['nik'] }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" id="nomorsurat" class="form-control" placeholder="Nomor Surat" name="nomorsurat">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" id="penghasilan" class="form-control" placeholder="Jumlah Penghasilan" name="penghasilan" value="{{ $data['penghasilan'] }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" id="alasan" class="form-control" name="alasan" value="{{ $data['alasan'] }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1">Generate Surat</button>
                        <button type="reset" class="btn btn-light-primary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
