@extends('dashboard.layouts.app')

@section('title', 'Profile')

@section('pageTitle', 'Detail Profile')

@section('pageContent')
<span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Detail Profile</span>
@endsection

@section('content')

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">Biodata</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Reset Password</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                tabindex="0">
                <form action="{{ route('profile.update', $biodata->slug) }}" method="post"
                    enctype="multipart/form-data" id="formProfile">
                    @csrf
                    @method('PUT')
                    @if ($biodata->foto)
                    <div class="form-group mb-3">
                        <div for="foto" class="required">Foto Sekarang</div>
                        <img src="{{ $biodata->foto }}" alt="" class="img-fluid rounded border shadow-none" width="250px" height="250px">
                    </div>
                    @endif
                    <div class="form-group mb-3">
                        <label for="nama" class="required">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $biodata->nama_lengkap) }}"
                            class="form-control @error('nama') is-invalid @enderror" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal_lahir" class="required">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $biodata->tanggal_lahir) }}"
                            class="form-control @error('tanggal_lahir') is-invalid @enderror" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat" class="required">Alamat <span class="text-danger">*</span></label>
                        <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat', $biodata->alamat) }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nomor_telepon" class="required">Nomor Telepon <span class="text-danger">*</span></label>
                        <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon', $biodata->nomor_telepon) }}"
                            class="form-control @error('nomor_telepon') is-invalid @enderror" required placeholder="08xxxxxxx">
                    </div>
                    <div class="form-group mb-3">
                        <label for="whatsapp" class="required">Nomor Whatsapp <span class="text-danger">*</span></label>
                        <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $biodata->whatsapp) }}"
                            class="form-control @error('whatsapp') is-invalid @enderror" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="jenis_kelamin" class="required">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-select text-dark @error('jenis_kelamin') is-invalid @enderror" required>
                            {{-- <option value="">Pilih Jenis Kelamin</option> --}}
                            <option value="P" {{ old('jenis_kelamin', $biodata->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                            <option value="L" {{ old('jenis_kelamin', $biodata->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki - Laki</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="foto" class="required">Foto</label>
                        <div class="input-group">
                            <input type="file" id="file-upload" class="form-control" name="foto[]" accept="image/*"
                                multiple onchange="previewImages(event)">
                        </div>
                        <div id="preview-container" class="preview-container d-flex flex-wrap mt-3"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="required">Email <span class="text-danger">*</span></label>
                        <input type="text" name="email" id="email" value="{{ old('email', $biodata->user->email) }}"
                            class="form-control @error('email') is-invalid @enderror" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="username" class="required">Username <span class="text-danger">*</span></label>
                        <input type="text" name="username" id="username" value="{{ old('username', $biodata->user->username) }}"
                            class="form-control @error('username') is-invalid @enderror" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submitButton" class="btn btn-primary fw-semibold text-white w-100">
                            <span id="buttonText">Kirim</span>
                            <div id="loadingSpinner" class="spinner-border spinner-border-sm text-light ms-2 d-none"
                                role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Reset Password</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('reset-password') }}">
                                    @csrf

                                    @guest
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                            }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                                autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    @endguest

                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password Baru')
                                            }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password_baru"
                                                required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4 d-flex justify-content-between">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Reset Password') }}
                                            </button>

                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</div>

@endsection


@push('style')
<style>
    /* Gambar preview */
    .preview-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        padding: 10px;
        width: 100%;
    }

    .preview-container img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #ddd;
    }

    /* Tombol hapus gambar */
    .btn-close {
        position: absolute;
        top: 5px;
        right: 5px;
        color: #fff;
        background-color: rgba(0, 0, 0, 0.5);
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 12px;
        cursor: pointer;
    }

    .btn-close:hover {
        background-color: rgba(0, 0, 0, 0.7);
    }
</style>
<style>
    .preview-container img {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }
</style>
@endpush

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('formProfile');
        const submitButton = document.getElementById('submitButton');
        const buttonText = document.getElementById('buttonText');
        const loadingSpinner = document.getElementById('loadingSpinner');

        form.addEventListener('submit', (e) => {
            // Tampilkan spinner dan nonaktifkan tombol
            submitButton.disabled = true;
            buttonText.textContent = 'Mengirim...';
            loadingSpinner.classList.remove('d-none');
        });
    });
</script>

<script>
    // Menyimpan file yang akan di-upload dalam array
    let selectedFiles = [];

        function previewImages(event) {
            const files = Array.from(event.target.files);
            const previewContainer = document.getElementById("preview-container");
            previewContainer.innerHTML = ''; // Kosongkan preview sebelumnya
            selectedFiles = []; // Reset selected files

            files.forEach((file, index) => {
                selectedFiles.push(file); // Masukkan file ke dalam array

                const reader = new FileReader();
                reader.onload = function(e) {
                    // Buat elemen preview gambar dengan tombol hapus
                    const previewElement = document.createElement("div");
                    previewElement.classList.add("position-relative", "d-inline-block", "me-3", "mb-3");

                    previewElement.innerHTML = `
                        <img src="${e.target.result}" class="rounded border">
                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 me-1 mt-1" onclick="removeImage(${index})">X</button>
                    `;

                    previewContainer.appendChild(previewElement);
                };
                reader.readAsDataURL(file);
            });
        }

        function removeImage(index) {
            selectedFiles.splice(index, 1); // Hapus file dari array

            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            document.getElementById('file-upload').files = dataTransfer.files;

            // Refresh preview dengan array baru
            previewImages({ target: { files: dataTransfer.files } });
        }
</script>
@endpush