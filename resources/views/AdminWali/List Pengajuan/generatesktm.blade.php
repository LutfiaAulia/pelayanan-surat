@extends('Layout.navbar')

@section('content')

<div class="me-auto" style="margin-bottom: 20px;">
    <h3>Generate Surat</h3>
</div>

<div class="d-flex justify-content-center">
    <div class="card p-4" style="width: 70%">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center; margin-bottom: 20px;">Generate Surat Keterangan Tidak Mampu</h4>
                <form class="form" method="post" action="">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="namapengaju" class="form-label" style="min-width: 200px;">Nama Pengaju</label>
                                    <input type="text" id="namapengaju" class="form-control" name="namapengaju" value="{{ $data['nama_pengaju'] ?? '' }}" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="tempattanggal" class="form-label" style="min-width: 200px;">Tempat/Tanggal Lahir</label>
                                    <input type="text" id="ttl" class="form-control" name="ttl" value="{{ $data['ttl'] ?? '' }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="agama" class="form-label" style="min-width: 200px;">Agama</label>
                                    <input type="text" id="agama" class="form-control" name="agama" value="{{ $data['agama'] ?? '' }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="nik" class="form-label" style="min-width: 200px;">NIK</label>
                                    <input type="text" id="nik" class="form-control" name="nik" value="{{ $data['nik'] ?? '' }}" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="nomorsurat" class="form-label" style="min-width: 200px;">Nomor Surat</label>
                                    <input type="text" id="nomorsurat" class="form-control" name="nomorsurat" value="{{ $data['nomorsurat'] ?? '' }}">
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