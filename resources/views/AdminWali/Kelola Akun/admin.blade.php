@extends('Layout.navbar')

@section('content')

{{-- content --}}
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="me-auto" style= "margin-bottom: 30px;">
                <h3>Kelola Akun Admin</h3>
            </div>
            <div class="mb-3 d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.tambahAdmin') }}" class="btn btn-success shadow-sm" style="margin-bottom: right;">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Admin
                </a>
            </div>            
            <div class="card">
                <div class="card-header">
                    <h4>List Akun Admin</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead style="text-align: center;">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">NIK</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                <tr>
                                    <th scope="row" style="width: 80px; text-align: center;">{{ $loop->iteration }}</th>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->nkkip }}</td>
                                    <td style="width: 200px; text-align: center;">
                                        <a href="{{ route('admin.editAdmin', ['id' => $admin->id]) }}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
