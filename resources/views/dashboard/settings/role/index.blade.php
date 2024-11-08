@extends('dashboard.layouts.app')

@section('title', 'Role')

@section('pageTitle', 'Role')

@section('pageContent')
<span class="fw-semibold fs-14 heading-font text-dark dot ms-2">List Role</span>
@endsection

@section('content')

<button class="btn btn-primary btn-sm text-white mb-2" data-bs-toggle="modal" data-bs-target="#modalBuyerRole"><i
    data-feather="plus-square" class="me-2"></i> Tambah Role</button>

{{-- Tambah Role --}}

@endSection