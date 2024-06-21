@extends('Layout.navbar')

@section('content')

<div class="me-auto" style="margin-bottom: 20px;">
    <h3>Generate Surat</h3>
</div>

<div class="d-flex justify-content-center">
    <div class="card p-4" style="width: 70%">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center; margin-bottom: 20px;">Generate Surat Keterangan Usaha</h4>
                <form class="form" method="post" action="">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="nomorsurat" class="form-label" style="min-width: 200px;">Nomor Surat</label>
                                    <input type="text" id="nomorsurat" class="form-control" placeholder="Nomor Surat" name="nomorsurat" value="{{ $data['nomor_surat'] }}" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="namapengaju" class="form-label" style="min-width: 200px;">Nama Pengaju</label>
                                    <input type="text" id="namapengaju" class="form-control" placeholder="Nama Pengaju" name="namapengaju" value="{{ $data['nama'] }}" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="nik" class="form-label" style="min-width: 200px;">NIK</label>
                                    <input type="text" id="nik" class="form-control" placeholder="NIK" name="nik" value="{{ $data['nik'] }}" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="tempattanggal" class="form-label" style="min-width: 200px;">Tempat/Tanggal Lahir</label>
                                    <input type="text" id="ttl" class="form-control" placeholder="Lubuk Alung, 06-12-1970" name="ttl" value="{{ $data['tgl_lahir'] ?? '' }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="agama" class="form-label" style="min-width: 200px;">Agama</label>
                                    <input type="text" id="agama" class="form-control" placeholder="Tambahkan Agama Pengaju" name="agama" value="{{ $data['agama'] }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="status" class="form-label" style="min-width: 200px;">Status Perkawinan</label>
                                    <input type="text" id="status" class="form-control" placeholder="Kawin/Belum Kawin" name="status" value="{{ $data['status'] }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="pekerjaan" class="form-label" style="min-width: 200px;">Pekerjaan</label>
                                    <input type="text" id="pekerjaan" class="form-control" placeholder="Pekerjaan saat ini" name="pekerjaan" value="{{ $data['pekerjaan'] }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="alamat" class="form-label" style="min-width: 200px;">Alamat</label>
                                    <input type="text" id="alamat" class="form-control" name="alamat" value="{{ $data['alamat'] ?? '' }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="usaha" class="form-label" style="min-width: 200px;">Usaha</label>
                                    <input type="text" id="usaha" class="form-control" placeholder="usaha saat ini" name="usaha" value="{{ $data['usaha'] }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="alasan" class="form-label" style="min-width: 200px;">Alasan</label>
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