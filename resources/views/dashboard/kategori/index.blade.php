@extends('dashboard.layouts.app')

@section('title', 'Kategori')

@section('pageTitle', 'Kategori')

@section('pageContent')
<span class="fw-semibold fs-14 heading-font text-dark dot ms-2">List Kategori</span>
@endsection

@section('content')

<button class="btn btn-primary btn-sm text-white mb-2" data-bs-toggle="modal" data-bs-target="#modalTambahKategori"><i
        data-feather="plus-square" class="me-2"></i> Tambah Kategori</button>

{{-- Tambah Kategori --}}
<div class="modal fade" id="modalTambahKategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalTambahKategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group mb-4">
                        <label class="label">Nama Kategori</label>
                        <div class="form-group">
                            <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}"
                                class="form-control text-dark h-58" placeholder="Nama Kategori" required>
                        </div>
                        @error('tambahkategori')
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
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Tanggal Input</th>
                            <th scope="col">Tanggal Update</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategoris as $kategori)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>
                            <td>{{ \Carbon\Carbon::parse($kategori->created_at)->isoFormat('LLLL') }}</td>
                            <td>{{ \Carbon\Carbon::parse($kategori->updated_at)->isoFormat('LLLL') }}</td>
                            <td>
                                <div class="d-flex flex-column flex-sm-row gap-2">
                                    <button type="button" class="btn btn-warning btn-sm text-white mt-2 mt-sm-0"
                                        data-bs-toggle="modal" data-bs-target="#modalUbahKategori-{{ $kategori->slug }}">
                                        <i data-feather="edit"></i> Ubah
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm text-white mt-2 mt-sm-0"
                                        data-bs-toggle="modal" data-bs-target="#modalHapusKategori-{{ $kategori->slug }}">
                                        <i data-feather="trash"></i> Hapus
                                    </button>
                                </div>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="modalUbahKategori-{{ $kategori->slug }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="modalUbahKategoriLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Kategori</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('kategori.update', $kategori->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">

                                                    <div class="form-group mb-4">
                                                        <label class="label">Nama Kategori</label>
                                                        <div class="form-group">
                                                            <input type="text" name="nama_kategori"
                                                                value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                                                                class="form-control text-dark h-58"
                                                                placeholder="Nama Kategori" required>
                                                        </div>
                                                        @error('ubahkategori')
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
                                <div class="modal fade" id="modalHapusKategori-{{ $kategori->slug }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="modalHapusKategoriLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Kategori</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('kategori.destroy', $kategori->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin menghapus Kategori "<b>{{
                                                            $kategori->nama_kategori }}</b>" ini?</p>
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

@error('tambahkategori')
<script>
    new bootstrap.Modal(document.getElementById('modalTambahKategori')).show();
</script>
@enderror


@endpush