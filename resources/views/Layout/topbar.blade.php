{{-- Header --}}
{{-- <header class="mb-3 d-flex justify-content-end align-items-center">
    <div class="col-12 col-lg-3">
        <div class="card">
            <div class="card-body card-body-small py-3 px-4"> <!-- Tambahkan kelas card-body-small -->
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-md"> <!-- Ubah ukuran avatar menjadi avatar-md -->
                        <img src="{{ asset('template/assets/images/faces/1.jpg') }}" alt="Face 1">
                    </div>
                    <div class="ms-3 name">
                        <h5 class="font-bold">Welcome</h5>
                        <h6 class="text-muted mb-0">{{ Auth::user()->name }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header> --}}

{{-- Header --}}
<header class="mb-3 d-flex justify-content-end align-items-center">
    <div class="col-12 col-lg-3">
        <div class="card">
            <div class="card-body card-body-small py-3 px-4">
                <div class="d-flex align-items-center">
                    @if(Auth::user()->role === 'masyarakat')
                        <a href="{{ route('masyarakat.edit', Auth::user()->id) }}" class="d-flex align-items-center text-decoration-none">
                            <div class="avatar avatar-md">
                                @if(Auth::user()->profile_picture)
                                    <img src="{{ asset(Auth::user()->profile_picture) }}" alt="Profile Picture">
                                @else
                                    <img src="{{ asset('template/assets/images/faces/1.jpg') }}" alt="Default Profile Picture">
                                @endif
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">Welcome</h5>
                                <h6 class="text-muted mb-0">{{ Auth::user()->name }}</h6>
                            </div>
                        </a>
                    @else
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-md">
                                <img src="{{ asset('template/assets/images/faces/1.jpg') }}" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">Welcome</h5>
                                <h6 class="text-muted mb-0">{{ Auth::user()->name }}</h6>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

