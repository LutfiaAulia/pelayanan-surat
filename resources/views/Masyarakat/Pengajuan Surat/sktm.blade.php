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
    <h3>Surat Keterangan Tidak Mampu</h3>
</div>

<div class="d-flex justify-content-center">
    <div class="card p-4" style="width: 70%">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center; margin-bottom: 20px;">Form Pengajuan Surat Keterangan Tidak Mampu</h4>
                <form action="{{route('masyarakat.ajusktm')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="namapengaju" class="form-label" style="min-width: 200px;">Nama Pengaju</label>
                                    <input type="text" id="namapengaju" class="form-control" placeholder="Nama" name="nama">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="nik" class="form-label" style="min-width: 200px;">NIK</label>
                                    <input type="text" id="nik" class="form-control" placeholder="16-digit" maxlength="16" name="nik">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="tgl_lahir" class="form-label" style="min-width: 200px;">Tempat/Tanggal Lahir</label>
                                    <input type="text" id="tgl_lahir" class="form-control" placeholder="Contoh: Lubuk Alung, 07-09-1970" name="tgl_lahir" >
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="agama" class="form-label" style="min-width: 200px;">Agama</label>
                                    <input type="text" id="agama" class="form-control" placeholder="" name="agama">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="pekerjaan" class="form-label" style="min-width: 200px;">Pekerjaan</label>
                                    <input type="text" id="pekerjaan" class="form-control" placeholder="" name="pekerjaan">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="alamat" class="form-label" style="min-width: 200px;">Alamat</label>
                                    <input type="text" id="alamat" class="form-control" placeholder="Contoh: Korong Kelok Nagari Pungguang Kasiak Lubuk Alung Kecamatan Lubuk Alung" name="alamat">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="alasan" class="form-label" style="min-width: 200px;">Alasan</label>
                                    <input type="text" id="alasan" class="form-control" placeholder="Contoh: Penurunan UKT Anaknya An. Maisitoh" name="alasan">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="filektp" class="form-label" style="min-width: 200px;">Upload KTP</label>
                                    <input type="file" id="filektp" class="form-control" name="filektp">
                                    <small class="text-muted">Ukuran maksimum: 500KB, Format: JPG</small>
                                    @if($errors->has('filektp'))
                                        <div class="text-danger mt-2">Ukuran file terlalu besar.</div>
                                    @endif
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="filekk" class="form-label" style="min-width: 200px;">Upload KK</label>
                                    <input type="file" id="filekk" class="form-control" name="filekk">
                                    <small class="text-muted">Ukuran maksimum: 500KB, Format: JPG</small>
                                    @if($errors->has('filekk'))
                                        <div class="text-danger mt-2">Ukuran file terlalu besar.</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <button type="reset" class="btn btn-light-primary">Reset</button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('nik').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>

@endsection
