@extends('mobile.layouts.app')

@section('title', 'Profile')

@section('btn-back')
<a href="javascript:void(0);" class="back-btn">
    <svg width="18" height="18" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M9.03033 0.46967C9.2966 0.735936 9.3208 1.1526 9.10295 1.44621L9.03033 1.53033L2.561 8L9.03033 14.4697C9.2966 14.7359 9.3208 15.1526 9.10295 15.4462L9.03033 15.5303C8.76406 15.7966 8.3474 15.8208 8.05379 15.6029L7.96967 15.5303L0.96967 8.53033C0.703403 8.26406 0.679197 7.8474 0.897052 7.55379L0.96967 7.46967L7.96967 0.46967C8.26256 0.176777 8.73744 0.176777 9.03033 0.46967Z"
            fill="#a19fa8" />
    </svg>
</a>
@endsection

@section('header', 'Detail Profile')

@section('content')
<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container fb">

            <!-- Dashboard Area -->
            <div class="dashboard-area card shadow-sm p-3">

                <div class="row">
                    <div class="col-12 text-center mb-3">
                        <img src="{{ $biodata->foto ?? asset('assets/images/profile.svg') }}"
                            class="rounded-circle w-25 shadow-sm" alt="{{ $biodata->nama_lengkap }}">
                    </div>
                    <div class="col-12 mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Nama Lengkap : </strong> {{ $biodata->nama_lengkap }}
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Jenis Kelamin : </strong> {{ $biodata->jenis_kelamin == 'L' ? 'Laki-Laki' :
                                'Perempuan' }}
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Tanggal Lahir : </strong> {{
                                \Carbon\Carbon::parse($biodata->tanggal_lahir)->isoFormat('LL') }}
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Alamat : </strong> {{ $biodata->alamat }}
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>No. HP : </strong> {{ $biodata->no_hp }}
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Whatsapp : </strong> {{ $biodata->whatsapp }}
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Email : </strong> {{ $biodata->user->email }}
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Username : </strong> {{ $biodata->user->username }}
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Level : </strong> {{ $biodata->user->role->role_name }}
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Keterangan Level : </strong> <span class="text-end">{{
                                    $biodata->user->role->role_description ?? 'null' }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Akun Dibuat : </strong> <span class="text-end">{{
                                    \Carbon\Carbon::parse($biodata->user->created_at)->isoFormat('LLLL') }}</span>
                            </li>
                            @if ($biodata->user->instansi != null)
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Instansi : </strong> {{ $biodata->user->instansi->instansi }}
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection