@extends('mobile.layouts.app')

@section('title', 'Profile')

@section('btn-back')
<a href="javascript:void(0);" class="back-btn">
    <svg width="18" height="18" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M9.03033 0.46967C9.2966 0.735936 9.3208 1.1526 9.10295 1.44621L9.03033 1.53033L2.561 8L9.03033 14.4697C9.2966 14.7359 9.3208 15.1526 9.10295 15.4462L9.03033 15.5303C8.76406 15.7966 8.3474 15.8208 8.05379 15.6029L7.96967 15.5303L0.96967 8.53033C0.703403 8.26406 0.679197 7.8474 0.897052 7.55379L0.96967 7.46967L7.96967 0.46967C8.26256 0.176777 8.73744 0.176777 9.03033 0.46967Z"
            fill="#a19fa8" />
    </svg>
</a>
@endsection

@section('header', 'Update Biodata')

@section('content')

<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container fb">
            <div class="dashboard-area card shadow-none border py-3 px-4">

                <form action="{{ route('mobile.profile.update', $biodata->slug) }}" method="post"
                    enctype="multipart/form-data" id="formProfile">
                    @csrf
                    @method('PUT')
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
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                            {{-- <option value="">Pilih Jenis Kelamin</option> --}}
                            <option value="P" {{ old('jenis_kelamin', $biodata->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                            <option value="L" {{ old('jenis_kelamin', $biodata->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki - Laki</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="required">Foto <span class="text-danger">*</span></label>
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