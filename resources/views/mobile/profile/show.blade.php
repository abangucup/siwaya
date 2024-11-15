@extends('mobile.layouts.app')

@section('title', 'Profile')

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
                                <strong>Jenis Kelamin : </strong> {{ $biodata->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Tanggal Lahir : </strong> {{ \Carbon\Carbon::parse($biodata->tanggal_lahir)->isoFormat('LL') }}
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
                                <strong>Keterangan Level : </strong> <span class="text-end">{{ $biodata->user->role->role_description ?? 'null' }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Akun Dibuat : </strong> <span class="text-end">{{ \Carbon\Carbon::parse($biodata->user->created_at)->isoFormat('LLLL') }}</span>
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
@endsection