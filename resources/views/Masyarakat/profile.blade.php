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

                    <div class="d-flex flex-column align-items-center">
                        @if($user->profile_picture)
                            <img id="profilePicturePreview" src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="rounded-circle mb-2" width="150" height="150" style="object-fit: cover; cursor: pointer;">
                        @else
                            <img id="profilePicturePreview" src="{{ asset('template/assets/images/faces/1.jpg') }}" alt="Default Profile Picture" class="rounded-circle mb-2" width="150" height="150" style="object-fit: cover; cursor: pointer;">
                        @endif
                        <input type="file" class="form-control-file d-none" id="profile_picture" name="profile_picture" onchange="previewImage(event)">
                    </div>

                    <div class="form-group mt-4">
                        <label for="name">Username:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nkkip">NIK:</label>
                        <input type="text" class="form-control" id="nkkip" name="nkkip" value="{{ $user->nkkip }}" required>
                        @error('nkkip')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <div class="input-group">
                            <input type="password" id="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                            <div class="input-group-append">
                                <span class="input-group-text" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="togglePasswordIcon"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('profilePicturePreview').addEventListener('click', function() {
            document.getElementById('profile_picture').click();
        });

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('profilePicturePreview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePasswordIcon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
@endsection
