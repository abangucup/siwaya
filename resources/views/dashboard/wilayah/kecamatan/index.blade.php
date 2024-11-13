@extends('dashboard.layouts.app')

@section('title', 'Kecamatan')

@section('pageTitle', 'Kecamatan')

@section('pageContent')
<span class="fw-semibold fs-14 heading-font text-dark dot ms-2">List Kecamatan</span>
@endsection

@section('content')

<button class="btn btn-primary btn-sm text-white mb-2" data-bs-toggle="modal" data-bs-target="#modalTambahKecamatan"><i
        data-feather="plus-square" class="me-2"></i> Tambah Kecamatan</button>

{{-- Tambah Kecamatan --}}
<div class="modal fade" id="modalTambahKecamatan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalTambahKecamatanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kecamatan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('wilayah.kecamatan.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group mb-4">
                        <label class="label">Nama Kecamatan</label>
                        <div class="form-group">
                            <input type="text" name="kecamatan" value="{{ old('kecamatan') }}"
                                class="form-control text-dark h-58" placeholder="Nama Kecamatan" required>
                        </div>
                        @error('tambahkecamatan')
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
                            <th scope="col">Nama Kecamatan</th>
                            <th scope="col">Tanggal Input</th>
                            <th scope="col">Tanggal Update</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataKecamatan as $kecamatan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kecamatan->nama_kecamatan }}</td>
                            <td>{{ \Carbon\Carbon::parse($kecamatan->created_at)->isoFormat('LLLL') }}</td>
                            <td>{{ \Carbon\Carbon::parse($kecamatan->updated_at)->isoFormat('LLLL') }}</td>
                            <td>
                                <div class="d-flex flex-column flex-sm-row gap-2">
                                    <button type="button" class="btn btn-warning btn-sm text-white mt-2 mt-sm-0"
                                        data-bs-toggle="modal" data-bs-target="#modalUbahKecamatan-{{ $kecamatan->slug }}">
                                        <i data-feather="edit"></i> Ubah
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm text-white mt-2 mt-sm-0"
                                        data-bs-toggle="modal" data-bs-target="#modalHapusKecamatan-{{ $kecamatan->slug }}">
                                        <i data-feather="trash"></i> Hapus
                                    </button>
                                </div>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="modalUbahKecamatan-{{ $kecamatan->slug }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="modalUbahKecamatanLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Kecamatan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('wilayah.kecamatan.update', $kecamatan->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">

                                                    <div class="form-group mb-4">
                                                        <label class="label">Nama Kecamatan</label>
                                                        <div class="form-group">
                                                            <input type="text" name="kecamatan"
                                                                value="{{ old('kecamatan', $kecamatan->nama_kecamatan) }}"
                                                                class="form-control text-dark h-58"
                                                                placeholder="Kecamatan" required>
                                                        </div>
                                                        @error('ubahkecamatan')
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
                                <div class="modal fade" id="modalHapusKecamatan-{{ $kecamatan->slug }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="modalHapusKecamatanLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Kecamatan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('wilayah.kecamatan.destroy', $kecamatan->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin menghapus Kecamatan "<b>{{
                                                            $kecamatan->nama_kecamatan }}</b>" ini?</p>
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
<script>
    function copyToClipboard(text) {
        var input = document.createElement('textarea');
        input.innerHTML = text;
        document.body.appendChild(input);
        input.select();
        document.execCommand('copy');
        document.body.removeChild(input);
    }
</script>
@error('tambahkecamatan')
<script>
    new bootstrap.Modal(document.getElementById('modalTambahKecamatan')).show();
</script>
@enderror

@error('ubahkecamatan')
<script>
    new bootstrap.Modal(document.getElementById('modalUbahKecamatan-{{ $kecamatan->slug }}')).show();
</script>
@enderror

@endpush