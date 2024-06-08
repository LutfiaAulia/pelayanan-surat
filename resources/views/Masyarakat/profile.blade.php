@extends('Layout.navbar')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center mb-4">
                    <h3>Edit Profil</h3>
                </div>
                <form action="{{ route('masyarakat.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="profile_picture">Foto Profil:</label>
                        @if($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="img-thumbnail mb-2" width="150">
                        @endif
                        <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Username:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">NIP:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Password:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                    </div>

                    {{-- <div class="form-group">
                        <label for="address">Alamat:</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required>{{ $user->address }}</textarea>
                    </div> --}}

                    {{-- <div class="form-group">
                        <label for="profile_picture">Foto Profil:</label>
                        <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                        @if($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="img-thumbnail mt-2" width="150">
                        @endif
                    </div> --}}

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('masyarakat.show', $user->id) }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
