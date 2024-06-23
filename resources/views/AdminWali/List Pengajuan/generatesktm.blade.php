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
                <form class="form" id="generateForm" method="post" action="{{ route('admin.generateSuratSktm', $data['id_pengajuan']) }}">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="namapengaju" class="form-label" style="min-width: 200px;">Nama Pengaju</label>
                                    <input type="text" id="namapengaju" class="form-control" name="namapengaju" value="{{ $data['nama'] }}" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="nik" class="form-label" style="min-width: 200px;">NIK</label>
                                    <input type="text" id="nik" class="form-control" name="nik" value="{{ $data['nik'] }}" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="tgl_lahir" class="form-label" style="min-width: 200px;">Tempat/Tanggal Lahir</label>
                                    <input type="text" id="tgl_lahir" class="form-control" placeholder="Lubuk Alung, 06-12-1970" name="tgl_lahir" value="{{ $data['tgl_lahir'] }}" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="agama" class="form-label" style="min-width: 200px;">Agama</label>
                                    <input type="text" id="agama" class="form-control" name="agama" value="{{ $data['agama'] }}" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="pekerjaan" class="form-label" style="min-width: 200px;">Pekerjaan</label>
                                    <input type="text" id="pekerjaan" class="form-control" name="pekerjaan" value="{{ $data['pekerjaan'] }}" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="alamat" class="form-label" style="min-width: 200px;">Alamat</label>
                                    <input type="text" id="alamat" class="form-control" name="alamat" value="{{ $data['alamat'] }}" readonly>
                                </div>
                                <div class="form-group d-flex align-items-center mb-4">
                                    <label for="alasan" class="form-label" style="min-width: 200px;">Alasan</label>
                                    <input type="text" id="alasan" class="form-control" name="alasan" value="{{ $data['alasan'] }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions d-flex justify-content-end">
                        <button type="button" id="generateButton" class="btn btn-primary me-1">Generate Surat</button>
                        <a href="{{ route('admin.listsktm') }}" class="btn btn-light-primary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#generateButton').click(function(event) {
            event.preventDefault();

            var formData = $('#generateForm').serialize();

            $.ajax({
                url: "{{ route('admin.generateSuratSktm', $data['id_pengajuan']) }}",
                type: "POST",
                data: formData,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);

                    if (response.file) {
                        var downloadUrl = "{{ url('storage') }}/" + response.file;

                        var link = document.createElement('a');
                        link.href = downloadUrl;
                        link.download = response.file;

                        document.body.appendChild(link);
                        link.click();

                        document.body.removeChild(link);

                        setTimeout(function() {
                            window.location.href = "{{ route('admin.listsktm') }}";
                        }, 3000);
                    } else {
                        alert('Gagal mengunduh surat. Silakan coba lagi.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat mengunduh surat.');
                }
            });
        });
    });
</script>
@endsection
