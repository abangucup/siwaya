@extends('dashboard.layouts.app')

@section('title', 'User')

@section('pageTitle', 'User')

@section('pageContent')
<span class="fw-semibold fs-14 heading-font text-dark dot ms-2">List User</span>
@endsection

@section('content')

<button class="btn btn-primary btn-sm text-white mb-2" data-bs-toggle="modal" data-bs-target="#modalTambahUser"><i
        data-feather="plus-square" class="me-2"></i> Tambah User</button>

{{-- Tambah User --}}
@include('dashboard.settings.user.tambah_user')

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="default-table-area members-list">
            <div class="table-responsive">
                <table class="table align-middle" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Level</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->role->role_name }}</td>
                            <td>{{ $user->biodata->nama_lengkap }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->biodata->nomor_telepon }}</td>
                            <td>
                                <div class="d-flex flex-row flex-sm-row gap-1">
                                    <button type="button" class="btn btn-warning btn-sm text-white d-flex align-items-center mt-2 mt-sm-0"
                                        data-bs-toggle="modal" data-bs-target="#modalUbahUser-{{ $user->slug }}">
                                        <i data-feather="edit" class="me-1"></i> Edit
                                    </button>
                                    <a href="{{ route('settings.user.show', $user->slug) }}" type="button" class="btn btn-info btn-sm text-white d-flex align-items-center mt-2 mt-sm-0">
                                        <i data-feather="external-link" class="me-1"></i> Detail
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm text-white d-flex align-items-center mt-2 mt-sm-0"
                                        data-bs-toggle="modal" data-bs-target="#modalHapusUser-{{ $user->slug }}">
                                        <i data-feather="trash" class="me-1"></i> Hapus
                                    </button>
                                </div>

                                <!-- Modal Edit -->
                                @include('dashboard.settings.user.edit_user')


                                <!-- Modal Hapus -->
                                @include('dashboard.settings.user.hapus_user')

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