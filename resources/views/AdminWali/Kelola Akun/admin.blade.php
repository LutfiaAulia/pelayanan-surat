@extends('Layout.navbar')

@section('content')

{{-- content --}}
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Akun Admin</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
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
                                    <th scope="row">1</th>
                                    <td>admin</td>
                                    <td>admin@gmail.com</td>
                                    <td>
                                        <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">
                                            <i class="fas fa-trash-alt"></i> Hapus
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
