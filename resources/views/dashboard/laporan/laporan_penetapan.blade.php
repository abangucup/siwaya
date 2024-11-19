@extends('dashboard.layouts.app')

@section('title', 'Penetapan WBTB')

@section('pageTitle', 'Penetapan WBTB')

@section('pageContent')
<span class="fw-semibold fs-14 heading-font text-dark dot ms-2">List Penetapan WBTB</span>
@endsection

@section('content')

<div class="d-flex justify-content-end mb-4">
    <a href="{{ route('laporan.cetak.ditetapkan') }}" class="btn btn-danger text-white me-2" target="_blank">
        <i data-feather="file-text" class="me-2"></i> Cetak PDF
    </a>
    <a href="{{ route('laporan.export.ditetapkan') }}" class="btn btn-success text-white me-2" target="_blank">
        <i data-feather="file" class="me-2"></i> Cetak Excel
    </a>

</div>

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="default-table-area members-list">
            <div class="table-responsive">
                <table class="table align-middle" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nomor WBTB</th>
                            <th scope="col">Nama WBTB</th>
                            <th scope="col">Sebaran</th>
                            <th scope="col">Status</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Kondisi</th>
                            <th scope="col">Galeri</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wbtbs as $wbtb)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $wbtb->nomor_wbtb }}</td>
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
                                    <img src="{{ $wbtb?->galeries()->first()?->full_url_image }}" alt="">
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