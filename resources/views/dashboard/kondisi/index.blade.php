@extends('dashboard.layouts.app')

@section('title', 'Kondisi')

@section('pageTitle', 'Kondisi')

@section('pageContent')
<span class="fw-semibold fs-14 heading-font text-dark dot ms-2">List Kondisi</span>
@endsection

@section('content')

<button class="btn btn-primary btn-sm text-white mb-2" data-bs-toggle="modal" data-bs-target="#modalTambahKondisi"><i
        data-feather="plus-square" class="me-2"></i> Tambah Kondisi</button>

{{-- Tambah Kondisi --}}
<div class="modal fade" id="modalTambahKondisi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalTambahKondisiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kondisi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('kondisi.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group mb-4">
                        <label class="label">Kode Kondisi</label>
                        <div class="form-group">
                            <input type="text" name="kode_kondisi" value="{{ old('kode_kondisi') }}"
                                class="form-control text-dark h-58" placeholder="Contoh: 1" required>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="label">Nama Kondisi</label>
                        <div class="form-group">
                            <input type="text" name="nama_kondisi" value="{{ old('nama_kondisi') }}"
                                class="form-control text-dark h-58" placeholder="Contoh: Sedang Berkembang" required>
                        </div>
                        @error('tambahkondisi')
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
                            <th scope="col">Nama Kondisi</th>
                            <th scope="col">Tanggal Input</th>
                            <th scope="col">Tanggal Update</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kondisis as $kondisi)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kondisi->nama_kondisi }}</td>
                            <td>{{ \Carbon\Carbon::parse($kondisi->created_at)->isoFormat('LLLL') }}</td>
                            <td>{{ \Carbon\Carbon::parse($kondisi->updated_at)->isoFormat('LLLL') }}</td>
                            <td>
                                <div class="d-flex flex-column flex-sm-row gap-2">
                                    <button type="button" class="btn btn-warning btn-sm text-white mt-2 mt-sm-0"
                                        data-bs-toggle="modal" data-bs-target="#modalUbahKondisi-{{ $kondisi->slug }}">
                                        <i data-feather="edit"></i> Ubah
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm text-white mt-2 mt-sm-0"
                                        data-bs-toggle="modal" data-bs-target="#modalHapusKondisi-{{ $kondisi->slug }}">
                                        <i data-feather="trash"></i> Hapus
                                    </button>
                                </div>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="modalUbahKondisi-{{ $kondisi->slug }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="modalUbahKondisiLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Kondisi</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('kondisi.update', $kondisi->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">

                                                    <div class="form-group mb-4">
                                                        <label class="label">Kode Kondisi</label>
                                                        <div class="form-group">
                                                            <input type="text" name="kode_kondisi"
                                                                value="{{ old('kode_kondisi', $kondisi->kode_kondisi) }}"
                                                                class="form-control text-dark h-58"
                                                                placeholder="Contoh: 1" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="label">Nama Kondisi</label>
                                                        <div class="form-group">
                                                            <input type="text" name="nama_kondisi"
                                                                value="{{ old('nama_kondisi', $kondisi->nama_kondisi) }}"
                                                                class="form-control text-dark h-58"
                                                                placeholder="Contoh: Sedang Berkembang" required>
                                                        </div>
                                                        @error('ubahkondisi')
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
                                <div class="modal fade" id="modalHapusKondisi-{{ $kondisi->slug }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="modalHapusKondisiLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Kondisi</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('kondisi.destroy', $kondisi->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin menghapus Kondisi "<b>{{
                                                            $kondisi->nama_kondisi }}</b>" ini?</p>
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

@error('tambahkondisi')
<script>
    new bootstrap.Modal(document.getElementById('modalTambahKondisi')).show();
</script>
@enderror


@endpush