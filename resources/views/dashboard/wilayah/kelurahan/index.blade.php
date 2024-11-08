@extends('dashboard.layouts.app')

@section('title', 'Kelurahan')

@section('pageTitle', 'Kelurahan')

@section('pageContent')
<span class="fw-semibold fs-14 heading-font text-dark dot ms-2">List Kelurahan</span>
@endsection

@section('content')

<button class="btn btn-primary btn-sm text-white mb-2" data-bs-toggle="modal" data-bs-target="#modalTambahKelurahan"><i
        data-feather="plus-square" class="me-2"></i> Tambah Kelurahan</button>

{{-- Tambah Kelurahan --}}
<div class="modal fade" id="modalTambahKelurahan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalTambahKelurahanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kelurahan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('wilayah.kelurahan.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group mb-4">
                        <label class="label">Nama Kelurahan</label>
                        <div class="form-group">
                            <input type="text" name="kelurahan" value="{{ old('kelurahan') }}"
                                class="form-control text-dark h-58" placeholder="Nama Kelurahan" required>
                        </div>
                        @error('tambahkelurahan')
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
                            <th scope="col">Nama Kelurahan</th>
                            <th scope="col">Tanggal Input</th>
                            <th scope="col">Tanggal Update</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataKelurahan as $kelurahan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kelurahan->nama_kelurahan }}</td>
                            <td>{{ \Carbon\Carbon::parse($kelurahan->created_at)->isoFormat('LLLL') }}</td>
                            <td>{{ \Carbon\Carbon::parse($kelurahan->updated_at)->isoFormat('LLLL') }}</td>
                            <td>
                                <div class="d-flex flex-column flex-sm-row gap-2">
                                    <button type="button" class="btn btn-warning btn-sm text-white mt-2 mt-sm-0"
                                        data-bs-toggle="modal" data-bs-target="#modalUbahKeluraan-{{ $kelurahan->slug }}">
                                        <i data-feather="edit"></i> Ubah Data
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm text-white mt-2 mt-sm-0"
                                        data-bs-toggle="modal" data-bs-target="#modalHapusKelurahan-{{ $kelurahan->slug }}">
                                        <i data-feather="trash"></i> Ubah Data
                                    </button>
                                </div>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="modalUbahKeluraan-{{ $kelurahan->slug }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="modalUbahKeluraanLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Kelurahan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('wilayah.kelurahan.update', $kelurahan->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">

                                                    <div class="form-group mb-4">
                                                        <label class="label">Nama Kelurahan</label>
                                                        <div class="form-group">
                                                            <input type="text" name="kelurahan"
                                                                value="{{ old('kelurahan', $kelurahan->nama_kelurahan) }}"
                                                                class="form-control text-dark h-58"
                                                                placeholder="Nama Kelurahan" required>
                                                        </div>
                                                        @error('ubahkelurahan')
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
                                <div class="modal fade" id="modalHapusKelurahan-{{ $kelurahan->slug }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="modalHapusKelurahanLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Kelurahan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('wilayah.kelurahan.destroy', $kelurahan->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin menghapus kelurahan "<b>{{
                                                            $kelurahan->nama_kelurahan }}</b>" ini?</p>
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
@error('tambahkelurahan')
<script>
    new bootstrap.Modal(document.getElementById('modalTambahKelurahan')).show();
</script>
@enderror

@error('ubahkelurahan')
<script>
    new bootstrap.Modal(document.getElementById('modalUbahKeluraan-{{ $kelurahan->slug }}')).show();
</script>
@enderror

@endpush