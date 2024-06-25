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
    <h3>Surat Penghasilan Orang Tua</h3>
</div>

<div class="d-flex justify-content-center">
    <div class="card p-4" style="width: 70%">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center; margin-bottom: 20px;">Form Pengajuan Surat Penghasilan Orang Tua</h4>
                <form action="{{ route('masyarakat.updatepot', $surpeng->id_pengajuan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="namapengaju" class="form-label" style="min-width: 200px;">Nama Pengaju</label>
                                    <input type="text" id="namapengaju" class="form-control" placeholder="Nama" name="nama" value="{{ old('nama', $surpeng->nama ?? '') }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="nik" class="form-label" style="min-width: 200px;">NIK</label>
                                    <input type="text" id="nik" class="form-control" placeholder="16-digit" maxlength="16" name="nik" value="{{ old('nik', $surpeng->nik ?? '') }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="tgl_lahir" class="form-label" style="min-width: 200px;">Tempat/Tanggal Lahir</label>
                                    <input type="text" id="tgl_lahir" class="form-control" placeholder="Contoh: Lubuk Alung, 07-09-1970" name="tgl_lahir" value="{{ old('tgl_lahir', $surpeng->tgl_lahir ?? '') }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="agama" class="form-label" style="min-width: 200px;">Agama</label>
                                    <input type="text" id="agama" class="form-control" placeholder="" name="agama" value="{{ old('agama', $surpeng->agama ?? '') }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="pekerjaan" class="form-label" style="min-width: 200px;">Pekerjaan</label>
                                    <input type="text" id="pekerjaan" class="form-control" placeholder="" name="pekerjaan" value="{{ old('pekerjaan', $surpeng->pekerjaan ?? '') }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="alamat" class="form-label" style="min-width: 200px;">Alamat</label>
                                    <input type="text" id="alamat" class="form-control" placeholder="Contoh: Korong Kelok Nagari Pungguang Kasiak Lubuk Alung Kecamatan Lubuk Alung" name="alamat" value="{{ old('alamat', $surpeng->alamat ?? '') }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="penghasilan" class="form-label" style="min-width: 200px;">Penghasilan</label>
                                    <input type="text" id="penghasilan" class="form-control" placeholder="Tambahkan penghasilan" name="penghasilan" value="{{ old('penghasilan', $surpeng->penghasilan ?? '') }}">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="alasan" class="form-label" style="min-width: 200px;">Alasan</label>
                                    <input type="text" id="alasan" class="form-control" placeholder="Contoh: Penurunan UKT Anaknya An. Maisitoh" name="alasan" value="{{ old('alasan', $surpeng->alasan ?? '') }}">
                                </div>
                                <div class="form-group d-flex mb-4 align-items-start">
                                    <label for="filekk" class="form-label">Upload KK</label>
                                    <div>
                                        @if (isset($surpeng->filekk))
                                            <img src="{{ asset('storage/filekk/' . $surpeng->filekk) }}" alt="KK" style="max-width: 500px; height: auto; display: block;">
                                        @endif
                                        <input type="file" id="filekk" class="form-control mt-2" name="filekk">
                                        <small class="text-muted">Ukuran maksimum: 500KB, Format: JPG</small>
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
