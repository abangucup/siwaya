@extends('mobile.layouts.app')

@section('title', 'Verifikasi')

@section('btn-back')
<a href="javascript:void(0);" class="back-btn">
    <svg width="18" height="18" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M9.03033 0.46967C9.2966 0.735936 9.3208 1.1526 9.10295 1.44621L9.03033 1.53033L2.561 8L9.03033 14.4697C9.2966 14.7359 9.3208 15.1526 9.10295 15.4462L9.03033 15.5303C8.76406 15.7966 8.3474 15.8208 8.05379 15.6029L7.96967 15.5303L0.96967 8.53033C0.703403 8.26406 0.679197 7.8474 0.897052 7.55379L0.96967 7.46967L7.96967 0.46967C8.26256 0.176777 8.73744 0.176777 9.03033 0.46967Z"
            fill="#a19fa8" />
    </svg>
</a>
@endsection

@section('header', 'Verifikasi WBTB')

@section('content')

<div class="page-content bottom-content">

    <div class="container">

        <form action="{{ route('mobile.wbtb.verifikasi.storeVerifikasi', $wbtb->slug) }}" method="POST" enctype="multipart/form-data" id="formVerifikasi">
            @csrf
            <div class="row">

                <div class="form-group mb-3">
                    <label class="label">Nama WBTB</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Masukan Nama WBTB" readonly value="{{ $wbtb->nama_wbtb }}" disabled>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="label">Status</label>
                    <div class="input-group">
                        <select class="form-select form-control text-dark" aria-label="Default select example" name="status_verifikasi">
                            <option selected value="">Pilih Status Verifikasi</option>
                            <option value="disetujui">Setujui Pengajuan</option>
                            <option value="ditolak">Tolak Pengajuan</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="label">Catatan</label>
                    <div class="input-group">
                        <textarea class="form-control" placeholder="Tambahkan Catatan ...." cols="30" rows="5"
                            name="keterangan">{{ old('keterangan') }}</textarea>
                    </div>
                </div>

                <div class="card-body">

                    <button type="submit" id="btnVerifikasi" class="btn btn-primary fw-semibold text-white w-100">
                        <span id="btnTextVerifikasi">Kirim</span>
                        <div id="loadingVerifikasi" class="spinner-border spinner-border-sm text-light ms-2 d-none"
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
@push('script')
    

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('formVerifikasi');
        const submitButton = document.getElementById('btnVerifikasi');
        const buttonText = document.getElementById('btnTextVerifikasi');
        const loadingSpinner = document.getElementById('loadingVerifikasi');

        form.addEventListener('submit', (e) => {
            // Tampilkan spinner dan nonaktifkan tombol
            submitButton.disabled = true;
            buttonText.textContent = 'Mengirim...';
            loadingSpinner.classList.remove('d-none');
        });
    });
</script>
@endpush
