@extends('dashboard.layouts.app')

@section('title', 'WBTB')

@section('pageTitle', 'Tambah WBTB')

@section('pageContent')
<li>
    <a href="{{ route('wbtb.index') }}" class="text-decoration-none">
        <span class="fw-semibold fs-14 heading-font dot ms-2">List WBTB</span>
    </a>
</li>
<span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Tambah WBTB</span>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <form action="{{ route('wbtb.store') }}" method="POST" enctype="multipart/form-data" id="formWbtb">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label">Nama WBTB <span class="text-danger">*</span></label>
                                <div class="form-group position-relative">
                                    <input type="text" class="form-control text-dark ps-5 h-58" name="nama_wbtb"
                                        required placeholder="Masukan Nama WBTB">
                                    <i
                                        class="ri-edit-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label">Kabupaten <span class="text-danger">*</span></label>
                                <div class="form-group position-relative">
                                    <select name="kabkot[]"
                                        class="form-control form-select select2-multiple ps-5 h-58"
                                        id="multipleSelectKabkot" required>
                                        <option value="">Pilih Kabupaten/Kota</option>
                                        @foreach ($kabkots as $kabkot)
                                        <option value="{{ $kabkot->slug }}">{{ $kabkot->nama_kabkot }}</option>
                                        @endforeach
                                    </select>
                                    <i
                                    class="ri-map-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label">Kategori <span class="text-danger">*</span></label>
                                <div class="form-group position-relative">
                                    <select name="kategori[]"
                                        class="form-control form-select ps-5 h-58"
                                        id="multipleSelectKategori" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->slug }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    <i
                                        class="ri-grid-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label">Kondisi <span class="text-danger">*</span></label>
                                <div class="form-group position-relative">
                                    <select name="kondisi" class="form-select form-control ps-5 h-58" required>
                                        <option value="">Pilih Kondisi</option>
                                        @foreach ($kondisis as $kondisi)
                                        <option value="{{ $kondisi->slug }}">{{ $kondisi->nama_kondisi }}</option>
                                        @endforeach
                                    </select>
                                    <i
                                        class="ri-filter-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="label">Deskripsi WBTB</label>
                                <div class="form-group position-relative">
                                    <textarea class="form-control ps-5 text-dark"
                                        placeholder="Tulis Deskripsi WBTB ... " cols="30" rows="5"
                                        name="deskripsi_wbtb"></textarea>
                                    <i
                                        class="ri-information-line position-absolute top-0 start-0 fs-20 text-gray-light ps-20 pt-2"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="label">Gambar WBTB</label>
                                <div class="form-control h-100 text-center position-relative p-4 p-lg-5">
                                    <div class="product-upload">
                                        <label for="file-upload" class="file-upload mb-0">
                                            <i class="ri-upload-cloud-2-line fs-2 text-gray-light"></i>
                                            <span class="d-block fw-semibold text-body">Pilih Gambar</span>
                                        </label>
                                        <input id="file-upload" type="file" name="galeri[]" multiple
                                            onchange="previewImages(event)" />
                                    </div>
                                    <div id="preview-container" class="d-flex flex-wrap mt-3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="label">Deskripsi Gambar</label>
                                <div class="form-group position-relative">
                                    <textarea class="form-control ps-5 text-dark" name="description_image"
                                        placeholder="Tulis Deskripsi Gambar Yang DiUpload ... " cols="30"
                                        rows="5"></textarea>
                                    <i
                                        class="ri-information-line position-absolute top-0 start-0 fs-20 text-gray-light ps-20 pt-2"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" id="btnSubmit"
                                class="btn btn-primary py-3 px-5 fw-semibold text-white w-100">
                                <span id="btnText">Kirim</span>
                                <div id="loadingSubmit" class="spinner-border spinner-border-sm text-light ms-2 d-none"
                                    role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('formWbtb');
        const submitButton = document.getElementById('btnSubmit');
        const buttonText = document.getElementById('btnText');
        const loadingSpinner = document.getElementById('loadingSubmit');

        form.addEventListener('submit', (e) => {
            // Tampilkan spinner dan nonaktifkan tombol
            submitButton.disabled = true;
            buttonText.textContent = 'Mengirim...';
            loadingSpinner.classList.remove('d-none');
        });
    });
</script>
<script>
    let selectedFiles = [];

function previewImages(event) {
    const previewContainer = document.getElementById("preview-container");
    previewContainer.innerHTML = ''; // Clear previous previews
    selectedFiles = []; // Reset selected files

    if (event.target.files) {
        Array.from(event.target.files).forEach((file, index) => {
            selectedFiles.push(file); // Add file to selectedFiles array

            const reader = new FileReader();
            reader.onload = function(e) {
                // Create a container for each image preview with a remove button
                const previewElement = document.createElement("div");
                previewElement.classList.add("position-relative", "d-inline-block", "me-3", "mb-3");

                previewElement.innerHTML = `
                    <img src="${e.target.result}" class="rounded border" style="width: 100px; height: 100px; object-fit: cover;">
                    <button type="button" class="btn-close position-absolute top-0 end-0 me-1 mt-1" onclick="removeImage(${index})" aria-label="Remove"></button>
                `;

                previewContainer.appendChild(previewElement);
            };
            reader.readAsDataURL(file);
        });
    }
}

function removeImage(index) {
    // Remove file from selectedFiles array
    selectedFiles.splice(index, 1);

    // Update the input's files with remaining selected files
    const dataTransfer = new DataTransfer();
    selectedFiles.forEach(file => dataTransfer.items.add(file));
    document.getElementById('file-upload').files = dataTransfer.files;

    // Call previewImages again to refresh the preview
    previewImages({ target: { files: dataTransfer.files } });
}
</script>
@endpush