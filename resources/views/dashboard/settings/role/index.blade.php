@extends('dashboard.layouts.app')

@section('title', 'Role')

@section('pageTitle', 'Role')

@section('pageContent')
<span class="fw-semibold fs-14 heading-font text-dark dot ms-2">List Role</span>
@endsection

@section('content')

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="default-table-area members-list">
            <div class="table-responsive">
                <table class="table align-middle" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Role Name</th>
                            <th scope="col">Role Level</th>
                            <th scope="col">Role Description</th>
                            <th scope="col">Total User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->role_name  }}</td>
                            <td>{{ $role->role_level  }}</td>
                            <td>{{ $role->role_description  }}</td>
                            <td><a href="{{ route('settings.user.index') }}" class="btn btn-sm btn-outline-primary"><i data-feather="users" class="me-2"></i>{{ $role->users_count }} User</a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endSection