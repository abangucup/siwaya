@extends('dashboard.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Dashboard {{ auth()->user()->role->role_name }}</h3>
    <h6>Selamat Datang {{ auth()->user()->biodata->nama_lengkap }}</h6>
</div>

<div class="row justify-content-center">

    @foreach ($datas as $data => $value)
    <div class="col-xxl-3 col-sm-6">
        <div class="stats-box style-five card bg-primary bg-opacity-10 border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <span class="fs-3 fw-bold text-dark">{{ $value }}</span>
                    <i class="ri-database-2-line"></i>
                </div>
                <span class="fs-18 fw-semibold text-dark mb-1 d-block">{{ $data }}</span>
            </div>
        </div>
    </div>
    @endforeach

</div>

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-0">Register Terbaru</h4>
            <a href="{{ route('settings.user.index') }}" class="btn btn-outline-primary"><i
                    data-feather="external-link"></i> Lihat</a>
        </div>
        <div class="default-table-area members-list">
            <div class="table-responsive">
                <table class="table align-middle" id="tabelRegister">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">Tanggal Input</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($register as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->biodata->nama_lengkap ?? '-' }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->biodata->nomor_telepon }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->isoFormat('LL') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-0">Pencatatan WBTB Terbaru</h4>
            <a href="{{ route('settings.user.index') }}" class="btn btn-outline-primary"><i
                    data-feather="external-link"></i> Lihat</a>
        </div>
        <div class="default-table-area members-list">
            <div class="table-responsive">
                <table class="table align-middle" id="tablePencatatan">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Penginput</th>
                            <th scope="col">Nama Warisan</th>
                            <th scope="col">Sebaran</th>
                            <th scope="col">Tanggal Input</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataWbtb as $wbtb)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $wbtb->user->biodata->nama_lengkap }}</td>
                            <td>{{ $wbtb->nama_wbtb }}</td>
                            <td>
                                <ul>
                                    @foreach ($wbtb->lokasis as $lokasi)
                                        <li>{{ $lokasi->kabkot->nama_kabkot }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($wbtb->created_at)->isoFormat('LL') }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

@push('script')
<script>
    new RdataTB('tabelRegister');
    new RdataTB('tablePencatatan');
</script>
@endpush