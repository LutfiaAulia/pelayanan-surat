@extends('Layout.navbar')

@section('content')

{{-- content --}}
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="me-auto">
                <h3>Kelola Akun Masyarakat</h3>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>List Akun Masyarakat</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead style="text-align: center;">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Example rows --}}
                                <tr>
                                    <th scope="row" style="width: 80px; text-align: center;">1</th>
                                    <td>masyarakat</td>
                                    <td>masyarakat@gmail.com</td>
                                    <td style="width: 200px; text-align: center;">
                                        <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                {{-- Add more rows as needed --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
