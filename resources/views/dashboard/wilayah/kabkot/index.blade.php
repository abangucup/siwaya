@extends('dashboard.layouts.app')

@section('title', 'Kabupaten/Kota')

@section('pageTitle', 'Kabupaten / Kota')

@section('pageContent')
<span class="fw-semibold fs-14 heading-font text-dark dot ms-2">List Kabupaten/Kota</span>
@endsection

@section('content')

<button class="btn btn-primary btn-sm text-white mb-2" data-bs-toggle="modal" data-bs-target="#modalTambahKabkot"><i
        data-feather="plus-square" class="me-2"></i> Tambah Kabupaten / Kota</button>

{{-- Tambah Kabupaten --}}
<div class="modal fade" id="modalTambahKabkot" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalTambahKabkotLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kabupaten Kota</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('wilayah.kabkot.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group mb-4">
                        <label class="label">Nama Kabupaten / Kota</label>
                        <div class="form-group">
                            <input type="text" name="kabkot" value="{{ old('kabkot') }}"
                                class="form-control text-dark h-58" placeholder="Nama Kabupaten/Kota" required>
                        </div>
                        @error('tambahkabkot')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary text-white">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="default-table-area members-list">
            <div class="table-responsive">
                <table class="table align-middle" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kabupaten / Kota</th>
                            <th scope="col">Tanggal Input</th>
                            <th scope="col">Tanggal Update</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataKabkot as $kabkot)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kabkot->nama_kabkot }}</td>
                            <td>{{ \Carbon\Carbon::parse($kabkot->created_at)->isoFormat('LLLL') }}</td>
                            <td>{{ \Carbon\Carbon::parse($kabkot->updated_at)->isoFormat('LLLL') }}</td>
                            <td>
                                <div class="d-flex flex-column flex-sm-row gap-2">
                                    <button type="button" class="btn btn-warning btn-sm text-white mt-2 mt-sm-0"
                                        data-bs-toggle="modal" data-bs-target="#modalUbahKabkot-{{ $kabkot->slug }}">
                                        <i data-feather="edit"></i> Ubah
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm text-white mt-2 mt-sm-0"
                                        data-bs-toggle="modal" data-bs-target="#modalHapusKabkot-{{ $kabkot->slug }}">
                                        <i data-feather="trash"></i> Hapus
                                    </button>
                                </div>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="modalUbahKabkot-{{ $kabkot->slug }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="modalUbahKabkotLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Kabupaten
                                                    Kota</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('wilayah.kabkot.update', $kabkot->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">

                                                    <div class="form-group mb-4">
                                                        <label class="label">Nama Kabupaten / Kota</label>
                                                        <div class="form-group">
                                                            <input type="text" name="kabkot"
                                                                value="{{ old('kabkot', $kabkot->nama_kabkot) }}"
                                                                class="form-control text-dark h-58"
                                                                placeholder="Nama Kabupaten/Kota" required>
                                                        </div>
                                                        @error('ubahkabkot')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger text-white"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit"
                                                        class="btn btn-primary text-white">Kirim</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="modalHapusKabkot-{{ $kabkot->slug }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="modalHapusKabkotLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Kabupaten
                                                    Kota</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('wilayah.kabkot.destroy', $kabkot->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin menghapus Kabupaten/Kota "<b>{{
                                                            $kabkot->nama_kabkot }}</b>" ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger text-white"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit"
                                                        class="btn btn-primary text-white">Kirim</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('style')

@endpush

@push('script')

@error('tambahkabkot')
<script>
    new bootstrap.Modal(document.getElementById('modalTambahKabkot')).show();
</script>
@enderror

@error('ubahkabkot')
<script>
    new bootstrap.Modal(document.getElementById('modalUbahKabkot-{{ $kabkot->slug }}')).show();
</script>
@enderror

@endpush