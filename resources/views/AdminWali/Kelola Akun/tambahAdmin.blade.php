@extends('Layout.navbar')

@section('content')

<div class="me-auto" style="margin-bottom: 20px;">
    <h3>Tambah Admin</h3>
</div>

<div class="d-flex justify-content-center">
    <div class="card p-4" style="width: 70%">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center; margin-bottom: 20px;">Form Tambah Admin</h4>
                <form class="form" method="POST" action="{{ route('admin.inputAdmin') }}">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group mb-4">
                                    <label for="username" class="form-label">Username</label>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="nip" class="form-label">NIP</label>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="form-label">Password</label>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group mb-3">
                                    <input type="text" id="username" class="form-control" placeholder="Username" name="name">
                                    @error('name')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" id="nik" class="form-control" placeholder="NIK" name="nkkip" maxlength="18">
                                    @error('nkkip')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" id="password" class="form-control" placeholder="Password" name="password">
                                    @error('password')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <a href="{{ route('admin.listAdmin') }}" class="btn btn-light-primary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('nik').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</div>

@endsection
