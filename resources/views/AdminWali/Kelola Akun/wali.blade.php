@extends('Layout.navbar')

@section('content')

{{-- content --}}
<div class="page-content">
    <section class="row">
        <div class="col-12">
            
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

            <div class="me-auto" style= "margin-bottom: 30px;">
                <h3>Kelola Akun Wali Nagari</h3>
            </div>
            <div class="mb-3 d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.tambahWali') }}" class="btn btn-success shadow-sm" style="margin-bottom: right;">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Wali
                </a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>List Akun Wali Nagari</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead style="text-align: center;">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">NIP</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($walis as $wali)
                                <tr>
                                    <th scope="row" style="width: 80px; text-align: center;">1</th>
                                    <td>{{ $wali->name }}</td>
                                    <td>{{ $wali->nkkip }}</td>
                                    <td style="width: 200px; text-align: center;">
                                        <a href="{{ route('admin.editWali', ['id' => $wali->id]) }}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.deleteWali', ['id' => $wali->id]) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
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
