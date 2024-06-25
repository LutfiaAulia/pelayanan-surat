@extends('Layout.navbar')

@section('content')

<div class="me-auto" style="margin-bottom: 20px;">
    {{-- Flash messages --}}
    @if (session('success'))
    <div class="alert alert-success">
            {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
            {{ session('error') }}
    </div>
    @endif
    <h3>Surat Keterangan Usaha</h3>
</div>

<div class="d-flex justify-content-center">
    <div class="card p-4" style="width: 70%">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center; margin-bottom: 20px;">Form Pengajuan Surat Keterangan Usaha</h4>
                <form action="{{ route('masyarakat.updatesku', $sku->id_pengajuan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method ('PUT')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="namapengaju" class="form-label" style="min-width: 200px;">Nama Pengaju</label>
                                    <input type="text" id="namapengaju" class="form-control" placeholder="Nama" name="nama" value="{{ old('nama', $sku->nama ?? '') }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="nik" class="form-label" style="min-width: 200px;">NIK</label>
                                    <input type="text" id="nik" class="form-control" placeholder="16-digit" maxlength="16" name="nik" value="{{ old('nik', $sku->nik ?? '') }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="tgl_lahir" class="form-label" style="min-width: 200px;">Tempat/Tanggal Lahir</label>
                                    <input type="text" id="tgl_lahir" class="form-control" placeholder="Contoh: Lubuk Alung, 07-09-1970" name="tgl_lahir" value="{{ old('tgl_lahir', $sku->tgl_lahir ?? '') }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="agama" class="form-label" style="min-width: 200px;">Agama</label>
                                    <input type="text" id="agama" class="form-control" placeholder="" maxlength="" name="agama" value="{{ old('agama', $sku->agama ?? '') }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="status" class="form-label" style="min-width: 200px;">Status Perkawinan</label>
                                    <input type="text" id="status" class="form-control" placeholder="Contoh: Belum Kawin" maxlength="" name="status" value="{{ old('status', $sku->status ?? '') }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="pekerjaan" class="form-label" style="min-width: 200px;">Pekerjaan</label>
                                    <input type="text" id="pekerjaan" class="form-control" placeholder="" maxlength="" name="pekerjaan" value="{{ old('pekerjaan', $sku->pekerjaan ?? '') }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="alamat" class="form-label" style="min-width: 200px;">Alamat</label>
                                    <input type="text" id="alamat" class="form-control" placeholder="Contoh: Korong Kelok Nagari Pungguang Kasiak Lubuk Alung Kecamatan Lubuk Alung" name="alamat" value="{{ old('alamat', $sku->alamat ?? '') }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="usaha" class="form-label" style="min-width: 200px;">Usaha</label>
                                    <input type="text" id="usaha" class="form-control" placeholder="" maxlength="" name="usaha" value="{{ old('usaha', $sku->usaha ?? '') }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="alasan" class="form-label" style="min-width: 200px;">Alasan</label>
                                    <input type="text" id="alasan" class="form-control" placeholder="Tambahkan alasan pengajuan surat" name="alasan" value="{{ old('alasan', $sku->alasan ?? '') }}">
                                </div>
                                <div class="form-group d-flex mb-4 align-items-start">
                                    <label for="filektp" class="form-label">Upload KTP</label>
                                    <div>
                                        @if (isset($sku->filektp))
                                            <img src="{{ asset('storage/filektp/' . $sku->filektp) }}" alt="KTP" style="max-width: 500px; height: auto; display: block;">
                                        @endif
                                        <input type="file" id="filektp" class="form-control mt-2" name="filektp">
                                        <small class="text-muted">Ukuran maksimum: 2MB, Format: JPG, JPEG, PNG</small>
                                    </div>
                                </div>
                                <div class="form-group d-flex mb-4 align-items-start">
                                    <label for="fotousaha" class="form-label">Upload Foto Usaha</label>
                                    <div>
                                        @if (isset($sku->fotousaha))
                                            <img src="{{ asset('storage/fotousaha/' . $sku->fotousaha) }}" alt="Foto Usaha" style="max-width: 500px; height: auto; display: block;">
                                        @endif
                                        <input type="file" id="fotousaha" class="form-control mt-2" name="fotousaha">
                                        <small class="text-muted">Ukuran maksimum: 2MB, Format: JPG, JPEG, PNG</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <a href="{{ route('listpeng') }}" class="btn btn-light-primary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .form-group {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }

    .form-label {
        min-width: 200px;
        padding-top: 5px;
    }

    .form-control {
        margin-top: 10px;
    }
</style>

@endsection
