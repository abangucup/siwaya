@extends('dashboard.layouts.app')

@section('title', 'WBTB')

@section('pageTitle', 'WBTB')

@section('pageContent')
<span class="fw-semibold fs-14 heading-font text-dark dot ms-2">List WBTB</span>
@endsection

@section('content')

<a href="{{ route('wbtb.create') }}" class="btn btn-primary btn-sm text-white mb-2"><i data-feather="plus-square"
        class="me-2"></i> Tambah WBTB</a>


<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="default-table-area members-list">
            <div class="table-responsive">
                <table class="table align-middle" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama WBTB</th>
                            <th scope="col">Sebaran</th>
                            <th scope="col">Status</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Kondisi</th>
                            <th scope="col">Galeri</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataWbtb as $wbtb)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $wbtb->nama_wbtb }}</td>
                            <td>
                                <span>
                                    @foreach ($wbtb->sebarans as $kabkot)
                                    {{ $kabkot->nama_kabkot . ', '}}
                                    @endforeach
                                </span>
                            </td>
                            <td>{{ $wbtb->status }}</td>
                            <td>
                                @foreach ($wbtb->kategoris as $kategori)
                                    {{ $kategori->nama_kategori . ', '}}
                                @endforeach
                            </td>
                            <td>{{ $wbtb->kondisi->nama_kondisi }}</td>
                            <td>
                                <div class="d-flex flex-column flex-sm-row gap-2">
                                    <img src="{{ $wbtb->galeries()->first()->url_image }}" alt="">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column flex-sm-row gap-2">
                                    @if (auth()->user()->role->role_level == 'operator_kabkot')
                                        
                                    <a href="{{ route('wbtb.edit', $wbtb->slug) }}"
                                        class="btn btn-warning btn-sm text-white mt-2 mt-sm-0">
                                        <i data-feather="edit"></i> Ubah
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm text-white mt-2 mt-sm-0"
                                        data-bs-toggle="modal" data-bs-target="#modalHapusWbtb-{{ $wbtb->slug }}">
                                        <i data-feather="trash"></i> Hapus
                                    </button>
                                    @else
                                    -
                                    @endif

                                </div>
                                
                                <!-- Modal Hapus -->
                                @include('dashboard.wbtb.hapus_wbtb')

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

@endpush