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
            <div class="col-12 col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">Syarat Pengajuan Surat</h5>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Masyarakat harus memiliki identitas yang valid, seperti KTP</li>
                            <li>Tergantung pada jenis surat, pengguna mungkin perlu menyediakan data pendukung.</li>
                            <li>Masyarakat menyediakan keterangan tambahan yang diperlukan oleh wali nagari.</li>
                            <li>Masyarakat harus menyetujui kebijakan privasi dan persyaratan penggunaan aplikasi.</li>
                        </ul>
                        <p>Dengan memenuhi semua syarat di samping, diharapkan pengajuan surat dapat diproses dengan lancar dan sesuai dengan ketentuan yang berlaku.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">Syarat Pengajuan Surat SKTM</h5>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Melampirkan KK</li>
                            <li>Melampirkan KTP</li>
                        </ul>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">Syarat Pengajuan Surat Penghasilan Orang Tua</h5>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Melampirkan KK</li>
                            <li>Memberikan keterangan penghasilan orang tua</li>
                        </ul>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">Syarat Pengajuan SKU</h5>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Melampirkan KTP terkait</li>
                            <li>Melampirkan foto usaha yang dijalankan</li>
                        </ul>
                    </div>
                </div>
            </div>
            
                
            
        </div>
    </section>
</div>

@endsection
