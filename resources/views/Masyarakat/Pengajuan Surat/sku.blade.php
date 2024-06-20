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
                <form action="{{route('masyarakat.ajusku')}}" method="POST" enctype="multipart/form-data">
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
                                    <label for="agama" class="form-label" style="min-width: 200px;">Agama</label>
                                    <input type="text" id="agama" class="form-control" placeholder="" maxlength="16" name="agama">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="status" class="form-label" style="min-width: 200px;">Status Perkawinan</label>
                                    <input type="text" id="status" class="form-control" placeholder="" maxlength="16" name="status">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="pekerjaan" class="form-label" style="min-width: 200px;">Pekerjaan</label>
                                    <input type="text" id="pekerjaan" class="form-control" placeholder="" maxlength="16" name="pekerjaan">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="usaha" class="form-label" style="min-width: 200px;">Usaha</label>
                                    <input type="text" id="usaha" class="form-control" placeholder="" maxlength="16" name="usaha">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="alasan" class="form-label" style="min-width: 200px;">Alasan</label>
                                    <input type="text" id="alasan" class="form-control" placeholder="Tambahkan alasan pengajuan surat" name="alasan">
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="filektp" class="form-label" style="min-width: 200px;">Upload KTP</label>
                                    <input type="file" id="filektp" class="form-control" name="filektp">
                                    <small class="text-muted">Ukuran maksimum: 2MB, Format: JPG, JPEG, PNG</small>
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="fotousaha" class="form-label" style="min-width: 200px;">Upload Foto Usaha</label>
                                    <input type="file" id="fotousaha" class="form-control" name="fotousaha">
                                    <small class="text-muted">Ukuran maksimum: 2MB, Format: JPG, JPEG, PNG</small>
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
