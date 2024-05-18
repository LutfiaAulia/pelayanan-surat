@extends('Layout.navbar')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Syarat Pengajuan Surat</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Berikut Syarat Pengajuan Surat</h5>
                    </div>
                    <div class="card-body">
                        <p>
                            Syarat Pengajuan Surat:
                            <li>Masyarakat harus memiliki identitas yang valid, seperti KTP</li>
                            <li>Tergantung pada jenis surat, pengguna mungkin perlu menyediakan data pendukung.</li>
                            <li>Masyarakat menyediakan keterangan tambahan yang diperlukan oleh wali nagari.</li>
                            <li>Masyarakat harus menyetujui kebijakan privasi dan persyaratan penggunaan aplikasi.</li>
                        </p>
                        <p>
                            Syarat Pengajuan Surat SKTM:
                            <li>Melampirkan KK</li>
                            <li>Melampirkan KTP</li>
                        </p>
                        <p>
                            Syarat Pengajuan Surat Penghasilan Orang Tua:
                            <li>Melampirkan KK</li>
                            <li>Memberikan keterangan penghasilan orang tua</li>
                        </p>
                        <p>
                            Syarat Pengajuan SKU:
                            <li>Melampirkan KTP terkait</li>
                            <li>Melampirkan foto usaha yang dijalankan</li>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection