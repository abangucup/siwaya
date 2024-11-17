@extends('mobile.layouts.app')

@section('title', 'Pengajuan')

@section('btn-back')
<a href="javascript:void(0);" class="back-btn">
    <svg width="18" height="18" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M9.03033 0.46967C9.2966 0.735936 9.3208 1.1526 9.10295 1.44621L9.03033 1.53033L2.561 8L9.03033 14.4697C9.2966 14.7359 9.3208 15.1526 9.10295 15.4462L9.03033 15.5303C8.76406 15.7966 8.3474 15.8208 8.05379 15.6029L7.96967 15.5303L0.96967 8.53033C0.703403 8.26406 0.679197 7.8474 0.897052 7.55379L0.96967 7.46967L7.96967 0.46967C8.26256 0.176777 8.73744 0.176777 9.03033 0.46967Z"
            fill="#a19fa8" />
    </svg>
</a>
@endsection

@section('header', 'Tambah WBTB')

@section('content')

<div class="page-content bottom-content">

    <div class="container">

        <form action="{{ route('mobile.wbtb.store') }}" method="POST" enctype="multipart/form-data" id="wbtbForm">
            @csrf
            <div class="row">

                <div class="form-group mb-2">
                    <label class="label">Nama WBTB <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="nama_wbtb" placeholder="Masukan Nama WBTB"
                            required>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="label">Kabupaten <span class="text-danger">*</span></label>
                        <select name="kabkot[]" class="form-control select2-multiple" multiple="multiple"
                            id="multipleSelectKabkot" required>
                            @foreach ($kabkots as $kabkot)
                            <option value="{{ $kabkot->slug }}">{{ $kabkot->nama_kabkot }}</option>
                            @endforeach
                        </select>
                </div>

                <div class="form-group mb-4">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori[]" class="form-control select2-multiple" multiple="multiple"
                        id="multipleSelectKategori" required>
                        @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->slug }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Menyimpan semua nilai terpilih ke dalam hidden input untuk dikirimkan ke server -->
                <input type="hidden" name="selected_kondisi" id="selected-kondisi-input">

                <div class="form-group mb-2">
                    <label class="label">Kondisi <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <select name="kondisi" class="form-select form-control" required>
                            <option value="">Pilih Kondisi</option>
                            @foreach ($kondisis as $kondisi)
                            <option value="{{ $kondisi->slug }}">{{ $kondisi->nama_kondisi }}</option>
                            @endforeach
                        </select>
                        <i
                            class="ri-filter-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label class="label">Deskripsi WBTB</label>
                    <div class="input-group">
                        <textarea class="form-control" placeholder="Tulis Deskripsi WBTB ... " cols="30" rows="5"
                            name="deskripsi_wbtb"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="label">Gambar WBTB <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="file" id="file-upload" class="form-control" name="galeri[]" accept="image/*"
                            multiple onchange="previewImages(event)" required>
                    </div>
                    <div id="preview-container" class="preview-container d-flex flex-wrap mt-3"></div>
                </div>


                <div class="form-group mb-2">
                    <label class="label">Deskripsi Gambar</label>
                    <div class="input-group">
                        <textarea class="form-control" name="description_image"
                            placeholder="Tulis Deskripsi Gambar Yang DiUpload ... " cols="30" rows="5"></textarea>
                    </div>
                </div>

                <div class="card-body">
                    <button type="submit" id="submitButton" class="btn btn-primary fw-semibold text-white w-100">
                        <span id="buttonText">Kirim</span>
                        <div id="loadingSpinner" class="spinner-border spinner-border-sm text-light ms-2 d-none"
                            role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
<!-- Page Content End -->
@endsection

@push('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    /* Styling untuk container Select2 dengan ukuran penuh */
    .select2-container--default .select2-selection--multiple {
        width: 100% !important;
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 8px;
        background-color: #f9f9f9;
        min-height: 40px;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: center;
        box-sizing: border-box;
    }

    /* Styling untuk badge yang dipilih */
    .select2-selection__choice {
        background-color: #007bff;
        color: white;
        border-radius: 15px;
        padding: 5px 12px;
        margin-right: 6px;
        margin-top: 6px;
        font-size: 13px;
        display: flex;
        align-items: center;
    }

    /* Hover effect pada pilihan */
    .select2-selection__choice:hover {
        background-color: #0056b3;
    }

    /* Tombol hapus (X) pada badge */
    .select2-selection__choice__remove {
        color: white;
        font-size: 14px;
        margin-left: 8px;
        cursor: pointer;
    }

    /* Fokus pada Select2 (border lebih jelas saat difokuskan) */
    .select2-container--default .select2-selection--multiple:focus-within {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
    }

    /* Dropdown Select2 untuk pilihan */
    .select2-container--default .select2-results__option[aria-selected=true] {
        background-color: #0056b3 !important;
        color: white !important;
    }

    .select2-container--default .select2-results__option:hover {
        background-color: #007bff !important;
        color: white !important;
    }

    /* Placeholder untuk Select2 */
    .select2-container--default .select2-selection--multiple .select2-selection__placeholder {
        color: #999;
        font-style: italic;
    }

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
        const form = document.getElementById('wbtbForm');
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true
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