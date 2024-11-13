@extends('dashboard.layouts.app')

@section('title', 'Instansi')

@section('pageTitle', 'Instansi')

@section('pageContent')
<span class="fw-semibold fs-14 heading-font text-dark dot ms-2">List Instansi</span>
@endsection

@section('content')

<button class="btn btn-primary btn-sm text-white mb-2" data-bs-toggle="modal" data-bs-target="#modalTambahInstansi"><i
        data-feather="plus-square" class="me-2"></i> Tambah Instansi</button>

{{-- Tambah Kabupaten --}}
@include('dashboard.instansi.tambah_instansi')

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="default-table-area members-list">
            <div class="table-responsive">
                <table class="table align-middle" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th>Kabupaten/Kota</th>
                            <th scope="col">Nama Instansi</th>
                            <th scope="col">Tanggal Input</th>
                            <th scope="col">Tanggal Update</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataInstansi as $instansi)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $instansi->kabkot->nama_kabkot }}</td>
                            <td>{{ $instansi->nama_instansi }}</td>
                            <td>{{ \Carbon\Carbon::parse($instansi->created_at)->isoFormat('LLLL') }}</td>
                            <td>{{ \Carbon\Carbon::parse($instansi->updated_at)->isoFormat('LLLL') }}</td>
                            <td>
                                <div class="d-flex flex-column flex-sm-row gap-2">
                                    <button type="button" class="btn btn-warning btn-sm text-white mt-2 mt-sm-0"
                                        data-bs-toggle="modal" data-bs-target="#modalUbahInstansi-{{ $instansi->slug }}">
                                        <i data-feather="edit"></i> Ubah
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm text-white mt-2 mt-sm-0"
                                        data-bs-toggle="modal" data-bs-target="#modalHapusKabkot-{{ $instansi->slug }}">
                                        <i data-feather="trash"></i> Hapus
                                    </button>
                                </div>

                                <!-- Modal Edit -->
                                @include('dashboard.instansi.edit_instansi')

                                <!-- Modal Hapus -->
                                @include('dashboard.instansi.hapus_instansi')

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
@error('tambahinstansi')
<script>
    new bootstrap.Modal(document.getElementById('modalTambahInstansi')).show();
</script>
@enderror

@endpush